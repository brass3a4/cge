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
			
			//letras a remplezar
			$vocales = array('á','é','í','ó','ú','ü','ñ');
			$remplazar = array('Á','É','Í','Ó','Ú','Ü','Ñ');
			
			//por cada usuario pasamos su nombre y apellidos a mayusculas
			foreach ($datos['usuarios'] as $key => $value) {
				$datos['usuarios'][$key]['Nombre'] = str_replace($vocales, $remplazar, $datos['usuarios'][$key]['Nombre']);
				$datos['usuarios'][$key]['Nombre'] = strtoupper($datos['usuarios'][$key]['Nombre']);
				$datos['usuarios'][$key]['aPaterno'] = str_replace($vocales, $remplazar, $datos['usuarios'][$key]['aPaterno']);
				$datos['usuarios'][$key]['aPaterno'] = strtoupper($datos['usuarios'][$key]['aPaterno']);
				$datos['usuarios'][$key]['aMaterno'] = str_replace($vocales, $remplazar, $datos['usuarios'][$key]['aMaterno']);
				$datos['usuarios'][$key]['aMaterno'] = strtoupper($datos['usuarios'][$key]['aMaterno']);			
			}
			
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
			
			//letras a remplezar
			$vocales = array('á','é','í','ó','ú','ü','ñ');
			$remplazar = array('Á','É','Í','Ó','Ú','Ü','Ñ');
			
			//pasamos su nombre y apellidos a mayusculas
			$datos['datosUsuario']['Nombre'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['Nombre']);
			$datos['datosUsuario']['Nombre'] = strtoupper($datos['datosUsuario']['Nombre']);
			$datos['datosUsuario']['aPaterno'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['aPaterno']);
			$datos['datosUsuario']['aPaterno'] = strtoupper($datos['datosUsuario']['aPaterno']);
			$datos['datosUsuario']['aMaterno'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['aMaterno']);
			$datos['datosUsuario']['aMaterno'] = strtoupper($datos['datosUsuario']['aMaterno']);
			
			$this->load->view('docsUsuario_v',$datos);
		}
		
		function muestraInfoUsuario($idUsuario)
		{
			$datos['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$datos['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($idUsuario);
			
			$vocales = array('á','é','í','ó','ú','ü','ñ');
			$remplazar = array('Á','É','Í','Ó','Ú','Ü','Ñ');
			
			$datos['datosUsuario']['Nombre'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['Nombre']);
			$datos['datosUsuario']['Nombre'] = strtoupper($datos['datosUsuario']['Nombre']);
			$datos['datosUsuario']['aPaterno'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['aPaterno']);
			$datos['datosUsuario']['aPaterno'] = strtoupper($datos['datosUsuario']['aPaterno']);
			$datos['datosUsuario']['aMaterno'] = str_replace($vocales, $remplazar, $datos['datosUsuario']['aMaterno']);
			$datos['datosUsuario']['aMaterno'] = strtoupper($datos['datosUsuario']['aMaterno']);

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
		function enviaMsj($idUsuario)
		{
			//print_r($_POST);
			//Configuración para mandar el correo en servidor web
			//$config['protocol'] = 'mail';
			//$config['wordwrap'] = FALSE;				
			//$config['mailtype']='html';
			
			$correos = array( $_POST['correoAspirante'], 'gest@xanum.uam.mx', 'nivon@xanum.uam.mx','aadministrativa_pv@virtuami.izt.uam.mx','rentzana@virtuami.izt.uam.mx','csep@xanum.uam.mx');
			//$correos = array('brass3a4@gmail.com');
			/* Esta configuracion es para cuando está en local */
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
			
			echo '<script type="text/javascript"> alert("Correo eviado");</script>';
			redirect('adminDocs_c/muestraDocsUsuario/'.$idUsuario);
		}
	}
	
	
?>