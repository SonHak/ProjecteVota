<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>Vota</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header><img src="imagenes/VotaBanner.png"></header>
	<?php
	
		include("/var/www/html/ProjecteVota/config.php");

//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];
		
		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");

		$pregunta = $_POST["pregunta"];
		$dInicio = $_POST["dInicio"];
		$dFinal = $_POST["dFinal"];
		$id = $_POST["id"];
		$userId = $_POST["uId"];

		$query = $pdo->prepare("SELECT Respuesta FROM Respuestas WHERE ID =".$id);
		$query->execute();

		$respuesta = $query->fetch();
		echo "Esta es la respuesta ".$query->rowCount();
		echo("<h3>".$pregunta."</h3>");

		echo("<div id='fechas'>
				<h5>".$dInicio."</h5>");
		echo("	<h5>".$dFinal."</h5>
			</div>");

		echo ("<form action='votar.php' method='post' >");
		// while($respuesta){
			
		// 	$respuesta = $query->fetch();
		// }
		echo (" <input type='radio' name='res' value=''> ");
		echo ("<td><input value='VOTA' type='submit' id='VOTA' /></td>");
		echo ("</form>");
	?>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>