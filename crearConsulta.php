<html>
	<script src="crearConsulta.js" language="javascript" type="text/javascript"> </script>
	<style>
		.consulta{display:none;}
	</style>
	<body>
		<?php 
			echo "<button type='button' onclick='crearConsulta()' id='crearConsulta'>Crear Consulta </button>"; 
			echo "<button type='button' onclick='crearRespuesta()'>Crear una Nueva Respuesta </button>"; 
			echo "<button type='button' onclick='eliminarRespuestas()'>Eliminar Respuestas</button>";
		?>
		<?php
			echo "<label for='consulta' class='consulta'>Crea la teva consulta:</label></br> \n";
			echo "<textarea cols='40' rows='10' class='consulta'/> </textarea> \n";
			echo "<div id='respuestas'>";
			echo "</div>";
		?>
	</body>
</html>
