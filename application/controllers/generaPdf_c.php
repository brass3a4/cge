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
	    	$this->headers();
	    }
		
		function crear($usuario = NULL)
		{
			
			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			if($idUsuario != '0'){
				
				$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				print_r($datos['usuario']);
				
				$usr = $datos['usuario'];
				// $contenido = 'Estimado profesor: '.$datos['Nombre'].' '.$datos['aPaterno'].' '.$datos['aMaterno'].', su preregistro y solicitud de ingreso al Diplomado Virtual:\n 
				// "Formación docente en la enseñanza escolarizada de inglés para niños" ha realizado con exito:\n
                                        // Su número de solicitud es: 1\n
                                        // Su usuario y contraseña asignados son:\n
                                        // Usuario: '.$usuario.'\n
                                        // contraseña:'.$datos['password'];				
				$contenido = $usr;
				$this->cezpdf->ezText($contenido , 15, array('justification' => 'center'));
				
				$this->cezpdf->ezStream();
		 	}
		}		
	
	

	}    
?>