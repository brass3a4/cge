<html>
<head>
	<title>Oreden de pago</title>
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
  		//window.onload = noAtras;
  	</script>
  	
</head>
<body >
	<div class="row">
			<div class="twelve columns">
			<fieldset class="cuerpo">
				<fieldset >
					
					<legend class="cuerpo"><h4>La solitud se ha realizado con éxito</h4></legend>
					
					<div class="twelve columns offset-by-two">
						<div class="six columns">
							<form action="<?php echo base_url();?>generaPdf_c/generaOrdenPagoPDF/<?=$tipoPago?>/<?=$idPedido?>" method="post">
								<input type="submit" class="button" value="Generar orden de pago" />
							</form>
						</div>
						<div class="six columns">
							<a class="button" onclick="cargarVistaMenuRegistroC('<?=$datosUsuario['usuario']?>')">Inicio</a>
						</div>
					</div>
					
					
				</fieldset>
			</fieldset>
			</div>
	</div>
</body>
</html>
