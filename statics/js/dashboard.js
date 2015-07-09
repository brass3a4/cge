$(document).on('ready',function(){
	$.post(urlBase+"perfil_c/traeDatosUsuario", {
    }, function(data) {
    	// console.log(data);
    	var datosUsuario = JSON.parse(data);
    	// console.log(datosUsuario);
    	$('#nomUsuario').append(datosUsuario.Nombre+" "+datosUsuario.aPaterno+" "+datosUsuario.aMaterno);
    });

	$('#cerrarSesion').on('click',function(){
		window.location = urlBase+"login_c/reiniciarSesion";
	});
	
	llenarTabla(2,5,'extranjeros','modalDivsExtra','cuerpoExtranjero');
	llenarTabla(1,5,'nacional','modalDivsNacio','cuerpoNacional');
	llenarTablaAceptados(5,'aceptados','modalDivsAcept','cuerpoAceptados');
	llenarTablaSinInter(5,'sinInteraccion','modalDivsSinInter','cuerpoSinInter');

	/**
	 * Esta función inicializa la tabla de los usuarios dependiendo del rol y donde se realizaron los estudios
	 * @param  {int} estudios   1:México, 2: Extranjero
	 * @param  {int} rol        5:Posgrado, 4: Diplomado
	 * @param  {string} idTabla    id de la tabla donde se se aplicara el data tables
	 * @param  {string} idDivModal idModal donde se inyectaran los modales para los archivos
	 * @param  {string} idTBody    tbody donde se inyectaran las filas para cada usuario
	 * @return {string}            HTML
	 */
	function llenarTabla(estudios,rol,idTabla,idDivModal,idTBody){
		$.post(urlBase+"index.php/dashboard_c/traerUsuariosEstudios", {
		estudios : estudios,
		rol: rol
	    }, function(data) {
	        // console.log(data);
	        usuarios = JSON.parse(data);
	        console.info(usuarios);

	        // Arreglo de meses 
	        var meses = new Array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");


			$.each(usuarios, function(key,value){

				// Cambiamos la fecha al formato DD/MM/YYYY
				var fechaH = new Date(value.fecha);
				fecha = (fechaH.getDate()+1)+' / '+meses[fechaH.getMonth('MM')]+' / '+fechaH.getFullYear();
	        	var filas = "";
			    // console.log(key+':'+value.nomEstado);

			    // Agregamos los usuarios en la tabla
			    
			    filas += "<tr><td>" +value.Nombre+" "+value.aPaterno+" "+value.aMaterno+"</td>";
	            filas += "<td><div id='archivos"+value.IdUsuario+"' class='row'></div><div class='hide'>"+value.valorDocs+"</div></td>";
	            filas += "<td>"+fecha+"</td></tr>";

	            // Inyectamos la tabla al DOM
				$('#'+idTBody).append(filas);

				// Botones para los archivos
				$('#archivos'+value.IdUsuario).append("<a href='' title='Acta (Vuelta)' data-reveal-id='actaAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.actaAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.actaAtras.IdArchivo+"', 'Archivo "+value.actaAtras.IdArchivo+"', 'es','"+value.actaAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.actaAtras.color+" left'><p>A</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Acta (Frente)' data-reveal-id='actaFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.actaFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.actaFrente.IdArchivo+"', 'Archivo "+value.actaFrente.IdArchivo+"', 'es','"+value.actaFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.actaFrente.color+" left'><p>A</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Certificado (Vuelta)' data-reveal-id='certiAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.certiAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.certiAtras.IdArchivo+"', 'Archivo "+value.certiAtras.IdArchivo+"', 'es','"+value.certiAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.certiAtras.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Certificado (Frente)' data-reveal-id='certiFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.certiFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.certiFrente.IdArchivo+"', 'Archivo "+value.certiFrente.IdArchivo+"', 'es','"+value.certiFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.certiFrente.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='CURP (Frente)' data-reveal-id='curpFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.curpFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.curpFrente.IdArchivo+"', 'Archivo "+value.curpFrente.IdArchivo+"', 'es','"+value.curpFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.curpFrente.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='CV' data-reveal-id='cv"+value.IdUsuario+"'><div onclick=\"reset('"+value.cv.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.cv.IdArchivo+"', 'Archivo "+value.cv.IdArchivo+"', 'es','"+value.cv.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.cv.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='IFE (Vuelta)' data-reveal-id='ifeAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.ifeAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.ifeAtras.IdArchivo+"', 'Archivo "+value.ifeAtras.IdArchivo+"', 'es','"+value.ifeAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.ifeAtras.color+" left'><p>I</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='IFE (Frente)' data-reveal-id='ifeFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.ifeFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.ifeFrente.IdArchivo+"', 'Archivo "+value.ifeFrente.IdArchivo+"', 'es','"+value.ifeFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.ifeFrente.color+" left'><p>I</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Título (Vuelta)' data-reveal-id='tituloLicAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.tituloLicAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.tituloLicAtras.IdArchivo+"', 'Archivo "+value.tituloLicAtras.IdArchivo+"', 'es','"+value.tituloLicAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.tituloLicAtras.color+" left'><p>T</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Título (Frente)' data-reveal-id='tituloLicFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.tituloLicFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.tituloLicFrente.IdArchivo+"', 'Archivo "+value.tituloLicFrente.IdArchivo+"', 'es','"+value.tituloLicFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.tituloLicFrente.color+" left'><p>T</p></div></a>");

				//Agregamos el idModal para cada archivo
				$('#'+idDivModal).append('<div id="actaAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="actaAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="actaFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="actaFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="certiAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="certiAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="certiFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="certiFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="curpFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="curpFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="cv'+value.IdUsuario+'" class="reveal-modal" data-reveal><object id="cvImg'+value.IdUsuario+'" width="90%" height="500" type="application/pdf" data=""></object><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="ifeAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="ifeAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="ifeFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="ifeFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="tituloLicAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="tituloLicAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="tituloLicFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="tituloLicFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');

				// Agregamos el SRC para cada documento
				$('#actaAtrasImg'+value.IdUsuario).attr('src',urlBase+value.actaAtras.url);
				$('#actaAtrasImg'+value.IdUsuario).addClass(value.actaAtras.color+"Out");
				$('#actaAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#actaFrenteImg'+value.IdUsuario).attr('src',urlBase+value.actaFrente.url);
				$('#actaFrenteImg'+value.IdUsuario).addClass(value.actaFrente.color+"Out");
				$('#actaFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#certiAtrasImg'+value.IdUsuario).attr('src',urlBase+value.certiAtras.url);
				$('#certiAtrasImg'+value.IdUsuario).addClass(value.certiAtras.color+"Out");
				$('#certiAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#certiFrenteImg'+value.IdUsuario).attr('src',urlBase+value.certiFrente.url);
				$('#certiFrenteImg'+value.IdUsuario).addClass(value.certiFrente.color+"Out");
				$('#certiFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#curpFrenteImg'+value.IdUsuario).attr('src',urlBase+value.curpFrente.url);
				$('#curpFrenteImg'+value.IdUsuario).addClass(value.curpFrente.color+"Out");
				$('#curpFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#cvImg'+value.IdUsuario).attr('data',urlBase+value.cv.url);
				$('#cvImg'+value.IdUsuario).addClass(value.cv.color+"Out");
				$('#cvImg'+value.IdUsuario).addClass("large-12");

				$('#ifeAtrasImg'+value.IdUsuario).attr('src',urlBase+value.ifeAtras.url);
				$('#ifeAtrasImg'+value.IdUsuario).addClass(value.ifeAtras.color+"Out");
				$('#ifeAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#ifeFrenteImg'+value.IdUsuario).attr('src',urlBase+value.ifeFrente.url);
				$('#ifeFrenteImg'+value.IdUsuario).addClass(value.ifeFrente.color+"Out");
				$('#ifeFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#tituloLicAtrasImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicAtras.url);
				$('#tituloLicAtrasImg'+value.IdUsuario).addClass(value.tituloLicAtras.color+"Out");
				$('#tituloLicAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#tituloLicFrenteImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicFrente.url);
				$('#tituloLicFrenteImg'+value.IdUsuario).addClass(value.tituloLicFrente.color+"Out");
				$('#tituloLicFrenteImg'+value.IdUsuario).addClass("large-12");

				// Agregamos el menú para revisar los documentos
				
				if((value.actaAtras.color) != 'vacia'){
					$('#actaAtrasImg'+value.IdUsuario).before('<div id="menu'+value.actaAtras.IdArchivo+'" class="large-12 row smnall-12 columns pbtm"></div>');
					$('#menu'+value.actaAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Acta de nacimiento (Vuelta)</h5></div></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='acepta"+value.actaAtras.IdArchivo+"' class='large-3 small-3 columns btn btn-aceptar'>Aceptar</div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.actaAtras.IdArchivo+"' target='_blank' class='btn btn-print'>Descargar</a>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='rechaza"+value.actaAtras.IdArchivo+"' class='large-3 small-3 columns btn btn-rechazar'>Rechazar</div>");
					$('#actaAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}
				
				$('#acepta'+value.actaAtras.IdArchivo).on('click',function(){
					var idArchivo = value.actaAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				$('#rechaza'+value.actaAtras.IdArchivo).on('click',function(){
					var idArchivo = value.actaAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.actaFrente.color) != 'vacia'){
					$('#actaFrenteImg'+value.IdUsuario).before('<div id="menu'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.actaFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Acta de nacimiento (Frente)</h5></div></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='acepta"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.actaFrente.IdArchivo+"' target='_blank' >Descargar</a>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='rechaza"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#actaFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.actaFrente.IdArchivo).on('click',function(){
					var idArchivo = value.actaFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.actaFrente.IdArchivo).on('click',function(){
					var idArchivo = value.actaFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.certiFrente.color) != 'vacia'){
					$('#certiFrenteImg'+value.IdUsuario).before('<div id="menu'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.certiFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Certificado (Frente)</h5></div></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='acepta"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.certiFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='rechaza"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#certiFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.certiFrente.IdArchivo).on('click',function(){
					var idArchivo = value.certiFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.certiFrente.IdArchivo).on('click',function(){
					var idArchivo = value.certiFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.certiAtras.color) != 'vacia'){
					$('#certiAtrasImg'+value.IdUsuario).before('<div id="menu'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.certiAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Certificado (Vuelta)</h5></div></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='acepta"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.certiAtras.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='rechaza"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#certiAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
					// $('#disqus'+value.certiAtras.IdArchivo).append("<p>DISQUS certi vuelta</p>");
				}
				$('#acepta'+value.certiAtras.IdArchivo).on('click',function(){
					var idArchivo = value.certiAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.certiAtras.IdArchivo).on('click',function(){
					var idArchivo = value.certiAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.curpFrente.color) != 'vacia'){
					$('#curpFrenteImg'+value.IdUsuario).before('<div id="menu'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.curpFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>CURP (Frente)</h5></div></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='acepta"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.curpFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='rechaza"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#curpFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.curpFrente.IdArchivo).on('click',function(){
					var idArchivo = value.curpFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.curpFrente.IdArchivo).on('click',function(){
					var idArchivo = value.curpFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.cv.color) != 'vacia'){
					$('#cvImg'+value.IdUsuario).before('<div id="menu'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.cv.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Curriculum Vitae</h5></div></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='acepta"+value.cv.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.cv.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+value.cv.url+"' target='_blank'>Descargar</a></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='rechaza"+value.cv.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#cvImg'+value.IdUsuario).after('<div id="disqus'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.cv.IdArchivo).on('click',function(){
					var idArchivo = value.cv.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.cv.IdArchivo).on('click',function(){
					var idArchivo = value.cv.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.ifeAtras.color) != 'vacia'){
					$('#ifeAtrasImg'+value.IdUsuario).before('<div id="menu'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.ifeAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>IFE (Vuelta)</h5></div></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='acepta"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.ifeAtras.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='rechaza"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#ifeAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.ifeAtras.IdArchivo).on('click',function(){
					var idArchivo = value.ifeAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.ifeAtras.IdArchivo).on('click',function(){
					var idArchivo = value.ifeAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.ifeFrente.color) != 'vacia'){
					$('#ifeFrenteImg'+value.IdUsuario).before('<div id="menu'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.ifeFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>IFE (Frente)</h5></div></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='acepta"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.ifeFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='rechaza"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#ifeFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.ifeFrente.IdArchivo).on('click',function(){
					var idArchivo = value.ifeFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.ifeFrente.IdArchivo).on('click',function(){
					var idArchivo = value.ifeFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.tituloLicAtras.color) != 'vacia'){
					$('#tituloLicAtrasImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Título de Licenciatura (Vuelta)</h5></div></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='acepta"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.tituloLicAtras.IdArchivo+"' target='_blank'class='btn btn-aceptar'>Descargar</a>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='rechaza"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#tituloLicAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.tituloLicAtras.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.tituloLicAtras.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.tituloLicFrente.color) != 'vacia'){
					$('#tituloLicFrenteImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Título de Licenciatura (Frente)</h5></div></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='acepta"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.tituloLicFrente.IdArchivo+"' target='_blank'class='btn btn-aceptar'>Descargar</a>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='rechaza"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#tituloLicFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.tituloLicFrente.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.tituloLicFrente.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				var nombreArchivos = new Array('actaAtras','actaFrente','certiFrente','certiAtras','curpFrente','cv','ifeAtras','ifeFrente','tituloLicAtras','tituloLicFrente');

			});
			// Inicializamos el DataTable
		    $('#'+idTabla).DataTable({
		    	"language": {
		                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        },
		        "order": [[ 2, "desc" ]]
		    });
		    // Reflow de foundation al modificar el DOM con jQuery
			$(document).foundation();
	    });

	}

	function llenarTablaAceptados(rol,idTabla,idDivModal,idTBody){
		$.post(urlBase+"index.php/dashboard_c/traerUsuariosEstudiosAceptados", {
			rol: rol
	    }, function(data) {
	    	// console.log(data);
	        usuarios = JSON.parse(data);
	        console.info(usuarios);

	        // Arreglo de meses 
	        var meses = new Array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");


			$.each(usuarios, function(key,value){

				// Cambiamos la fecha al formato DD/MM/YYYY
				var fechaH = new Date(value.fecha);
				fecha = (fechaH.getDate()+1)+' / '+meses[fechaH.getMonth('MM')]+' / '+fechaH.getFullYear();
				var fechaN = new Date(value.fech);
				fechaN1 = (fechaN.getDate()+1)+' / '+meses[fechaN.getMonth('MM')]+' / '+fechaN.getFullYear();
	        	var filas = "";
	        	if(value.Estudios != 'México'){
	        		var nacionalidad = 'Extranjero';
	        	}else{
	        		var nacionalidad = 'México';
	        	}
	        	var tipoInst = "";

	        	switch(value.TipoInstProcedencia){
	        		case "1":
	        			tipoInst = "IPN";
	        			break;
	        		case "2":
	        			tipoInst = "UAM";
	        			break;
	        		case "3":
	        			tipoInst = "Universidad Estatal";
	        			break;
	        		case "4":
	        			tipoInst = "Incorporada a laUniversidad Estatal";
	        			break;
	        		case "5":
	        			tipoInst = "UNAM";
	        			break;
	        		case "6":
	        			tipoInst = "Incorporada a la UNAM";
	        			break;
	        		case "7":
	        			tipoInst = "Incorporada a la SEP";
	        			break;
	        		case "8":
	        			tipoInst = value.institucionProcedenciaOtra;
	        			break;

	        	}

	        	var uestu = "";

	        	switch(value.UnivelEstudio){
	        		case "1":
	        			uestu = "Licenciatura "+value.nombEstudio;
	        			break;
	        		case "2":
	        			uestu = "Especialización "+value.nombEstudio;
	        			break;
	        		case "3":
	        			uestu = "Maestría "+value.nombEstudio;
	        			break;
	        		
	        	}
	        	console.log(value);
	        	var semblanza = "<b>Semblanza</b><br>";
	        	semblanza += "Nombre: "+value.Nombre+" "+value.aPaterno+" "+value.aMaterno+"<br>";
	        	semblanza += "Correo electrónico: "+value.email+"<br>";
	        	semblanza += "Nacionalidad: "+value.nacionalidad+"<br>";
	        	semblanza += "Lugar de nacimiento: "+value.lugarNAc+"<br>";
	        	semblanza += "CURP: "+value.CURP+"<br>";
	        	semblanza += "Fecha de nacimiento: "+fechaN1+"<br>";
	        	semblanza += "Calle: "+value.Calle+"<br>";
	        	semblanza += "Número ext: "+value.NumExterior+"<br>";
	        	semblanza += "Número int: "+value.NumInterior+"<br>";
	        	semblanza += "Colonia: "+value.Colonia+"<br>";
	        	semblanza += "CP: "+value.CP+"<br>";
	        	semblanza += "RFC: "+value.RFC+"<br>";
	        	semblanza += "Teléfono: "+value.Telefono+"<br>";
	        	semblanza += "Institución de procendencia: "+tipoInst+"<br>";
	        	semblanza += "Último nivel de estudios: "+uestu+"<br>";
	        	semblanza += "Promedio: "+value.Prom+"<br>";
	        	semblanza += "Nivel de estudios solicitado: "+value.NivEstudio+"<br>";
	        	semblanza += "Nombre del posgrado: "+value.NomPosgrado+"<br>";
	        	semblanza += "Motivos: "+value.motivos+"<br>";
	        	semblanza += "Interés: "+value.interes+"<br>";
	        	semblanza += "Descripción del proyecto que desea desarrollar: "+value.proyecto+"<br>";

			    // Agregamos los usuarios en la tabla
			    
			    filas += "<tr><td><a href='' data-reveal-id='semblanza"+value.IdUsuario+"' href='#'>" +value.Nombre+" "+value.aPaterno+" "+value.aMaterno+"</a></td>";
	            filas += "<td><div id='archivos"+value.IdUsuario+"' class='row'></div><div class='hide'>"+value.valorDocs+"</div></td>";
	            filas += "<td>"+nacionalidad+"</td></tr>";

	            // Inyectamos la tabla al DOM
				$('#'+idTBody).append(filas);

				// Botones para los archivos
				$('#archivos'+value.IdUsuario).append("<a href='' title='Acta (Vuelta)' data-reveal-id='actaAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.actaAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.actaAtras.IdArchivo+"', 'Archivo "+value.actaAtras.IdArchivo+"', 'es','"+value.actaAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.actaAtras.color+" left'><p>A</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Acta (Frente)' data-reveal-id='actaFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.actaFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.actaFrente.IdArchivo+"', 'Archivo "+value.actaFrente.IdArchivo+"', 'es','"+value.actaFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.actaFrente.color+" left'><p>A</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Certificado (Vuelta)' data-reveal-id='certiAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.certiAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.certiAtras.IdArchivo+"', 'Archivo "+value.certiAtras.IdArchivo+"', 'es','"+value.certiAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.certiAtras.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Certificado (Frente)' data-reveal-id='certiFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.certiFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.certiFrente.IdArchivo+"', 'Archivo "+value.certiFrente.IdArchivo+"', 'es','"+value.certiFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.certiFrente.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='CURP (Frente)' data-reveal-id='curpFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.curpFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.curpFrente.IdArchivo+"', 'Archivo "+value.curpFrente.IdArchivo+"', 'es','"+value.curpFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.curpFrente.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='CV' data-reveal-id='cv"+value.IdUsuario+"'><div onclick=\"reset('"+value.cv.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.cv.IdArchivo+"', 'Archivo "+value.cv.IdArchivo+"', 'es','"+value.cv.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.cv.color+" left'><p>C</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='IFE (Vuelta)' data-reveal-id='ifeAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.ifeAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.ifeAtras.IdArchivo+"', 'Archivo "+value.ifeAtras.IdArchivo+"', 'es','"+value.ifeAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.ifeAtras.color+" left'><p>I</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='IFE (Frente)' data-reveal-id='ifeFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.ifeFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.ifeFrente.IdArchivo+"', 'Archivo "+value.ifeFrente.IdArchivo+"', 'es','"+value.ifeFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.ifeFrente.color+" left'><p>I</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Título (Vuelta)' data-reveal-id='tituloLicAtras"+value.IdUsuario+"'><div onclick=\"reset('"+value.tituloLicAtras.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.tituloLicAtras.IdArchivo+"', 'Archivo "+value.tituloLicAtras.IdArchivo+"', 'es','"+value.tituloLicAtras.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.tituloLicAtras.color+" left'><p>T</p></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' title='Título (Frente)' data-reveal-id='tituloLicFrente"+value.IdUsuario+"'><div onclick=\"reset('"+value.tituloLicFrente.IdArchivo+"', 'http://localhost/cge/dashboard_c/"+value.tituloLicFrente.IdArchivo+"', 'Archivo "+value.tituloLicFrente.IdArchivo+"', 'es','"+value.tituloLicFrente.IdArchivo+"');\" class='large-2 small-2 columns circulo "+value.tituloLicFrente.color+" left'><p>T</p></div></a>");

				//Agregamos el idModal para cada archivo
				$('#'+idDivModal).append('<div id="actaAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="actaAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="actaFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="actaFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="certiAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="certiAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="certiFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="certiFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="curpFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="curpFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="cv'+value.IdUsuario+'" class="reveal-modal" data-reveal><object id="cvImg'+value.IdUsuario+'" width="90%" height="500" type="application/pdf" data=""></object><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="ifeAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="ifeAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="ifeFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="ifeFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="tituloLicAtras'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="tituloLicAtrasImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');
				$('#'+idDivModal).append('<div id="tituloLicFrente'+value.IdUsuario+'" class="reveal-modal" data-reveal><img id="tituloLicFrenteImg'+value.IdUsuario+'" src="" alt=""><a class="close-reveal-modal">&#215;</a></div>');

				$('#modalDivsInfoAcept').append('<div id="semblanza'+value.IdUsuario+'" class="reveal-modal" data-reveal>'+semblanza+'<a class="close-reveal-modal">&#215;</a></div>');
				$('#semblanza'+value.IdUsuario).append('<div><a href="'+urlBase+value.cv.url+'" target="_blank" class="button radius">Descargar CV</a><div>');

				// Agregamos el SRC para cada documento
				$('#actaAtrasImg'+value.IdUsuario).attr('src',urlBase+value.actaAtras.url);
				$('#actaAtrasImg'+value.IdUsuario).addClass(value.actaAtras.color+"Out");
				$('#actaAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#actaFrenteImg'+value.IdUsuario).attr('src',urlBase+value.actaFrente.url);
				$('#actaFrenteImg'+value.IdUsuario).addClass(value.actaFrente.color+"Out");
				$('#actaFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#certiAtrasImg'+value.IdUsuario).attr('src',urlBase+value.certiAtras.url);
				$('#certiAtrasImg'+value.IdUsuario).addClass(value.certiAtras.color+"Out");
				$('#certiAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#certiFrenteImg'+value.IdUsuario).attr('src',urlBase+value.certiFrente.url);
				$('#certiFrenteImg'+value.IdUsuario).addClass(value.certiFrente.color+"Out");
				$('#certiAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#curpFrenteImg'+value.IdUsuario).attr('src',urlBase+value.curpFrente.url);
				$('#curpFrenteImg'+value.IdUsuario).addClass(value.curpFrente.color+"Out");
				$('#curpFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#cvImg'+value.IdUsuario).attr('data',urlBase+value.cv.url);
				$('#cvImg'+value.IdUsuario).addClass(value.cv.color+"Out");
				$('#cvImg'+value.IdUsuario).addClass("large-12");

				$('#ifeAtrasImg'+value.IdUsuario).attr('src',urlBase+value.ifeAtras.url);
				$('#ifeAtrasImg'+value.IdUsuario).addClass(value.ifeAtras.color+"Out");
				$('#ifeAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#ifeFrenteImg'+value.IdUsuario).attr('src',urlBase+value.ifeFrente.url);
				$('#ifeFrenteImg'+value.IdUsuario).addClass(value.ifeFrente.color+"Out");
				$('#ifeFrenteImg'+value.IdUsuario).addClass("large-12");

				$('#tituloLicAtrasImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicAtras.url);
				$('#tituloLicAtrasImg'+value.IdUsuario).addClass(value.tituloLicAtras.color+"Out");
				$('#tituloLicAtrasImg'+value.IdUsuario).addClass("large-12");

				$('#tituloLicFrenteImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicFrente.url);
				$('#tituloLicFrenteImg'+value.IdUsuario).addClass(value.tituloLicFrente.color+"Out");
				$('#tituloLicFrenteImg'+value.IdUsuario).addClass("large-12");

				// Agregamos el menú para revisar los documentos
				
				if((value.actaAtras.color) != 'vacia'){
					$('#actaAtrasImg'+value.IdUsuario).before('<div id="menu'+value.actaAtras.IdArchivo+'" class="large-12 row smnall-12 columns pbtm"></div>');
					$('#menu'+value.actaAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Acta de nacimiento (Vuelta)</h5></div></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='acepta"+value.actaAtras.IdArchivo+"' class='large-3 small-3 columns btn btn-aceptar'>Aceptar</div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.actaAtras.IdArchivo+"' target='_blank' class='btn btn-print'>Descargar</a>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='rechaza"+value.actaAtras.IdArchivo+"' class='large-3 small-3 columns btn btn-rechazar'>Rechazar</div>");
					$('#actaAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}
				
				$('#acepta'+value.actaAtras.IdArchivo).on('click',function(){
					var idArchivo = value.actaAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				$('#rechaza'+value.actaAtras.IdArchivo).on('click',function(){
					var idArchivo = value.actaAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.actaFrente.color) != 'vacia'){
					$('#actaFrenteImg'+value.IdUsuario).before('<div id="menu'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.actaFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Acta de nacimiento (Frente)</h5></div></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='acepta"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.actaFrente.IdArchivo+"' target='_blank' >Descargar</a>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='rechaza"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#actaFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.actaFrente.IdArchivo).on('click',function(){
					var idArchivo = value.actaFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.actaFrente.IdArchivo).on('click',function(){
					var idArchivo = value.actaFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.certiFrente.color) != 'vacia'){
					$('#certiFrenteImg'+value.IdUsuario).before('<div id="menu'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.certiFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Certificado (Frente)</h5></div></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='acepta"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.certiFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='rechaza"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#certiFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.certiFrente.IdArchivo).on('click',function(){
					var idArchivo = value.certiFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.certiFrente.IdArchivo).on('click',function(){
					var idArchivo = value.certiFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.certiAtras.color) != 'vacia'){
					$('#certiAtrasImg'+value.IdUsuario).before('<div id="menu'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.certiAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Certificado (Vuelta)</h5></div></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='acepta"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.certiAtras.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='rechaza"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#certiAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
					// $('#disqus'+value.certiAtras.IdArchivo).append("<p>DISQUS certi vuelta</p>");
				}
				$('#acepta'+value.certiAtras.IdArchivo).on('click',function(){
					var idArchivo = value.certiAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.certiAtras.IdArchivo).on('click',function(){
					var idArchivo = value.certiAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.curpFrente.color) != 'vacia'){
					$('#curpFrenteImg'+value.IdUsuario).before('<div id="menu'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.curpFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>CURP (Frente)</h5></div></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='acepta"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.curpFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='rechaza"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#curpFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.curpFrente.IdArchivo).on('click',function(){
					var idArchivo = value.curpFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.curpFrente.IdArchivo).on('click',function(){
					var idArchivo = value.curpFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.cv.color) != 'vacia'){
					$('#cvImg'+value.IdUsuario).before('<div id="menu'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.cv.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Curriculum Vitae</h5></div></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='acepta"+value.cv.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.cv.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+value.cv.url+"' target='_blank'>Descargar</a></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='rechaza"+value.cv.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#cvImg'+value.IdUsuario).after('<div id="disqus'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.cv.IdArchivo).on('click',function(){
					var idArchivo = value.cv.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.cv.IdArchivo).on('click',function(){
					var idArchivo = value.cv.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.ifeAtras.color) != 'vacia'){
					$('#ifeAtrasImg'+value.IdUsuario).before('<div id="menu'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.ifeAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>IFE (Vuelta)</h5></div></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='acepta"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.ifeAtras.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='rechaza"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#ifeAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.ifeAtras.IdArchivo).on('click',function(){
					var idArchivo = value.ifeAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.ifeAtras.IdArchivo).on('click',function(){
					var idArchivo = value.ifeAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.ifeFrente.color) != 'vacia'){
					$('#ifeFrenteImg'+value.IdUsuario).before('<div id="menu'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.ifeFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>IFE (Frente)</h5></div></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='acepta"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.ifeFrente.IdArchivo+"' target='_blank'>Descargar</a>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='rechaza"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#ifeFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.ifeFrente.IdArchivo).on('click',function(){
					var idArchivo = value.ifeFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				
				$('#rechaza'+value.ifeFrente.IdArchivo).on('click',function(){
					var idArchivo = value.ifeFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.tituloLicAtras.color) != 'vacia'){
					$('#tituloLicAtrasImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Título de Licenciatura (Vuelta)</h5></div></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='acepta"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.tituloLicAtras.IdArchivo+"' target='_blank'class='btn btn-aceptar'>Descargar</a>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='rechaza"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#tituloLicAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.tituloLicAtras.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.tituloLicAtras.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicAtras.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				if((value.tituloLicFrente.color) != 'vacia'){
					$('#tituloLicFrenteImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns pbtm"></div>');
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div class='row'><div class='large-12 small-12 pbtm'><h5>Título de Licenciatura (Frente)</h5></div></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='acepta"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-aceptar left'>Aceptar</div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<a class='large-3 small-3 columns btn btn-print' href='"+urlBase+"dashboard_c/documentoPdf/"+value.tituloLicFrente.IdArchivo+"' target='_blank'class='btn btn-aceptar'>Descargar</a>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='rechaza"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns btn btn-rechazar right'>Rechazar</div>");
					$('#tituloLicFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns ptop"></div>');
				}

				$('#acepta'+value.tituloLicFrente.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/aceptarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});
				$('#rechaza'+value.tituloLicFrente.IdArchivo).on('click',function(){
					var idArchivo = value.tituloLicFrente.IdArchivo;
					$.post(urlBase+"index.php/dashboard_c/rechazarDocumento", {
						idArchivo:idArchivo
				    }, function(data) {
				    	console.log(data);
				    	location.reload();
				    });
				});

				var nombreArchivos = new Array('actaAtras','actaFrente','certiFrente','certiAtras','curpFrente','cv','ifeAtras','ifeFrente','tituloLicAtras','tituloLicFrente');

			});
			// Inicializamos el DataTable
		    $('#'+idTabla).DataTable({
		    	"language": {
		                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        },
		        "order": [[ 2, "desc" ]]
		    });
		    // Reflow de foundation al modificar el DOM con jQuery
			$(document).foundation();
	    });
	}

	function llenarTablaSinInter(rol,idTabla,idDivModal,idTBody){
		$.post(urlBase+"index.php/dashboard_c/traerUsuariosEstudiosSinInter", {
			rol: rol
	    }, function(data) {
	    	// console.log(data);
	        usuarios = JSON.parse(data);
	        // console.info(usuarios);

	        // Arreglo de meses 
	        var meses = new Array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");


			$.each(usuarios, function(key,value){

				// Cambiamos la fecha al formato DD/MM/YYYY
				var fechaH = new Date(value.fecha);
				fecha = (fechaH.getDate()+1)+' / '+meses[fechaH.getMonth('MM')]+' / '+fechaH.getFullYear();
	        	var filas = "";
	        	if(value.nacionalidad != 'Mexicana'){
	        		var nacionalidad = 'Extranjero';
	        	}else{
	        		var nacionalidad = 'México';
	        	}

			    // console.log(key+':'+value.nomEstado);

			    // Agregamos los usuarios en la tabla
			    
			    filas += "<tr><td>" +value.Nombre+" "+value.aPaterno+" "+value.aMaterno+"</td>";
	            filas += "<td><div id='archivos"+value.IdUsuario+"' class='row'></div><div>"+value.email+"</div></td>";
	            filas += "<td>"+nacionalidad+"</td></tr>";

	            // Inyectamos la tabla al DOM
				$('#'+idTBody).append(filas);

				
			});
			// Inicializamos el DataTable
		    $('#'+idTabla).DataTable({
		    	"language": {
		                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		        },
		        "order": [[ 2, "desc" ]]
		    });
		    // Reflow de foundation al modificar el DOM con jQuery
			$(document).foundation();
	    });
	}
});