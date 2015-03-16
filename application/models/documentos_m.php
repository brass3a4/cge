<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentos_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function guardarDocumentoUsuario($datosDocuemnto){
		$this->db->insert('archivos', $datosDocuemnto);
		$consultaIdArchivo = $this->db->select_max('idArchivo')->from('archivos')->get();
		if ($consultaIdArchivo->num_rows() > 0) {
			$consultaIdArchivo = $consultaIdArchivo->result_array();
			$idArchivo = $consultaIdArchivo[0]['idArchivo'];
			return $idArchivo;
		}else{
			return '0';
		}

	}

	public function traerDocumentosUsuario($idUsuario){
		$this->db->select('*');
		$this->db->from('archivos');
		$this->db->where('idUsuario', $idUsuario);
		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result_array() as $key => $value) {
				$archivos[$value['tipoDocumento']] = $value;
			}
			// $consulta = $consulta->result_array();
			// $archivos = $consulta;
			return $archivos;
		}else{
			return '0';
		}
	}

	public function traerDocUsuario($tipoDocumento,$idUsuario){
		$this->db->select('idArchivo,url');
		$this->db->from('archivos');
		$this->db->where('tipoDocumento', $tipoDocumento);
		$this->db->where('idUsuario', $idUsuario);
		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			$consulta = $consulta->result_array();
			$idArchivo = $consulta[0];
			return $idArchivo;
		}else{
			return '0';
		}
	}

	public function actualizaDocumento($datosDocuemnto,$idArchivo){
		$this->db->where('idArchivo', $idArchivo);
		$this->db->update('archivos', $datosDocuemnto); 
	}

}

/* End of file documentos_m.php */
/* Location: ./application/models/documentos_m.php */