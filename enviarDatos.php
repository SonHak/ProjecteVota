<?php
	include("/var/www/html/ProjecteVota/config.php");

	//INCLUIR EN TODOS LOS DOCUMENTOS
	session_start();
	$nombre = $_SESSION["user"];
		
	echo("<div id='login'>
			hola, ".$nombre."<br>");
	echo("<a href='logout.php'><button type='button'>Logout</button></a>
		</div>");
		
	$nombre = $_SESSION["user"];
	$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$nombre."'");
	$query->execute();
	$id = $query->fetch();

	$dInicio = $_POST['fechaInicio'];
	$dFinal = $_POST['fechaFinal'];
	$pregunta = $_POST['pregunta'];
	
	echo $pregunta;
	echo $id[0];
	echo $dInicio;
	echo $dFinal;
	
	
	$query = $pdo->prepare("INSERT INTO Pregunta(Pregunta,ID_Usuario,DataInici,DataFinal) 
							VALUES (?, ?, ?, ?)");
	$query->execute(array($pregunta,$id[0],$dInicio,$dFinal));
?>
