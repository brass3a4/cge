<html>
<head>
	<meta charset="utf-8" />
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
  		var urlBase = '<?=base_url(); ?>';
  	</script>

</head>
<body>
	<div class="row">
			<div class="twelve columns">
			<fieldset class="cuerpo">
				<fieldset >
					
					<legend class="cuerpo"><h4>Selecciona los cursos que quieres comprar</h4></legend>
					<form action='<?=base_url();?>cursos_c/carritoCursos' method='post' name='process' accept-charset="utf-8">
						<input type="hidden" name="idUsuario" value="<?=$idUsuario?>" />
						<div class="twelve columns" style="padding-top: 1%;">
					      
					      <label for="curso1"><input type="checkbox" id="curso1" name="Curso1" value="1"> Curso 1</label>
					      <label for="curso2"><input type="checkbox" id="curso2" name="Curso2" value="2"> Curso 2</label>
					      <label for="curso3"><input type="checkbox" id="curso3" name="Curso3" value="3"> Curso 3</label>
					      <label for="curso4"><input type="checkbox" id="curso4" name="Curso4" value="4"> Curso 4</label>
					      <label for="curso5"><input type="checkbox" id="curso5" name="Curso5" value="5"> Curso 5</label>
					    </div>
					    
						<div class="twelve colums espacioSuperior" style="padding-top: 15%;">
						<a class="button" onclick="veAtras()">Regresar</a>
						<input type="submit" id="sigteBtn" class="button" style="float: right;" value="Siguiente" />
					</form>
					
				</fieldset>
			</fieldset>
			</div>
	</div>
</body>
</html>