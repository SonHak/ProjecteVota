<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>Principal</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header><img src="imagenes/VotaBanner.png"></header>
	
	<a href='principal.php'><img id='home' src='imagenes/home.png'></a>

	<?php


	include("/var/www/html/ProjecteVota/config.php");



//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];

		$idQuery = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$nombre."'");
		$idQuery->execute();
		$id = $idQuery->fetch();

		
		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");

		echo("<a href='crearConsulta.php'><button type='button'>Crear Consulta</button></a>");


		//$query = $pdo->prepare("SELECT * FROM Pregunta");
		$queryRealizadas = $pdo->prepare("SELECT * FROM relacionusuariovota join Pregunta on (Pregunta.ID = relacionusuariovota.ID_Pregunta) WHERE relacionusuariovota.ID_Usuario =".$id['ID']);
		$queryRealizadas->execute();

		$preguntasRealizadas = $queryRealizadas->fetch();


		$queryPendientes = $pdo->prepare("SELECT Pregunta, DataInici, DataFinal, ID, ID_Usuario FROM relacionusuariovota join Pregunta on (Pregunta.ID = relacionusuariovota.ID_Pregunta) WHERE NOT relacionusuariovota.ID_Usuario =".$id['ID']);
		$queryPendientes->execute();

		$preguntasPendientes = $queryPendientes->fetch();




//PREGUNTAS PENDIENTES
		echo ("<h3>preguntas Pendientes</h3>");
		echo ("<table id='preguntasPendientes' class='pregu'>");
			echo ("<tr>");
            	echo ("<th>PREGUNTA</th>");
            	echo ("<th>FECHA INICIO</th>");
            	echo ("<th>FECHA FINAL</th>");
            	echo ("<th>VOTA</th>");
            echo ("</tr>");

		while($preguntasPendientes){

				echo ("<form action='votar.php' method='post'>");
				echo ("<tr >");
					echo ("<td><input type='text' name='pregunta' value='".$preguntasRealizadas['Pregunta']."' readonly></td>");
			    	echo ("<td><input type='text' name='dInicio' value='".$preguntasRealizadas['DataInici']."' readonly></td>");
			    	echo ("<td><input type='text' name='dFinal' value='".$preguntasRealizadas['DataFinal']."' readonly></td>");

			        echo ("<td><input value='VOTA' type='submit' id='VOTA' /></td>");

			        echo ("<td><input type='text' name='id' value='".$preguntasRealizadas['ID']."' readonly hidden></td>");
			    	echo ("<td><input type='text' name='uId' value='".$preguntasRealizadas['ID_Usuario']."' readonly hidden></td>");

			    echo ("</tr>");
			    echo ("</form>");

            $preguntasPendientes = $queryPendientes->fetch();
           }			
       echo ("</table>"); 



//PREGUNTAS REALIZADAS
		echo ("<h3>preguntasRealizadas</h3>");
		echo ("<table id='preguntasRealizadas'>");
			echo ("<tr>");
            	echo ("<th>PREGUNTA</th>");
            	echo ("<th>FECHA INICIO</th>");
            	echo ("<th>FECHA FINAL</th>");
            	echo ("<th>VOTA</th>");
            echo ("</tr>");

		while($preguntasRealizadas){

				echo ("<form action='votar.php' method='post'>");
				echo ("<tr >");
					echo ("<td><input type='text' name='pregunta' value='".$preguntasPendientes['Pregunta']."' readonly></td>");
			    	echo ("<td><input type='text' name='dInicio' value='".$preguntasPendientes['DataInici']."' readonly></td>");
			    	echo ("<td><input type='text' name='dFinal' value='".$preguntasPendientes['DataFinal']."' readonly></td>");

			        echo ("<td><input value='VOTA' type='submit' id='VOTA' /></td>");

			        echo ("<td><input type='text' name='id' value='".$preguntasPendientes['ID']."' readonly hidden></td>");
			    	echo ("<td><input type='text' name='uId' value='".$preguntasPendientes['ID_Usuario']."' readonly hidden></td>");

			    echo ("</tr>");
			    echo ("</form>");

            $preguntasRealizadas = $queryRealizadas->fetch();
           }			
       echo ("</table>"); 

	?>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>
