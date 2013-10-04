$(document).ready(function(){
	cargar_paises();
	
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function cargar_paises()
{
	
	$.get(base+"pruebasJulio_c/paises", function(resultado){
		
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var id =1;
	var code = $("#pais").val();
	alert(code);
	$.get(base+"pruebasJulio_c/pru/", { code : code }, function(resultado){
		document.location.href=base+"pruebasJulio_c/pru/;
	}
		

	);
	
}

function dependencia_ciudad()
{
	var code = $("#estado").val();
	$.get("scripts/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}