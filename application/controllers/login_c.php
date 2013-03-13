<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Login_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
	        $this->load->library('session');			
	   	}

	    function index($msg = NULL){
	    	$data['msg'] = $msg;
	 		$this->load->view('login_v',$data);
	    }
		
		/* Esta función verifica que el usuario y contraseña existan, también crea la sesión en php*/
		function verifica()
		{
			$credenciales = $_POST;
			if(isset($credenciales)){
				
				$verifica = $this->usuarios_m->verificaUsuario($credenciales);
				
				/* Si el usuario está verificado y aceptado entonces crea la sesión
				 * de lo contrario manda un mensaje de error y vuelve a la vista de login
				 * */
				if ($verifica == '1'){
					$newdata = array(
		                   'usr'  => $credenciales['usuario'],
		                   'pass'     => $credenciales['password'],
		                   'logged_in' => TRUE
		         	);
					
					$this->session->set_userdata($newdata);	
				
					$_SESSION =	$this->session->all_userdata();
					
					if(!empty($_SESSION['usr'])){
					redirect('menuRegistro_c/principal/'.$credenciales['usuario']);
					}	
				} else {
					
					//$this->session->sess_destroy();
	        		$msg = '<label class="error offset-by-one">Nombre de usuario y/o contraseña incorrectos</label><br>';
					$this->reiniciarSesion($msg);
				}
				
			}
			
		}
		
		/* Esta función destruye la sesión*/
		public function reiniciarSesion($msg = NULL){
		
			$this->session->sess_destroy();	
	        $this->index($msg);
		}

	}    
?>