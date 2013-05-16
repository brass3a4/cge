<html>
<head>
	<title>Roles</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/style.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/datepicker.css">
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/jquery.foundation.forms.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/jquery.placeholder.js.js"></script>
  	<script src="<?=base_url(); ?>statics/js/js.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-ui-1.8.23.custom.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/datepickerEsp.js"></script>
	<script type="text/javascript">
		var urlBase = "<?=base_url(); ?>";
	</script>
</head>
<body>
	<pre><?php 
			
	?></pre>
	<div class="row">
		
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<legend class="cuerpo"><h4>Seleccione un rol</h4></legend>
					<a class="button" onclick="cargarVistaUsuariosRol('3')">Aspirantes Curso Ingles >></a><br><br>
					<a class="button" onclick="cargarVistaUsuariosRol('4')">Aspirantes Diplomado Políticas >></a><br><br>
					<a class="button" onclick="cargarVistaUsuariosRol('5')">Aspirantes Posgrado Políticas >></a><br><br>
					<a class="button" onclick="cargarVistaUsuariosRol('9')">Aspirates Cursos Generales >></a><br><br>
				</fieldset>
				<form action='<?=base_url(); ?>login_c/reiniciarSesion' method='post'>
					<input type="submit" class="button" style="float: right;" value="Cerrar sesión" />
				</form>

								
			</fieldset>
			
		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

