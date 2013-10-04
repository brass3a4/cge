<html>
<head>
	<title>Subida de documentos legalizados</title>
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
			 	
				<form action='<?=base_url(); ?>menuRegistro_c/cargarPDFLegal/<?=$usuario?>' method='post' name='process' accept-charset="utf-8" enctype="multipart/form-data">
					<fieldset>
						<legend class="cuerpo"><h4>Sube los siguientes documentos legalizados</h4></legend>
						<blockquote>
							<p>
								Los documentos deben estar digitatizados en formato PDF por ambos lados.
								<b>El tamaño máximo por cada documento debe ser a lo más 2MB.</b>
							</p>
						</blockquote>
						
						<div class="twelve columns">
							<div class="five columns">
								<p>Seleccione el tipo de estudio de licenciatura:</p>
							</div>
							<div class="seven columns">
								<select onchange="quitaClaseEscondidaDocsLegal(this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaDocsLegal(this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaDocsLegal(this.options[this.selectedIndex].value)" >
									<option value="0"></option>
									<option value="1">Mexicanos con estudios de licenciatura en el Sistema Educativo Mexicano</option>
									<option value="2">Mexicanos con estudios de licenciatura en el extranjero</option>
									<option value="3">Extranjeros con estudios de licenciatura en México</option>
									<option value="4">Extranjeros con estudios de licenciatura en el extranjero</option>
								</select>
							</div>
							
						</div>
						
						
						<div id="tipoLic1" class="twelve columns escondida">
							<h5>1.- Fotocopia del título de licenciatura (certificada ante notario público). No se acepta título de la maestría ni del doctorado en lugar del título de licenciatura.</h5>
								<p> Nombre: inicialdelnombre+apellidopaterno_tituloCE (Ejemplo: lsuarez_tituloCE)..</p>
								<input type="file" name="1" id="tituloLic1" class="offset-by-five" > 
							<h5>2.- Fotocopia del certificado de estudios de licenciatura (certificada ante notario público).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_certificadoCE (Ejemplo: lsuarez_certificadoCE).</p>
								<input type="file" name="2" id="certificadoLic1" class="offset-by-five" >
							<h5>3.- Fotocopia del acta de nacimiento (certificada ante notario público).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_actaCE (Ejemplo: lsuarez_actaCE).</p>	
								<input type="file" name="3" id="ActaNac1" class="offset-by-five" >
						</div>
						
						<div id="tipoLic2" class="twelve columns escondida">
							<h5>1.- Fotocopia del título de licenciatura (con Apostille de la Haya o legalización). No se acepta título de la maestría ni del doctorado en lugar del título de licenciatura.</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_tituloLE (Ejemplo: lsuarez_tituloLE).</p>
								<input type="file" name="4" id="tituloLic2" class="offset-by-five" > 
							<h5>2.- Fotocopia del certificado de estudios de licenciatura (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_certificadoLE (Ejemplo: lsuarez_certificadoLE).</p>
								<input type="file" name="5" id="certificadoLic2" class="offset-by-five" >
							<h5>3.- Fotocopia del acta de nacimiento (certificada ante notario público).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_actaCE (Ejemplo: lsuarez_actaCE).</p>	
								<input type="file" name="6" id="ActaNac2" class="offset-by-five" >
							<h5>4.- Fotocopia del plan de estudios de la licenciatura o pensum (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_planLE (Ejemplo: lsuarez_planLE).</p>
								<input type="file" name="7" id="panLic2" class="offset-by-five" >
							<h5>5.- Fotocopia de los programas de estudio de la licenciatura (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_programasLE (Ejemplo: lsuarez_programasLE).</p>	
								<input type="file" name="8" id="progEst2" class="offset-by-five" >
						</div>
						
						<div id="tipoLic3" class="twelve columns escondida">
							<h5>1.- Fotocopia del título de licenciatura (certificada ante notario público). No se acepta título de la maestría ni del doctorado en lugar del título de licenciatura.</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_tituloCE (Ejemplo: lsuarez_tituloCE).</p>
								<input type="file" name="9" id="tituloLic3" class="offset-by-five" > 
							<h5>2.- Fotocopia del certificado de estudios (certificada ante notario público).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_certificadoCE (Ejemplo: lsuarez_certificadoCE).</p>
								<input type="file" name="10" id="certificadoLic3" class="offset-by-five" >
							<h5>3.- Fotocopia del acta de nacimiento (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_actaLE (Ejemplo: lsuarez_actaLE).</p>	
								<input type="file" name="11" id="ActaNac3" class="offset-by-five" >
						</div>  
						
						<div id="tipoLic4" class="twelve columns escondida">
							<h5>1.- Copia del título de licenciatura (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_tituloLE (Ejemplo: lsuarez_tituloLE).</p>
								<input type="file" name="12" id="tituloLic4" class="offset-by-five" > 
							<h5>2.- Copia del certificado de estudios de licenciatura (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_certificadoLE (Ejemplo: lsuarez_certificadoLE).</p>
								<input type="file" name="13" id="certificadoLic4" class="offset-by-five" >
							<h5>3.- Copia del acta de nacimiento (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_actaLE (Ejemplo: lsuarez_actaLE).</p>	
								<input type="file" name="14" id="ActaNac4" class="offset-by-five" >
							<h5>4.- Copia del plan de estudios de licenciatura o pensum (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_planLE (Ejemplo: lsuarez_planLE).</p>
								<input type="file" name="15" id="panLic4" class="offset-by-five" >
							<h5>5.- Copia digitalizada de los programas de estudio de la licenciatura** (con Apostille de la Haya o legalización).</h5>
								<p>Nombre: inicialdelnombre+apellidopaterno_programasLE (Ejemplo: lsuarez_programasLE).</p>	
								<input type="file" name="16" id="progEst4" class="offset-by-five" >
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

