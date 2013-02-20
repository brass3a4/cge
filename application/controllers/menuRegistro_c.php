<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class MenuRegistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

	    function index($verifica = NULL){
	    	$data['valor'] = $verifica;
	 		$this->load->view('menuRegistro_v',$data);
	    }
		
		function cargaDocs()
		{
			$this->load->view('registroDocs_v',NULL);
		}
		
		function cargarPDF()
		{
			echo "<pre>";
			print_r($_FILES);
			echo "</pre>";
			$this->index(1);
		}
	}    
?>