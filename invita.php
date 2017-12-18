<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>Principal</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header><img src="imagenes/VotaBanner.png"></header>
	
	<a href='principalAdmin.php'><img id='home' src='imagenes/home.png'></a>

	<?php


	include("/var/www/html/ProjecteVota/config.php");

//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];
		
		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");


		$pregunta = $_POST["pregunta"];
		$dInicio = $_POST["dInicio"];
		$dFinal = $_POST["dFinal"];
		$idPregunta = $_POST["id"];


//SI NO SE HAN RELLENADO LOS EMAILS
		if(!isset($_POST["emails"])){

			echo("<h3>".$pregunta."</h3>");

				echo("<div >
						<h5 class='fechas'>".$dInicio."</h5>");
				echo("	<h5 class='fechas'>".$dFinal."</h5>
					</div>");

				echo "<br>";

				echo ("<form action='invita.php' method='post'>");

						echo ("<textarea type='textArea' name='emails' cols='50' rows='15'> </textArea>");
						echo "<br>";
				        echo ("<input value='INVITA' type='submit' id='invita' />");

				    echo ("</form>");

		}else{
			$arrayEmails = $_POST['emails'].split(";");
			
			foreach($arrayEmails as $email){
				$titulo    = 'Has sido invitado';
				$mensaje   = 'Ha sido usted invitado para votar a la pregunta: \n' . $pregunta;
				$cabeceras = 'From: acardenaslara@iesteveterradas.cat' . "\r\n" .
					'Reply-To: webmaster@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail ($email, $titulo, $mensaje, $cabeceras);
				echo "correo enviado";
			}
			
			
		}

	?>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>
