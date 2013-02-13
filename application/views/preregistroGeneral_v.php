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
			<br><br>
			
			<fieldset class="cuerpo">
			 	
				<form action='<?=base_url(); ?>preregistro_c/preDatos/' method='post' name='process' accept-charset="utf-8">
					<fieldset >
						<legend class="cuerpo"><h4>Datos personales</h4></legend>
					<div class="twelve colums">
						
						<div class="twelve columns">
								<div class="four columns">
								<input type="text" id="nombre" name="nombre" placeholder="Nombre(s)" title="El nombre debe contener únicamente letras" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" required/>
								</div>
								<div class="four columns">
								<input type="text" id="apellidoPat" name="apellidoPat" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Apellido paterno" required/>
								</div>
								<div class="four columns">
								<input type="text" id="apellidoMat" name="apellidoMat" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Apellido materno"required/>
								</div>
						</div>
						
						<div class="twelve columns">
								<div class="four columns">
								<input type="text" id="Nacionalidad" name="nacionalidad" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Nacionalidad" required/>
								</div>
								<div class="four columns">
								<input type="text" id="fechNac" name="fechNac" title="La fecha debe de tener este formato AAAA-MM-DD" placeholder="Fecha de nacimiento" required/>
								</div>
								<div class="four columns">
								
								</div>
						</div>
							
						<div class="twelve columns">
							<fieldset class="cuerpo">
							<legend class="cuerpo">Dirección</legend>
							
							<div class="twelve columns">
								<div class="six columns">
								<select name='pais'>
									<option value="1"> País1</option>
									<option value="2"> País1</option>
								</select>
							</div>
							<div class="six columns">
								<select name='estado'>
									<option value="1"> Estado1</option>
									<option value="2"> Estado2</option>
								</select>
							</div>
							</div>
							
							<div class="twelve columns espacioSuperior">
								<div class="six columns">
									<input type="text" id="calle" name="calle" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Calle" required/>
								</div>
								<div class="three columns">
									<input type="text" id="numero" name="numero" pattern="[0-9]+" placeholder="Número" required/>
								</div>
								<div class="three columns">
									<input type="text" id="numeroInt" name="numeroInt" placeholder="Número interior"/>
								</div>
							</div>
							<div class="twelve columns">
								<div class="six columns">
								<input type="text" id="colonia" name="colonia" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" placeholder="Colonia" required/>
							</div>			
							<div class="six columns">
									<select name='municipio'>
									<option value="1"> Municipio1</option>
									<option value="2"> Municipio2</option>
								</select>
							</div>	
							</div>
							<div class="twelve columns">
								<div class="four columns" >
									<input type="text" id="cp" name="cp" pattern="[0-9]+" placeholder="C.P." required/>
								</div>
								<div class="six columns"></div>
							</div>
														
							</fieldset>
							<div class="four columns">
								<input type="text" id="rfc" name="rfc"  placeholder="RFC" />
							</div>
							<div class="four columns">
								<input type="text" id="curp" name="curp" placeholder="CURP" required/>
							</div>
							<div class="four columns">
								<input type="email" id="email" name="email" title="ejemplo@correo.com" placeholder="Correo electrónico" required/>
							</div>
						</div>
						
				 	</div>
				 	</fieldset> 
				 	<fieldset>
				 	<legend class="cuerpo"><h4>Información académica</h4></legend>
				 	<div class="twelve columns">
					 	<blockquote>
						  <p>Indique su grado máximo de estudios y si es su casao, complete la/las lineas indicando, 
						  	qué licenciatura, maestria o doctorado ha estudiado o se encuentra estudiando.</p>
						</blockquote>
				 	</div>
				 	<div class="twelve columns">
				 		<div class="row">
				 		<div class="four columns">
							<select name="tipoEstudio" onchange="quitaClaseEscondida('estudio')" onkeyup="quitaClaseEscondida('estudio')" onclick="quitaClaseEscondida('estudio')">
								 <option value="1" >Preparatoria:</option>
								 <option value="2">Pasante de licenciatura en:</option>
								 <option value="3">Licenciatura en:</option>
								 <option value="4">Pasante de maestría en:</option>
								 <option value="5">Maestría en:</option>
								 <option value="6">Pasante de doctorado en:</option>
								 <option value="7">Doctorado en:</option>
								
							</select>
						</div>
						
							<div class="eight columns escondida" id="estudio">
									<input type="text" id="nombEstudio" pattern="|^[a-zA-Z][a-zA-Z ñÑáéíóúüç]*$|" name="nombEstudio"/>
							</div>
				 	</div>
				 	</div>
					<!--<div class="twelve colums">
					<h5 class="subheader">¿Ha tomado cursos sobre cómo enseñar la lengua inglesa a niños?</h5>
				
							<div class="row">
									<div class="one columns">
										<label for="radio8"><input onclick="quitaClaseEscondida('tablaLengua')" value="1" name="radioL" type="radio"  id="radioSi">Sí</label>
									</div>
									<div class="one columns">
										<label for="radio9"><input onclick="agregaClaseEscondida('tablaLengua')" value="2" name="radioL" CHECKED type="radio" id="radioNo">No</label>
									</div>
									<div class="ten columns"></div>
							</div>
							<div class="escondida" id="tablaLengua">
								<blockquote>
									<p>En caso de su respuesta haya sido afirmativa, complete la siguiente tabla:</p>
								</blockquote>
								


								<table id="cuerpoTabla" class="twelve columns">
								  <thead>
								    <tr>
								      <th>Nombre del curso</th>
								      <th>Institución que ofreció el curso</th>
								      <th>Duración en horas del curso</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td><input type="text" id="nomCurso" name="nomCurso"> </td>
								      <td><input type="text" id="institucion" name="institucion"></td>
								      <td><input type="text" id="duracionCurso" name="duracionCurso"></td>
								    </tr>

								</table>
								<a class="button" onclick="agregarCampos()">Agregar otro curso</a>

							</div>
					</div>
					<div class="twelve colums">
					<h5 class="subheader">¿Ha recibido alguna capacitación de parte del PNIEB?</h5>
				
							<div class="row">
									<div class="one columns">
										<label for="radio10"><input onclick="quitaClaseEscondida('capacitacion')"   value="1" name="radioC" type="radio"  id="radioCSi">Sí</label>
									</div>
									<div class="one columns">
										<label for="radio11"><input onclick="agregaClaseEscondida('capacitacion')" value="2" name="radioC" CHECKED type="radio" id="radioCNo">No</label>
									</div>
									<div class="ten columns"></div>
							</div>
							<div class="escondida" id="capacitacion">
								<blockquote>
									<p>En caso de su respuesta haya sido afirmativa, especifique en que consistió la capacitación</p>
								</blockquote>
								
								<textarea name="descCapacitacion" cols="50" rows="5"></textarea>
								
							</div>
					</div>
					<div class="twelve colums">
						<h5 class="subheader">Experiencia Docente y tipo de contratación</h5>
						<table id="cuerpoTabla" class="twelve columns">
								  <thead>
								    <tr>
								      <th>Nivel o niveles que trabaja actualmente</th>
								      <th>Tipo de contrato(nomina,honorarios,otro)</th>
								      <th>Puesto que ocupa (coordinador, docente, otro)</th>
								      <th>Carga horaria semanal total frete a grupos</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>Preescolar </td>
								      <td><input type="text" id="tipoContratoPreescolar" name="tipoContratoPreescolar"></td>
								      <td><input type="text" id="puestoPreescolar" name="puestoPreescolar"></td>
								      <td><input type="text" id="cargaPreescolar" name="cargaPreescolar"></td>
								    </tr>
								    <tr>
								      <td>Primaria </td>
								      <td><input type="text" id="tipoContratoPrimaria" name="tipoContratoPrimaria"></td>
								      <td><input type="text" id="puestoPrimaria" name="puestoPrimaria"></td>
								      <td><input type="text" id="cargaPrimaria" name="cargaPrimaria"></td>
								    </tr>
									<tr>
								      <td>Secundaria</td>
								      <td><input type="text" id="tipoContratoSecundaria" name="tipoContratoSecundaria"></td>
								      <td><input type="text" id="puestoSecundaria" name="puestoSecundaria"></td>
								      <td><input type="text" id="cargaSecundaria" name="cargaSecundaria"></td>
								    </tr>
								</table>
					</div>
					-->
					<div class="twelve colums">
					<h5 class="subheader">Indique cuál certificación tiene como docente de ingles</h5>
							<!--
							<div class="row">
									<div class="one columns">
										<label for="radio12"><input onclick="quitaClaseEscondida('certificacion')" value="1"  name="radioCer" type="radio"  id="radioCerSi">Sí</label>
									</div>
									<div class="one columns">
										<label for="radio13"><input onclick="agregaClaseEscondida('certificacion')" value="2" name="radioCer" CHECKED type="radio" id="radioCerNo">No</label>
									</div>
									<div class="ten columns"></div>
							</div>
							-->

								<!--
								<blockquote>
									<p>En caso de haber respondido afirmativante, especifique con qué certificación cuenta</p>
								</blockquote>
								
								<blockquote>
									<p>Si ha aprobado alguno de estos exámenes u obtenido alguno de los diplomas que mensionan a continuación indíquelo</p>
								</blockquote>
								-->
								<div class="custom">
									<div class="twelve columns">
										
										<label for="checkbox1"><input type="checkbox" value="1" name="IELTS" id="checkbox1">Examen internacional English Language Testing System (IELTS)</label>
										<label for="checkbox2"><input type="checkbox" value="2" name="TKT" id="checkbox2">Teaching knowledge Test (TKT)</label>
										<label for="checkbox3"><input type="checkbox" value="3" name="PET" id="checkbox3">Examen Cambridge Preliminary English Test (PET)</label>
										<label for="checkbox4"><input type="checkbox" value="4" name="FCE" id="checkbox4">Examen Cambridge First Certificate in English (FCE)</label>
										<label for="checkbox5"><input type="checkbox" value="5" name="CAE" id="checkbox5">Examen Cambridge Certificate in Advanced English (CAE)</label>
										<label for="checkbox6"><input type="checkbox" value="6" name="CPE" id="checkbox6">Cambridge Certificate of Proficiency in English (CPE)</label>
										<label for="checkbox7"><input type="checkbox" value="7" name="ICELT" id="checkbox7">In service Certificate English Languaje Teaching (ICELT)</label>
										<label for="checkbox8"><input type="checkbox" value="8" name="DOTE" id="checkbox8">Diploma for Overseas Teachers of English (DOTE)</label>
										<label for="checkbox9"><input type="checkbox" value="9" name="UNAM" id="checkbox9">Cuso de formación de Profesores de inglés (UNAM)</label>
										<label for="checkbox10"><input type="checkbox" value="10" name="UNAM2" id="checkbox10">Exámenes de la comisión Técnica de Idiomas Extranjeros y de la comisión Especial de Lenguas Extranjeras (UNAM)</label>
										
									</div>
									<div class="eight columns">
										<label for="checkbox11" ><input type="checkbox" onclick="habilitar('puntuajeTOEFL')" value="11" name="TOEFL" id="checkbox11">TOEFL institucional: INDICAR PUNTAJE AQUÍ:</label>
									</div>
									<div class="four columns">
										<input  class="four columns"type="text" id="puntuajeTOEFL" name="puntuajeTOEFL" disabled>
									</div>
									<div class="twelve columns">
										<label for="checkbox12"><input type="checkbox"  onclick="habilitar('otroText')" value="12" name="otro" id="checkbox12">Otro(s) (especificar ¿cuál?)</label>
									<textarea name="otra" id="otroText"cols="1" rows="2" disabled></textarea>
									</div>
								</div>	
					</div>
					
					</fieldset>
					<input type="submit" id="enviarBtn" class="button" style="float: right;" value="Siguiente" />
				</form>
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

