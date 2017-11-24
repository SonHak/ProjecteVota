<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="style.css">
	<script src="votaciones.js"></script> 
</head>
<body>
	<div id="loginForm">
	<?php
		$hostname = "localhost";
		$dbname = "projecteVota";
		$username = "root";
		$pass = "Kemaku12";

		$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname", "$username", "$pass");
		

	 echo('<form action="principal.php" method="post" >
			<p>Nickname: <input type="text" name="nick" required="true"></p>
	    	<p>Password: <input type="password" name="password" required="true"></p>

	        <input value="Login" type="submit" id="login" />
	     </form>');


	?>
     </div>
</body>
</html>