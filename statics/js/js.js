/* Esta función agrega la clase "escondida"
  @param:
  		$valor type[string] (id del <div>)
 * */
function quitaClaseEscondida(valor){
	
	$('#'+valor).removeClass("escondida");
}

/* Esta función quita la clase "escondida"
  @param:
  		$valor type[string] (id del <div>)
 * */
function agregaClaseEscondida(valor){
	$('#'+valor).addClass("escondida");
}
/*Esta función agrega 3 inputs en una fila
 * @param:
 */ 
function agregarCampos(){
	var tabla = document.getElementById("cuerpoTabla").getElementsByTagName("TBODY")[0];
	var tr = document.createElement("TR"); //crear la nueva fila
	var td1 = document.createElement("TD");// crea una celda nueva
	var td2 = document.createElement("TD");
	var td3 = document.createElement("TD");
	var input1 = document.createElement('input'); // crea un elemento input
	input1.type = "text";// agrego atributo text al input
	input1.setAttribute("id","input"+parseInt(Math.random()*100)); // agrego atributo id al input
	input1.setAttribute("name","nomCurso"+parseInt(Math.random()*100));// agrego atributo name al input
	
	var input2 = document.createElement('input');
	input2.type = "text";
	input2.setAttribute("id","input"+parseInt(Math.random()*100));
	input2.setAttribute("name","institucion"+parseInt(Math.random()*100));
	
	var input3 = document.createElement('input');
	input3.type = "text";
	input3.setAttribute("id","input"+parseInt(Math.random()*100));
	input3.setAttribute("name","duracionCurso"+parseInt(Math.random()*100));
	
	// agrego los imput's las celdas
	td1.appendChild(input1);
	td2.appendChild(input2);
	td3.appendChild(input3);
	
	// agrego las celdas a la fila
	tr.appendChild(td1); 
	tr.appendChild(td2);
	tr.appendChild(td3);
	
	tabla.appendChild(tr); //agregar la fila a la tabla
	
}

/* Esta función quita el atributo a input para habilitar su escritura
 * @param:
 * 			$id type[String] (id del input)
 * */
function habilitar (id){
	var read = document.getElementById(id).removeAttribute("disabled",0);
}

$(function() {
	$( "#fechNac" ).datepicker({ dateFormat: "yy-mm-dd",
	changeYear: true });
});

/* Esta función carga la página previa en el historial*/
function veAtras(){
  window.history.back()
}

function cargarVista(url){
	var uri=url+'preregistro_c/guardaDatos/'
	document.location.href=uri;
}