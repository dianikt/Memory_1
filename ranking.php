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
					$nombreNuevo = $_POST["nombre"];
					$intentos = $_POST["intentos"];									

					if(file_exists($nombre_archivo)){
						$archivo = fopen($nombre_archivo, "a");	
						
						fwrite($archivo, $nombreNuevo. PHP_EOL);// escribimos el nombre 			
						fwrite($archivo, $intentos);	// y los intentos en el archivo.txt
						fwrite($archivo, PHP_EOL);								
					}
					else
						echo "Ha habido un problema al escribir en el archivo";
				}
			}					
			// si el fichero existe recorre las lineas y los guarda un array 
	  		if(file_exists($nombre_archivo)){
				$archivo = fopen($nombre_archivo, "r");

				$a = array();
				
				while (!feof($archivo)) {
				  
				    $nombre = fgets($archivo);
				    $punts = fgets($archivo);
			      
			    	$tmp = array();			    	
			    	$tmp[]=$punts; 
			    	$tmp[]=$nombre;
			    	$a[]=$tmp; 			    	
				}						  

				sort($a);  //ordenamos por posicion de menor a mayor 
				 
				echo "<table id='tabla_ranking'>"; // printamos la tabla 
				echo "<tr >";
				echo "<td>Posicion</td>";
				echo "<td>Puntuacion</td>";
				echo "<td> Jugador </td>";				
				echo "</tr>";
				echo "<tr>";
				
				$num = 1;				
				for ($i=1; $i<sizeof($a); $i++) {					
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




