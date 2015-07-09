<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation5/css/normalize.css"> 
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation5/css/foundation.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation-icons/foundation-icons.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/estiloDashboard.css">
	<link rel="stylesheet" href="<?=base_url();?>statics/dataTables/media/css/jquery.dataTables.css">
	<!--<script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/foundation/dataTables.foundation.js"></script>-->
	<script src="<?=base_url(); ?>statics/foundation5/js/vendor/jquery.js"></script>
	<script src="<?=base_url(); ?>statics/foundation5/js/vendor/modernizr.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.alert.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.reveal.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.equalizer.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.tab.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.tooltip.js"></script>
  	<script src="<?=base_url(); ?>statics/dataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?=base_url(); ?>statics/js/dashboardD.js"></script>
	<script src="<?=base_url(); ?>statics/js/disqus.js"></script>
  	<script type="text/javascript">
		var urlBase = "<?=base_url(); ?>";
	</script>
	
</head>
<body>
	<div class="row">
		<fieldset>
			<div class="row">
				<div class="large-12 small-12 columns">
					<div class="large-6 small-6 columns">
					</div>
					<div class="large-6 small-6 columns right">
						<div class="large-3 small-3 columns ">
							<img id="avatar" src="<?=base_url('statics/img/avatar.png')?>" alt="">
						</div>
						<div class="large-8 small-5 columns">
							<div class="row">
								<div id="nomUsuario" class="large-12 small-12 large-centered small-centered columns">
									
								</div>
							</div>
							<div class="row">
								<div class="large-12 small-12 large-centered small-centered columns">
									<a href="#" id="cerrarSesion" class="button tiny radius">Cerrar sesión</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<ul class="tabs" data-tab> 
					<li class="tab-title active"><a href="#panel1">Extranjeros</a></li> 
					<li class="tab-title"><a href="#panel2">Nacionales</a></li> 
					<li class="tab-title"><a href="#panel3">Aceptados</a></li> 
					<li class="tab-title"><a href="#panel4">Sin interacción</a></li> 
				</ul> 
				<div class="tabs-content"> 
					<div class="content active" id="panel1"> <!-- Cuerpo 1er Tab -->
						<table id="extranjeros"> 
							<thead> 
								<tr> 
									<th>Nombre</th> 
									<th>Archivos</th> 
									<th>Fecha actualización</th> 
								</tr> 
							</thead> 
							<tbody id="cuerpoExtranjero"> 
								
							</tbody> 
						</table>
						<div id="modalDivsExtra"></div>
					</div> 
					<div class="content" id="panel2"> <!-- Cuerpo 2do Tab -->
						<table id="nacional"> 
							<thead> 
								<tr> 
									<th>Nombre</th> 
									<th>Archivos</th> 
									<th>Fecha actualización</th> 
								</tr> 
							</thead> 
							<tbody id="cuerpoNacional"> 
								
							</tbody> 
						</table>
						<div id="modalDivsNacio"></div>
					</div> 
					<div class="content" id="panel3"> <!-- Cuerpo 3er Tab -->
						<table id="aceptados"> 
							<thead> 
								<tr> 
									<th>Nombre</th> 
									<th>Archivos</th> 
									<th>Lugar de estudios</th> 
								</tr> 
							</thead> 
							<tbody id="cuerpoAceptados"> 
								
							</tbody> 
						</table>
						<div id="modalDivsAcept"></div>
						<div id="modalDivsInfoAcept"></div>
					</div> 
					<div class="content" id="panel4"> <!-- Cuerpo 4to Tab -->
						<table id="sinInteraccion"> 
							<thead> 
								<tr> 
									<th>Nombre</th> 
									<th>Correo electrónico</th> 
									<th>Lugar de estudios</th> 
								</tr> 
							</thead> 
							<tbody id="cuerpoSinInter"> 
								
							</tbody> 
						</table>
						<div id="modalDivsSinInter"></div>
					</div> 
				</div>
			</div>
		</fieldset>
	<script>
			$(document).foundation();
			// $(document).foundation('reveal', 'reflow');
	</script>
	
	
</body>
</html>