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
								<b>El tamaño por cada documento debe ser a lo más de 2MB.</b>
							</p>
						</blockquote>
						
						<div class="twelve columns">
							<div class="four columns">
								<p>Seleccione su procedencia:</p>
							</div>
							<div class="eight columns">
								<select onchange="quitaClaseEscondidaProc(this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaProc(this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaProc(this.options[this.selectedIndex].value)">
									<option value="0"></option>
									<option value="1">Profesor UAM</option>
									<option value="2">Profesor Externo</option>
								</select>
							</div>
							
						</div>
						<div class="twelve columns">
							<div id="profUAM" class="twelve columns escondida" >
							
								<p>1. Adjuntar la carta exposición de motivos</p> 
								<p>2. Adjuntar una identificación oficial vigente de la UAM</p>
							</div>
							<div id="profExt" class="twelve columns escondida">
							
								<p>1. Adjuntar la carta exposición de motivos</p> 
								<p>2. Adjuntar una identificación oficial vigente de la Institución educativa en la que labora</p>	
							</div>
							<div id="inputs" class="twelve columns escondida">	
								<input type="file" name="1" id="ExpMotivos" class="offset-by-five" required>
								<input type="file" name="2" id="DocOficial" class="offset-by-five" required>	
							</div>
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

