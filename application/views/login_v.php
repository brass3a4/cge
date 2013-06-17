<html>
<head>
	<title>Iniciar sesión</title>
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
			<div class="eleven columns offset-by-three headLogin">
				
				
				<div class="six columns">
					<fieldset class="login">
						<p class="offset-by-one"><b>Introduzca sus datos para ingresar al sistema</b></p>
						<form action='<?php echo base_url();?>login_c/verifica' method='post' name='process' accept-charset="utf-8" enctype="multipart/form-data">
							<?php if(!(is_null($msg))) echo $msg;?>
					  		<input type="text" id="usuarioInput" name="usuario" placeholder="Usuario" required/>
					  		<input type="password" id="passInput" name="password" placeholder="Contraseña" required/>
  						<input type="submit" id="LogueoAdminBtn" class="button offset-by-four" value="Ingresar" />
						</form>
				</fieldset>
				</div>
	
				<!-- <p><a class="eight columns offset-by-four registroBtn" href="<?php echo base_url();?>preregistro_c" id="registroBtn">Registrarse</a></p> -->
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

