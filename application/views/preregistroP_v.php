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
			<br><br>
			
			<fieldset class="cuerpo">
			 	
				<form action='<?=base_url(); ?>preregistroP_c/preDatos/' method='post' name='process' accept-charset="utf-8">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
								<input type="text" id="nombre" name="Usuarios_Nombre" placeholder="Nombre(s)" title="El nombre debe contener únicamente letras" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
								<div class="four columns">
								<input type="text" id="apellidoPat" name="Usuarios_aPaterno" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Apellido paterno" required/>
								</div>
								<div class="four columns">
								<input type="text" id="apellidoMat" name="Usuarios_aMaterno" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Apellido materno"required/>
								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
									<input type="text" id="Nacionalidad" name="Usuarios_Nacionalidad" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Nacionalidad" required/>
								</div>
								<div class="four columns">
									<input type="text" id="fechNac" name="Usuarios_FecNacimiento" title="La fecha debe de tener este formato AAAA-MM-DD" placeholder="Fecha de nacimiento" required/>
								</div>
								<div class="four columns">
									<input type="text" id="Lnacimiento" name="Usuarios_lugarNac" placeholder="Lugar de nacimiento" required/>
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
								<input type="text" name="Usuarios_NomEstado" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Estado"/>
							</div>
							</div>
							
							<div class="twelve columns espacioSuperior">
								<div class="six columns">
									<input type="text" id="calle" name="Usuarios_Calle" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Calle" required/>
								</div>
								<div class="three columns">
									<input type="text" id="numero" name="Usuarios_NumExterior" pattern="[0-9]+" placeholder="Número" required/>
								</div>
								<div class="three columns">
									<input type="text" id="numeroInt" name="Usuarios_NumInterior" placeholder="Número interior"/>
								</div>
							</div>
							<div class="twelve columns">
								<div class="six columns">
								<input type="text" id="colonia" name="Usuarios_Colonia" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Colonia" required/>
							</div>			
							<div class="six columns">
									<input type="text" name="Usuarios_NomMunicipio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Municipio"/>
								</select>
							</div>	
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<input type="text" id="cp" name="Usuarios_CP" pattern="[0-9]+" placeholder="C.P." required/>
								</div>
								<div class="four columns">
									<input type="text" id="Tel" name="Usuarios_Telefono" pattern="[0-9]+" placeholder="Teléfono" required/>
								</div>
								<div class="four columns">
									<input type="text" id="TelOf" name="Usuarios_TelOficina" pattern="[0-9]+" placeholder="Teléfono oficina" required/>
								</div>
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<input type="text" id="Fax" name="Usuarios_Fax" pattern="[0-9]+" placeholder="Fax" required/>
								</div>
							</div>
														
							</fieldset>
							<div class="four columns">
								<input type="text" id="rfc" name="Usuarios_RFC"  placeholder="RFC" />
							</div>
							<div class="four columns">
								<input type="text" id="curp" name="Usuarios_CURP" placeholder="CURP" required/>
							</div>
							<div class="four columns">
								<input type="email" id="email" name="Usuarios_email" title="ejemplo@correo.com" placeholder="Correo electrónico" required/>
							</div>
						</div>
						
				 	</div>
				 	</fieldset> 
				 	<fieldset>
				 	<legend class="cuerpo"><h4>Antecedentes</h4></legend>
				 	
				 	<div class="twelve columns">
				 		<div class="row">
				 		<label class="espacioInferior"><b>Institución de procedencia:</b></label>
				 		<div class="four columns">
							<select name="DatosUsuario_tipoEstudio" onchange="quitaClaseEscondidaIns('institucion',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondida('estudio',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondida('estudio',this.options[this.selectedIndex].value)">
								 <option value="1" >UNAM</option>
								 <option value="2">IPN</option>
								 <option value="3">Incorporada a la UNAM</option>
								 <option value="4">Incorporada a la SEP</option>
								 <option value="5">Universidad estatal</option>
								 <option value="6">Incorporada a la universidad estatal</option>
								 <option value="7">UAM</option>
								 <option value="8">Otra</option>
								
							</select>
						</div>
						
							<div class="eight columns escondida" id="institucion">
									<input type="text" id="DatosUsuario_institucionProcedencia" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" name="DatosUsuario_institucionProcedencia" placeholder="Especifique"/>
							</div>
							<div class="twelve columns escondida" id="OtraIns">
									<label class="espacioSuperior">País:</label>
									<div class="six columns">
										<select name='DatosUsuario_IdPaisIns'>
										<?php 
											foreach ($catPais as $key => $value) {
												echo "<option value=".$key.">".$value['NomPais']."</option>";
											}
										?>
									</select>
									</div>
									<div class="six columns">
									<input type="text" id="DatosUsuario_institucionProcedenciaOtra" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" name="DatosUsuario_institucionProcedenciaOtra" placeholder="Institución"/>
									</div>
								
							</div>
				 	</div>
				 	</div>
					<hr />
					<div class="twelve colums">
						
						<label class="espacioInferior"><b>Último nivel de estudios</b></label>
						<div class="four columns">
						
							<select name="DatosUsuario_UnivelEstdio">
								<option value="1" >Licenciatura:</option>
								<option value="2" >Especialización:</option>
								<option value="3" >Maestría:</option>
							</select>	
						</div>
						<div class="eight columns" id="NivelEstudio">
							<input type="text" id="DatosUsuario_nombEstudio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" name="DatosUsuario_nombEstudio" placeholder="Especifique"/>
						</div>
						<div class="four columns">
							<input type="text" id="FechExa" name="DatosUsuario_FecNacimiento" title="La fecha debe de tener este formato AAAA-MM-DD" placeholder="Fecha de examen" required/>
						</div>
						<div class="two columns">
							<input type="text" id="Prom" name="DatosUsuario_Prom" placeholder="Promedio" pattern="[0-9]+" required/>
						</div>
						<div class="six columns">
						</div>	
									
					</div>
					
					<input type="hidden" name="UserRoles_Roles_IdRole" value="5"/>
					</fieldset>
					<fieldset>
						<legend class="cuerpo"><h4>Datos académicos</h4></legend>
						<blockquote>Seleccione una opción:</blockquote>
						<div class="six columns">
							<label>Unidad:</label>
							<input type="radio" name="unidad" value="AZC">AZC
							<input type="radio" name="unidad" value="IZT">IZT
							<input type="radio" name="unidad" value="XOC">XOC
							<input type="radio" name="unidad" value="CUA">CUA
						</div>
						<div class="six columns">
							<label>División:</label>
							<input type="radio" name="division" value="CBI">CBI
							<input type="radio" name="division" value="CSH">CSH
							<input type="radio" name="division" value="CBS">CBS
							<input type="radio" name="division" value="CAD">CAD
							<input type="radio" name="division" value="CCD">CCD
							<input type="radio" name="division" value="CNI">CNI
						</div>
						<div class="six columns espacioSuperior">
							<label>Nivel de estudios solicitado:</label>
							<input type="radio" name="NivEstudio" value="Especializacion">Especialización
							<input type="radio" name="NivEstudio" value="Maestria">Maestría
							<input type="radio" name="NivEstudio" value="Doctorado">Doctorado
						</div>
						<div class="six columns espacioSuperior">
							<input type="text" name="NomPosgrado" placeholder="Nombre del posgrado" required/>
						</div>
						<div class="six columns espacioSuperior">
							<input type="text" name="AreaConcentracion" placeholder="Área de concentración" required/>
						</div>
						<div class="six columns espacioSuperior">
						</div>
					</fieldset>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

