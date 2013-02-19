<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Preregistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('catalogos_m', 'usuarios_m')); // Load the model
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
			$data['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$data['datos'] = $_POST;
			
			$this->load->view('preDatos_v',$data);
		}
		
		function guardaDatos()
		{
			// Quitamos la serialización que se hizo en la vista preDatos_v	
			$data = unserialize($_POST['datos']);
			
			// Partimos el arreglo original dependiendo de la cadena inicial antes del guion bajo (_) en varios arreglos
			foreach($data as $campo => $valor){ 
			
	            $pos = strpos($campo, '_');
				
	            $nombre_tabla = substr($campo, 0, $pos);
		
	            $nombre_campo = substr($campo, ++$pos);
				
				if(!empty($valor))
	            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        	}
			echo "<pre>";
			print_r($datos);
			echo "</pre>";
			
			$verifica = $this->usuarios_m->guardaUsuario($datos);
			
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