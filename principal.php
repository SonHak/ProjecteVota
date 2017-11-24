<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$nombre = $_SESSION["user"];
		

		echo ("Hola ".$nombre.", su contraseña es: ".$password);

	?>
</body>
</html>