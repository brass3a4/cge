<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}
	
	function guardaUsuario($datos)
	{
		if (!empty($datos)) {
			foreach($datos as $key => $value){
				
            	$this->db->insert($key, $value);
            }
            return 1;
		}else{
			return 0;
		}
	}
	
	function guardaDatosUsuario($datos)
	{
		if (!empty($datos)) {
			foreach($datos as $key => $value){
				
            	$this->db->insert($key, 'NomCampo');
            }
            return 1;
		}else{
			return 0;
		}
	}
	
	
	
}
