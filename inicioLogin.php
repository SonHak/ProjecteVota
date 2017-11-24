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

	if($_POST["email"] == null){	

	 echo('<form action="inicioLogin.php" method="post" >
			<p>EMAIL: <input type="text" name="email" required="true"></p>
	    	<p>Password: <input type="password" name="password" required="true"></p>

	        <input value="Login" type="submit" id="login" />
	     </form>');

	}else{
		$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$_POST["email"]."'");
		$query->execute();
		if($query){
			$id = $query->fetch();
			$query2 = $pdo->prepare("SELECT ID FROM Usuarios WHERE ID = '".$id."' AND Password = '".$password = $_POST["password"]."'");
			$query2->execute();
			if($query2){
				header('Location: principla.php');
			}
		}
		
	}


	?>
     </div>
</body>
</html>
