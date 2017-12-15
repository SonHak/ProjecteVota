# ProjecteVota
(PARA VER EL CONTENIDO CORRECTAMENTE HACE FALTA HACER UN CAT DEL FICHERO README)
Para que funcione hace falta un archivo de configuracion, "config.php" con el siguente contenido:

"<?php"

	$hostname = "localhost";
	$dbname = "projecteVota";
	$username = "root";
	$pass = "";

	$pdo = new PDO ("mysql:host=$hostname; dbname=$dbname", "$username", "$pass");
"?>"

