<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Login_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
	        $this->load->library('session');			
	   	}

	   	function diplomado($msg = NULL){
	    	$data['msg'] = $msg;
	 		$this->load->view('loginD_v',$data);
	    }

	    function posgrado($msg = NULL){
	    	$data['msg'] = $msg;
	 		$this->load->view('loginP_v',$data);
	    }

	    function index($msg = NULL){
	    	$data['msg'] = $msg;
	 		$this->load->view('login_v',$data);
	    }
		
		/* Esta función verifica que el usuario y contraseña existan, también crea la sesión en php*/
		function verifica()
		{
			$credenciales = $_POST;
			$credenciales['usuario'] = trim($credenciales['usuario']);
			$credenciales['password'] = trim($credenciales['password']);

			if(isset($credenciales)){
				
				$verifica = $this->usuarios_m->verificaUsuario($credenciales);
				
				/* Si el usuario está verificado y aceptado entonces crea la sesión
				 * de lo contrario manda un mensaje de error y vuelve a la vista de login
				 * */
				if ($verifica != '0'){
					$newdata = array(
						   'idUsuario' => $verifica,
		                   'usr'  => $credenciales['usuario'],
		                   'pass'     => $credenciales['password'],
		                   'logged_in' => TRUE
		         	);
					
					$this->session->set_userdata($newdata);	
				
					$_SESSION =	$this->session->all_userdata();
					
					if(!empty($_SESSION['usr'])){
					redirect('perfil_c');
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