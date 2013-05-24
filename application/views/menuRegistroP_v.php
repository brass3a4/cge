<html>
<head>
	<title>Completa el registro</title>
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
					<legend class="cuerpo"><h4>Completa para terminar tu registro</h4></legend>
					<p><b>Paso 1: Solicitud de ingreso</b></p>
					<div class="twelve columns espacioInferior">
						<div class="six columns">
							<?php if($valor == 0): ?>
								<a class="button" onclick="cargaVistaDocs('<?=$usuario ?>','<?= $idRol?>')"> Subir documentos</a>
							<?php endif ?>
							<?php if($valor == 1): ?>
								<a class="button" disabled> Subir documentos</a>
							<?php endif ?>
						</div>
						<div class="twelve columns espacioSuperior" style="padding-left: 25%;">
							
							<?php if($valor != '0' && isset($archivos)):?>
								
									<ol>
									<?php foreach($archivos as $archivo):?>
										<li>
										<a href="<?= base_url().$archivo['url'];?>"><img src="<?= base_url().'statics/img/text-x-preview.png'?>" height="50" width="50"><?=$archivo['nomArchivo']?></a>
										</li>
									<?php endforeach;?>
									</ol>
								
							<?php endif;?>
								
						</div>
						
					</div>
					
					<p class="espacioSuperior"><b>Paso 2: Entrevista vía Skype</b></p>
					<p><b>Nota: </b>Este paso se habilitará en cuanto sean aceptados los documentos del paso 1</p>
					<?php if ((isset($datosUsuario['AceptAd']) && !empty($datosUsuario['AceptAd']))): ?>
						<p>Las entrevistas se realizarán del 24 de mayo al 7 de junio.</p>
						<p>Requisitos para la entrevista: </p>
						<ol>
							<li>Tener habilitada una cuenta en Skype [<a href="http://www.skype.com/es/" target="_blank">crea tu cuenta</a>].</li>
							<li>Agregar a tus contactos de Skype las siguientes cuentas:</li>
							<ul>
								<li>posgradouami</li>
								<li>posgrado1uami</li>
							</ul>
							<li>Contar con cámara web, audifonos y micrófono(diadema). </li>
							<li>Estar al pendiente de su correo eléctronico donde se informará la fecha y hora de la entrevista.</li>
						</ol>
					<?php endif ?>
					<p class="espacioSuperior espacioInferior"><b>Paso 3: Segunda etapa, documentos legalizados</b></p>
					<p><b>Nota: </b>Esta etapa se habilitará una vez que ha sido aceptado para cursar el programa. 
						Recuerde que además de subir al sistema sus documentos legalizados debe enviar o entregarlos personalmente
						al Lic. Atenco (según convocatoria). 
						</p>				
					<?php if((isset($datosUsuario['AceptAE']) && !empty($datosUsuario['AceptAE']))):?>
					<div class="twelve columns">
						<div class="six columns">
							<?php if ($valor2 == 0): ?>
								<a class="button" onclick="cargaVistaDocsLegal('<?=$usuario ?>')"> Subir documentos legalizados</a>
							<?php endif ?>
							<?php if($valor2 == 1): ?>
								<a class="button" disabled> Subir documentos legalizados</a>
							
							<?php endif?>
						</div>
					</div>
					
					<div class="twelve columns espacioSuperior" style="padding-left: 25%;">
							
						<?php if($valor2 != '0' && isset($archivosLegal)):?>
							
								<ol>
								<?php foreach($archivosLegal as $archivo):?>
									<li>
										<a href="<?= base_url().$archivo['url'];?>"><img src="<?= base_url().'statics/img/text-x-preview.png'?>" height="50" width="50"><?=$archivo['nomArchivo']?></a>
									</li>
								<?php endforeach;?>
								</ol>
							
						<?php endif;?>
							
					</div>
					
					
					<p class="espacioSuperior"><b>Paso 4: Pago</b></p>
									
					<div class="twelve columns">
						<div class="six columns" >
							<label>¿Es usted de nacionalidad Mexicana?</label>
						</div>
						<div class="two columns" style="float: left;" >
							<select onchange="quitaClaseEscondidaNac(this.options[this.selectedIndex].value)" onkeyup="quitaClaseEscondidaNac(this.options[this.selectedIndex].value)" onclick="quitaClaseEscondidaNac(this.options[this.selectedIndex].value)">
								<option value="0"></option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
						<div class="four columns"></div>
					</div>
					
					<div id="nacio" class="twelve columns escondida">
						<p>Realice el pago en una sola exhibición y en efectivo, ya sea directamente en el banco o por medio de transferencia electrónica,
						con los siguientes datos bancarios para pagos nacionales:</p>
						<div class="six columns">
							<ul>
								<li>$13,500.00 (Trece mil quinientos pesos 00/100 M.N.).</li>
								<li>Banco: Santander S.A.</li>
								<li>Beneficiario final: Diorema, Ingeniería Cultural S.C.</li>
								<li>No. de cuenta de abono: 92000576742</li>
							</ul>
						</div>
					</div>
					
					<div id="extra" class="twelve columns escondida">
						<p>Realizce el pago en una sola exhibición, en efectivo, y en dólares estadounidenses,
						con los siguientes datos para pagos internacionales:</p>
						<div class="six columns">
							<ul>
								<li>U$D 1,500.00 (Mil quinientos dólares 00/100 USD).</li>
								<li>Banco beneficiario: BMSXMXMM Banco Santander S.A.</li>
								<li>Beneficiario final: Diorema, Ingeniería Cultural S.C.</li>
								<li>Código Swiff / Aba: 21000021</li>
								<li>No. de cuenta: 400047144</li>
								<li>No. de cuenta de abono: 92000576742</li>
							</ul>
						</div>
					</div>
				<?php endif; ?>	
				</fieldset>
				<form action='<?=base_url(); ?>login_c/reiniciarSesion' method='post'>
					<input type="submit" class="button" style="float: right;" value="Cerrar sesión" />
				</form>
				
				
			</fieldset>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

