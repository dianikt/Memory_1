var arrayId2 = []; //contine las dos cartas giradas 
var arrayId3 = [];
var puntuacion = 1;
var aciertos = 0;
var cronometro;
var contadorAyudas = 0;

function captura_click(event, num) {  // Funcion para capturar el click del raton 

    if(arrayId2.length < 2){
    	var cardid = event.currentTarget.getAttribute("id");

    	if((arrayId3.length == 0 || arrayId3.length == 1 ) && arrayId3[0] !== cardid){
		    var element = event.currentTarget.className;    
		    event.currentTarget.setAttribute("class", "card flip"); 
		    		    		    
		    var audio = carga_sonido(1); // cargamos el sonido de giro 
		    audio.play();
			
			arrayId2.push(event.currentTarget.getAttribute("id")); //guardamos el id 
			arrayId3.push(event.currentTarget);// guardamos el evento
		}			
	}

	if(arrayId2.length == 2 && arrayId3.length == 2){
		
		// Si hay 2 cartas  y son diferentes las gira de nuevo:
		if (!compruebaParejas()){	
			intentosGastados(); // cada intento suma 1;
			setTimeout(voltearCartas, 1000);
			
			var audio = carga_sonido(2);  // cargamos el sonido	de fallo 
		    audio.play();	
		    cartasGiradas = [];

		}else{ // si  son parejas las bloquea				
			event.currentTarget.setAttribute("class", "card flip");
			event.currentTarget.removeAttribute("onclick");	
			arrayId3[0].removeAttribute("onclick");			
		    arrayId2 = [];
		    arrayId3 = [];
		    intentosGastados(); //cada intento suma 1;
			aciertosParejas(num);	// cada acierto suma 1;
			
			var audio = carga_sonido(3); // cargamos el sonido de victoria	
		    audio.play();	
	    }
	}	 	
}

function voltearCartas(){  // gira las dos cartas por que son diferentes 
	
	arrayId3[0].className = 'flip-container';
	arrayId3[1].className = 'flip-container';
					
	arrayId2 = [];
	arrayId3 = [];	
}

// Comprueba los id de las cartas si son pareja o no.
function compruebaParejas(){	
	if (arrayId2[0] === arrayId2[1])
		return true; // retorna true si las dos son iguales.
	else
		return false; //retorna false si son diferentes.
}

//suma y actualiza la puntuacion.
function intentosGastados(){		
        document.getElementById('puntuacion').innerHTML ="Puntuacion: "+puntuacion;
        document.getElementById('intent').value = puntuacion;
        puntuacion++;		
}
function aciertosParejas(num){	 // suma los aciertos 
        aciertos++;
		hazGanado(num);			
}
function hazGanado(num){	
	if(aciertos === (num)){ //comprueba segun las parejas si ha ganado o no.
		detenerReloj();
		alert(" !!! Haz ganado !!!!" );
	}
}
function carga_sonido(audio){ //crea y devuelve los sonidos
	var audio;
	if ( audio == 1) var audio = new Audio('sonidos/GIRAR.WAV');
	else if ( audio == 2) var audio = new Audio('sonidos/FALLAR.WAV');
	else if ( audio == 3) var audio = new Audio('sonidos/VICTORY.WAV');    
	return audio;
}
function detenerReloj(){   // detiene el tiempo 
    clearInterval(cronometro);
}

function muestraReloj(){ // inicia y actualiza el tiempo

    contador_s = 0;
    contador_m = 0;
    s = document.getElementById("segundos");
    m = document.getElementById("minutos");
    cronometro = setInterval(function(){
						if(contador_s==60)
						{
							contador_s=0;
							contador_m++;
							m.innerHTML = contador_m;
							if(contador_m==60)
							{
								contador_m=0;
							}
						}
				   s.innerHTML = contador_s;
						contador_s++;
					},1000);
}
 // si presionas el boton de ayuda comprueba que no hayas gastado las 3
function ayudas(){

	if (contadorAyudas <3 ){
		contadorAyudas++;
		puntuacion = puntuacion+5; // le suma 5 a la puntacion 
		document.getElementById('puntuacion').innerHTML ="Puntuacion: "+puntuacion;

		var cartaName = []; //array que guarda todas las cartas con el name card.
		cartaName = document.getElementsByName("card");

		for(i=0; i<cartaName.length; i++){
			var claseCarta = cartaName[i].getAttribute("class");
			
			if(claseCarta == 'flip-container') // giramos las cartas q no esten giradas.
				{cartaName[i].setAttribute("class","card flip");}
		}

		setTimeout(function(){  // bloqueamos las cartas durante 3 segundos. 
			for(i=0; i<cartaName.length; i++){
			var claseCarta = cartaName[i].getAttribute("onclick");			
				if(claseCarta != null) // giramos las cartas q no tengan el atributo onclick.
					{cartaName[i].setAttribute("class","flip-container");}
				}
			},1000);
	}else 
	{
		alert("No puedes utilizar mas ayudas.");
	}	
}

	 

 