
//ANIMACION DE LAS VOTACIONES
function efecto(){
	var respuestas = document.getElementsByClassName("formu");
	 for (var i = 0; i < respuestas.length ; i++) {
	 	var respuesta = document.getElementById("vota"+i);
	 	
	 	animacion(respuesta);
	 }
}

function animacion(elemento) { 
  var pos = -700;
  var id = setInterval(frame, 15);
  function frame() {
    if (pos == 250) {
      clearInterval(id);
    } else {
      pos=pos+5;  
      console.log(elemento); 
      elemento.style.left = pos + 'px'; 
    }
  }
}


//PROMPT DE LA PASWORD
function setPass(id){
    
    var contrasenya = prompt("Porfavor introduzca su contraseña:");

    if (contrasenya == undefined || contrasenya == "" || contrasenya == null) {
      
      document.getElementById("cancell").innerHTML = "Se ha cancelado la votación";

    } else {
        document.getElementById("contra"+id).value = contrasenya;
        document.getElementById("setContra"+id).setAttribute("type","submit");
        document.getElementById("formu"+id).submit();
    }
    
}