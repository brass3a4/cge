<html>
<head>
	<title>Carrito de compras</title>
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
  		window.onload = noAtras;
  		if(window.history.forward(1) != null)
	        window.history.forward(1);
  	</script>
  	
</head>
<body onunload="noAtras()" onload="noAtras()">

	<div class="row">
			<div class="twelve columns">
			<fieldset class="cuerpo">
				<fieldset >
					
					<legend class="cuerpo"><h4>Carrito de compras</h4></legend>
					<div class="twelve columns">
						<img src="<?=base_url(); ?>statics/img/cart.png" style="float: right;"/>
					</div>
					<form action='<?=base_url();?>cursos_c/generaOrdenPago' method='post' name='process' accept-charset="utf-8" class="custom">
						
						<div class="twelve columns">
						<?php if (!isset($productos)): ?>
							<div class="alert-box alert">
							  <center> Debes elegir al menos un curso</center>
							</div>	
						<?php endif;?>
						<?php if (isset($productos)): ?>
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
									$precioTotal = '0.00';
									if (!empty($productos)) {
								      	foreach ($productos as $producto) {
								      		foreach ($cursos as $curso) {
												  if($producto['IdProducto'] == $curso['IdProducto'] ){
														echo '<tr>
														      	<td>'.$curso['Producto'].'</td>
														      	<td>$'.$curso['Precio'].'</td>
														      </tr>';
												  $precioTotal += $curso['Precio'];		  	
												  }
											  }
											$i++;
										}
									}
							      ?>
						      		<tr>
								      <td><b>Precio Total</b></td>
								      <td><?php	echo '<b>$'.$precioTotal.'</b>';	?></td>
								    </tr>
					        	</tbody>
							</table>
							<div class="six colums espacioSuperior" >
							    <label><b>¿Cómo desea realizar su pago?</b></label>
								<select style="display:none;" id="customDropdown" name="TipoPago" required>
									<option value="PVU">Pago en ventanilla UAMI</option>
									<option value="PVBR">Pago en ventanilla BANCOMER</option>
									<!-- <option value="PVBX">Pago en ventanilla BANAMEX</option> -->
									<option value="TBR">Transferencia bancaria BANCOMER</option>
									<!--<option value="TBX">Transferencia bancaria BANAMEX</option>
									<option value="PLBR">Pago en linea BANCOMER</option> -->
								</select>
								<div class="custom dropdown">
									<a href="#" class="current">
										Seleccione una opción
									</a>
									<a href="#" class="selector"></a>
									<ul>
										<li>Pago en ventanilla UAMI</li>
										<li>Pago en ventanilla BANCOMER</li>
										<!-- <li>Pago en ventanilla BANAMEX</li>-->
										<li>Transferencia bancaria BANCOMER</li>
										<!--<li>Transferencia bancaria BANAMEX</li>
										<li>Pago en linea BANCOMER</li> -->
									</ul>
								</div>
						    </div>
						<?php endif;?>
					    </div>
					    <?php if(isset($productos)){
					    	$str = serialize($productos);	
					    }?>
					    <input type="hidden" name="Productos" value='<?=$str?>'/>
					    <input type="hidden" name="Usuarios_IdUsuario" value='<?=$idUsuario?>'/>
					    <input type="hidden" name="CostoTotal" value='<?=$precioTotal?>'/>
					    <input type="hidden" name="CantidadProductos" value='<?=$i?>'/>
					    
					    
						<div class="twelve colums espacioSuperior">
						<a class="button" onclick="veAtras()">Regresar</a>
						<?php if(isset($i) && $i != 0): ?>
							<input type="submit" id="sigteBtn" class="button" style="float: right;" value="Confirmar compra" />
						<?php endif;?>
						<?php if(isset($i) && $i == 0): ?>
							<input type="submit" id="sigteBtn" class="button" style="float: right;" value="Confirmar compra" disabled/>
						<?php endif;?>
						</div>
						
					</form>
					
				</fieldset>
			</fieldset>
			</div>
	</div>
</body>
</html>