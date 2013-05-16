<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class AdminDocs_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('catalogos_m', 'usuarios_m')); // Load the model
	        $this->load->library('email');
	        $this->is_logged_in();			
	   	}
		
		private function is_logged_in(){
			$logged_in = $this->session->userdata('logged_in');
			if(!isset($logged_in) or $logged_in != TRUE){
				redirect(base_url().'login_c');
			}
		}
		
		function index(){
	    	
			$this->load->view('menuRol_v',NULL);
			//$this->menuSeleccionaRol();
	 	}
		
		function muestraUsuariosRol($idRol)
		{
			$datos['usuarios'] = $this->usuarios_m->traeUsuariosRol($idRol);
			$datos['idRol'] = $idRol;
			// echo "<pre>";
				// print_r($datos);
			// echo "</pre>";
			$this->load->view('adminDocs_v',$datos);
		}
		
		function muestraDocsUsuario($idUsuario)
		{
			$datos['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($idUsuario);
			$datos['archivosUsuario'] = $this->usuarios_m->traeArchivos($idUsuario);
			$this->load->view('docsUsuario_v',$datos);
		}
		
		function muestraInfoUsuario($idUsuario)
		{
			$datos['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$datos['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($idUsuario);
			$this->load->view('infoUsuario_v',$datos);
		}
		
		function apruebaDocsUsuario($idUsuario)
		{
			$data = $_POST;	
				
			foreach($data as $campo => $valor){ 
			
	            $pos = strpos($campo, '_');
				
	            $nombre_tabla = substr($campo, 0, $pos);
		
	            $nombre_campo = substr($campo, ++$pos);
				
				if(!empty($valor))
	            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

			}
			if(isset($datos)){
				$val = $this->usuarios_m->guardaAprobacionDocsUsuario($idUsuario,$datos);
				redirect('adminDocs_c/muestraDocsUsuario/'.$idUsuario);	
			}else{
				redirect('adminDocs_c/muestraDocsUsuario/'.$idUsuario);
			}
			
		}
		function enviaMsj()
		{
			print_r($_POST);
			//Configuración para mandar el correo
			//$config['protocol'] = 'mail';
			//$config['wordwrap'] = FALSE;				
			//$config['mailtype']='html';
			
			$correos = array( $_POST['correoAspirante'], 'two@example.com', 'three@example.com');
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'rentzana@virtuami.izt.uam.mx';
			$config['smtp_pass'] = 'rentzana75#';

			$config['smtp_timeout'] = '7';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			
			
			$this->email->initialize($config);
			$this->email->from('rentzana@virtuami.izt.uam.mx', 'Posgrado virtual');
			$this->email->to($correos);
			$this->email->subject('Mensaje de Posgrado virtual');
			$msj = $_POST['msj'];
			
			$this->email->message($msj);		
			if(!($this->email->send()))
			{
			   show_error($this->email->print_debugger());
			}
		}
	}
	
	
?>