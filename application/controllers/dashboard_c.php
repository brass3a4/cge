<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('dashboard_m','documentos_m'));
	}

	public function index()
	{
		$this->load->view('dashboard_v', NULL, FALSE);
	}

	public function traerUsuariosEstudios(){
		$estudios = $this->input->post('estudios');
		$rol = $this->input->post('rol');
		// $estudios = 2;
		// $rol = 5;

		// estudios 1: México
		// estudios 2: Extranjero
		// rol 4: Diplimado
		// rol 5: Posgrado
		$usuarios = $this->dashboard_m->traerUsuariosEstudios($estudios,$rol);
		foreach ($usuarios as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				$valorDocs = 0;
				$fecha = '1990-01-01';
				foreach ($documentosUsuario as $nombre => $value) {
					if(!empty($value['fechaAct'])){
						if($value['fechaAct'] > $fecha){
							$fecha = $value['fechaAct'];
						}
					}else{
						if($value['fechaCrea'] > $fecha){
							$fecha = $value['fechaCrea'];
						}
					}
					$valorDocs += $value['estado'];
					$usuarios[$key][$nombre] = $value;
					// $usuarios[$key][$nombre]['urlBase64'] = $this->imagenBase64($value['url']);
					switch ($value['estado']) {
						case '1':
							$usuarios[$key][$nombre]['color'] = 'rechazado';
							break;
						case '2':
							$usuarios[$key][$nombre]['color'] = 'espera';
							break;
						case '3':
							$usuarios[$key][$nombre]['color'] = 'aceptado';
							break;
						
						default:
							# code...
							break;
					}
				}

				$usuarios[$key]['fecha'] = $fecha;
				$usuarios[$key]['valorDocs'] = $valorDocs;
				if (!isset($documentosUsuario['actaAtras'])) {
					$usuarios[$key]['actaAtras']['color'] = 'vacia';
					$usuarios[$key]['actaAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['actaFrente'])) {
					$usuarios[$key]['actaFrente']['color'] = 'vacia';
					$usuarios[$key]['actaFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['certiAtras'])) {
					$usuarios[$key]['certiAtras']['color'] = 'vacia';
					$usuarios[$key]['certiAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['certiFrente'])) {
					$usuarios[$key]['certiFrente']['color'] = 'vacia';
					$usuarios[$key]['certiFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['curpFrente'])) {
					$usuarios[$key]['curpFrente']['color'] = 'vacia';
					$usuarios[$key]['curpFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['cv'])) {
					$usuarios[$key]['cv']['color'] = 'vacia';
					$usuarios[$key]['cv']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['ifeAtras'])) {
					$usuarios[$key]['ifeAtras']['color'] = 'vacia';
					$usuarios[$key]['ifeAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['ifeFrente'])) {
					$usuarios[$key]['ifeFrente']['color'] = 'vacia';
					$usuarios[$key]['ifeFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['tituloLicAtras'])) {
					$usuarios[$key]['tituloLicAtras']['color'] = 'vacia';
					$usuarios[$key]['tituloLicAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['tituloLicFrente'])) {
					$usuarios[$key]['tituloLicFrente']['color'] = 'vacia';
					$usuarios[$key]['tituloLicFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if($valorDocs >= 27){
					unset($usuarios[$value['IdUsuario']]);	
				}
			}else{
				// Retiramos a los usuarios que no tengan documentos
				unset($usuarios[$value['IdUsuario']]);
			}

		}
		// echo "<pre>";
		// 	print_r($usuarios);
		// echo "</pre>";
		echo json_encode($usuarios);
	}

	public function traerUsuariosEstudiosAceptados(){
		// $estudios = $this->input->post('estudios');
		$rol = $this->input->post('rol');
		// $estudios = 2;
		// $rol = 5;

		// estudios 1: México
		// estudios 2: Extranjero
		// rol 4: Diplimado
		// rol 5: Posgrado
		$usuarios = $this->dashboard_m->traerUsuariosEstudiosAceptados($rol);
		foreach ($usuarios as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				$valorDocs = 0;
				$fecha = '1990-01-01';
				foreach ($documentosUsuario as $nombre => $value) {
					
					$valorDocs += $value['estado'];
					$usuarios[$key][$nombre] = $value;
					// $usuarios[$key][$nombre]['urlBase64'] = $this->imagenBase64($value['url']);
					switch ($value['estado']) {
						case '1':
							$usuarios[$key][$nombre]['color'] = 'rechazado';
							break;
						case '2':
							$usuarios[$key][$nombre]['color'] = 'espera';
							break;
						case '3':
							$usuarios[$key][$nombre]['color'] = 'aceptado';
							break;
						
						default:
							# code...
							break;
					}
				}
				$usuarios[$key]['fecha'] = $fecha;
				$usuarios[$key]['valorDocs'] = $valorDocs;
				if (!isset($documentosUsuario['ifeAtras'])) {
					$usuarios[$key]['ifeAtras']['color'] = 'vacia';
					$usuarios[$key]['ifeAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if($valorDocs < 27){
					unset($usuarios[$value['IdUsuario']]);
				}
			// 	
			}else{
				// Retiramos a los usuarios que no tengan documentos
				unset($usuarios[$value['IdUsuario']]);
			}

		}
		// echo "<pre>";
		// 	print_r($usuarios);
		// echo "</pre>";
		echo json_encode($usuarios);
	}

	public function traerUsuariosEstudiosSinInter(){
		// $estudios = $this->input->post('estudios');
		$rol = $this->input->post('rol');
		// $estudios = 2;
		// $rol = 5;

		// estudios 1: México
		// estudios 2: Extranjero
		// rol 4: Diplimado
		// rol 5: Posgrado
		$usuarios = $this->dashboard_m->traerUsuariosEstudiosAceptados($rol);
		foreach ($usuarios as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				// Retiramos a los usuarios que no tengan documentos
				unset($usuarios[$value['IdUsuario']]);
			}
		}
		// echo "<pre>";
		// 	print_r($usuarios);
		// echo "</pre>";
		echo json_encode($usuarios);
	}

	public function imagenBase64($rutaFile){
		$path= base_url($rutaFile);
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		if($type == 'pdf'){
			// $base64 = 'data:application/' . $type . ';base64,' . base64_encode($data);
			return $path;
		}else{
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		}
		// echo $base64.'<br>';
		return $base64;
	}

	public function traerDocumentosUsuario(){
		// $idUsuario = $this->input->post('idUsuario');
		$idUsuario = 16;
		$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($idUsuario);
		echo "<pre>";
			print_r($documentosUsuario);
		echo "</pre>";
	}

	public function aceptarDocumento(){
		$idArchivo = $this->input->post('idArchivo');
		$this->dashboard_m->aceptarDocumento($idArchivo);
		echo 'aceptado';
	}

	public function rechazarDocumento(){
		$idArchivo = $this->input->post('idArchivo');
		$res = $this->dashboard_m->rechazarDocumento($idArchivo);
		echo 'rechazado';
	}

	public function disqus(){
		$this->load->view('disqus', NULL, FALSE);
	}
}


/* End of file dashboard_c.php */
/* Location: ./application/controllers/dashboard_c.php */