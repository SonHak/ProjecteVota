function efecto(){
	var respuestas =  document.getElementsByClassName('resp');

	for (var i = 0; i < respuestas.length; i++) {
				var tiempo = setTimeout(function(){
					document.getElementById("vota"+i).setAttribute('class','respuestas2');
					console.log("vota "+i);

				}, 2000);
	}
}