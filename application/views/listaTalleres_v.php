<html>
<head>
	<title>Talleres</title>
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
	<div class="row">
		
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<legend class="cuerpo"><h4>Seleccione un taller</h4></legend>
					<pre><?php
						 
					?></pre>
					<?php 
						foreach ($talleres as $taller) { ?>
							
							<a class="button" onclick="cargarUsuariosTaller(<?=$taller['IdProducto']?>)"><?=$taller['Producto'] ?> >> </a> </br></br>
							
						<?php }
					?>
				</fieldset>
				
				<a class="button" onclick="veAtras()">Regresar</a>
				

								
			</fieldset>
			
		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

