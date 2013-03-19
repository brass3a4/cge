<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class AdminDocs_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('catalogos_m', 'usuarios_m')); // Load the model
	        			
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
	}
	
	
?>