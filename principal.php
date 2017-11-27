<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		session_start();
		$nombre = $_SESSION["user"];
		

		echo ("Hola ".$nombre.", su contraseña es: ".$password);

	?>
</body>
</html>