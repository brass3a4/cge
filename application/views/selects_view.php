<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function cargar_paises()
{
	$.get("scripts/cargar-paises.php", function(resultado){
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
	var code = $("#pais").val();
	$.get("scripts/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}
newEmptyPHP
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
</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>
<title>Combobox dependientes de Pa&iacute;s, Estado y Ciudad con PHP, MySQL, jQuery y un poco de AJAX</title>
</head>

<body>
<h1>Combobox dependientes de Pa&iacute;s, Estado y Ciudad con PHP, MySQL, jQuery y un poco de AJAX</h1>
<dl>
<dt>Ubicaci&oacute;n:</dt>
	<dd>Pais:</dd>
    <dd>
        <select id="pais" name="pais">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Estado:</dd>
    <dd>
        <select id="estado" name="estado">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Ciudad:</dd>
    <dd>
        <select id="ciudad" name="ciudad">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>
</dl>
</body>
</html>
