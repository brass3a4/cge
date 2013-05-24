<html>
<head>
	<title>Aspirantes</title>
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
			
			<fieldset class="cuerpo" style="">
				
				<fieldset>
					<legend class="cuerpo"><h4>Las siguientes personas son aspirantes</h4></legend>
					<?php 
						if (isset($usuarios)) {
							echo '<ol>';
							foreach ($usuarios as $datosUsuario) {
								// Este if es para ver si aceptaron la 1ra fase
								if (isset($datosUsuario['AceptAd']) && $datosUsuario['AceptAd'] == '1'){
									// Este if es para ver si aceptaron la 2da fase
									if (isset($datosUsuario['AceptAE']) && $datosUsuario['AceptAE'] == '1') {
										// Este if es para ver si aceptaron la 3ra fase
										if (isset($datosUsuario['AceptAdc']) && $datosUsuario['AceptAdc'] == '1') {
											// Este if es para ver si aceptaron la 4ta fase
											if (isset($datosUsuario['AceptAp']) && $datosUsuario['AceptAp'] == '1') {
												// Este if es para ver si aceptaron la 5ta fase
												if (isset($datosUsuario['AceptAm']) && $datosUsuario['AceptAm'] == '1') {
													echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'  <img src="'.base_url().'statics/img/check.svg"> <img src="'.base_url().'statics/img/check1.svg"> <img src="'.base_url().'statics/img/check2.svg"> <img src="'.base_url().'statics/img/check3.svg"> <img src="'.base_url().'statics/img/check4.svg">'.'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';
												}else{
													echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'  <img src="'.base_url().'statics/img/check.svg"> <img src="'.base_url().'statics/img/check1.svg"> <img src="'.base_url().'statics/img/check2.svg"> <img src="'.base_url().'statics/img/check3.svg"> '.'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';
												}
											} else {// En caso de no tener la cuarta sólo tiene la 3da fase aceptada
												echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'  <img src="'.base_url().'statics/img/check.svg"> <img src="'.base_url().'statics/img/check1.svg"> <img src="'.base_url().'statics/img/check2.svg"> '.'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';												
											}
										} else {// En caso de no tener la tercera sólo tiene la 2da fase aceptada
											echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'  <img src="'.base_url().'statics/img/check.svg"> <img src="'.base_url().'statics/img/check1.svg"> '.'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';
										}
									}else{// En caso de no tener la segunda sólo tiene la primera fase aceptada
										echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'  <img src="'.base_url().'statics/img/check.svg">'.'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';
									}
								}else{// En caso de no tener la primera no tiene aceptada nunguna fase
									echo '<li>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'<a style="float: right;" class="small button" onclick="cargaVistaDocsUsuario('.$datosUsuario['IdUsuario'].')"> Ver documentos</a><a class="small button" style="float: right; margin-right: 10px;" onclick="cargaVistaInfoUsuario('.$datosUsuario['IdUsuario'].')"> Ver información del usuario</a></li><br><br>';
								}
								
							}
							echo '</ol>';
						}else{
							echo '<div class="alert-box alert">No hay usuarios para este curso</div>';
						}
					?>
					
				</fieldset>
			<a class="button" style="float: left;" onclick="cargarVistaListaRol()">Regresar</a>	
			</fieldset>


		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>