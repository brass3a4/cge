<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8" />
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
  		var urlBase = '<?=base_url(); ?>';
  	</script>

</head>
<body>
	<div class="row">
			<div class="twelve columns">
			<fieldset class="cuerpo">
				<fieldset >

					<legend class="cuerpo"><h4>Bienvenido <?=$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].''?></h4></legend>
					<p><b></b></p>
					<div class="twelve columns espacioInferior">
						<div class="six columns">
							<?php if(isset($numCursos) && $numCursos < 2){ ?>
								<a class="button" onclick="cargarVistaCursos('<?=$idUsuario?>','3')"> Elegir talleres >></a>
							<?php } else { ?>
								 <div class="alert-box">
							     	Sólo puede elegir como máximo 2 talleres. 
							     </div>
								
							<?php } ?>
						</div>
						<div class="twelve columns espacioSuperior">
							<a class="button" onclick="cargarVistaPedidos('<?=$idUsuario?>')"> Ver solicitud >></a>
						</div>
						
					</div>
									
					<div class="twelve columns">
						<div class="six columns">
							
						</div>
					</div>
					
					
					
				</fieldset>
				<form action='<?=base_url(); ?>login_c/reiniciarSesion' method='post'>
					<input type="submit" class="button" style="float: right;" value="Cerrar sesión" />
				</form>
				
				
			</fieldset>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

