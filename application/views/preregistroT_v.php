<html>
<head>
	<title>Preregistro a Talleres</title>
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
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.forms.js"></script>
  	<script src="<?=base_url(); ?>statics/js/js.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-ui-1.8.23.custom.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/datepickerEsp.js"></script>

</head>
<body>
	<div class="row">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
			 	
				<form action='<?=base_url(); ?>preregistroT_c/preDatos/' method='post' name='process' accept-charset="utf-8">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nombre(s):</label>
<<<<<<< HEAD
									<input type="text" id="nombre" name="Usuarios_Nombre" title="El nombre debe contener únicamente letras" pattern="^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç]*$" required/>
								</div>
								<div class="four columns">
									<label>Apellido paterno:</label>
									<input type="text" id="apellidoPat" name="Usuarios_aPaterno" title="Este campo debe contener únicamente letras" pattern="^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç]*$" required/>
									</div>
								<div class="four columns">
									<label>Apellido materno:</label>										
									<input type="text" id="apellidoMat" name="Usuarios_aMaterno" title="Este campo debe contener únicamente letras" pattern="^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç]*$" required/>
								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nacionalidad:</label>
									<input type="text" id="Nacionalidad" name="Usuarios_Nacionalidad" pattern="^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$" required/>
								</div>
								<div class="two columns">
									<label>Edad:</label>
									<input type="text" name="DatosUsuario_Edad" title="Sólo debe contener números" pattern="[0-9]+" required/>
								</div>
								<div class="four columns">
									<label>Sexo:</label>
									<select name="Usuarios_Sexo" required>
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
								</div>
						</div>
							
						<div class="twelve columns">
							<fieldset class="cuerpo">
							<legend class="cuerpo">Dirección</legend>
							
							<div class="twelve columns">
								<div class="six columns">
								<label>País:</label>
								<select name='Usuarios_IdPais' required>
									<?php 
										foreach ($catPais as $key => $value) {
											echo "<option value=".$key.">".$value['NomPais']."</option>";
										}
									?>
								</select>
							</div>
							<div class="six columns">
								<label>Estado:</label>
								<input type="text" name="Usuarios_NomEstado" pattern="^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$" />
							</div>
							</div>
							
							
														
							</fieldset>
							<div class="six columns">
								<label>Correo electrónico 1:</label>
								<input type="email" id="email" name="Usuarios_email" title="ejemplo@correo.com" required/>
							</div>
							<div class="six columns">
								<label>Correo electrónico 2 (opcional):</label>
								<input type="email" name="DatosUsuario_email2" title="ejemplo@correo.com"/>
							</div>
						</div>
						
				 	</div>
				 	</fieldset> 
				 	<fieldset>
				 	<legend class="cuerpo"><h4>Información académica y profesional</h4></legend>
				 	<div class="six columns">
					 	<label>1. Comunidad:</label>
					 	<select name="DatosUsuario_InstProcedencia" onchange="quitaClaseEscondidaInsP('ProfExt',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaP('ProfExt',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaInsP('ProfExt',this.options[this.selectedIndex].value)" required>
					 		<option value="1">UAM Iztapalapa</option>
					 		<option value="2">UAM Xochimilco</option>
					 		<option value="3">UAM Azcapozalco</option>
					 		<option value="4">UAM Cuajimalpa</option>
					 		<option value="5">UAM Lerma</option>
					 		<option value="6">Público Externo</option>
					 	</select>
					 	<div id="ProfExt" class="espacioSuperior escondida">
					 		<label> Especifique:</label>
					 		<input name="DatosUsuario_InstProcedenciaOtra" type="text" />
					 	</div>
				 	</div>
				 	<div class="six columns">
					 	<label>2. Último grado de estudios:</label>
					 	<select name="DatosUsuario_UGradoEstudio" onchange="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" required>
					 		<option value="1">Licenciatura</option>
					 		<option value="2">Maestría</option>
					 		<option value="3">Doctorado</option>
					 		<option value="4">Posdoctorado</option>
					 		<option value="5">Otro</option>
					 	</select>
					 	<div id="UGradoEstudioOtro" class="espacioSuperior escondida">
					 		<label> Especifique:</label>
					 		<input name="DatosUsuario_UGradoEstudioOtro" type="text" />
					 	</div>
				 	</div>
				 	
				 	
				 	<div class="twelve columns espacioSuperior">
				 		<label>3. ¿Ha tenido experiencia como estudiante o docente virtual?</label>
				 		<div class="two columns espacioSuperior">
				 			<select name="DatosUsuario_ExpEst" onchange="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" required>
				 				<option value="1">Sí</option>
				 				<option value="2" selected>No</option>
				 			</select>
				 		</div>
				 		<div id="No" class="ten columns escondida espacioSuperior">
				 			<label>Mencione el nivel académico:</label>
				 			<input type="text" name="DatosUsuario_NAcademicoEst" />
				 			<label>Nombre del curso o programa de estudios:</label>
				 			<input type="text" name="DatosUsuario_NomCusoEst" />
				 		</div>
				 	</div>
				 	
					<input type="hidden" name="UserRoles_Roles_IdRole" value="10"/>
					</fieldset>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>
