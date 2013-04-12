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
	 * @return $idUsuario [INT]
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
	
	/*Esta función guarda las credenciales de identificación de un usuario mediante el idUsuario
	 * @param:
	 * 
	 * 			$credenciales [Array]
	 * 			$IdUsuario [INT]
	 * 
	 * @return BOLEAN
	 * */
	
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
	 	 * @return $mensaje [string] 
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
		
		/* Esta función trae el IdUsario de un usuario mediante el nombre de usuario
		 * @param:
		 * 			$nomUsuario [INT]
		 * 
		 * @return $idUsr [INT]
		 * */
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
		
		/*Esta funcion agrega archivos a un usuario
		 * @param:
		 * 			$datos [Array]
		 * 			$idArchivo [INT]
		 * 
		 * @return BOLEAN
		 * Este es un ejemplo de $datos = array('url'=>$url[$i],'nomArchivo'=>$archivo[$i], 'IdUsuario' => $idUsuario); 
		 * */
		function llenaTabla($datos,$idArchivo)
		{
			if(isset($datos)){
				/*si el idArchivo es distinto de vacio entonces hay un archivo ya relacionado a un usuario así que hay que actualizarlo
				 *mediante el idArchivo de lo contrario hay que agregarlo.*/
				if($idArchivo != NULL){
					
					$this->db->where('IdArchivo', $idArchivo);
					$this->db->update('archivos', $datos['archivos']); 					
				}else{
					
					$this->db->insert('archivos', $datos['archivos']);
					
				}				
				
				return '1';
			}else{
				return '0';
			}
		}
		
		/* Esta función trae los datos de un usuario mediante su idUsuario
		 * @param:
		 * 			$idUsuario [INT]
		 * 
		 * @return $datos [array]
		 * */
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
					
				$this->db->select('*');
				$this->db->from('DatosUsuario');
				$this->db->where('IdUsuario',$idUsuario);
				$consulta = $this->db->get();
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $row) {
						$datos[$row['NomCampo']] = $row['Datos']; 
					}
					return $datos;
				}
				}
				
			}else{
				return '0';
			}
		}
		
		/*Esta función trae los archivos de un usuario a partir de su IdUsuario
		 * @param:
		 * 			$IdUsuario [INT]
		 * @return $datos[Array]
		 * */
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
		
		/* Esta función trae el rol de un usuario a partir de su IdUsuario
		 * @param:
		 * 			$IdUsuario [INT]
		 * @return $idRol[INT]
		 * */
		function traeRolUsuario($idUsuario)
		{
			if(isset($idUsuario)){
				$this->db->select('Roles_IdRole');
				$this->db->from('UserRoles');
				$this->db->where('Usuarios_IdUsuario',$idUsuario);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $row) {
						$idRol = $row['Roles_IdRole']; 
					}
					
				
				return $idRol;
				}
				
			}else{
				return '0';
			}
		}
		
		/* Esta función trae todos los usuarios dependiendo de su idRol
		 * @param $idRol[INT]
		 * @return $usuarios[array]
		 * */
		function traeUsuariosRol($idRol)
		{
			if(isset($idRol)){
				$this->db->select('*');
				$this->db->from('Usuarios');
				$this->db->join('UserRoles', 'UserRoles.Usuarios_IdUsuario = Usuarios.IdUsuario');
				$this->db->where('UserRoles.Roles_IdRole', $idRol);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $DatosUsuario) {
						$usuarios[$DatosUsuario['IdUsuario']]= $DatosUsuario; 
					}
					
				return $usuarios;
				}
				
			}else{
				return '0';
			}
			
		}
		
		function guardaAprobacionDocsUsuario($idUsuario,$datos)
		{
			if (isset($idUsuario) && isset($datos)) {
				
				foreach($datos as $tabla => $campos){
                
                if($tabla == 'DatosUsuario' && (!empty($tabla))){
                	
					foreach ($campos as $nomCampo => $valor) {
						
						$this->db->set('NomCampo', $nomCampo);
						$this->db->set('Datos', $valor);
						$this->db->set('IdUsuario', $idUsuario);
						$this->db->insert('DatosUsuario');
					}
					
                }
                
            }
				return '1';
			} else {
				return '0';
			}
			
		}

}
