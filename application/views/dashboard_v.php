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
  	<script src="<?=base_url();?>statics/dataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?=base_url(); ?>statics/js/dashboard.js"></script>
  	<script type="text/javascript">
		var urlBase = "<?=base_url(); ?>";
	</script>
</head>
<body>
	<div class="row">
		<fieldset>
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
		</fieldset>
	<script>
			$(document).foundation();
			// $(document).foundation('reveal', 'reflow');
	</script>
	<script type="text/javascript">
	    /* * * CONFIGURATION VARIABLES * * */
	    var disqus_shortname = 'blogerisimo';
	    var disqus_identifier = '1234';
	    // var disqus_title = 'a unique title for each page where Disqus is present';
	    // var disqus_url = 'a unique URL for each page where Disqus is present';
	    
	    /* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();
	</script>
	<script type="text/javascript">
	    /* * * CONFIGURATION VARIABLES * * */
	    var disqus_shortname = 'blogerisimo';
	    var disqus_identifier = '123';
	    // var disqus_title = 'a unique title for each page where Disqus is present';
	    // var disqus_url = 'a unique URL for each page where Disqus is present';
	    
	    /* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();
	</script>
</body>
</html>