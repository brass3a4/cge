<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Preregistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        //$this->load->model('login_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

	    function index(){
	 		$this->load->view('preregistroGeneral_v',NULL);
	    }
		
		
		function preDatos()
		{
			$data['datos'] = $_POST;
			$this->load->view('preDatos_v',$data);
		}
		
		function guardaDatos()
		{
			$this->load->view('registroDocs_v',NULL);
		}

	}  
?>