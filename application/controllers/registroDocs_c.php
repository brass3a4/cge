<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class RegistroDocs_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        //$this->load->model('login_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

	    function index(){
	 		$this->load->view('registroDocs_v',NULL);
	    }
		
		function imprimeDatos()
		{
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
		}
	

	}  
?>