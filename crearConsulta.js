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
	
	//hacemos que el botón crear consulta quede deshabilitado
	document.getElementById('crearConsulta').disabled = true;
	
	//creamos los siguientes botones
	crearBotonRespuestas();
	crearBotonEliminar();
	crearBotonEnviar()
	
	//creamos los inputs y labels para las fechas
	crearFechaInicio();
	crearFechaFinal();
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
	document.getElementById("botones").appendChild(boton);
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
	document.getElementById("botones").appendChild(boton);
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
	inputNuevo.setAttribute("class","respuesta");
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
	for(var i = arrayDivs.length; i > 3 ; i--){
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

//la siguiente funcion crea los inputs y el label para la fecha de inicio
function crearFechaInicio(){
	
	//recogemos los padres para los inputs
	var padre1 = document.getElementsByTagName("FORM")[0];
	var padre2 = document.getElementsByTagName("input")[0];
	
	//creamos un label
	var label = document.createElement("LABEL");
	//le añadimos texto a ese label
	label.appendChild(document.createTextNode("Fecha de Inicio: "));
	
	
	//creamos los distintos inputs
	var dia = crearInput();
	var mes = crearInput();
	var ano = crearInput();
	
	//le añadimos un texto para especificar cual es cual
	dia.setAttribute("placeholder","dia");
	mes.setAttribute("placeholder","mes");
	ano.setAttribute("placeholder","año");
	
	
	//creamos un salto de linea
	var saltoLinea = document.createElement("BR");
	
	//y insertamos el label y los inputs al padre
	padre1.insertBefore(label,padre2);
	padre1.insertBefore(dia,padre2);
	padre1.insertBefore(mes,padre2);
	padre1.insertBefore(ano,padre2);
	//tambien le añadimos el salto de linea
	padre1.insertBefore(saltoLinea,padre2);
}

//la siguiente funcion crea los inputs y el label para la fecha de cierre
function crearFechaFinal(){
	//recogemos los padres para los inputs
	var padre1 = document.getElementsByTagName("FORM")[0];
	var padre2 = document.getElementsByTagName("input")[3];
	//creamos un label
	var label = document.createElement("LABEL");
	//le añadimos texto a ese label
	label.appendChild(document.createTextNode("Fecha de Cierre: "));
	
	//creamos los distintos inputs
	var dia = crearInput();
	var mes = crearInput();
	var ano = crearInput();
	
	//le añadimos un texto para especificar cual es cual
	dia.setAttribute("placeholder","dia");
	mes.setAttribute("placeholder","mes");
	ano.setAttribute("placeholder","año");
	
	//creamos un salto de linea
	var saltoLinea = document.createElement("BR");
	
	//y insertamos el label y los inputs al padre
	padre1.insertBefore(label,padre2);
	padre1.insertBefore(dia,padre2);
	padre1.insertBefore(mes,padre2);
	padre1.insertBefore(ano,padre2);
	//tambien le añadimos el salto de linea
	padre1.insertBefore(saltoLinea,padre2);
}
