<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class MenuRegistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

		function index($verifica = NULL){
	    	$this->principal(NULL);
	    }
		
		function principal($usr = NULL)
		{
				
			$data['usuario'] = $usr;
			$data['valor']='1';
			$this->load->view('menuRegistro_v',$data);
		}
	   
		
		function cargaDocs($usuario)
		{
			$data['usuario'] = $usuario;	
			$this->load->view('registroDocs_v',$data);
		}
		
		function cargarPDF($usuario)
		{
			print_r($usuario);
			echo "<pre>";
			print_r($_FILES);
			echo "</pre>";
			
			$ruta = exec('pwd');
			
			$creaDir = 'mkdir '.$ruta.'/statics/docs/'.$usuario;
			exec($creaDir,$var);
			
			$cambiaPer = 'chmod 777 '.$ruta.'/statics/docs/'.$usuario;
			exec($cambiaPer,$var);

			$creaArch = 'touch '.$ruta.'/statics/docs/'.$usuario.'/archivo.txt';
			exec($creaArch,$var);
			echo 'ok';
			
		}
	}    
?>