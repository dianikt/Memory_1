<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Juguemos al Memory</title>	
		<script type="text/javascript" src=javascript.js></script>	
	</head>
	<link rel="stylesheet" type="text/css" href="style.css"></link>	
	
	<body onload="muestraReloj()">	
		<br><br>	
		<div id = 'variables'>	<br>		
			Tiempo: <span id="minutos">0</span>:<span id="segundos">0</span>			
			<div id ='puntuacion'> Puntuacion: </div>	
			<?php echo "<button id ='ayuda' onclick ='ayudas()' value='Ayuda'>Ayuda</button>" ?>
		</div>
		<div id="table_juego">
		  <table id="tabla">
			<?php 
				$fil =  $_POST["valor"];
				$col =  $_POST["valor"];
				
				$num = 0;
				if ($fil == 2)$num = 2;
				if ($fil == 4)$num = 8;
				if ($fil == 6)$num = 18;
							
				$array = array();
				$cont = 1;
				for($i=1;$i<=$num;$i++){ 
					$array2 = array();
					$array2[] = '<img class="imagen" id="'.$i.'" src="images/'.$i.'.jpg"/>';
					$array2[] = $cont;
					$array[] = $array2;
					$cont++;
				}			
				$n = 1;
				for($j=($num+1);$j<=($num*2);$j++){ 	
					$array2 = array();
					$array2[] = '<img class="imagen" id="'.$n.'" src="images/'.$n.'.jpg"/>';
					$array2[] = $n;
					$array[] = $array2;
					$n++;
				}
				shuffle($array);
				$cont = 0;						
				for ($y = 1; $y <= $col; $y++) {			
					echo"<tr>";					
						for ($x = 1; $x <= $fil; $x++) {
						   	echo "<td>";
								echo "<div name='card' cartaid='".$cont."' class='flip-container' id='cardId".$array[$cont][1]."' onclick='captura_click(event,$num)'>";
									echo "<div class='card'>\n";
									    echo "<figure class='front' ></figure>\n";
									    echo "<figure class='back' >".$array[$cont][0]."</figure>\n";
								echo "</div>\n";
								echo "</div>\n";
							echo "</td>\n";
	   						$cont++;
	   					} 

	   				echo "</tr>";					
				 }
				 ?>								
		  </table>		  
		</div><br><br><br>
		<div id="datosJug">
			<?php echo '<form method="POST" action="table_joc.php" >';
				echo '<label>Introduce tu nombre:</label>';
				echo '<input type="text" name="nombre"></input><br>';
				echo '<label>Intentos:</label>';
				echo '<input type="text" id="intent" name="intentos" value="0"></input><br>';
				echo '<input type="submit" id ="envio_datos" name="datos" value="Envia"></input>';
				echo '</form>';
			?>	
		</div>
	</body>
</html>
<?php
							// Abre el fichero  lectura y escritura 			
	$nombre_archivo = "ranking.txt"; 			
	
	$datos=$_POST["datos"];

	if ($datos == "Envia"){				
		$nombre = $_POST["nombre"];
		$intentos = $_POST["intentos"];									

		if(file_exists($nombre_archivo)){
			$archivo = fopen($nombre_archivo, "a");	
			//fwrite($archivo, PHP_EOL);
			fwrite($archivo, $nombre. PHP_EOL);					
			fwrite($archivo, $intentos. PHP_EOL);								
		}
		else
			echo "Ha habido un problema al escribir en el archivo";

	}
	fclose($archivo);					
							 
?>			