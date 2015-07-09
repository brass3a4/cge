<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function traerUsuariosEstudios($estudios,$rol){
		$this->db->select('Usuarios.IdUsuario,usuario,Nombre,aPaterno,aMaterno,nacionalidad,email');
		$this->db->from('Usuarios');
		$this->db->join('DatosUsuario', 'DatosUsuario.IdUsuario = Usuarios.IdUsuario');
		// $this->db->join('archivos', 'archivos.IdUsuario = Usuarios.IdUsuario');
		$this->db->join('UserRoles', 'UserRoles.Usuarios_IdUsuario = Usuarios.IdUsuario');
		if($estudios == 1){
			$this->db->where('DatosUsuario.Datos','México');
		}else{
			$this->db->where('DatosUsuario.Datos','Extranjero');
		}
		$this->db->where('UserRoles.Roles_IdRole',$rol);
		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			$usuarioss = $consulta->result_array();
			foreach ($usuarioss as $key => $value) {
				$usuarios[$value['IdUsuario']] = $value;
			}
			return $usuarios;
		}else{
			return 0;
		}

	}

	public function traerUsuariosEstudiosAceptados($rol){
		$this->db->select('Usuarios.IdUsuario,usuario,Nombre,aPaterno,aMaterno,nacionalidad,email,CURP,date(fecNacimiento) as fech, Calle, NumExterior, NumInterior, Colonia, CP, RFC, lugarNAc, Telefono');
		$this->db->from('Usuarios');
		// $this->db->join('DatosUsuario', 'DatosUsuario.IdUsuario = Usuarios.IdUsuario');
		// $this->db->join('archivos', 'archivos.IdUsuario = Usuarios.IdUsuario');
		$this->db->join('UserRoles', 'UserRoles.Usuarios_IdUsuario = Usuarios.IdUsuario');
		$this->db->where('UserRoles.Roles_IdRole',$rol);
		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			$usuarioss = $consulta->result_array();
			foreach ($usuarioss as $key => $value) {
				$usuarios[$value['IdUsuario']] = $value;

				$this->db->select('*');
				$this->db->from('DatosUsuario');
				$this->db->where('IdUsuario',$value['IdUsuario']);
				$consulta2 = $this->db->get();
				if($consulta2->num_rows() > 0){
					foreach ($consulta2->result_array() as $row) {
						$usuarios[$value['IdUsuario']][$row['NomCampo']] = $row['Datos']; 
					}
				}
			}
			return $usuarios;
		}else{
			return 0;
		}

	}

	public function traerDatosArchivo($idArchivo){
		$this->db->select('*');
		$this->db->from('archivos');
		$this->db->where('IdArchivo',$idArchivo);
		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			$archivo = $consulta->result_array();
			return $archivo[0];
		}
	}

	public function aceptarDocumento($idArchivo){
		$this->db->where('IdArchivo', $idArchivo);
		$this->db->update('archivos', array('estado' => 3));
	}

	public function rechazarDocumento($idArchivo){
		$this->db->where('IdArchivo', $idArchivo);
		$this->db->update('archivos', array('estado' => 1));
	}
}

/* End of file dashboard_m.php */
/* Location: ./application/models/dashboard_m.php */