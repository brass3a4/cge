<html>
<head>
	<title>Confirma tus datos</title>
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

	<div class="row">
		
		<form action='<?=base_url(); ?>preregistro_c/guardaDatos/' method='post' accept-charset="utf-8" enctype="multipart/form-data">
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
						switch ($datos['DatosUsuario_tipoEstudio']) {
							case '1':
									echo '<label><b>Máximo de estudios: </b>Preparatoria</label>';	
								break;
							case '2':
									echo '<label><b>Máximo de estudios: </b>Pasante de licenciatura en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
							case '3':
									echo '<label><b>Máximo de estudios: </b>Licenciatura en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
							case '4':
									echo '<label><b>Máximo de estudios: </b>Pasante de maestría en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
							case '5':
									echo '<label><b>Máximo de estudios: </b>Maestría en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
							case '6':
									echo '<label><b>Máximo de estudios: </b>Pasante de doctorado en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
							case '7':
									echo '<label><b>Máximo de estudios: </b>Doctorado en '.$datos['DatosUsuario_nombEstudio'].'</label>';	
								break;
						}
					
					
					?>
					
					<?php 
							if(!empty($datos['DatosUsuario_ielts']) 
							|| !empty($datos['DatosUsuario_tkt'])
							|| !empty($datos['DatosUsuario_pet'])
							|| !empty($datos['DatosUsuario_fce'])
							|| !empty($datos['DatosUsuario_cae'])
							|| !empty($datos['DatosUsuario_cpe'])
							|| !empty($datos['DatosUsuario_icelt'])
							|| !empty($datos['DatosUsuario_dote'])
							|| !empty($datos['DatosUsuario_unam1'])
							|| !empty($datos['DatosUsuario_unam2'])
							|| !empty($datos['DatosUsuario_toefl'])
							|| !empty($datos['DatosUsuario_otro'])
								){
								echo "<br><label><b>Certificacion(es) obtenidas en el idioma inglés:<b></label><br>";
								}
					?>
					
					<?php if(!empty($datos['DatosUsuario_ielts'])){
						echo '<label>Examen internacional English Language Testing System (IELTS)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_tkt'])){
						echo '<label>Teaching knowledge Test (TKT)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_pet'])){
						echo '<label>Examen Cambridge Preliminary English Test (PET)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_fce'])){
						echo '<label>Examen Cambridge First Certificate in English (FCE)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_cae'])){
						echo '<label>Examen Cambridge Certificate in Advanced English (CAE)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_cpe'])){
						echo '<label>Cambridge Certificate of Proficiency in English (CPE)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_icelt'])){
						echo '<label>In service Certificate English Languaje Teaching (ICELT)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_dote'])){
						echo '<label>Diploma for Overseas Teachers of English (DOTE)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_unam1'])){
						echo '<label>Cuso de formación de Profesores de inglés (UNAM)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_unam2'])){
						echo '<label>Exámenes de la comisión Técnica de Idiomas Extranjeros y de la comisión Especial de Lenguas Extranjeras (UNAM)</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_toefl'])){
						echo '<label>TOEFL institucional, puntuaje: '.$datos['DatosUsuario_puntuajeTOEFL'].'</label>';}
					?>
					<?php if(!empty($datos['DatosUsuario_otro'])){
						echo '<label>Otro: '.$datos['DatosUsuario_otroText'].'</label>';}
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

