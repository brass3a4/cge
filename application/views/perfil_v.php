<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documentos de ingreso</title>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/dropzone/dropzone.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation5/css/normalize.css"> 
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation5/css/foundation.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation-icons/foundation-icons.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/estiloPerfil.css">
	<script src="<?=base_url(); ?>statics/foundation5/js/vendor/jquery.js"></script>
	<script src="<?=base_url(); ?>statics/foundation5/js/vendor/modernizr.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.alert.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.reveal.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation5/js/foundation/foundation.equalizer.js"></script>
  	<script src="<?=base_url(); ?>statics/dropzone/dropzone.js"></script>
  	<script src="<?=base_url(); ?>statics/js/perfil.js"></script>
  	<script src="<?=base_url(); ?>statics/js/disqusPerfil.js"></script>
  	<script type="text/javascript">
		var urlBase = "<?=base_url(); ?>";
	</script>
</head>
<body>
	<div class="row main">
		<fieldset>
			<div class="row">
				<div class="large-4 small-4 large-centered small-centered columns">
					<h3 class="title">Sistema de registro</h3>
				</div>
			</div>

			<div class="row">
				<div class="large-12 small-12 columns">
					<div class="large-6 small-6 columns columns2">
						<p>Para subir (o sustituir) los documentos, arrastre y suelte el archivo, o de clic, en el área punteada.</p>
						<p>Código de color de los archivos:<br/>
							<span class="ccamarillo"></span>En revisión
							<span class="ccverde"></span>Verificado
							<span class="ccrojo"></span>No aprobado</p>
					</div>
					<div class="large-6 small-6 columns fondoCajas columns2">
						<div class="large-12 small-12 columns">
							<div class="large-4 small-4 columns">
								<img id="avatar" src="<?=base_url('statics/img/avatar.png')?>" alt="">
							</div>
							<div class="large-8 small-8 columns">
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
			</div>
			<div class="row">
				<div class="large-12 small-12 columns espacioSuperior" data-equalizer>

					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-8 small-centered large-centered small-8 columns">
								<h5>Título de licenciatura</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns ">
								<label for="">Frente</label>
								<div id="tituloLicFrente" class="dropzone" disable></div>
							</div>
							<div class="large-6 small-6 columns ">
								<label for="">Vuelta</label>
								<div id="tituloLicAtras" class="dropzone"></div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns espacio">
								<div id="tituloLicFrenteImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalTituloLicFrente" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalTituloLicFrente" class="reveal-modal" data-reveal></div>
							</div>
							<div class="large-6 small-6 columns espacio espacio ">
								<div id="tituloAtrasImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalTituloLicAtras" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalTituloLicAtras" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjTitulo" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									<div data-alert class="alert-box alert radius">Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-11 small-centered large-centered small-9 columns">
								<h5>Certificado de licenciatura</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns ">
								<label for="">Frente</label>
								<div id="certiFrente" class="dropzone"></div>
							</div>
							<div class="large-6 small-6 columns ">
								<label for="">Vuelta</label>
								<div id="certiAtras" class="dropzone"></div>
							</div>
						</div>

						<div class="row">
							<div class="large-6 small-6 columns espacio ">
								<div id="certiFrenteImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalCertiFrente" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalCertiFrente" class="reveal-modal" data-reveal></div>
							</div>
							<div class="large-6 small-6 columns espacio ">
								<div id="certiAtrasImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalCertiAtras" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalCertiAtras" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjCerti" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									<div data-alert class="alert-box alert radius">Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-8 small-centered large-centered small-7 columns">
								<h5>Acta de nacimiento</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns ">
								<label for="">Frente</label>
								<div id="actaFrente" class="dropzone"></div>
							</div>
							<div class="large-6 small-6 columns ">
								<label for="">Vuelta</label>
								<div id="actaAtras" class="dropzone"></div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns espacio ">
								<div id="actaFrenteImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalActaFrente" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalActaFrente" class="reveal-modal" data-reveal></div>
							</div>
							<div class="large-6 small-6 columns espacio ">
								<div id="actaAtrasImg" class="cajita vacia">
									<a href="#" data-reveal-id="myModal" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalActaAtras" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjActa" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									<div data-alert class="alert-box alert radius">Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Segunda fila de documentos -->
			<hr>

			<div class="row">
				<div class="large-12 small-12 columns " data-equalizer>
					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-12 small-centered large-centered small-12 columns">
								<h5>CURP o documento de identidad</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 small-centered large-centered columns ">
								<label for="">Frente</label>
								<div id="curpFrente" class="dropzone"></div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 small-6 small-centered large-centered columns espacio ">
								<div id="curpFrenteImg" class="cajita vacia">
									<a href="#" data-reveal-id="modalCurpFrente" class="hide">Click Me For A Modal</a> 
								</div>
								<div id="modalCurpFrente" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjCurp" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									<div data-alert class="alert-box alert radius">Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-12 small-centered large-centered small-12 columns">
								<h5>Currículum Vitae con documentos probatorios</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 small-centered large-centered columns ">
								<label for="">Frente</label>
								<div id="cv" class="dropzone"></div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 small-6 small-centered large-centered columns espacio  ">
								
									<div id="cvFrenteImg" class="cajita vaciapdf">
										<a href="#" data-reveal-id="modalCvFrente" class="hide">Click Me For A Modal</a> 
									</div>
									<div id="modalCvFrente" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjCv" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a>
								</div>
							</div>
						</div>
					</div>
					<div class="large-4 small-4 columns fondoCajas columns3" data-equalizer-watch>
						<div class="row">
							<div class="large-12 small-centered large-centered small-12 columns">
								<h5>Identificación oficial con fotografía (INE o Pasaporte)</h5>
							</div>
							<hr>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns ">
								<label for="">Frente</label>
								<div id="ifeFrente" class="dropzone"></div>
							</div>
							<div class="large-6 small-6 columns ">
								<label for="">Vuelta</label>
								<div id="ifeAtras" class="dropzone"></div>
							</div>
						</div>
						<div class="row">
							<div class="large-6 small-6 columns espacio ">
									<div id="ifeFrenteImg" class="cajita vacia">
										<a href="#" data-reveal-id="modalIfeFrente" class="hide">Click Me For A Modal</a> 
									</div>
									<div id="modalIfeFrente" class="reveal-modal" data-reveal></div>
							</div>
							<div class="large-6 small-6 columns espacio ">
									<div id="ifeAtrasImg" class="cajita vacia">
										<a href="#" data-reveal-id="modalIfeAtras" class="hide">Click Me For A Modal</a> 
									</div>
									<div id="modalIfeAtras" class="reveal-modal" data-reveal></div>
							</div>
						</div>
						<div class="row">
							<div id="msjIfe" class="large-12 small-12 columns">
								<div data-alert class="alert-box alert round hide">
									<div data-alert class="alert-box alert radius">Solo puede subir archivos en formato JPG, PNG.<a href="#" class="close">&times;</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-10 small-4 large-centered small-centered columns">
					<note><strong>Nota</strong>: Si tiene algún inconveniente le pedimos enviar un mensaje de correo a la dirección: <a href="mailto:rentzana@virtuami.izt.uam.mx">rentzana@virtuami.izt.uam.mx</a>, con su nombre completo, el nombre del programa de su elección y la descripción de la situación.</note>
				</div>
			</div>
		</fieldset>
	</div>
	<script>
		$(document).foundation();
 	</script>
</body>
</html>