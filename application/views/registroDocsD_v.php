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
						<legend class="cuerpo"><h4>Sube los siguientes documentos en formato PDF</h4></legend>
						<blockquote>
							<p>
								El archivo PDF de cada uno de los documentos debe incluir ambos lados, según sea necesario (frente y
								vuelta), ser completamente legible, y entregarse con el nombre del
								documento tal como se solicita a continuación.
								<b>El tamaño máximo de los archivos no debe exeder los 2MB</b>
							</p>
						</blockquote>
						<div class="twelve columns">

							<h5>1.- Certificado de nivel máximo de estudios</h5>
								<blockquote>
									Nombre: inicial del nombre+apellido_constancia (Ejemplo: lsuarez_constancia.pdf)
								</blockquote>
								<input type="file" name="2" id="certificadoU" class="offset-by-five" required>
							<h5>2.- Currículum Vitae con documentos probatorios</h5>
								<blockquote>
									Nombre: inicialdelnombre+apellidopaterno_cv (Ejemplo: lsuarez_cv.pdf).
								</blockquote>	
								<input type="file" name="3" id="cv" class="offset-by-five" required>
							<h5>3.- Identificación oficial con fotografía</h5> 
								<blockquote>
									Nombre: inicial del nombre+apellidopaterno_identificacion (Ejemplo:lsuarez_identificacion.pdf)
								</blockquote>
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

