$(document).on('ready',function(){
	$.post(urlBase+"perfil_c/traeDatosUsuario", {
    }, function(data) {
    	var datosUsuario = JSON.parse(data);
    	// console.log(datosUsuario);
    	$('#nomUsuario').append(datosUsuario.Nombre+" "+datosUsuario.aPaterno+" "+datosUsuario.aMaterno);
    });
	$.post(urlBase+"perfil_c/traerDocumentosUsuario", {
    }, function(data) {
        // console.log(data);
        var documentos = JSON.parse(data);
        // console.log(documentos.tituloLicFrente.color);
        // console.info(documentos);
        // console.info($.isEmptyObject(documentos.tituloLicFrente));
       	if($.isEmptyObject(documentos.tituloLicFrente) == false){
       		   	$('#tituloLicFrenteImg').html('<a data-reveal-id="modalTituloLicFrente"><img src="'+urlBase+documentos.tituloLicFrente.url+'" alt=""></a>');
       		   	$('#tituloLicFrenteImg').removeClass('vacia');
				$('#tituloLicFrenteImg').addClass('cajita');
				$('#tituloLicFrenteImg').addClass(documentos.tituloLicFrente.color);
				$('#modalTituloLicFrente').html('<center><img src="'+urlBase+documentos.tituloLicFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.tituloLicFrente.estado == 3){
					myDropzone1.disable();
				}
       	}
       	if($.isEmptyObject(documentos.tituloLicAtras) == false){
       		   	$('#tituloAtrasImg').html('<a data-reveal-id="modalTituloLicAtras"><img src="'+urlBase+documentos.tituloLicAtras.url+'" alt=""></a>');
       		   	$('#tituloAtrasImg').removeClass('vacia');
				$('#tituloAtrasImg').addClass('cajita');
				$('#tituloAtrasImg').addClass(documentos.tituloLicAtras.color);
				$('#modalTituloLicAtras').html('<center><img src="'+urlBase+documentos.tituloLicAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.tituloLicAtras.estado == 3){
					myDropzone2.disable();
				}
       	}
       	if($.isEmptyObject(documentos.certiFrente) == false){
       		   	$('#certiFrenteImg').html('<a data-reveal-id="modalCertiFrente"><img src="'+urlBase+documentos.certiFrente.url+'" alt=""></a>');
       		   	$('#certiFrenteImg').removeClass('vacia');
				$('#certiFrenteImg').addClass('cajita');
				$('#certiFrenteImg').addClass(documentos.certiFrente.color);
				$('#modalCertiFrente').html('<center><img src="'+urlBase+documentos.certiFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.certiFrente.estado == 3){
					myDropzone3.disable();
				}

       	}
       	if($.isEmptyObject(documentos.certiAtras) == false){
       		   	$('#certiAtrasImg').html('<a data-reveal-id="modalCertiAtras"><img src="'+urlBase+documentos.certiAtras.url+'" alt=""></a>');
       		   	$('#certiAtrasImg').removeClass('vacia');
				$('#certiAtrasImg').addClass('cajita');
				$('#certiAtrasImg').addClass(documentos.certiAtras.color);
				$('#modalCertiAtras').html('<center><img src="'+urlBase+documentos.certiAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.certiAtras.estado == 3){
					myDropzone4.disable();
				}
       	}
       	if($.isEmptyObject(documentos.actaFrente) == false){
       		   	$('#actaFrenteImg').html('<a data-reveal-id="modalActaFrente"><img src="'+urlBase+documentos.actaFrente.url+'" alt=""></a>');
       		   	$('#actaFrenteImg').removeClass('vacia');
				$('#actaFrenteImg').addClass('cajita');
				$('#actaFrenteImg').addClass(documentos.actaFrente.color);
				$('#modalActaFrente').html('<center><img src="'+urlBase+documentos.actaFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.actaFrente.estado == 3){
					myDropzone5.disable();
				}
       	}
       	if($.isEmptyObject(documentos.actaAtras) == false){
       		   	$('#actaAtrasImg').html('<a data-reveal-id="modalActaAtras"><img src="'+urlBase+documentos.actaAtras.url+'" alt=""></a>');
       		   	$('#actaAtrasImg').removeClass('vacia');
				$('#actaAtrasImg').addClass('cajita');
				$('#actaAtrasImg').addClass(documentos.actaAtras.color);
				$('#modalActaAtras').html('<center><img src="'+urlBase+documentos.actaAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.actaAtras.estado == 3){
					myDropzone6.disable();
				}
       	}
       	if($.isEmptyObject(documentos.curpFrente) == false){
       		   	$('#curpFrenteImg').html('<a data-reveal-id="modalCurpFrente"><img src="'+urlBase+documentos.curpFrente.url+'" alt=""></a>');
       		   	$('#curpFrenteImg').removeClass('vacia');
				$('#curpFrenteImg').addClass('cajita');
				$('#curpFrenteImg').addClass(documentos.curpFrente.color);
				$('#modalCurpFrente').html('<center><img src="'+urlBase+documentos.curpFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.curpFrente.estado == 3){
					myDropzone7.disable();
				}
       	}
       	if($.isEmptyObject(documentos.cv) == false){
       		    // console.log(documentos.cv.url);
				$('#cvFrenteImg').html('<a data-reveal-id="modalCvFrente" ><img src="'+urlBase+'/statics/img/sisreg_pdf.jpg" alt=""></a>');
				$(document).foundation('equalizer', 'reflow');
				$('#cvFrenteImg').removeClass('vacia');
				$('#cvFrenteImg').addClass('cajita');
				$('#cvFrenteImg').addClass(documentos.cv.color);
				$('#modalCvFrente').html('<object width="90%" height="500" type="application/pdf" data="'+urlBase+documentos.cv.url+'"></object><a class="close-reveal-modal">&#215;</a>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.cv.estado == 3){
					myDropzone8.disable();
				}
       	}
       	if($.isEmptyObject(documentos.ifeFrente) == false){
       		   	$('#ifeFrenteImg').html('<a data-reveal-id="modalIfeFrente"><img src="'+urlBase+documentos.ifeFrente.url+'" alt=""></a>');
       		   	$('#ifeFrenteImg').removeClass('vacia');
				$('#ifeFrenteImg').addClass('cajita');
				$('#ifeFrenteImg').addClass(documentos.ifeFrente.color);
				$('#modalIfeFrente').html('<center><img src="'+urlBase+documentos.ifeFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.ifeFrente.estado == 3){
					myDropzone9.disable();
				}
       	}
       	if($.isEmptyObject(documentos.ifeAtras) == false){
       		   	$('#ifeAtrasImg').html('<a data-reveal-id="modalIfeAtras"><img src="'+urlBase+documentos.ifeAtras.url+'" alt=""></a>');
       		   	$('#ifeAtrasImg').removeClass('vacia');
				$('#ifeAtrasImg').addClass('cajita');
				$('#ifeAtrasImg').addClass(documentos.ifeAtras.color);
				$('#modalIfeAtras').html('<center><img src="'+urlBase+documentos.ifeAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
				if(documentos.ifeAtras.estado == 3){
					myDropzone10.disable();
				}
       	}
 
    });
	var myDropzone1 = new Dropzone("#tituloLicFrente", 
	{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "tituloLicFrente",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					// console.log(datImg.url.tipo);
					$('#tituloLicFrenteImg').html('<a data-reveal-id="modalTituloLicFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#tituloLicFrenteImg').removeClass('vacia aceptado rechazado');
					$('#tituloLicFrenteImg').addClass('espera');
					$('#modalTituloLicFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjTitulo').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
			
	});
	var myDropzone2 = new Dropzone("#tituloLicAtras", 
	{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "tituloLicAtras",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#tituloAtrasImg').html('<a data-reveal-id="modalTituloLicAtras"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#tituloAtrasImg').removeClass('vacia aceptado rechazado');
					$('#tituloAtrasImg').addClass('espera');
					$('#modalTituloLicAtras').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjCerti').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone3 = new Dropzone("#certiFrente", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "certiFrente",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					// console.log(datImg.url.url);
					$('#certiFrenteImg').html('<a data-reveal-id="modalCertiFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#certiFrenteImg').removeClass('vacia aceptado rechazado');
					$('#certiFrenteImg').addClass('espera');
					$('#modalCertiFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjCerti').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone4 = new Dropzone("#certiAtras", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "certiAtras",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#certiAtrasImg').html('<a data-reveal-id="modalCertiAtras"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#certiAtrasImg').removeClass('vacia aceptado rechazado');
					$('#certiAtrasImg').addClass('espera');
					$('#modalCertiAtras').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjCerti').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone5 = new Dropzone("#actaFrente", 
	 	{
	 		url: urlBase+"index.php/perfil_c/subirDoc",
	 		paramName: "actaFrente",
	 		maxFiles: 1,
	 		init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#actaFrenteImg').html('<a data-reveal-id="modalActaFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#actaFrenteImg').removeClass('vacia aceptado rechazado');
					$('#actaFrenteImg').addClass('espera');
					$('#modalActaFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');					
				});
				this.on("error", function(){
					$('#msjActa').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone6 = new Dropzone("#actaAtras", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "actaAtras",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#actaAtrasImg').html('<a data-reveal-id="modalActaAtras"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#actaAtrasImg').removeClass('vacia aceptado rechazado');
					$('#actaAtrasImg').addClass('espera');
					$('#modalActaAtras').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjActa').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});

	var myDropzone7 = new Dropzone("#curpFrente", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "curpFrente",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#curpFrenteImg').html('<a data-reveal-id="modalCurpFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#curpFrenteImg').removeClass('vacia aceptado rechazado');
					$('#curpFrenteImg').addClass('espera');
					$('#modalCurpFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjCurp').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone8 = new Dropzone("#cv", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "cv",
			maxFiles: 1,
			acceptedFiles: '.pdf',
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					// console.log(datImg.url.url);
					
					$('#cvFrenteImg').html('<a data-reveal-id="modalCvFrente" ><img src="'+urlBase+'/statics/img/sisreg_pdf.jpg" alt=""></a>');
					$(document).foundation('equalizer', 'reflow');
					$('#cvFrenteImg').removeClass('vacia aceptado rechazado');
					$('#cvFrenteImg').addClass('espera');
					$('#modalCvFrente').html('<object width="90%" height="500" type="application/pdf" data="'+urlBase+datImg.url.url+'"></object><a class="close-reveal-modal">&#215;</a>');
					$(document).foundation('equalizer', 'reflow');
					
				});

				this.on("error", function(){
					$('#msjCv').html('<div data-alert class="alert-box alert radius">Sólo puede subir archivos PDF en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone9 = new Dropzone("#ifeFrente", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "ifeFrente",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#ifeFrenteImg').html('<a data-reveal-id="modalIfeFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#ifeFrenteImg').removeClass('vacia aceptado rechazado');
					$('#ifeFrenteImg').addClass('espera');
					$('#modalIfeFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjIfe').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone10 = new Dropzone("#ifeAtras", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "ifeAtras",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#ifeAtrasImg').html('<a data-reveal-id="modalIfeAtras"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#ifeAtrasImg').removeClass('vacia aceptado rechazado');
					$('#ifeAtrasImg').addClass('espera');
					$('#modalIfeAtras').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjIfe').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	
	$('#cerrarSesion').on('click',function(){
		window.location = urlBase+"login_c/reiniciarSesion";
	});

});