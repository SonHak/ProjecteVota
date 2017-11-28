<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>login</title>
	<link rel="stylesheet" href="style.css">
	<script src="votaciones.js"></script> 
</head>
<body>
	<header><img src="imagenes/VotaBanner.png"></header>
	<div id="loginForm">
	<?php
		
		session_start();                                                

		include("/var/www/html/ProjecteVota/config.php");

		//FORMULARIO SI EL POST ESTA VACIO
	if(!isset($_POST["email"])){	

	 echo('<form action="inicioLogin.php" method="post" >
			<p>EMAIL: <input type="text" name="email" required="true"></p>
	    	<p>Password: <input type="password" name="password" required="true"></p>

	        <input value="Login" type="submit" id="login" />
	     </form>');

	 	//SI EL FORMULARIO ESTA RELLENO HACE UNA QUERY PARA RECOGER EL ID COMPROBANDO EL EMAIL
	}else{
		$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$_POST["email"]."'");
		$query->execute();
		$id = $query->fetch();

			//SI LA QUERY ANTERIOR NO FALLA CREA OTRA QUERY QUE RECOGE EL PASSWORD COMBROBANDO EL ID
		if($id){
			$query = $pdo->prepare("SELECT Password FROM Usuarios WHERE ID = ".$id[0]);
			$query->execute();

			$psswrd = $query->fetch();

			//COMPRUEBA EL PASSWORD INTRODUCIDO CONTRA EL PASSWORD DE LA QUERY
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
			
			//SI FALLA EL PASSWORD RECARGA EL FORMULARIO
			}else{

				 echo(' <p style="color:red; font-size:20px">Password erroneo!</p>
				 	<br>
				 	<form action="inicioLogin.php" method="post" >
					<p>EMAIL: <input type="text" name="email" required="true"></p>
			    	<p>Password: <input type="password" name="password" required="true"></p>

			        <input value="Login" type="submit" id="login" />
			     </form>');

			}

			//SI FALLA EL EMAIL RECARGA EL FORMULARIO
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
     <footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>
