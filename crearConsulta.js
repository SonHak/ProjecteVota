var cantidadRespuestas = 1;

function crearConsulta(){
	
	var label = document.getElementsByTagName("label");
	var pregunta = document.getElementsByTagName("textarea");
	var respuesta = document.getElementsByTagName("input");
	
	for(var i=0;i<label.length;i++){
		mostrar(label[i]);
	}
	
	for(var i=0;i<pregunta.length;i++){
		mostrar(pregunta[i]);
		pregunta[i].setAttribute("onBlur","mensajeError(event)");
		pregunta[i].setAttribute("onFocus","quitarFondoRojo(event)");
	}
	
	for(var i=0;i<respuesta.length;i++){
		mostrar(respuesta[i]);
	}
	
	crearLabel();
	crearInput();
	
	crearLabel();
	crearInput();
	document.getElementById('crearConsulta').disabled = true;
}

function mostrar(elemento){
	elemento.style.display = "block";
}

function crearRespuesta(){

	crearLabel();
	crearInput();

}
function crearLabel(){
	
	var padre = document.getElementById("respuestas");
	
	var labelNuevo = document.createElement("LABEL");
	labelNuevo.setAttribute("id",cantidadRespuestas);
	var textoNuevo = document.createTextNode("Respuesta " + cantidadRespuestas + ":");
	labelNuevo.appendChild(textoNuevo);
	
	cantidadRespuestas++;
	añadirElemento(labelNuevo,padre);
	
}

function crearInput(){
	var padre = document.getElementById("respuestas");
	var inputNuevo = document.createElement("INPUT");
	inputNuevo.setAttribute("onBlur","mensajeError(event)");
	inputNuevo.setAttribute("onFocus","quitarFondoRojo(event)");
	
	var saltoLinea = document.createElement("BR");
	añadirElemento(inputNuevo,padre);
	padre.appendChild(saltoLinea,padre);
}

function añadirElemento(elemento,padre){	
	padre.appendChild(elemento,padre);
}

function quitarFondoRojo(event){
	var elemento = event.currentTarget;
	elemento.style.boxShadow = "none";
}
function mensajeError(event){
	var elemento = event.currentTarget;
	elemento.style.boxShadow = "0 0 5px red";
}
