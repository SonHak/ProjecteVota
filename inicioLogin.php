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
		session_start();
		

		$hostname = "localhost";
		$dbname = "projecteVota";
		$username = "root";
		$pass = "AWS2-31";

		$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname", "$username", "$pass");

	if(!isset($_POST["email"])){	

	 echo('<form action="inicioLogin.php" method="post" >
			<p>EMAIL: <input type="text" name="email" required="true"></p>
	    	<p>Password: <input type="password" name="password" required="true"></p>

	        <input value="Login" type="submit" id="login" />
	     </form>');

	}else{
		$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$_POST["email"]."'");
		$query->execute();
		$id = $query->fetch();

		if($id){
			$query2 = $pdo->prepare("SELECT Password FROM Usuarios WHERE ID = ".$id[0]);
			$query2->execute();

			$psswrd = $query2->fetch();
			if($psswrd[0] == $_POST["password"]){

				$query3 = $pdo->prepare("SELECT Email FROM Usuarios WHERE Email = '".$_POST["email"]."'");
				$query->execute();

				$_SESSION["user"]= $query3->fetch();;

				header('Location: principal.php');
			}else{

				 echo(' <p style="color:red; font-size:20px">Password erroneo!</p>
				 	<br>
				 	<form action="inicioLogin.php" method="post" >
					<p>EMAIL: <input type="text" name="email" required="true"></p>
			    	<p>Password: <input type="password" name="password" required="true"></p>

			        <input value="Login" type="submit" id="login" />
			     </form>');

			}
		} else {
			echo(' <p style="color:red; font-size:20px">Email no encontrado!</p>
				<br>
				<form action="inicioLogin.php" method="post" >
					<p>EMAIL: <input type="text" name="email" required="true"></p>
			    	<p>Password: <input type="password" name="password" required="true"></p>

			        <input value="Login" type="submit" id="login" />
			     </form>');
		}
		
	}


	?>
     </div>
</body>
</html>
