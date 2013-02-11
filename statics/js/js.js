function quitaClaseEscondida(valor){
	
	$('#'+valor).removeClass("escondida");
}
function agregaClaseEscondida(valor){
	$('#'+valor).addClass("escondida");
}
function agregarCampos(){
	var tabla = document.getElementById("cuerpoTabla").getElementsByTagName("TBODY")[0];
	var tr = document.createElement("TR"); //crear la nueva fila
	var td1 = document.createElement("TD");
	var td2 = document.createElement("TD");
	var td3 = document.createElement("TD");
	var input1 = document.createElement('input');
	input1.type = "text";
	input1.setAttribute("id","input"+parseInt(Math.random()*100));
	var input2 = document.createElement('input');
	input2.type = "text";
	input2.setAttribute("id","input"+parseInt(Math.random()*100));
	var input3 = document.createElement('input');
	input3.type = "text";
	input3.setAttribute("id","input"+parseInt(Math.random()*100));
	td1.appendChild(input1);
	td2.appendChild(input2);
	td3.appendChild(input3);
	tr.appendChild(td1);
	tr.appendChild(td2);
	tr.appendChild(td3);
	tabla.appendChild(tr); //agregar la fila a la tabla
	
}
function habilitar (id){
	var read = document.getElementById(id).removeAttribute("disabled",0);
}


