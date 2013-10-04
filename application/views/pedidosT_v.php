<html>
<head>
	<title>Pedidos</title>
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
				<?php if(isset($pedidos) && !empty($pedidos)){?>
					<?php foreach ($pedidos as $pedido) { ?>
						<ul><li><h4>Detalle solicitud con folio: <?=$pedido['IdTransaccion'] ?></h4></ul></lo>
						<table>
							<thead>
								<tr>
									<th>Nombre Taller</th>
									<th>Referencia</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pedido['datosDetallePedido'] as $detallePedido) { ?>
								<tr>
									<td><?=$detallePedido['Producto'] ?> </td>
									<td><?=$detallePedido['RefAPagar'] ?> </td>							
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<a class="button" onclick="cancelaPedido('<?=$pedido['IdPedido'];?>','<?=$idUsuario?>')">Cancelar solicitud</a>
					<?php } ?>
				<? }else{ ?>
					<div class="alert-box"> No hay solicitudes</div>
				<?php } ?>	
				</fieldset>
				<a class="button" href="<?=base_url();?>menuRegistro_c/principal/<?=$datosUsuario['usuario']?>">Regresar</a>
			</fieldset>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>

