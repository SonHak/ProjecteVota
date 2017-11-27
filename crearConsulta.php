<html>
	<script src="crearConsulta.js" language="javascript" type="text/javascript"> </script>
	<style>
		.consulta{display:none;}
	</style>
	<body onload="crearConsulta()" id="botones">
		
		<?php
			echo "<label for='consulta' class='consulta'>Crea la teva consulta:</label></br> \n";
			echo "<textarea cols='40' rows='10' class='consulta'/> </textarea> \n";
			echo "<form method='GET' action='principal.php'></form>";
		?>

	</body>
</html>
