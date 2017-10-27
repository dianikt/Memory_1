<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Memory</title>	
		<script type="text/javascript" scr=javascript.js></script>
		<link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Extended+Text" rel="stylesheet"> 
	</head>
	<link rel="stylesheet" type="text/css" href="style.css"></link>	

	<body>
		<div> <h3> Memory </h3> </div>
		<div id="iniciar">		
			<div id="nivel">		
				<form method="POST" action="table_joc.php" id="carform">
					<select name="valor" id="level">
						  <option >Elige el nivel</option>
						  <option  value="2">2x2</option>
						  <option  value="4">4x4</option>
						  <option  value="6">6x6</option>					 
					</select>
				    <input type="submit" id ="boton_inicio" value="Inicia el juego"></input>												
				</form>	
				<div><br>
				<form method="POST" action="ranking.php">
					<input type="submit" id="ranking_boton" name="boton" value="Ranking"></input>
				</form>					
				</div>
			</div>
		</div>		
	</body>
</html>


























