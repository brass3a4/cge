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
			 	
				<form action='<?=base_url(); ?>preregistroD_c/preDatos/' method='post' name='process' accept-charset="utf-8">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nombre(s): <small>(obligatorio)</small></label>
									<input type="text" id="nombre" name="Usuarios_Nombre" title="El nombre debe contener únicamente letras"  required/>
								</div>
								<div class="four columns">
									<label>Apellido paterno: <small>(obligatorio)</small></label>
									<input type="text" id="apellidoPat" name="Usuarios_aPaterno" title="Este campo debe contener únicamente letras" required/>
								</div>
								<div class="four columns">
									<label>Apellido materno: </label>
									<input type="text" id="apellidoMat" name="Usuarios_aMaterno" title="Este campo debe contener únicamente letras"  />

								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
									<label>Nacionalidad: <small>(obligatorio)</small></label>
									<input type="text" id="Nacionalidad" name="Usuarios_Nacionalidad"   required/>
								</div>
								<div class="four columns">
									<label>Fecha de nacimiento: <small>(obligatorio)</small></label>
									<input type="text" id="fechNac" name="Usuarios_FecNacimiento" title="La fecha debe de tener este formato AAAA-MM-DD"  required/>
								</div>
								<div class="four columns">
									<label>Lugar de nacimiento: <small>(obligatorio)</small></label>

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
								<label>Estado: <small>(obligatorio)</small></label>
								<input type="text" name="Usuarios_NomEstado"  />

							</div>
							</div>
							
							<div class="twelve columns ">
								<div class="six columns">
									<label>Calle: <small>(obligatorio)</small></label>
									<input type="text" id="calle" name="Usuarios_Calle"  required/>
								</div>
								<div class="three columns">
									<label>Número exterior: <small>(obligatorio)</small></label>
									<input type="text" id="numero" name="Usuarios_NumExterior" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>Número interior:</label>
									<input type="text" id="numeroInt" name="Usuarios_NumInterior" />
								</div>
							</div>
							<div class="twelve columns">
								<div class="six columns">
								<label>Colonia:</label>	
								<input type="text" id="colonia" name="Usuarios_Colonia" required/>
							</div>			
							<div class="six columns">
									<label>Ciudad: <small>(obligatorio)</small></label>

									<input type="text" name="Usuarios_NomMunicipio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" />
							</div>	
							</div>
							<div class="twelve columns">
								<div class="three columns" >
									<label>Código postal: <small>(obligatorio)</small></label>
									<input type="text" id="cp" name="Usuarios_CP" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>LADA: <small>(obligatorio)</small></label>
									<input type="text" id="LADA" name="DatosUsuario_lada" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>Teléfono: <small>(obligatorio)</small></label>
									<input type="text" id="Tel" name="Usuarios_Telefono" title="Este campo debe contener únicamente numeros" pattern="[0-9]+" required/>
								</div>
								<div class="three columns">
									<label>Teléfono oficina: </label>
									<input type="text" id="TelOf" title="Este campo debe contener únicamente numeros" name="Usuarios_TelOficina" pattern="[0-9]+"/>
								</div>
							</div>
							<!-- <div class="twelve columns">
								<div class="four columns" >
									<label>Fax:</label>
									<input type="text" id="Fax" name="Usuarios_Fax" pattern="[0-9]+"/>
								</div>
							</div> -->
														
							</fieldset>
							<div class="four columns">
								<label>RFC: <small>(obligatorio)</small></label>

								<input type="text" id="rfc" name="Usuarios_RFC"/>
							</div>
							<div class="four columns">
								<label>CURP:</label>
								<input type="text" id="curp" name="Usuarios_CURP" />
							</div>
							<div class="four columns">
								<label>Correo electrónico: <small>(obligatorio)</small></label>
								<input type="email" id="email" name="Usuarios_email" title="ejemplo@correo.com" required/>
							</div>
						</div>
						
				 	</div>
				 	</fieldset> 
				 	<fieldset>
				 	<legend class="cuerpo"><h4>Antecedentes</h4></legend>
				 	<div class="twelve columns">
				 		<div class="row">
						<div class="four columns">
				 			<label class="espacioInferior"><b>Estudios realizados en:</b></label>
							<input type="radio" name="DatosUsuario_Estudios" value="México" checked>México
							<input type="radio" name="DatosUsuario_Estudios" value="Extranjero">Extranjero
						</div>
						</div>
					<br>
					</div>

				 	<div class="twelve columns">
				 		<div class="row">
				 		<label class="espacioInferior"><b>Institución de procedencia:</b> <small>(obligatorio)</small></label>
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
						
						<label class="espacioInferior"><b>Último nivel de estudios:</b> <small>(obligatorio)</small></label>
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
						
						<div class="six columns">
						</div>	
									
					</div>
					
					<input type="hidden" name="UserRoles_Roles_IdRole" value="4"/>
					</fieldset>
					
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

