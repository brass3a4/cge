<html>
<head>
	<title>Confirmación</title>
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
				<fieldset class="cuerpo">
					<legend class="cuerpo" ><h4>Preregistro exitoso</h4></legend>	
					<p>Estimad@: <b><?=$data['Usuarios_Nombre']?> <?=$data['Usuarios_aPaterno']?> <?=$data['Usuarios_aMaterno'] ?></b>, su preregistro al Sistema para acompañarnos en alguno de los talleres
						en modalidad mixta que se impartirán en el marco de la 2ª Semana de la Educación Virtual, se ha 
						realizado con éxito:</p>
					<p>Su número de solicitud es: <b><?=$IdUsuario?></b></p>	
					<p>Su usuario y contraseña asignados son:</p>
					<div class="offset-by-five">
						<p>Usuario: <b><?= $credenciales['usuario']?></b></p>
						<p>Contraseña: <b><?= $credenciales['password']?></b></p>
						
					</div>

					<p><b>Para completar su registro y elegir el taller en el que se encuentra interesad@, por favor ingrese <a href="<?=base_url();?>login_c">aquí.</a></b></p>
					<p>Reciba un cordial saludo.</p>
					<p>Coordinación de Educación Virtual</p>
					<form action="<?php echo base_url();?>generaPdf_c/crearTaller/<?= $credenciales['usuario']?>" method="post">
						<input type="submit" class="button" value="Exportar a pdf" />
					</form>
					
				</fieldset>
			</fieldset>
		</div>
	</div>
</body>
</html>
