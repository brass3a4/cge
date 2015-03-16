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
	<script type="text/javascript">
		var urlBase = "<?=base_url(); ?>";
	</script>
</head>
<body>
	<pre><?php 
			
	?></pre>
	<div class="row">
		
		<form action='<?=base_url(); ?>preregistroC_c/guardaDatos/' method='post' accept-charset="utf-8" enctype="multipart/form-data">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<h4>Por favor verifique sus datos</h4>
					
					<label><b>Nombre:</b> <? $datos['Usuarios_Nombre'] = str_replace("ñ", "Ñ", $datos['Usuarios_Nombre']); $datos['Usuarios_Nombre'] = strtoupper($datos['Usuarios_Nombre']); echo $datos['Usuarios_Nombre'];?></label>
					<label><b>Apellido Paterno: </b> <? $datos['Usuarios_aPaterno'] = str_replace("ñ", "Ñ", $datos['Usuarios_aPaterno']); $datos['Usuarios_aPaterno'] = strtoupper($datos['Usuarios_aPaterno']); echo $datos['Usuarios_aPaterno']; ?></label>
					<label><b>Apellido Materno: </b> <? $datos['Usuarios_aMaterno']  = str_replace("ñ", "Ñ", $datos['Usuarios_aMaterno']); $datos['Usuarios_aMaterno'] = strtoupper($datos['Usuarios_aMaterno']); echo $datos['Usuarios_aMaterno']; ?></label>
					<label><b>Nacionalidad: </b> <?=$datos['Usuarios_Nacionalidad']; ?></label>
					<label><b>Fecha de nacimiento: </b> <?=$datos['Usuarios_FecNacimiento']; ?></label>
					<label><b>País: </b><?php
					//Busco en el catálogo de paises el IdPais del dato proporcionado comparando uno por uno hasta que coincida 
					foreach ($catPais as $key => $value) {
						if($key == $datos['Usuarios_IdPais']){
							echo $value['NomPais'];
						}
					}
					?></label>
					<label><b>Estado: </b> <?=$datos['Usuarios_NomEstado']; ?></label>
					<label><b>Calle: </b> <?=$datos['Usuarios_Calle']; ?></label>
					<label><b>Número: </b> <?=$datos['Usuarios_NumExterior']; ?></label>
					<!-- Si mandaron el Num interior lo muestro en la vista -->
					<?php if(!empty($datos['Usuarios_NumInterior'])){
						echo '<label><b>Número interior: </b>'.$datos['Usuarios_NumInterior'].'</label>';
						} 
					?>
					<label><b>Colonia: </b> <?=$datos['Usuarios_Colonia']; ?></label>
					<label><b>Municipio: </b> <?=$datos['Usuarios_NomMunicipio']; ?></label>
					<label><b>C.P.: </b> <?=$datos['Usuarios_CP']; ?></label>
					<label><b>RFC: </b> <?=$datos['Usuarios_RFC']; ?></label>
					<label><b>CURP: </b> <?=$datos['Usuarios_CURP']; ?></label>
					<label><b>Correo electrónico: </b> <?=$datos['Usuarios_email']; ?></label>
					<?php 
						switch ($datos['DatosUsuario_InstProcedencia']) {
							case '1':
									echo '<label><b>Procedencia: </b>Profesor de UAM Iztapalapa</label>';	
								break;
							case '2':
									echo '<label><b>Procedencia: </b>Profesor de UAM Xochimilco</label>';	
								break;
							case '3':
									echo '<label><b>Procedencia: </b>Profesor de UAM Azcapozalto</label>';	
								break;
							case '4':
									echo '<label><b>Procedencia: </b>Profesor de UAM Cuajimalpa</label>';	
								break;
							case '5':
									echo '<label><b>Procedencia: </b>Profesor de UAM Lerma</label>';	
								break;
							case '6':
									echo '<label><b>Procedencia: </b>'.$datos['DatosUsuario_InstProcedenciaOtra'].'</label>';	
								break;							
							case '7':
									echo '<label><b>Procedencia: </b> Empleado UAM con Número '.$datos['DatosUsuario_NumEmp'].'</label>';	
								break;
							
						}
					
					
					?>
					
					<?php 
						switch ($datos['DatosUsuario_UGradoEstudio']) {
							case '1':
									echo '<label><b>Último grado de estudios: </b>Posdoctorado</label>';	
								break;
							case '2':
									echo '<label><b>Último grado de estudios: </b>Doctor</label>';	
								break;
							case '3':
									echo '<label><b>Último grado de estudios: </b>Maestro</label>';	
								break;
							case '4':
									echo '<label><b>Último grado de estudios: </b>Licenciado</label>';	
								break;
							case '5':
									echo '<label><b>Último grado de estudios: </b>Técnico Superior Universitario</label>';	
								break;
							case '6':
									echo '<label><b>Último grado de estudios: </b>'.$datos['DatosUsuario_UGradoEstudioOtro'].'</label>';	
								break;
						}
					?>
					
					<?php 
							if(!empty($datos['DatosUsuario_NivelEProfP']) 
							|| !empty($datos['DatosUsuario_NivelEProfU'])
							|| !empty($datos['DatosUsuario_NivelEProfMS'])
							|| !empty($datos['DatosUsuario_NivelEProfBa'])
							){
								echo "<br><label><b>Nivel o niveles en el que se desenvuelve como profesor:<b></label><br>";
								}
					?>
					
					<?php if(!empty($datos['DatosUsuario_NivelEProfP'])){
						echo '<label>Posgrado</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_NivelEProfU'])){
						echo '<label>Universitario</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_NivelEProfMS'])){
						echo '<label>Nivel medio superior</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_NivelEProfBa'])){
						echo '<label>Educación básica</label><br>';}
					?>
					
					<label><b>Última materia o curso en que ha impartido clase: </b> <?=$datos['DatosUsuario_UltimaMateria']; ?></label>
					<?php 
						switch ($datos['DatosUsuario_AExp']) {
							case '1':
									echo '<label><b>Años de experiencia impartiendo clases: </b>Menos de 1</label>';	
								break;
							case '2':
									echo '<label><b>Años de experiencia impartiendo clases: </b>De 1 a 5</label>';	
								break;
							case '3':
									echo '<label><b>Años de experiencia impartiendo clases: </b>De 6 a 15</label>';
								break;
							case '4':
									echo '<label><b>Años de experiencia impartiendo clases: </b>De 16 a 25</label>';
								break;
							case '5':
									echo '<label><b>Años de experiencia impartiendo clases: </b>Más de 25</label>';	
								break;
						}
					?>
					<?php 
						if($datos['DatosUsuario_ExpEst'] == '1') {
							echo "<br><label><b>Experiencia como estudiante o docente virtual:</b></label><br>";
							echo '<label><b>Nivel académico: </b>'.$datos['DatosUsuario_NAcademicoEst'].'</label>';
							echo '<label><b>Nombre del curso o programa de estudio: </b>'.$datos['DatosUsuario_NomCusoEst'].'</label>';	
						}
					?>
					<?php 
						switch ($datos['DatosUsuario_HorasDisp']) {
							case '1':
									echo '<label><b>Horas al día que dispone para dedicar a un curso virtual: </b>Menos de 1</label>';	
								break;
							case '2':
									echo '<label><b>Horas al día que dispone para dedicar a un curso virtual: </b>De 2 a 4</label>';	
								break;
							case '3':
									echo '<label><b>Horas al día que dispone para dedicar a un curso virtual: </b>Más de 5</label>';	
								break;
						}
					?>
				</fieldset>
				<form>
				<!-- Serializamos el arreglo para pasarlo como cadena al controlador por el input hidden-->
				<?php  $str = serialize($datos);?>
				<input type="hidden" name="datos" value='<?=$str?>'/>
				</form>
				<a class="button" onclick="veAtras()">Corregir</a>
				<input type="submit" class="button" style="float: right;" onclick="cargarVista()" value="Confirmar"/>
				
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

