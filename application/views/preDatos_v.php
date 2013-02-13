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
		<div class="twelve columns ">
			
			<fieldset class="cuerpo">
				
				<fieldset>
					<h4>Por favor verifica los datos que ingresaste</h4>
					
					<label><b>Nombre:</b> <?=$datos['nombre']; ?></label>
					<label><b>Apellido Paterno: </b> <?=$datos['apellidoPat']; ?></label>
					<label><b>Apellido Materno: </b> <?=$datos['apellidoMat']; ?></label>
					<label><b>Nacionalidad: </b> <?=$datos['nacionalidad']; ?></label>
					<label><b>Fecha de nacimiento: </b> <?=$datos['fechNac']; ?></label>
					<label><b>País: </b> <?=$datos['pais']; ?></label>
					<label><b>Estado: </b> <?=$datos['pais']; ?></label>
					<label><b>Calle: </b> <?=$datos['calle']; ?></label>
					<label><b>Número: </b> <?=$datos['numero']; ?></label>
					<?php if(!empty($datos['numeroInt'])){
						echo '<label><b>Número interior: </b>'.$datos['numeroInt'].'</label>';
					} 
					
					?>
					<label><b>Colonia: </b> <?=$datos['colonia']; ?></label>
					<label><b>Municipio: </b> <?=$datos['municipio']; ?></label>
					<label><b>C.P.: </b> <?=$datos['cp']; ?></label>
					<label><b>RFC: </b> <?=$datos['rfc']; ?></label>
					<label><b>CURP: </b> <?=$datos['curp']; ?></label>
					<label><b>Correo electrónico: </b> <?=$datos['email']; ?></label>
					<?php 
						switch ($datos['tipoEstudio']) {
							case '1':
									echo '<label><b>Máximo de estudios: </b>Preparatoria</label>';	
								break;
							case '2':
									echo '<label><b>Máximo de estudios: </b>Pasante de licenciatura en '.$datos['nombEstudio'].'</label>';	
								break;
							case '3':
									echo '<label><b>Máximo de estudios: </b>Licenciatura en '.$datos['nombEstudio'].'</label>';	
								break;
							case '4':
									echo '<label><b>Máximo de estudios: </b>Pasante de maestría en '.$datos['nombEstudio'].'</label>';	
								break;
							case '5':
									echo '<label><b>Máximo de estudios: </b>Maestría en '.$datos['nombEstudio'].'</label>';	
								break;
							case '6':
									echo '<label><b>Máximo de estudios: </b>Pasante de doctorado en '.$datos['nombEstudio'].'</label>';	
								break;
							case '7':
									echo '<label><b>Máximo de estudios: </b>Doctorado en '.$datos['nombEstudio'].'</label>';	
								break;
						}
					
					
					?>
					
					
				</fieldset>
				
				<a class="button" onclick="veAtras()">Correguir</a>
				<a class="button" style="float: right;" onclick="cargarVista(urlBase)">Confirmar</a>
				
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>

