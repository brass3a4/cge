<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}
	
	
	/* Este modelo agrega un usuario nuevo junto con sus datos academicos
	 * @param:
	 *			$datos [Array]
	 * 
	 * 			Ejemplo del array: 
	 * 				$datos = Array(
							    [Usuarios] => Array
							        (
							            [Nombre] => Julio,
							            [aPaterno] => Martinez,
							            [aMaterno] => Cruz
							        )
							
							    [DatosUsuario] => Array
							        (
							            [tipoEstudio] => 3,
							            [nombEstudio] => Computación,
							            [toefl] => 11,
							            [puntuajeTOEFL] => 100
							        )
							); 
	 * 
	 * */
	function guardaUsuario($datos)
	{
		if (!empty($datos)) {
				
        	$this->db->insert('Usuarios', $datos['Usuarios']);
			
			/*Obtiene el ultimo idUsuario insertado*/
        
			$obtener_id = $this->db->select_max('IdUsuario')->from('Usuarios')->get();
	            
            if($obtener_id->num_rows() > 0){
                
                foreach ($obtener_id->result_array() as $row) {
                
                    $IdUsuario = $row['IdUsuario'];
        	
                }
                
            }
		    
			/* Para la tabla Datos usuarios guardamos los datos dependiendo del IdUsuario*/
			foreach($datos as $tabla => $campos){
                
                if($tabla != 'Usuarios' && (!empty($tabla))){
                	
					foreach ($campos as $nomCampo => $valor) {
						
						$this->db->set('NomCampo', $nomCampo);
						$this->db->set('Datos', $valor);
						$this->db->set('IdUsuario', $IdUsuario);
						$this->db->insert('DatosUsuario');
					}
                }
                
            }
			
            return $IdUsuario;
			
		}else{
			return 0;
		}
	}
	
	function guardaCredenciales($credenciales,$IdUsuario)
	{
		if(!empty($credenciales)){
			$this->db->where('IdUsuario', $IdUsuario);
			if($this->db->update('Usuarios', $credenciales)){
				return 1;
			}else{
			return 0; 
			}
		}
	}
	
	
	
}
