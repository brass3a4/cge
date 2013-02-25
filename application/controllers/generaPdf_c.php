<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class GeneraPdf_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
	       	$this->load->library('cezpdf');
			//$this->load->library('email');
	        			
	   	}

	    function index($msg = NULL){
	    	//$this->crear();
	    	//$this->headers();
	    }
		
		function crear($usuario = NULL)
		{
			
			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			if($idUsuario != '0'){
				
				$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				//echo '<pre>';
				//print_r($datos);
				$contenido["cad1"] = 'Estimado profesor: ';
				$contenido['nombre'] = $datos['Nombre'].' ';
				$contenido['aPat'] = $datos['aPaterno'].' ';
				$contenido['aMat'] = $datos['aMaterno'].' ';
				$contenido['cad2'] = 'su preregistro y solicitud de ingreso al Diplomado Virtual: ';
				$contenido['cad3'] = '"Formación docente en la enseñanza escolarizada de inglés para niños" ha realizado con exito.'."\n\n";
				$contenido['soliciud'] = 'Su número de solicitud es: '.$idUsuario. "\n";
				$contenido['usuario'] = 'Usuario: '.$usuario."\n";
				$contenido['contrasena'] = 'contraseña: '.$datos['password']."\n\n\n";
				$contenido['login'] = 'Para completar tu registro por favor ingresa a: '.base_url().'login_c';			// $aPat = $datos['aPaterno'];			// $aMat = $datos['aMaterno'];
				// $pass = $datos['password'];
				// $contenido = 'Estimado profesor:'.$datos['Nombre'].$datos['aPaterno'].$datos['aMaterno'].',su preregistro y solicitud de ingreso al Diplomado Virtual:\n 
				// "Formación docente en la enseñanza escolarizada de inglés para niños" ha realizado con exito:\n
                                        // Su número de solicitud es: 1\n
                                        // Su usuario y contraseña asignados son:\n
                                        // Usuario:'.$usuario.'\n
                                        // contraseña:'.$datos['password'];                                 
                $text = "";                       				
				foreach ($contenido as $row) {
					$text = $text.$row;
				}
				 
				$this->cezpdf->ezText($text,15,array('justification' => 'full'));
				$this->cezpdf->ezSetDy(-10);
				$this->cezpdf->ezStream();
		 	}
		}		
	
	

	}    
?>