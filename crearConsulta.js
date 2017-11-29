//Variable global que cuenta cuantas respuestas (inputs) hay
var cantidadRespuestas = 1;

function crearConsulta(){
	
	//recogemos los labels, el textarea y los inputs y los guardamos en variables
	var label = document.getElementsByTagName("label");
	var pregunta = document.getElementsByTagName("textarea");
	var respuesta = document.getElementsByTagName("input");
	
	//hacemos que sean visibles los labels
	for(var i=0;i<label.length;i++){
		mostrar(label[i]);
	}
	
	//hacemos que sean visibles las preguntas
	for(var i=0;i<pregunta.length;i++){
		mostrar(pregunta[i]);
	}

	//hacemos que sean visibles las respuestas
	for(var i=0;i<respuesta.length;i++){
		mostrar(respuesta[i]);
	}
	
	//añadimos dos respuestas como mínimo obligatoriamente
	añadirElemento(crearLabel(),crearInput());
	añadirElemento(crearLabel(),crearInput());
	
	//creamos los siguientes botones
	crearBotonRespuestas();
	crearBotonEliminar();
	crearBotonEnviar()
	
	//creamos los inputs y labels para las fechas
	crearFechaFinal();
	crearFechaInicio();
	
}

//la siguiente funcion crea el boton Crear Respuestas
function crearBotonRespuestas(){
	//creamos el elemento y lo guardamos en una variable
	var boton = document.createElement("BUTTON");
	//creamos texto para ese boton
	var texto = document.createTextNode("Crear Respuestas");
	//añadimos el texto anterior al boton
	boton.appendChild(texto);
	//le añadimos al boton el atributo onClick
	boton.setAttribute("onclick","crearRespuesta()");
	//añadimos el boton a su html para que sea visible
	var padre = document.getElementById("botones");
	padre.insertBefore(boton,padre.firstChild);
}

//la siguiente funcion crea el boton Eliminar Respuestas
function crearBotonEliminar(){
	//creamos el elemento y lo guardamos en una variable
	var boton = document.createElement("BUTTON");
	//creamos texto para ese boton
	var texto = document.createTextNode("Eliminar respuestas");
	//añadimos el texto anterior al boton
	boton.appendChild(texto);
	//le añadimos al boton el atributo onClick
	boton.setAttribute("onclick","eliminarRespuestas()");
	//añadimos el boton a su html para que sea visible
	var padre = document.getElementById("botones");
	padre.insertBefore(boton,padre.firstChild);
}

//la siguiente funcion crea el boton Enviar Datos
function crearBotonEnviar(){
	//creamos el elemento y lo guardamos en una variable
	var boton = document.createElement("INPUT");
	
	//le añadimos al botón varios atributos
	boton.setAttribute("type","submit");
	boton.setAttribute("value","Enviar Datos");
	boton.setAttribute("onclick","enviarDatos()");
	
	//recogemos el padre de ese elemento
	var form = document.getElementsByTagName("FORM")[0];
	//y lo insertamos al pricipio dentro del padre
	form.insertBefore(boton,form.firstChild);

}

//la siguiente funcion cambia el estilo del elemento para que sea visible
function mostrar(elemento){
	elemento.style.display = "block";
}

//esta funcion crea nueva respuestas
function crearRespuesta(){
	
	//llamamos a la funcion añadir elemento pasandole como parametro las funciones crearLabel y crearInput
	añadirElemento(crearLabel(),crearInput());

}

//la siguiente funcion crea un label nuevo
function crearLabel(){
		
	//creamos el elemento y lo guardamos en una variable
	var labelNuevo = document.createElement("LABEL");

	//creamos un texto nuevo y lo guardamos en una variable
	var textoNuevo = document.createTextNode("Respuesta " + cantidadRespuestas + ":");
	//añadimos dicho texto al nuevo label
	labelNuevo.appendChild(textoNuevo);
	
	//sumamos 1 a la variable global cantidadRespuestas 
	cantidadRespuestas++;
	//devolvemos el nuevo label
	return labelNuevo;
	
}

function crearInput(){
	//creamos el elemento y lo guardamos en una variable
	var inputNuevo = document.createElement("INPUT");
	//le añadimos varios atributos al input
	inputNuevo.setAttribute("name","respuesta[]");
	inputNuevo.setAttribute("onBlur","inputVacio(event)");
	inputNuevo.setAttribute("required","true");
	//devolvemos el nuevo input
	return inputNuevo;
	
}

function añadirElemento(elemento1,elemento2){	
	//guardamos en una variable el padre donde se van a crear el nuevo Label y el nuevo Input
	var padre = document.createElement("DIV");
	//le añadimos al padre un atributo id
	padre.setAttribute("id",cantidadRespuestas-1);
	
	//añadimos los dos elementos (tanto el nuevo label como el nuevo input) al padre
	padre.appendChild(elemento1);
	padre.appendChild(elemento2);

	//por ultimo guardamos en una variable el padre general de cada div
	var form = document.getElementsByTagName("FORM")[0];
	//y se lo añadimos
	form.appendChild(padre);

}

function eliminarRespuestas(){
	
	//recorremos todos los divs que tenemos en el documento
	var arrayDivs = document.getElementsByTagName("DIV");
	
	//por cada div que encuentre ejecutara una funcion (excepto para el DIV con ID "1" y el DIV con ID "2")
	for(var i = arrayDivs.length; i > 6 ; i--){
			eliminarElemento(arrayDivs[i-1]);
	}
	//devolvemos la variable global cantidadRespuestas a 3
	cantidadRespuestas = 3;
}

function eliminarElemento(elemento){
	//recoge el padre general del elemento pasado
	var padre = document.getElementsByTagName("form")[0];
	//y eliminamos el elemento
	padre.removeChild(elemento);
	
}

function inputVacio(event){
	var elemento = event.currentTarget;
	if(elemento.value.length == 0){
		elemento.style.boxShadow = "2px 2px red";
	}else{
		elemento.style.boxShadow = "none";
	}
}
//la siguiente funcion crea los inputs y el label para la fecha de inicio
function crearFechaInicio(){
	var fechaInicio = document.createElement("LABEL");
	fechaInicio.appendChild(document.createTextNode("Fecha de Inicio"));
	
	var fechaInput = document.createElement("INPUT");
	fechaInput.setAttribute("required","true");
	fechaInput.setAttribute("type","date");
	fechaInput.setAttribute("name","fechaInicio");
	fechaInicio.appendChild(fechaInput);
	
	var divPadre = document.createElement("DIV");
	divPadre.appendChild(fechaInicio);
	
	var padre = document.getElementsByTagName("form")[0];
	padre.insertBefore(divPadre, padre.firstChild);
	
	
}

//la siguiente funcion crea los inputs y el label para la fecha de cierre
function crearFechaFinal(){
	var fechaFinal = document.createElement("LABEL");
	fechaFinal.appendChild(document.createTextNode("Fecha de Final"));
	
	var fechaInput = document.createElement("INPUT");
	fechaInput.setAttribute("required","true");
	fechaInput.setAttribute("type","date");
	fechaInput.setAttribute("name","fechaFinal");
	fechaFinal.appendChild(fechaInput);
	
	var divPadre = document.createElement("DIV");
	divPadre.appendChild(fechaFinal);
	
	var padre = document.getElementsByTagName("form")[0];
	padre.insertBefore(divPadre, padre.firstChild);
}

