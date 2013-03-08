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

	<div class="row">
		<!-- <pre><?php
			print_r($datos);
		?></pre> -->
		<form action='<?=base_url(); ?>preregistro_c/guardaDatos/' method='post' accept-charset="utf-8" enctype="multipart/form-data">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<h4>Por favor verifique sus datos</h4>
					
					<label><b>Nombre:</b> <?=$datos['Usuarios_Nombre']; ?></label>
					<label><b>Apellido Paterno: </b> <?=$datos['Usuarios_aPaterno']; ?></label>
					<label><b>Apellido Materno: </b> <?=$datos['Usuarios_aMaterno']; ?></label>
					<label><b>Nacionalidad: </b> <?=$datos['Usuarios_Nacionalidad']; ?></label>
					<label><b>Fecha de nacimiento: </b> <?=$datos['Usuarios_FecNacimiento']; ?></label>
					<label><b>Lugar de nacimento: </b><?=$datos['Usuarios_lugarNac'];?></label>
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
					<label><b>Teléfono: </b> <?=$datos['Usuarios_Telefono']; ?></label>
					<?php if(!empty($datos['Usuarios_TelOficina'])){
						echo '<label><b>Teléfono de Oficina: </b>'.$datos['Usuarios_TelOficina'].'</label>';
						} 
					?>
					<?php if(!empty($datos['Usuarios_Fax'])){
						echo '<label><b>Fax: </b>'.$datos['Usuarios_Fax'].'</label>';
						} 
					?>
					<label><b>RFC: </b> <?=$datos['Usuarios_RFC']; ?></label>
					<label><b>CURP: </b> <?=$datos['Usuarios_CURP']; ?></label>
					<label><b>Correo electrónico: </b> <?=$datos['Usuarios_email']; ?></label>
					<?php 
						switch ($datos['DatosUsuario_TipoInstProcedencia']) {
							case '1':
									echo '<label><b>Institución de procedencia: </b>UNAM</label>';	
								break;
							case '2':
									echo '<label><b>Institución de procedencia: </b>IPN</label>';	
								break;
							case '3':
									echo '<label><b>Institución de procedencia: </b>Incorporada a la UNAM, '.$datos['DatosUsuario_institucionProcedencia'].'</label>';	
								break;
							case '4':
									echo '<label><b>Institución de procedencia: </b>Incorporada a la SEP, '.$datos['DatosUsuario_institucionProcedencia'].'</label>';	
								break;
							case '5':
									echo '<label><b>Institución de procedencia: </b>Universidad estatal, '.$datos['DatosUsuario_institucionProcedencia'].'</label>';	
								break;
							case '6':
									echo '<label><b>Institución de procedencia: </b>Incorporada a la universidad estatal, '.$datos['DatosUsuario_institucionProcedencia'].'</label>';	
								break;
							case '7':
									echo '<label><b>Institución de procedencia: </b>UAM, '.$datos['DatosUsuario_institucionProcedencia'].'</label>';	
								break;
							case '8':
									//Busco en el catálogo de paises el IdPais del dato proporcionado comparando uno por uno hasta que coincida 
									foreach ($catPais as $key => $value) {
										if($key == $datos['Usuarios_IdPais']){
											$pais =$value['NomPais'];
										}
									}
					
									echo '<label><b>Institución de procedencia: </b>'.$pais.','.$datos['DatosUsuario_institucionProcedenciaOtra'].'</label>';	
								break;
						}
					
					
					?>
					
					<?php 
						switch ($datos['DatosUsuario_UnivelEstudio']) {
							case '1':
									echo '<label><b>Último nivel de estudios: </b> Licenciatura en '.$datos['DatosUsuario_nombEstudio'].'</label>';
								break;
								
							case '2':
									echo '<label><b>Último nivel de estudios: </b> Especialización en' .$datos['DatosUsuario_nombEstudio'].'</label>';
								break;
								
							case '3':
									echo '<label><b>Último nivel de estudios: </b> Maestría en '.$datos['DatosUsuario_nombEstudio'].'</label>';
								break;
						}
					
					?>
					<label><b>Fecha de examen: </b><?=$datos['DatosUsuario_FecExa']?></label>
					<label><b>Promedio: </b><?=$datos['DatosUsuario_Prom']?></label>
					<label><b>Unidad: </b><?=$datos['DatosUsuario_unidad']?></label>
					<label><b>División: </b><?=$datos['DatosUsuario_division']?></label>
					<label><b>Nivel de estudios solicitado: </b><?=$datos['DatosUsuario_NivEstudio']?></label>
					<label><b>Nombre del posgrado: </b><?=$datos['DatosUsuario_NomPosgrado']?></label>
					<?php if(!empty($datos['DatosUsuario_AreaConcentracion'])){
						echo '<label><b>Área de concentración: </b>'.$datos['DatosUsuario_AreaConcentracion'].'</label>';
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

