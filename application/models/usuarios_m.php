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
		    
			$datos['UserRoles']['Usuarios_IdUsuario']=$IdUsuario;
			/* Para la tabla Datos usuarios guardamos los datos dependiendo del IdUsuario*/
			foreach($datos as $tabla => $campos){
                
                if($tabla != 'Usuarios' && (!empty($tabla)) && $tabla != 'UserRoles'){
                	
					foreach ($campos as $nomCampo => $valor) {
						
						$this->db->set('NomCampo', $nomCampo);
						$this->db->set('Datos', $valor);
						$this->db->set('IdUsuario', $IdUsuario);
						$this->db->insert('DatosUsuario');
					}
					
                }
				if($tabla == "UserRoles"){
						
						$this->db->insert($tabla,$campos);
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
	
	/* Este modelo verifica si el usuario existe y si la contraseña es correcta
		 * @param
		 * 
		 * $datos = array ( 
							'usuario' => 'brass3a4',
							'password' => '123'
						   );
		 * 
		 * */
		function verificaUsuario($datos){
			
			if (isset($datos['usuario'])) {
				$this->db->select('password');
				$this->db->from('Usuarios');
				$this->db->where('usuario',$datos['usuario']);
				
				$consultaPass = $this->db->get();
				
				/*Sí existe el usuario:*/
				if($consultaPass->num_rows() > 0){
					foreach ($consultaPass->result_array() as $row) {
						$pass = $row['password']; 
					}
					/*Si la contraseña coincide: */
					if($pass == $datos['password']){
						$mensaje = '1';
					}else{
						$mensaje = '2';
					}
				}else{
					
					$mensaje = '3';
				}
				
				return $mensaje;
				}
			
		}
		
		function traeUsuarioId($nomUsuario)
		{
			if(isset($nomUsuario)){
				$this->db->select('IdUsuario');
				$this->db->from('Usuarios');
				$this->db->where('usuario',$nomUsuario);
				$IdUsuario = $this->db->get();
				
				if($IdUsuario->num_rows() > 0){
					foreach ($IdUsuario->result_array() as $row) {
						$idUsr = $row['IdUsuario']; 
					}
					
				
				return $idUsr;
				}
				
			}else{
				return '0';
			}
		}
		
		function llenaTabla($datos)
		{
			if(isset($datos)){
				$this->db->select('NomArchivo');
				$this->db->where('IdArchivo', $datos['archivos']['IdArchivo']);
				$this->db->from('archivos');
				$consulta = $this->db->get();

				if($consulta->num_rows() > 0){
					
					echo 'hola 1';
					$this->db->where('IdArchivo', $datos['archivos']['IdArchivo']);
					$this->db->update('archivos', $datos['archivos']); 					
				}else{
					echo 'hola 2';
					$this->db->insert('archivos', $datos['archivos']);
					
				}				
				
				return '1';
			}else{
				return '0';
			}
		}
		
		function traeDatosUsuario($idUsuario)
		{
			if(isset($idUsuario)){
				$this->db->select('*');
				$this->db->from('Usuarios');
				$this->db->where('IdUsuario',$idUsuario);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $row) {
						$datos = $row; 
					}
					
				
				return $datos;
				}
				
			}else{
				return '0';
			}
		}
		function traeArchivos($idUsuario)
		{
			if(isset($idUsuario)){
				$this->db->select('*');
				$this->db->from('archivos');
				$this->db->where('IdUsuario',$idUsuario);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $row) {
						$datos[$row['IdArchivo']] = $row; 
					}
					
				
				return $datos;
				}
				
			}else{
				return '0';
			}
		}
}
