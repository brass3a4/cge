$(document).on('ready', function(){
	if(bowser.msie){
		$('#cuerpoLogin').html('<div id="msj" class="twelve-12 columns"><p>Le pedimos que actualice la versión de su navegador para hacer uso de este sitio de manera óptima.  Los navegadores que le sugerimos utilizar, son: Chrome, Mozilla Firefox, Safari y Opera.</p></div>');
	}
	if(bowser.firefox && bowser.version < 30){
		$('#cuerpoLogin').html('<div id="msj" class="twelve-12 columns"><p>Le pedimos que actualice la versión de su navegador para hacer uso de este sitio de manera óptima.  Los navegadores que le sugerimos utilizar, son: Chrome, Mozilla Firefox, Safari y Opera.</p></div>');
	}
	if(bowser.chrome && bowser.version < 30){
		$('#cuerpoLogin').html('<div id="msj" class="twelve-12 columns"><p>Le pedimos que actualice la versión de su navegador para hacer uso de este sitio de manera óptima.  Los navegadores que le sugerimos utilizar, son: Chrome, Mozilla Firefox, Safari y Opera.</p></div>');
	}
});