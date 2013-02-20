<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Login_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

	    function index($msg = NULL){
	    	$data['msg'] = $msg;
	 		$this->load->view('login_v',$data);
	    }
		
		function verifica()
		{
			$credenciales = $_POST;
			if(isset($credenciales)){
				
				//print_r($credenciales);
				$verifica = $this->usuarios_m->verificaUsuario($credenciales);
				
				if ($verifica == '1'){
					redirect('menuRegistro_c/');
				} else {
					
					$msg = '<label class="error">Nombre de usuario y/o contraseña incorrectos</label><br>';
					$this->index($msg);
				}
				
			}
			
		}
	
	

	}    
?>