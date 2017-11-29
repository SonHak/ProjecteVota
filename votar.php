<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>Vota</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header><img src="imagenes/VotaBanner.png"></header>
	<?php
	

	include("/var/www/html/ProjecteVota/config.php");


//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];
		
		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");


		if(!isset($_POST["res"])){

			$pregunta = $_POST["pregunta"];
			$dInicio = $_POST["dInicio"];
			$dFinal = $_POST["dFinal"];
			$idPregunta = $_POST["id"];
			$userId = $_POST["uId"];

			$query = $pdo->prepare("SELECT Respuesta FROM Respuestas WHERE ID_Pregunta =".$idPregunta);
			$query->execute();

			$respuesta = $query->fetch();
			
			echo("<h3>".$pregunta."</h3>");

			echo("<div class='fechas'>
					<h5>".$dInicio."</h5>");
			echo("	<h5>".$dFinal."</h5>
				</div>");

			echo ("<form action='votar.php' method='post' >");
			echo ("<select name='radioRes'>");
			while($respuesta){
				$respuesta2 = $respuesta['Respuesta'];
				
				echo ("<option value='".$respuesta2."'\>");
				echo($respuesta2);
				$respuesta = $query->fetch();
			}

			echo ("<input value='VOTA' type='submit' name=res id='VOTA' />");
			echo ("</select>");

			echo("<input type='text' name='idPregunta' value='".$idPregunta."' readonly hidden>");
			echo ("</form>");
		}else{
			$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$nombre."'");
			$query->execute();
			$id = $query->fetch();

			$query = $pdo->prepare("SELECT * FROM relacionusuariovota WHERE ID_Usuario = '".$id[0]."'");
			$query->execute();
			$contestada = $query->fetch();

			if ($contestada) {
				$query = $pdo->prepare("DELETE FROM relacionusuariovota WHERE ID_Usuario = '".$id[0]."'");
				$query->execute();


				$query = $pdo->prepare("INSERT INTO relacionusuariovota(ID_Usuario,Votacion,ID_Pregunta) 
										VALUES (?, ?, ?)");
				$selected_val = $_POST['radioRes'];
				$query->execute(array($id[0], $selected_val, $_POST['idPregunta']));
				echo ("Respuesta modificada con exito!");

				
			}else{
				$query = $pdo->prepare("INSERT INTO relacionusuariovota(ID_Usuario,Votacion,ID_Pregunta) 
										VALUES (?, ?, ?)");
				$selected_val = $_POST['radioRes'];
				$query->execute(array($id[0], $selected_val, $_POST['idPregunta']));
				echo ("Respuesta guardada con exito!");
			}

			
		}
	?>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>