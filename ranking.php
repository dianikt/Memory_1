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
	<h2>Ranking Global</h2>
		<?php				
							// Abre el fichero  lectura y escritura 			
			$nombre_archivo = "ranking.txt"; 			
			
			if(isset($_POST["datos"])){			
				
				$datos=$_POST["datos"];

				if ($datos == "Envia"){				
					$nombre = $_POST["nombre"];
					$intentos = $_POST["intentos"];									

					if(file_exists($nombre_archivo)){
						$archivo = fopen($nombre_archivo, "a");	
						
						fwrite($archivo, $nombre. PHP_EOL);					
						fwrite($archivo, $intentos. PHP_EOL);							
					}
					else
						echo "Ha habido un problema al escribir en el archivo";
				}
			}					

	  		if(file_exists($nombre_archivo)){
				$archivo = fopen($nombre_archivo, "r");

				$a = array();
				while (!feof($archivo)) {
				    //si extraigo una línea del archivo y no es false
				    $nombre = fgets($archivo);
				    $punts = fgets($archivo);
			       //acumulo una en la variable número de líneas
			    	$tmp = array();			    	
			    	$tmp[]=$punts; 
			    	$tmp[]=$nombre; 
			    	$a[]=$tmp;
				}	
				sort($a);

				echo "<table id='tabla_ranking'>";
				echo "<tr >";
				echo "<td>Posicion</td>";
				echo "<td>Jugador</td>";
				echo "<td>Puntuacion</td>";
				echo "</tr>";
				echo "<tr>";
				
				$num = 1;				
				for ($i=0; $i<sizeof($a); $i++) {					
					echo "<td>".$num."</td>";					
					echo "<td>".$a[$i][0]."</td>";
					echo "<td>".$a[$i][1] ."</td>";
					echo "</tr>";
					$num++;
				}				
				echo "</table>";


				
			}else
				echo "Ha habido un problema al abrir el archivo";
	
			fclose($archivo);					
							 
		?>
	</div>
</body>
</html>




