<?php
	session_start();
	$nombre = $_SESSION["user"];
	$query = $pdo -> prepare ("SELECT ID FROM Usuarios WHERE Nombre = " . $nombre );
	$query->execute();
	
	$linea = $query->fetch();
	
	$id = $linea[0];
	
	$dInicio = $_POST['fechaInicio'];
	$dFinal = $_POST['fechaFinal'];
	$pregunta = $_POST['pregunta'];
	
	$query = $pdo->prepare("INSERT INTO Pregunta(Pregunta,ID_Usuario,DataInici,DataFinal) 
							VALUES (:pregunta,:id,:dInicio,:dFinal)");
	$query->execute(array(
		"pregunta" => $pregunta,
		"id" => $id,
		"dInicio" => $dInicio,
		"dFinal" =>$dFinal
	))
?>
