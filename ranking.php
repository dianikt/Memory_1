<!DOCTYPE html>
<<head>
		<meta charset="utf-8">
		<title>Juguemos al Memory</title>	
		<script type="text/javascript" src=javascript.js></script>	
	</head>
	<link rel="stylesheet" type="text/css" href="style.css"></link>	
	<body >	
	<br><br>	
	<div id = "ranking" > 
	<h2>Ranking de Memory</h2>
		<?php			
				
					// Abre el fichero solo lectura y printa la tabla 
			$nombre_archivo = "ranking.txt"; 
			$var=$_POST["boton"];

			if ($var == "Ranking"){			   
		  		if(file_exists($nombre_archivo)){
					$archivo = fopen($nombre_archivo, "r");

					$linea = 0;
					$num_lineas = 0;
					$a = array(array());
					while (!feof($archivo)) {
					    //si extraigo una línea del archivo y no es false
					    if ($linea = fgets($archivo)){
					       //acumulo una en la variable número de líneas
					    	echo $linea;
					        $num_lineas++;	
					    }

					}
					while (!feof($archivo)) {					   
					    if ($linea = fgets($archivo)){					      
					    	echo $linea;

					        for ($i=0; $i<=$num_lineas; $i++){
								for ($j=1; $j<2; $j++){							
									$a[$i][$j]= $linea;		
									$a[$i][$j+1]= $linea;				
								}
								echo "<br \>";
							}
					    }
					}
					print_r($a);					
					
				}else
					echo "Ha habido un problema al abrir el archivo";
			}
			fclose($archivo);					
							 
		?>
	</div>
</body>
</html>




