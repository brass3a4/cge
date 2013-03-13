<html>
<head>
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
					<!-- <pre><?php 
						print_r($archivosUsuario);	
					?></pre> -->
					
					<legend class="cuerpo"><h4>Los Documentos de <?=$datosUsuario['Nombre']?> <?=$datosUsuario['aPaterno']?> <?=$datosUsuario['aMaterno']?> son:</h4></legend>
					
					<?php 
						if (isset($archivosUsuario)) {
							echo "<ol>";
									foreach($archivosUsuario as $archivo){
										echo "<li>";
										echo '<a href="'.base_url().$archivo['url'].'"><img src="'.base_url().'statics/img/text-x-preview.png" height="50" width="50">'.$archivo['nomArchivo'].'</a>';
										echo "</li>";
									}
									
							echo "</ol>";
						}						
					?>
					
				</fieldset>
			<a class="button" style="float: right;" onclick="veAtras()">Regresar</a>	
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>