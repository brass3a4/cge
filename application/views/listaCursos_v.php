<html>
<head>
	<title>Lista de cursos</title>
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
			<pre>
			</pre>
			<div class="twelve columns">
			<fieldset class="cuerpo">
				<fieldset >
					<form action='<?=base_url();?>cursos_c/carritoCursos/<?=$tipo?>' method='post' name='process' accept-charset="utf-8">
						<input type="hidden" name="idUsuario" value="<?=$idUsuario?>" />
						<div class="twelve columns" style="padding-top: 1%;">
					      <div class="alert-box">
					      	Si elige dos talleres le pedimos que tome en consideración los horarios establecidos para la sesión presencial. 
					      </div>
					      <?php if(isset($cursos) && !empty($cursos)){
					      	foreach ($cursos as $key => $value) {
					      		if(isset($productos[$value['IdProducto']])){
									echo '<label><input type="checkbox" name='."IdProducto".$value['IdProducto'].' value='.$value['IdProducto'].' disabled>'.$value['Producto'].' >>> <b>Curso ya adquirido</b> </label>';
								}else{
									echo '<label><input type="checkbox" name='."IdProducto".$value['IdProducto'].' value='.$value['IdProducto'].' >'.$value['Producto'].' <b>Horario: '.$value['Descripcion'].'</b></label>';
								}
							}
					      }?>
					      <?php if(isset($cursos) && empty($cursos)): ?>
					      	<div class="alert-box">
							  Aún no hay cursos disponibles
							</div>
					      <? endif ?>
					    </div>
						<div class="twelve colums espacioSuperior" style="padding-top: 15%;">
						<a class="button" href='<?=base_url();?>menuRegistro_c/principal/<?=$datosUsuario['usuario']?>'>Regresar</a>
						<?php if(isset($cursos) && !empty($cursos)): ?>
							<input type="submit" id="sigteBtn" class="button" style="float: right;" value="Siguiente" />
						<? endif ?>
					</form>
					
				</fieldset>
			</fieldset>
			</div>
	</div>
</body>
</html>