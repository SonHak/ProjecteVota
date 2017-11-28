<html>
	<head>
		<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
		<title>Consulta</title>
		<link rel="stylesheet" href="style.css">
		<script src="crearConsulta.js" language="javascript" type="text/javascript"> </script>
	</head>
	<body onload="crearConsulta()">
		<header><img src="imagenes/VotaBanner.png"></header>
		<div id="botones">
		<?php
		include("/var/www/html/ProjecteVota/config.php");

	//INCLUIR EN TODOS LOS DOCUMENTOS
			session_start();
			$nombre = $_SESSION["user"];
			
			echo("<div id='login'>
					hola, ".$nombre."<br>");
			echo("<a href='logout.php'><button type='button'>Logout</button></a>
				</div>");
				
			echo "<label id='primero' for='consulta' class='consulta'>Crea la teva consulta:</label></br> \n";
			echo "<textarea cols='40' rows='10' class='consulta'/> </textarea> \n";
			echo "<form method='GET' action='principal.php' id='respuestas'></form>";
		?>
		</div>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
	</body>
</html>
