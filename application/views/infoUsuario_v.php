<html>
<head>
	<title>Información personal</title>
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
					<h4>Información proporcionada por el usuario</h4>
					<pre>
						
					</pre>
					<label><b>Nombre:</b> <?=$datosUsuario['Nombre'];?></label>
					<label><b>Apellido Paterno: </b> <?=$datosUsuario['aPaterno']; ?></label>
					<label><b>Apellido Materno: </b> <?=$datosUsuario['aMaterno'];?></label>
					<label><b>Nacionalidad: </b> <?= $datosUsuario['Nacionalidad']; ?></label>
					<label><b>Fecha de nacimiento: </b> <?= date($datosUsuario['FecNacimiento']); ?></label>
					<label><b>País: </b><?php
						//Busco en el catálogo de paises el IdPais del dato proporcionado comparando uno por uno hasta que coincida 
						foreach ($catPais as $key => $value) {
							if($key == $datosUsuario['IdPais']){
								echo $value['NomPais'];
							}
						}?>
					</label>
					<label><b>Estado: </b> <?=$datosUsuario['NomEstado']; ?></label>
					<label><b>Calle: </b> <?=$datosUsuario['Calle']; ?></label>
					<label><b>Número: </b> <?=$datosUsuario['NumExterior']; ?></label>
					<!-- Si mandaron el Num interior lo muestro en la vista -->
					<?php if(!empty($datosUsuario['NumInterior'])){
						echo '<label><b>Número interior: </b>'.$datosUsuario['NumInterior'].'</label>';
						} 
					?>
					<label><b>Colonia: </b> <?=$datosUsuario['Colonia']; ?></label>
					<label><b>Municipio: </b> <?=$datosUsuario['NomMunicipio']; ?></label>
					<label><b>C.P.: </b> <?=$datosUsuario['CP']; ?></label>
					<label><b>RFC: </b> <?=$datosUsuario['RFC']; ?></label>
					<label><b>CURP: </b> <?=$datosUsuario['CURP']; ?></label>
					<label><b>Correo electrónico: </b> <?=$datosUsuario['email']; ?></label>
					
					<!-- Informacion académica para posgrados -->
					
					<?php 
						if (isset($datosUsuario['TipoInstProcedencia']) && !empty($datosUsuario['TipoInstProcedencia'])) {
							
						
							switch ($datosUsuario['TipoInstProcedencia']) {
								case '1':
										echo '<label><b>Institución de procedencia: </b>UNAM</label>';	
									break;
								case '2':
										echo '<label><b>Institución de procedencia: </b>IPN</label>';	
									break;
								case '3':
										echo '<label><b>Institución de procedencia: </b>Incorporada a la UNAM, '.$datosUsuario['institucionProcedencia'].'</label>';	
									break;
								case '4':
										echo '<label><b>Institución de procedencia: </b>Incorporada a la SEP, '.$datosUsuario['institucionProcedencia'].'</label>';	
									break;
								case '5':
										echo '<label><b>Institución de procedencia: </b>Universidad estatal, '.$datosUsuario['institucionProcedencia'].'</label>';	
									break;
								case '6':
										echo '<label><b>Institución de procedencia: </b>Incorporada a la universidad estatal, '.$datosUsuario['institucionProcedencia'].'</label>';	
									break;
								case '7':
										echo '<label><b>Institución de procedencia: </b>UAM</label>';	
									break;
								case '8':
										//Busco en el catálogo de paises el IdPais del dato proporcionado comparando uno por uno hasta que coincida 
										foreach ($catPais as $key => $value) {
											if($key == $datosUsuario['IdPaisIns']){
												$pais =$value['NomPais'];
											}
										}
						
										echo '<label><b>Institución de procedencia: </b>'.$pais.', '.$datosUsuario['institucionProcedenciaOtra'].'</label>';	
									break;
							}
						}
					
					?>
					
					<?php 
						if (isset($datosUsuario['UnivelEstudio']) && isset($datosUsuario['nombEstudio']) && !empty($datosUsuario['nombEstudio'])) {
							switch ($datosUsuario['UnivelEstudio']) {
								case '1':
										echo '<label><b>Último nivel de estudios: </b> Licenciatura en '.$datosUsuario['nombEstudio'].'</label>';
									break;
									
								case '2':
										echo '<label><b>Último nivel de estudios: </b> Especialización en' .$datosUsuario['nombEstudio'].'</label>';
									break;
									
								case '3':
										echo '<label><b>Último nivel de estudios: </b> Maestría en '.$datosUsuario['nombEstudio'].'</label>';
									break;
							}
						}
					
					?>
					
					<?php if(isset($datosUsuario['FecExa'])):?>
						<label><b>Fecha de examen: </b><?=$datosUsuario['FecExa']?></label>
					<?php endif ?>
					<?php if(isset($datosUsuario['Prom'])):?>
						<label><b>Promedio: </b><?=$datosUsuario['Prom']?></label>
					<?php endif ?>
					<?php if(isset($datosUsuario['unidad'])):?>
						<label><b>Unidad: </b><?=$datosUsuario['unidad']?></label>
					<?php endif ?>
					<?php if(isset($datosUsuario['division'])):?>
						<label><b>División: </b><?=$datosUsuario['division']?></label>
					<?php endif ?>
					<?php if(isset($datosUsuario['NivEstudio'])):?>
						<label><b>Nivel de estudios solicitado: </b><?=$datosUsuario['NivEstudio']?></label>
					<?php endif ?>
					<?php if(isset($datosUsuario['NomPosgrado'])):?>
					<label><b>Nombre del posgrado: </b><?=$datosUsuario['NomPosgrado']?></label>
					<?php endif ?>
					<?php if(!empty($datosUsuario['AreaConcentracion'])){
						echo '<label><b>Área de concentración: </b>'.$datosUsuario['AreaConcentracion'].'</label>';
						} 
					?>
					
					<!-- Fin Informacion académica para posgrados -->
					
					<?php 
						if (isset($datosUsuario['tipoEstudio'])) {
						
							switch ($datosUsuario['tipoEstudio']) {
								case '1':
										echo '<label><b>Máximo de estudios: </b>Preparatoria</label>';	
									break;
								case '2':
										echo '<label><b>Máximo de estudios: </b>Pasante de licenciatura en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
								case '3':
										echo '<label><b>Máximo de estudios: </b>Licenciatura en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
								case '4':
										echo '<label><b>Máximo de estudios: </b>Pasante de maestría en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
								case '5':
										echo '<label><b>Máximo de estudios: </b>Maestría en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
								case '6':
										echo '<label><b>Máximo de estudios: </b>Pasante de doctorado en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
								case '7':
										echo '<label><b>Máximo de estudios: </b>Doctorado en '.$datosUsuario['nombEstudio'].'</label>';	
									break;
							}
					
						}
					?>
					
					<?php 
							if(!empty($datosUsuario['ielts']) 
							|| !empty($datosUsuario['tkt'])
							|| !empty($datosUsuario['pet'])
							|| !empty($datosUsuario['fce'])
							|| !empty($datosUsuario['cae'])
							|| !empty($datosUsuario['cpe'])
							|| !empty($datosUsuario['icelt'])
							|| !empty($datosUsuario['dote'])
							|| !empty($datosUsuario['unam1'])
							|| !empty($datosUsuario['unam2'])
							|| !empty($datosUsuario['toefl'])
							|| !empty($datosUsuario['otro'])
								){
								echo "<br><label><b>Certificacion(es) obtenidas en el idioma inglés:<b></label><br>";
								}
					?>
					
					<?php if(!empty($datosUsuario['ielts'])){
						echo '<label>Examen internacional English Language Testing System (IELTS)</label>';}
					?>
					<?php if(!empty($datosUsuario['tkt'])){
						echo '<label>Teaching knowledge Test (TKT)</label>';}
					?>
					<?php if(!empty($datosUsuario['pet'])){
						echo '<label>Examen Cambridge Preliminary English Test (PET)</label>';}
					?>
					<?php if(!empty($datosUsuario['fce'])){
						echo '<label>Examen Cambridge First Certificate in English (FCE)</label>';}
					?>
					<?php if(!empty($datosUsuario['cae'])){
						echo '<label>Examen Cambridge Certificate in Advanced English (CAE)</label>';}
					?>
					<?php if(!empty($datosUsuario['cpe'])){
						echo '<label>Cambridge Certificate of Proficiency in English (CPE)</label>';}
					?>
					<?php if(!empty($datosUsuario['icelt'])){
						echo '<label>In service Certificate English Languaje Teaching (ICELT)</label>';}
					?>
					<?php if(!empty($datosUsuario['dote'])){
						echo '<label>Diploma for Overseas Teachers of English (DOTE)</label>';}
					?>
					<?php if(!empty($datosUsuario['unam1'])){
						echo '<label>Cuso de formación de Profesores de inglés (UNAM)</label>';}
					?>
					<?php if(!empty($datosUsuario['unam2'])){
						echo '<label>Exámenes de la comisión Técnica de Idiomas Extranjeros y de la comisión Especial de Lenguas Extranjeras (UNAM)</label>';}
					?>
					<?php if(!empty($datosUsuario['toefl'])){
						echo '<label>TOEFL institucional, puntuaje: '.$datosUsuario['puntuajeTOEFL'].'</label>';}
					?>
					<?php if(!empty($datosUsuario['otro'])){
						echo '<label><b>Otro:</b> '.$datosUsuario['otroText'].'</label>';}
					?>
					
				</fieldset>
				<a class="button" style="float: left;" onclick="veAtras()">Regresar</a>
				
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

