<html>
<head>
	<title>Documentos</title>
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

					<legend class="cuerpo"><h4>Los Documentos de <?=$datosUsuario['Nombre']?> <?=$datosUsuario['aPaterno']?> <?=$datosUsuario['aMaterno']?> son:</h4></legend>
					<?php 
						if (isset($archivosUsuario)) {
							echo "<ol>";
									foreach($archivosUsuario as $archivo){
										echo "<li>";
										echo '<a href="'.base_url().$archivo['url'].'" target="_blank"><img src="'.base_url().'statics/img/text-x-preview.png" height="50" width="50">'.$archivo['nomArchivo'].'</a>';
										echo "</li>";
									}
									
							echo "</ol>";
						}else{
							echo '<div class="alert-box alert">El usuario aún no tiene archivos</div>';
						}						
					?>
					<form action='<?php echo base_url();?>adminDocs_c/apruebaDocsUsuario/<?=$datosUsuario['IdUsuario']?>' method="post">
						
						<?php if(isset($archivosUsuario) && !empty($archivosUsuario)):?>
							<label for="checkbox1"><input type="checkbox" id="checkbox1" value="1" name="DatosUsuario_AceptAd" <?=(isset($datosUsuario['AceptAd']) && $datosUsuario['AceptAd'] == '1' ) ? "checked disabled" : "" ?> required>Documentos aprobados etapa 2</label>
							<label for="checkbox2"><input type="checkbox" id="checkbox2" value="1" name="DatosUsuario_AceptAc" disabled>Documentos aprobados etapa 3</label>
							<input type="submit" id="aceptarBtn" class="button espacioSuperior" value="Aceptar documentos" />
						<?php endif; ?>
					</form>
					
					<fieldset>
						<legend class="cuerpo"><h5>Envía un correo al aspirante</h5></legend>
						<form action='<?php echo base_url();?>adminDocs_c/enviaMsj/<?=$datosUsuario['IdUsuario']?>' method="post">
							<div class="six columns">
								<label><b>Para: <?=$datosUsuario['email']?></b></label>
								<input type="hidden" value="<?=$datosUsuario['email']?>" name="correoAspirante" />
								<textarea name="msj"></textarea>
								<input type="submit" id="enviarBtn" class="button"  value="Enviar" />
							</div>
						</form>
					</fieldset>
				</fieldset>
			<a class="button" style="float: left;" onclick="veAtras()">Regresar</a>	
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>