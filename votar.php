<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="votar.js"></script>
	<link rel="shortcut icon" href="imagenes/VotaLogo.png" />
	<title>Vota</title>
	<link rel="stylesheet" href="style.css">
</head>
<body id='cuerpo' onload="efecto()">
	<header ><img src="imagenes/VotaBanner.png"></header>
	
		<a href='principalUser.php'><img id='home' src='imagenes/home.png'></a>


	<?php
	

	include("/var/www/html/ProjecteVota/config.php");



//INCLUIR EN TODOS LOS DOCUMENTOS
		session_start();
		$nombre = $_SESSION["user"];


		echo("<div id='login'>
				hola, ".$nombre."<br>");
		echo("<a href='logout.php'><button type='button'>Logout</button></a>
			</div>");


//RESPUSTA Y SUS DATOS
		if(!isset($_POST["res"])){
			$pregunta = $_POST["pregunta"];
			$dInicio = $_POST["dInicio"];
			$dFinal = $_POST["dFinal"];
			$idPregunta = $_POST["id"];
			$userId = $_POST["uId"];

			$query = $pdo->prepare("SELECT Respuesta, ID_Respuesta FROM Respuestas WHERE ID_Pregunta =".$idPregunta);
			$query->execute();

			$respuesta = $query->fetch();

			
			
			echo("<h3>".$pregunta."</h3>");

			echo("<div >
					<h5 class='fechas'>".$dInicio."</h5>");
			echo("	<h5 class='fechas'>".$dFinal."</h5>
				</div>");

			$cont=0;

			echo ("<div id='resp'>");
			
				while($respuesta){
					$respuesta2 = $respuesta['Respuesta'];
		
						echo ("<div class='formu' id='formu".$cont."'>");
					echo ("<form action='votar.php' method='post' >");
						

						echo ("<div class='respuestas' id ='vota".$cont."'> <input type='text' name='res' value='".$respuesta2."' readonly/>");
						echo("<input type='text' name='idPregunta' value='".$idPregunta."' readonly hidden/>");
				        echo ("<input value='VOTA' type='submit' id='VOTA' /> </div>");

						
				    echo ("</form>");
				   
				    $cont++;
					$respuesta = $query->fetch();
					echo ("</div>");
				}
			echo ("</div>");

		}else{

			$resp = $_POST["res"];
			$qstr = "SELECT ID_Respuesta FROM Respuestas WHERE ID_Pregunta =".$_POST["idPregunta"]." AND Respuesta = '".$resp."'";

			$query = $pdo->prepare( $qstr );
			$query->execute();
			
			$respuesta = $query->fetch();



			$query = $pdo->prepare("SELECT ID FROM Usuarios WHERE Email = '".$nombre."'");
			$query->execute();
			$id = $query->fetch();

			$query = $pdo->prepare("SELECT * FROM relacionusuariovota WHERE ID_Usuario = '".$id[0]."' AND ID_Pregunta =".$_POST["idPregunta"]);
			$query->execute();
			$contestada = $query->fetch();

//MODIFICA
			if ($contestada) {
				$query2 = $pdo->prepare("SELECT hash_enc FROM relacionusuariovota WHERE ID_Usuario = '".$id[0]."' AND ID_Pregunta =".$_POST["idPregunta"]);
				$query2->execute();

				$encontrarHash = $query2->fetch();



				$query = $pdo->prepare("UPDATE Votaciones SET ID_Respuesta = ".$respuesta["ID_Respuesta"]." WHERE hash = '".$encontrarHash["hash_enc"]."'");
				$query->execute();
				echo $encontrarHash["hash_enc"];
				
				echo ("Respuesta modificada con exito!");

//NUEVA RESPUSTA			
			}else{
				$query = $pdo->prepare("INSERT INTO relacionusuariovota(ID_Usuario, ID_Pregunta, hash_enc) 
										VALUES (?, ?, ?)");
				$selected_val = $_POST['res'];

				$hash = generaPass();

				$query->execute(array($id[0], $_POST['idPregunta'], $hash));

				$query2 = $pdo->prepare("INSERT INTO Votaciones(hash, ID_Respuesta) 
										VALUES (?, ?)");
				$selected_val = $_POST['res'];
				$query2->execute(array($hash, $respuesta[0]));

				echo ("Respuesta guardada con exito!");
			}

			
		}



function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=6;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

	?>
	<footer><img id="logo" src="imagenes/VotaLogo.png"></footer>
</body>
</html>