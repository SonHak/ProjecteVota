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
	
		include("/var/www/html/ProjecteVota/config.php");

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
			$query = $pdo->prepare("SELECT Password FROM Usuarios WHERE ID = ".$id[0]);
			$query->execute();

			$psswrd = $query->fetch();
			if($psswrd[0] == $_POST["password"]){
				try {
					$query = $pdo->prepare("SELECT Email FROM Usuarios WHERE ID = ".$id[0]);
					$query->execute();

					$intermedia = $query->fetch();

					$_SESSION["user"] = $intermedia[0];
					
					header('Location: principal.php');
				} catch (PDOException $e) {
   					echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    				exit;
  				}
				// check
			
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
