<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		session_start();
		$nombre = $_SESSION["user"];
		
		echo("hola, ".$nombre."<br>");

		echo("<a href='logout.php'><button type='button'>Logout</button></a>");

	?>
</body>
</html>