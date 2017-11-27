<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		include("/var/www/html/ProjecteVota/config.php");

//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];
		
		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");

		echo("<a href='crearConsulta.php'><button type='button'>Crear Consulta</button></a>");


		$query = $pdo->prepare("SELECT * FROM Pregunta");
		$query->execute();

		$pregunta = $query->fetch();
		echo ("<table id='preguntas'>");
			echo ("<tr>");
            	echo ("<th>PREGUNTA</th>");
            	echo ("<th>FECHA INICIO</th>");
            	echo ("<th>FECHA FINAL</th>");
            	echo ("<th>VOTA</th>");
            echo ("</tr>");

		while($pregunta){

				echo ("<form action='vota.php' method='post' >");
				echo ("<tr >");
					echo ("<td><input type='text' value='".$pregunta['Pregunta']."' readonly></td>");
			    	echo ("<td><input type='text' value='".$pregunta['DataInici']."' readonly></td>");
			    	echo ("<td><input type='text' value='".$pregunta['DataFinal']."' readonly></td>");

			        echo ("<td><input value='VOTA' type='submit' id='VOTA' /></td>");

			        echo ("<td><input type='text' value='".$pregunta['ID']."' readonly hidden></td>");
			    	echo ("<td><input type='text' value='".$pregunta['ID_Usuario']."' readonly hidden></td>");

			    echo ("</tr>");
			    echo ("</form>");

            $pregunta = $query->fetch();
           }			
       echo ("</table>"); 

	?>
</body>
</html>