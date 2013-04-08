<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Cursos_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
			$this->is_logged_in();	        			
	   	}

		private function is_logged_in(){
			$logged_in = $this->session->userdata('logged_in');
			if(!isset($logged_in) or $logged_in != TRUE){
				redirect(base_url().'login_c');
			}
		}
		function index(){
	    	$this->listaCursos();
	    }
		
		function listaCursos($idUsuario)
		{
			$data['idUsuario']= $idUsuario;
			
			// vista con la lista de cursos seleccionables para compra
			$this->load->view('listaCursos_v',$data);
		}
		
		function carritoCursos()
		{
			foreach ($_POST as $key => $value) {
				if ($key == 'idUsuario') {
					$data[$key]=$value;
				}else{
					$data['datos'][$key]=$value;
				}
			}
			// vista con la lista de cursos seleccionables para compra
			$this->load->view('carritoCursos_v',$data);
		}
		
		function generaOrdenPago(){
			
			$data['idUsuario'] = $_POST['idUsuario'];
			$data['datos'] = unserialize($_POST['datos']);
			$data['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($_POST['idUsuario']);
			//Se guardan los datos para generar la orden de pago con lo datos seleccionados
			
			
			// Vista con la orden de pago
			$this->load->view('ordenPago_v',$data);
			
						
		}

	}    
?>