$(document).on('ready',function(){

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
	            filas += "<td><div id='archivos"+value.IdUsuario+"' class='row'></div><div>"+value.valorDocs+"</div></td>";
	            filas += "<td>"+fecha+"</td></tr>";

	            // Inyectamos la tabla al DOM
				$('#'+idTBody).append(filas);

				// Botones para los archivos
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='actaAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.actaAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='actaFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.actaFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='certiAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.certiAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='certiFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.certiFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='curpFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.curpFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='cv"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.cv.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='ifeAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.ifeAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='ifeFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.ifeFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='tituloLicAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.tituloLicAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='tituloLicFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.tituloLicFrente.color+" left'></div></a>");

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
				$('#actaFrenteImg'+value.IdUsuario).attr('src',urlBase+value.actaFrente.url);
				$('#certiAtrasImg'+value.IdUsuario).attr('src',urlBase+value.certiAtras.url);
				$('#certiFrenteImg'+value.IdUsuario).attr('src',urlBase+value.certiFrente.url);
				$('#curpFrenteImg'+value.IdUsuario).attr('src',urlBase+value.curpFrente.url);
				$('#cvImg'+value.IdUsuario).attr('data',urlBase+value.cv.url);
				$('#ifeAtrasImg'+value.IdUsuario).attr('src',urlBase+value.ifeAtras.url);
				$('#ifeFrenteImg'+value.IdUsuario).attr('src',urlBase+value.ifeFrente.url);
				$('#tituloLicAtrasImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicAtras.url);
				$('#tituloLicFrenteImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicFrente.url);

				// Agregamos el menú para revisar los documentos
				
				if((value.actaAtras.color) != 'vacia'){
					$('#actaAtrasImg'+value.IdUsuario).before('<div id="menu'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.actaAtras.IdArchivo).append("<h5>Acta de nacimiento (Vuelta)</h5>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='acepta"+value.actaAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='rechaza"+value.actaAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#actaAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.actaAtras.IdArchivo).append("<p></div><div id='disqus_thread'></div></p>");
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
					$('#actaFrenteImg'+value.IdUsuario).before('<div id="menu'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.actaFrente.IdArchivo).append("<h5>Acta de nacimiento (Frente)</h5>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='acepta"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='rechaza"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#actaFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.actaFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#certiFrenteImg'+value.IdUsuario).before('<div id="menu'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.certiFrente.IdArchivo).append("<h5>Certificado (Frente)</h5>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='acepta"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='rechaza"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#certiFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.certiFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#certiAtrasImg'+value.IdUsuario).before('<div id="menu'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.certiAtras.IdArchivo).append("<h5>Certificado (Vuelta)</h5>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='acepta"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='rechaza"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#certiAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.certiAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#curpFrenteImg'+value.IdUsuario).before('<div id="menu'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.curpFrente.IdArchivo).append("<h5>CURP (Frente)</h5>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='acepta"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='rechaza"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#curpFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.curpFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#cvImg'+value.IdUsuario).before('<div id="menu'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.cv.IdArchivo).append("<h5>Curriculum Vitae</h5>");
					$('#menu'+value.cv.IdArchivo).append("<div id='acepta"+value.cv.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='rechaza"+value.cv.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.cv.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#cvImg'+value.IdUsuario).after('<div id="disqus'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.cv.IdArchivo).append("<p>DISQUS</p>");
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
					$('#ifeAtrasImg'+value.IdUsuario).before('<div id="menu'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.ifeAtras.IdArchivo).append("<h5>IFE (Vuelta)</h5>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='acepta"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='rechaza"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#ifeAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.ifeAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#ifeFrenteImg'+value.IdUsuario).before('<div id="menu'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.ifeFrente.IdArchivo).append("<h5>IFE (Frente)</h5>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='acepta"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='rechaza"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#ifeFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.ifeFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#tituloLicAtrasImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<h5>Título de Licenciatura (Vuelta)</h5>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='acepta"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='rechaza"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#tituloLicAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.tituloLicAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#tituloLicFrenteImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<h5>Título de Licenciatura (Frente)</h5>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='acepta"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='rechaza"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#tituloLicFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.tituloLicFrente.IdArchivo).append("<p>DISQUS</p>");
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
	        	var filas = "";
	        	if(value.nacionalidad != 'Mexicana'){
	        		var nacionalidad = 'Extranjero';
	        	}else{
	        		var nacionalidad = 'México';
	        	}

			    // console.log(key+':'+value.nomEstado);

			    // Agregamos los usuarios en la tabla
			    
			    filas += "<tr><td>" +value.Nombre+" "+value.aPaterno+" "+value.aMaterno+"</td>";
	            filas += "<td><div id='archivos"+value.IdUsuario+"' class='row'></div><div>"+value.valorDocs+"</div></td>";
	            filas += "<td>"+nacionalidad+"</td></tr>";

	            // Inyectamos la tabla al DOM
				$('#'+idTBody).append(filas);

				// Botones para los archivos
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='actaAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.actaAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='actaFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.actaFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='certiAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.certiAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='certiFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.certiFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='curpFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.curpFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='cv"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.cv.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='ifeAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.ifeAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='ifeFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.ifeFrente.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='tituloLicAtras"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.tituloLicAtras.color+" left'></div></a>");
				$('#archivos'+value.IdUsuario).append("<a href='' data-reveal-id='tituloLicFrente"+value.IdUsuario+"'><div class='large-2 small-2 columns circulo "+value.tituloLicFrente.color+" left'></div></a>");

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
				$('#actaFrenteImg'+value.IdUsuario).attr('src',urlBase+value.actaFrente.url);
				$('#certiAtrasImg'+value.IdUsuario).attr('src',urlBase+value.certiAtras.url);
				$('#certiFrenteImg'+value.IdUsuario).attr('src',urlBase+value.certiFrente.url);
				$('#curpFrenteImg'+value.IdUsuario).attr('src',urlBase+value.curpFrente.url);
				$('#cvImg'+value.IdUsuario).attr('data',urlBase+value.cv.url);
				$('#ifeAtrasImg'+value.IdUsuario).attr('src',urlBase+value.ifeAtras.url);
				$('#ifeFrenteImg'+value.IdUsuario).attr('src',urlBase+value.ifeFrente.url);
				$('#tituloLicAtrasImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicAtras.url);
				$('#tituloLicFrenteImg'+value.IdUsuario).attr('src',urlBase+value.tituloLicFrente.url);

				// Agregamos el menú para revisar los documentos
				
				if((value.actaAtras.color) != 'vacia'){
					$('#actaAtrasImg'+value.IdUsuario).before('<div id="menu'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.actaAtras.IdArchivo).append("<h5>Acta de nacimiento (Vuelta)</h5>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='acepta"+value.actaAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div id='rechaza"+value.actaAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.actaAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#actaAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.actaAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.actaAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#actaFrenteImg'+value.IdUsuario).before('<div id="menu'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.actaFrente.IdArchivo).append("<h5>Acta de nacimiento (Frente)</h5>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='acepta"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div id='rechaza"+value.actaFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.actaFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#actaFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.actaFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.actaFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#certiFrenteImg'+value.IdUsuario).before('<div id="menu'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.certiFrente.IdArchivo).append("<h5>Certificado (Frente)</h5>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='acepta"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div id='rechaza"+value.certiFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.certiFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#certiFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.certiFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.certiFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#certiAtrasImg'+value.IdUsuario).before('<div id="menu'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.certiAtras.IdArchivo).append("<h5>Certificado (Vuelta)</h5>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='acepta"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div id='rechaza"+value.certiAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.certiAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#certiAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.certiAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.certiAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#curpFrenteImg'+value.IdUsuario).before('<div id="menu'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.curpFrente.IdArchivo).append("<h5>CURP (Frente)</h5>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='acepta"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div id='rechaza"+value.curpFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.curpFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#curpFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.curpFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.curpFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#cvImg'+value.IdUsuario).before('<div id="menu'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.cv.IdArchivo).append("<h5>Curriculum Vitae</h5>");
					$('#menu'+value.cv.IdArchivo).append("<div id='acepta"+value.cv.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.cv.IdArchivo).append("<div id='rechaza"+value.cv.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.cv.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#cvImg'+value.IdUsuario).after('<div id="disqus'+value.cv.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.cv.IdArchivo).append("<p>DISQUS</p>");
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
					$('#ifeAtrasImg'+value.IdUsuario).before('<div id="menu'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.ifeAtras.IdArchivo).append("<h5>IFE (Vuelta)</h5>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='acepta"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div id='rechaza"+value.ifeAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.ifeAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#ifeAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.ifeAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.ifeAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#ifeFrenteImg'+value.IdUsuario).before('<div id="menu'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.ifeFrente.IdArchivo).append("<h5>IFE (Frente)</h5>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='acepta"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div id='rechaza"+value.ifeFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.ifeFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#ifeFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.ifeFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.ifeFrente.IdArchivo).append("<p>DISQUS</p>");
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
					$('#tituloLicAtrasImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<h5>Título de Licenciatura (Vuelta)</h5>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='acepta"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div id='rechaza"+value.tituloLicAtras.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.tituloLicAtras.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#tituloLicAtrasImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicAtras.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.tituloLicAtras.IdArchivo).append("<p>DISQUS</p>");
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
					$('#tituloLicFrenteImg'+value.IdUsuario).before('<div id="menu'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<h5>Título de Licenciatura (Frente)</h5>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='acepta"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns circulo aceptado left'></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div id='rechaza"+value.tituloLicFrente.IdArchivo+"' class='large-2 small-2 columns circulo rechazado left'></div>");
					$('#menu'+value.tituloLicFrente.IdArchivo).append("<div class='large-2 small-2 columns circulo vacia left'></div>");
					$('#tituloLicFrenteImg'+value.IdUsuario).after('<div id="disqus'+value.tituloLicFrente.IdArchivo+'" class="large-12 smnall-12 columns"></div>');
					$('#disqus'+value.tituloLicFrente.IdArchivo).append("<p>DISQUS</p>");
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
	        console.info(usuarios);

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