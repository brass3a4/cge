<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Preregistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('catalogos_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

	    function index(){
	    	
			$this->preRegistro();
	 	}
		
		function preRegistro()
		{
			$datos['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$this->load->view('preregistroGeneral_v',$datos);
		}
		
		function preDatos()
		{
			
			$data['datos'] = $_POST;
			$this->load->view('preDatos_v',$data);
		}
		
		function guardaDatos()
		{
			print_r($_POST);
			$this->load->view('registroDocs_v',NULL);
		}
		
		function cargarPDF()
		{
			echo "<pre>";
				print_r($_FILES);
			echo "</pre>";
		}
	}  
?>