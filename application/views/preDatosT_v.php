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
	<pre><?php 
			
	?></pre>
	<div class="row">
		
		<form action='<?=base_url(); ?>preregistroT_c/guardaDatos/' method='post' accept-charset="utf-8" enctype="multipart/form-data">
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<h4>Por favor, verifique sus datos</h4>
					
					<label><b>Nombre:</b> <?= $datos['Usuarios_Nombre'] = str_replace("ñ", "Ñ", $datos['Usuarios_Nombre']); $datos['Usuarios_Nombre'] = strtoupper($datos['Usuarios_Nombre']); echo $datos['Usuarios_Nombre'];?></label>
					<label><b>Apellido Paterno: </b> <?= $datos['Usuarios_aPaterno'] = str_replace("ñ", "Ñ", $datos['Usuarios_aPaterno']); $datos['Usuarios_aPaterno'] = strtoupper($datos['Usuarios_aPaterno']); echo $datos['Usuarios_aPaterno']; ?></label>
					<label><b>Apellido Materno: </b> <?= $datos['Usuarios_aMaterno']  = str_replace("ñ", "Ñ", $datos['Usuarios_aMaterno']); $datos['Usuarios_aMaterno'] = strtoupper($datos['Usuarios_aMaterno']); echo $datos['Usuarios_aMaterno']; ?></label>
					<label><b>Nacionalidad: </b> <?=$datos['Usuarios_Nacionalidad']; ?></label>
					<label><b>Edad: </b> <?=$datos['DatosUsuario_Edad']; ?></label>
					<label><b>Sexo:</b>
						<?php if($datos['Usuarios_Sexo']== 'M'){
							echo "Masculino";
						}else{
							echo "Femenino";
						}?>
					</label>
					<label><b>País: </b><?php
					//Busco en el catálogo de paises el IdPais del dato proporcionado comparando uno por uno hasta que coincida 
					foreach ($catPais as $key => $value) {
						if($key == $datos['Usuarios_IdPais']){
							echo $value['NomPais'];
						}
					}
					?></label>
					<label><b>Estado: </b> <?=$datos['Usuarios_NomEstado']; ?></label>
					<label><b>Correo electrónico 1: </b> <?=$datos['Usuarios_email']; ?></label>
					<label><b>Correo electrónico 2: </b> 
						<?php if(isset($datos['DatosUsuario_email2']) && !empty($datos['DatosUsuario_email2'])){
							echo $datos['DatosUsuario_email2'];
						} ?>
					</label>
					<?php 
						switch ($datos['DatosUsuario_InstProcedencia']) {
							case '1':
									echo '<label><b>Comunidad: </b>Profesor de UAM Iztapalapa</label>';	
								break;
							case '2':
									echo '<label><b>Comunidad: </b>Profesor de UAM Xochimilco</label>';	
								break;
							case '3':
									echo '<label><b>Comunidad: </b>Profesor de UAM Azcapozalto</label>';	
								break;
							case '4':
									echo '<label><b>Comunidad: </b>Profesor de UAM Cuajimalpa</label>';	
								break;
							case '5':
									echo '<label><b>Comunidad: </b>Profesor de UAM Lerma</label>';	
								break;
							case '6':
									echo '<label><b>Comunidad: </b>'.$datos['DatosUsuario_InstProcedenciaOtra'].'</label>';	
								break;							
							case '7':
									echo '<label><b>Comunidad: </b> Empleado UAM con Número '.$datos['DatosUsuario_NumEmp'].'</label>';	
								break;
							
						}
					
					
					?>
					
					<?php 
						switch ($datos['DatosUsuario_UGradoEstudio']) {
							case '1':
									echo '<label><b>Último grado de estudios: </b>Licenciatura</label>';	
								break;
							case '2':
									echo '<label><b>Último grado de estudios: </b>Maestría</label>';	
								break;
							case '3':
									echo '<label><b>Último grado de estudios: </b>Doctorado</label>';	
								break;
							case '4':
									echo '<label><b>Último grado de estudios: </b>Posdoctorado</label>';	
								break;
							case '5':
									echo '<label><b>Último grado de estudios: </b>'.$datos['DatosUsuario_UGradoEstudioOtro'].'</label>';	
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

