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
	<div class="row">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
			 	
				<form action='<?=base_url(); ?>menuRegistro_c/cargarPDF/<?=$usuario?>' method='post' name='process' accept-charset="utf-8" enctype="multipart/form-data">
					<fieldset>
						<legend class="cuerpo"><h4>Sube los siguientes documentos</h4></legend>
						<blockquote>
							<p>
								Los documentos deben estár en formato PDF y cada documento debe estar escaneado por ambos lados.
							</p>
						</blockquote>
						<div class="twelve columns">
							<h5>1.- Título de licenciatura</h5>
								<input type="file" name="1" id="tituloLic" class="offset-by-five" required> 
							<h5>2.- Certificado de licenciatura con calificaciones y promedio</h5>
								<input type="file" name="2" id="certificadoLic" class="offset-by-five" required>
							<h5>3.- Acta de nacimiento</h5>	
								<input type="file" name="3" id="ActaNac" class="offset-by-five" required>
							<h5>4.- CURP</h5>
								<input type="file" name="4" id="curp" class="offset-by-five" required>
							<h5>5.- Cedula profesional</h5>
								<input type="file" name="5" id="cedula" class="offset-by-five" required>
							<h5>6.- Identificación oficial con fotografía (IFE o Pasaporte)</h5>
								<input type="file" name="6" id="elector" class="offset-by-five" required>
						</div> 
						
					</fieldset>
				 	<a class="button" style="float: left;" onclick="veAtras()"> Regresar</a>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Enviar" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

