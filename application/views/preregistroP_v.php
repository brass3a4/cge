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
			 	
				<form action='<?=base_url(); ?>preregistroP_c/preDatos/' method='post' name='process' accept-charset="utf-8" class="custom">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nombre(s):</label>
									<input type="text" id="nombre" name="Usuarios_Nombre" title="Este campo debe contener únicamente letras" pattern="|^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç.]*$|" required/>
								</div>
								<div class="four columns">
									<label>Apellido paterno:</label>
									<input type="text" id="apellidoPat" name="Usuarios_aPaterno" title="Este campo debe contener únicamente letras" pattern="|^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç.]*$|"  required/>
								</div>
								<div class="four columns">
									<label>Apellido materno:</label>
									<input type="text" id="apellidoMat" name="Usuarios_aMaterno" title="Este campo debe contener únicamente letras" pattern="|^[a-zA-Z ñÑÁáÉéÍíÓóÚúüç][a-zA-Z ñÑáéíóúüç.]*$|" required/>
								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nacionalidad:</label>
									<input type="text" id="Nacionalidad" name="Usuarios_Nacionalidad" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|"  required/>
								</div>
								<div class="four columns">
									<label>Fecha de nacimiento:</label>
									<input type="text" id="fechNac" name="Usuarios_FecNacimiento" title="La fecha debe de tener este formato AAAA-MM-DD"  required/>
								</div>
								<div class="four columns">
									<label>Lugar de nacimiento:</label>
									<input type="text" id="Lnacimiento" name="Usuarios_lugarNac" required/>
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
									<input type="text" id="calle" name="Usuarios_Calle" required/>
								</div>
								<div class="three columns">
									<label>Número exterior:</label>
									<input type="text" id="numero" name="Usuarios_NumExterior" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>Número interior:</label>
									<input type="text" id="numeroInt" name="Usuarios_NumInterior" />
								</div>
							</div>
							<div class="twelve columns">
								<div class="six columns">
								<label>Colonia:</label>	
								<input type="text" id="colonia" name="Usuarios_Colonia"  required/>
							</div>			
							<div class="six columns">
									<label>Municipio:</label>
									<input type="text" name="Usuarios_NomMunicipio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" />
							</div>	
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<label>Código postal:</label>
									<input type="text" id="cp" name="Usuarios_CP" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="four columns">
									<label>Teléfono:</label>
									<input type="text" id="Tel" name="Usuarios_Telefono" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="four columns">
									<label>Teléfono oficina:</label>
									<input type="text" id="TelOf" title="Este campo debe contener únicamente numeros" name="Usuarios_TelOficina" pattern="[0-9]+"/>
								</div>
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<label>Fax:</label>
									<input type="text" id="Fax" title="Este campo debe contener únicamente numeros" name="Usuarios_Fax" pattern="[0-9]+"/>
								</div>
							</div>
														
							</fieldset>
							<div class="four columns">
								<label>RFC:</label>
								<input type="text" id="rfc" name="Usuarios_RFC"/>
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
				 	<legend class="cuerpo"><h4>Antecedentes</h4></legend>
				 	
				 	<div class="twelve columns">
				 		<div class="row">
				 		<label class="espacioInferior"><b>Institución de procedencia:</b></label>
				 		<div class="four columns">
							<select name="DatosUsuario_TipoInstProcedencia" onchange="quitaClaseEscondidaIns('institucion',this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaIns('institucion',this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaIns('institucion',this.options[this.selectedIndex].value)">
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
						
							<select name="DatosUsuario_UnivelEstudio">
								<option value="1" >Licenciatura:</option>
								<option value="2" >Especialización:</option>
								<option value="3" >Maestría:</option>
							</select>	
						</div>
						<div class="eight columns" id="NivelEstudio">
							<input type="text" id="DatosUsuario_nombEstudio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" name="DatosUsuario_nombEstudio" placeholder="Especifique"/>
						</div>
						<div class="four columns">
							<label>Fecha de examen:</label>
							<input type="text" id="FechExa" name="DatosUsuario_FecExa" title="La fecha debe de tener este formato AAAA-MM-DD" required/>
						</div>
						<div class="two columns">
							<label>Promedio:</label>
							<input type="text" id="Prom" name="DatosUsuario_Prom" title="Debe contener sólo números" pattern="[0-9]+" required/>
						</div>
						<div class="six columns">
						</div>	
									
					</div>
					
					<input type="hidden" name="UserRoles_Roles_IdRole" value="5"/>
					</fieldset>
					<fieldset>
						<legend class="cuerpo"><h4>Datos académicos del prosgrado solicitado</h4></legend>
						<blockquote>Seleccione una opción:</blockquote>
						<div class="six columns row">
							<label>Unidad:</label>
							<input type="radio" name="DatosUsuario_unidad" value="AZC" disabled>AZC
							<input type="radio" class="custom radio checked" name="DatosUsuario_unidad" value="IZT">IZTd
							<input type="radio" name="DatosUsuario_unidad" value="XOC" disabled>XOC
							<input type="radio" name="DatosUsuario_unidad" value="CUA" disabled>CUA
						</div>
						
						<div class="six columns">
							<label>División:</label>
							<input type="radio" name="DatosUsuario_division" value="CBI" disabled>CBI
							<input type="radio" name="DatosUsuario_division" value="CSH" checked>CSH
							<input type="radio" name="DatosUsuario_division" value="CBS" disabled>CBS
							<input type="radio" name="DatosUsuario_division" value="CAD" disabled>CAD
							<input type="radio" name="DatosUsuario_division" value="CCD" disabled>CCD
							<input type="radio" name="DatosUsuario_division" value="CNI" disabled>CNI
						</div>
						<div class="six columns espacioSuperior">
							<label>Nivel de estudios solicitado:</label>
							<input type="radio" name="DatosUsuario_NivEstudio" value="Especializacion" checked>Especialización
							<input type="radio" name="DatosUsuario_NivEstudio" value="Maestria" disabled>Maestría
							<input type="radio" name="DatosUsuario_NivEstudio" value="Doctorado" disabled>Doctorado
						</div>
						<div class="six columns espacioSuperior">
							<label>Nombre del posgrado:</label>
							<input type="text" name="DatosUsuario_NomPosgrado" value="Pólitica y cultura en América Latina" disabled/>
							<input type="hidden" name="DatosUsuario_NomPosgrado" value="Pólitica y cultura en América Latina" />
						</div>
						<div class="six columns">
							<label>Área de concentración:</label>
							<input type="text" name="DatosUsuario_AreaConcentracion" />
						</div>
						<div class="six columns">
							
						</div>
					</fieldset>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

