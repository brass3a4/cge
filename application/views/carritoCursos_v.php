<html>
<head>
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
					
					<legend class="cuerpo"><h4>Carrito de compras</h4></legend>
					
					<form action='<?=base_url();?>/cursos_c/generaOrdenPago' method='post' name='process' accept-charset="utf-8">
						
						<div class="twelve columns" style="padding-top: 1%;">
							<table class="twelve">
							  <thead>
							    <tr>
							      <th>Nombre curso</th>
							      <th>Precio</th>
							    </tr>
							  </thead>
							  	<tbody>
					      <?php
					     	$i=0;
							if (!empty($datos)) {
								
							 
						      	foreach ($datos as $key => $value) {
									echo '<tr>
									      	<td>'.$key.'</td>
									      	<td>$200</td>
									      </tr>';
							  		$i++;
								}
							}
					      ?>
					      		<tr>
							      <td>Precio Total</td>
							      <td><?php 
							      		echo '$'.$i*200;
							      	?></td>
							    </tr>
					        	</tbody>
							</table>
					      	
					    </div>
					    <?php  $str = serialize($datos);?>
					    <input type="hidden" name="datos" value='<?=$str?>'/>
					    <input type="hidden" name="idUsuario" value='<?=$idUsuario?>'/>
						<div class="twelve colums espacioSuperior">
						<a class="button" onclick="veAtras()">Regresar</a>
						<input type="submit" id="sigteBtn" class="button" style="float: right;" value="Confirmar compra" />
					</form>
					
				</fieldset>
			</fieldset>
			</div>
	</div>
</body>
</html>