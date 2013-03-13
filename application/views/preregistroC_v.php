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
			 	
				<form action='<?=base_url(); ?>preregistroC_c/preDatos/' method='post' name='process' accept-charset="utf-8">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nombre(s):</label>
									<input type="text" id="nombre" name="Usuarios_Nombre" title="El nombre debe contener únicamente letras" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
								<div class="four columns">
									<label>Apellido paterno:</label>
									<input type="text" id="apellidoPat" name="Usuarios_aPaterno" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
									</div>
								<div class="four columns">
									<label>Apellido materno:</label>										
									<input type="text" id="apellidoMat" name="Usuarios_aMaterno" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nacionalidad:</label>
									<input type="text" id="Nacionalidad" name="Usuarios_Nacionalidad" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
								<div class="four columns">
									<label>Fecha de nacimiento:</label>
									<input type="text" id="fechNac" name="Usuarios_FecNacimiento" title="La fecha debe de tener este formato AAAA-MM-DD" required/>
								</div>
								<div class="four columns">
								
								</div>
						</div>
							
						<div class="twelve columns">
							<fieldset class="cuerpo">
							<legend class="cuerpo">Dirección</legend>
							
							<div class="twelve columns">
								<div class="six columns">
								<label>País:</label>
								<select name='Usuarios_IdPais'>
									<?php 
										foreach ($catPais as $key => $value) {
											echo "<option value=".$key.">".$value['NomPais']."</option>";
										}
									?>
								</select>
							</div>
							<div class="six columns">
								<label>Estado:</label>
								<input type="text" name="Usuarios_NomEstado" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" />
							</div>
							</div>
							
							<div class="twelve columns ">
								<div class="six columns">
									<label>Calle:</label>
									<input type="text" id="calle" name="Usuarios_Calle" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
								<div class="three columns">
									<label>Número exterior:</label>
									<input type="text" id="numero" name="Usuarios_NumExterior" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>Número interior:</label>
									<input type="text" id="numeroInt" name="Usuarios_NumInterior" pattern="[0-9]+" />
								</div>
							</div>
							<div class="twelve columns">
								<div class="six columns">
								<label>Colonia:</label>
								<input type="text" id="colonia" name="Usuarios_Colonia" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
							</div>			
							<div class="six columns">
									<label>Municipio:</label>
									<input type="text" name="Usuarios_NomMunicipio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|"/>
							</div>	
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<label>Código postal:</label>
									<input type="text" id="cp" name="Usuarios_CP" pattern="[0-9]+" required/>
								</div>
								<div class="six columns"></div>
							</div>
														
							</fieldset>
							<div class="four columns">
								<label>RFC:</label>
								<input type="text" id="rfc" name="Usuarios_RFC" />
							</div>
							<div class="four columns">
								<label>CURP:</label>
								<input type="text" id="curp" name="Usuarios_CURP" required/>
							</div>
							<div class="four columns">
								<label>Correo electrónico:</label>
								<input type="email" id="email" name="Usuarios_email" title="ejemplo@correo.com" required/>
							</div>
						</div>
						
				 	</div>
				 	</fieldset> 
				 	<fieldset>
				 	<legend class="cuerpo"><h4>Información académica y profesional</h4></legend>
				 	<div class="six columns">
					 	<label>1. Procendencia:</label>
					 	<select name="DatosUsuario_InstProcedencia" onchange="quitaClaseEscondidaInsP('ProfExt',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaP('ProfExt',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaInsP('ProfExt',this.options[this.selectedIndex].value)" required>
					 		<option value="1">Profesor de UAM Iztapalapa</option>
					 		<option value="2">Profesor de UAM Xochimilco</option>
					 		<option value="3">Profesor de UAM Azcapozalco</option>
					 		<option value="4">Profesor de UAM Cuajimalpa</option>
					 		<option value="5">Profesor de UAM Lerma</option>
					 		<option value="6">Profesor Externo</option>
					 		<option value="7">Empleado UAM</option>
					 	</select>
					 	<div id="ProfExt" class="espacioSuperior escondida">
					 		<label> Especifique:</label>
					 		<input name="DatosUsuario_InstProcedenciaOtra" type="text" />
					 	</div>
					 	<div id="EmpUAM" class="espacioSuperior escondida">
					 		<label>Número de empleado:</label>
					 		<input name="DatosUsuario_NumEmp" type="text" />
					 	</div>
				 	</div>
				 	<div class="six columns">
					 	<label>2. Último grado de estudios:</label>
					 	<select name="DatosUsuario_UGradoEstudio" onchange="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaUGradoO('UGradoEstudioOtro',this.options[this.selectedIndex].value)" required>
					 		<option value="1">Posdoctorado</option>
					 		<option value="2">Doctor</option>
					 		<option value="3">Maestro</option>
					 		<option value="4">Licenciado</option>
					 		<option value="5">Técnico Superior Universitario</option>
					 		<option value="6">Otro</option>
					 	</select>
					 	<div id="UGradoEstudioOtro" class="espacioSuperior escondida">
					 		<label> Especifique:</label>
					 		<input name="DatosUsuario_UGradoEstudioOtro" type="text" />
					 	</div>
				 	</div>
				 	<div class="six columns espacioSuperior custom">
				 			<label>3. Seleccione el nivel o niveles escolares en los que desenvuelve como profesor:</label>
	      					<label><input type="checkbox" name="DatosUsuario_NivelEProfP" value="1">Posgrado</label>
	      					<label><input type="checkbox" name="DatosUsuario_NivelEProfU" value="2">Universitario</label>
	      					<label><input type="checkbox" name="DatosUsuario_NivelEProfMS" value="3">Nivel medio superior</label>
	      					<label><input type="checkbox" name="DatosUsuario_NivelEProfBa" value="4">Educación básica</label>
				 	</div>
				 	<div class="six columns espacioSuperior">
				 		<label>4. Mencione el nombre de la última materia o curso en el que ha impartido clase:</label>
				 		<input type="text" name="DatosUsuario_UltimaMateria" required/>
				 	</div>
				 	<div class="six columns espacioSuperior">
				 		<label>5. ¿Cuántos años de experiencia tiene impartiendo clases?</label>
				 		<select name="DatosUsuario_AExp">
				 			<option value="1">Menos de 1</option>
				 			<option value="2">De 1 a 5</option>
				 			<option value="3">De 6 a 15</option>
				 			<option value="4">De 16 a 25</option>
				 			<option value="5">Más de 25</option>
				 		</select>
				 	</div>
				 	<div class="twelve columns espacioSuperior">
				 		<label>6. ¿Ha tenido experiencia como estudiante o docente virtual?</label>
				 		<div class="two columns">
				 			<select name="DatosUsuario_ExpEst" onchange="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaExpEst('No',this.options[this.selectedIndex].value)" required>
				 				<option value="1">Sí</option>
				 				<option value="2" selected>No</option>
				 			</select>
				 		</div>
				 		<div id="No" class="ten columns escondida">
				 			<label>Mencione el nivel acádemico:</label>
				 			<input type="text" name="DatosUsuario_NAcademicoEst" />
				 			<label>Nombre del curso o programa de estudios:</label>
				 			<input type="text" name="DatosUsuario_NomCusoEst" />
				 		</div>
				 	</div>
				 	<div class="twelve columns espacioSuperior">
				 		<label>Reflexione ¿Cuántas horas al día dispone para dedicar a un curso virtual?</label>
				 		<div class="six columns">
				 			<select name="DatosUsuario_HorasDisp" required>
				 				<option value="1">Menos de 1</option>
				 				<option value="2">De 2 a 4</option>
				 				<option value="3">Más de 5</option>
				 			</select>
				 		</div>
				 	</div>
					<input type="hidden" name="UserRoles_Roles_IdRole" value="9"/>
					</fieldset>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>