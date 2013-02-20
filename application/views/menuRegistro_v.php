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
			<div class="twelve columns headLogin">
			<fieldset class="cuerpo">
				<fieldset >
					<legend class="cuerpo"><h4>Completa los pasos siguiente para terminar tu registro</h4></legend>
					<p><b>Paso 1:</b></p>
					<a class="button" onclick="cargaVistaDocs()"> Subir documentos</a>
					<p class="espacioSuperior"><b>Paso 2:</b></p>
					
					<?php 
						if($valor != NULL){
							echo '<a class="button"> Subir documentos2</a>';
						}else{
							echo '<a class="button" disabled> Subir documentos2</a>';
						}
					
					?>
					
					
				</fieldset>
				
			</fieldset>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

