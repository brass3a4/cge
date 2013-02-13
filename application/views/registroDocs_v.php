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

</head>
<body>
	<?php $datos = ''?>
	<div class="row">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
			 	
				<form action='<?=base_url(); ?>preregistro_c/cargarPDF/' method='post' name='process' accept-charset="utf-8" enctype="multipart/form-data">
					<fieldset>
						<legend class="cuerpo"><h4>Solicitud de ingreso</h4></legend>
						
						<div class="twelve columns">
							<h5>1.- Exposición de motivos</h5>
					
							<p>
							En este espacio envie en el documento en procesador de textos word, los motivos por los que quiere cursar este diplomado. 
							El documento deberá ser enviado en el idioma inglés en no máximo de una cuartilla.
							</p>
						
						<input type="file" name="file" id="motivos" class="offset-by-five" required> 
						<h5>2.- Documentación</h5>
							<p>a) <b>Carta constancia</b> actual membretada y sellada de la instutución escolar donde trabaja en la
								que se esoecifique a qué grupo o grupos enseña.</p>
							<input type="file" name="file2" id="constancia" class="offset-by-five" required>
							<p class="espacioSuperior">b) <b>Constancia dominio inglés</b> equivalente a nivel B2 del Marco Común Europeo</p>
						<input type="file" name="file3" id="constancia2" class="offset-by-five" required>
						</div> 
					</fieldset>
				 	
					<input type="submit" id="enviarBtn" class="button offset-by-five" value="Enviar" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

