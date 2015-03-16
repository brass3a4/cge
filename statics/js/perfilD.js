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
        // console.info(documentos);
        // console.info($.isEmptyObject(documentos.tituloLicFrente));
       	
       	if($.isEmptyObject(documentos.cv) == false){
       		    console.log(documentos.cv.url);
				$('#cvFrenteImg').html('<a data-reveal-id="modalCvFrente" ><img src="'+urlBase+'/statics/img/sisreg_pdf.jpg" alt=""></a>');
				$(document).foundation('equalizer', 'reflow');
				$('#cvFrenteImg').removeClass('vacia');
				$('#cvFrenteImg').addClass('espera cajita');
				$('#modalCvFrente').html('<object width="90%" height="500" type="application/pdf" data="'+urlBase+documentos.cv.url+'"></object><a class="close-reveal-modal">&#215;</a>');
				$(document).foundation('equalizer', 'reflow');
       	}
       	if($.isEmptyObject(documentos.ifeFrente) == false){
       		   	$('#ifeFrenteImg').html('<a data-reveal-id="modalIfeFrente"><img src="'+urlBase+documentos.ifeFrente.url+'" alt=""></a>');
       		   	$('#ifeFrenteImg').removeClass('vacia');
				$('#ifeFrenteImg').addClass('espera cajita');
				$('#modalIfeFrente').html('<center><img src="'+urlBase+documentos.ifeFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
       	}
       	if($.isEmptyObject(documentos.ifeAtras) == false){
       		   	$('#ifeAtrasImg').html('<a data-reveal-id="modalIfeAtras"><img src="'+urlBase+documentos.ifeAtras.url+'" alt=""></a>');
       		   	$('#ifeAtrasImg').removeClass('vacia');
				$('#ifeAtrasImg').addClass('espera cajita');
				$('#modalIfeAtras').html('<center><img src="'+urlBase+documentos.ifeAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
       	}
       	//diplomado
       	if($.isEmptyObject(documentos.constFrente) == false){
       		   	$('#constFrenteImg').html('<a data-reveal-id="modalConstFrente"><img src="'+urlBase+documentos.constFrente.url+'" alt=""></a>');
       		   	$('#constFrenteImg').removeClass('vacia');
				$('#constFrenteImg').addClass('espera cajita');
				$('#modalConstFrente').html('<center><img src="'+urlBase+documentos.constFrente.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
       	}
       	if($.isEmptyObject(documentos.constAtras) == false){
       		   	$('#constAtrasImg').html('<a data-reveal-id="modalConstAtras"><img src="'+urlBase+documentos.constAtras.url+'" alt=""></a>');
       		   	$('#constAtrasImg').removeClass('vacia');
				$('#constAtrasImg').addClass('espera cajita');
				$('#modalConstAtras').html('<center><img src="'+urlBase+documentos.constAtras.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
				$(document).foundation('equalizer', 'reflow');
       	}
    });
	// $("#tituloLic").dropzone({ url: urlBase+"index.php/perfil_c/subirDoc" });
	
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
					$('#cvFrenteImg').removeClass('vacia');
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
					$('#ifeFrenteImg').removeClass('vacia');
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
					$('#ifeAtrasImg').removeClass('vacia');
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
	var myDropzone11 = new Dropzone("#constFrente", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "constFrente",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#constFrenteImg').html('<a data-reveal-id="modalConstFrente"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#constFrenteImg').removeClass('vacia');
					$('#constFrenteImg').addClass('espera');
					$('#modalConstFrente').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjConst').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	var myDropzone12 = new Dropzone("#constAtras", 
		{ 
			url: urlBase+"index.php/perfil_c/subirDoc",
			paramName: "constAtras",
			maxFiles: 1,
			init: function() {
				
				this.on("success", function(file,xhr,formData) { 
					datImg = JSON.parse(xhr);
					console.log(datImg.url.url);
					$('#constAtrasImg').html('<a data-reveal-id="modalConstAtras"><img src="'+urlBase+datImg.url.url+'" alt=""></a>');
					$('#constAtrasImg').removeClass('vacia');
					$('#constAtrasImg').addClass('espera');
					$('#modalConstAtras').html('<center><img src="'+urlBase+datImg.url.url+'" alt=""><a class="close-reveal-modal">&#215;</a></center>');
					
					$(document).foundation('equalizer', 'reflow');
				});
				this.on("error", function(){
					$('#msjConst').html('<div data-alert class="alert-box alert radius">Sólo puede subir imágenes en este campo.<a href="#" class="close">&times;</a></div>');
					$(document).foundation('alert', 'reflow');
					$(document).foundation('equalizer', 'reflow');
				});
			}
	});
	$('#cerrarSesion').on('click',function(){
		window.location = urlBase+"login_c/reiniciarSesion";
	});

});