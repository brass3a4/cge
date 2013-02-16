<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/style.css">
  	<script src="<?=base_url(); ?>static/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>static/foundation/javascripts/modernizr.foundation.js"></script>
  	

</head>
<body>
	<div class="row">
			<div class="eight columns offset-by-four headLogin">
				
				<p class="instrucciones">Introduzca sus datos para ingresar al sistema</p>
				<div class="six columns">
					<fieldset class="login">
						<form action='<?php echo base_url();?>index.php/loguin_c/logear' method='post' name='process'>
					  		<input type="text" id="usuarioInput" name="usuarioInput" placeholder="Correo" required/>
					  		<input type="password" id="passInput" name="passInput" placeholder="Contraseña" required/>
  						<input type="submit" id="LogueoAdminBtn" class="button offset-by-four" value="Ingresar" />
						</form>
				</fieldset>
				</div>
	
				<p><a class="eight columns offset-by-four registroBtn" href="#" id="registroBtn">Registrarse</a></p>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

