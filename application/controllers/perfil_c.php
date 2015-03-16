<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper(array('url','file'));
		$this->load->library('session');
		$this->load->model(array('documentos_m','usuarios_m'));
		$this->is_logged_in();
	}

	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url().'login_c');
		}
	}

	public function index(){
		$this->perfilUsuario();
	}

	public function perfilUsuario(){
		$idUsuario             = $this->session->userdata('idUsuario');
		$idRol = $this->usuarios_m->traeRolUsuario($idUsuario);
		switch ($idRol) {
			case '4':
					$this->load->view('perfilD_v', NULL, FALSE);
				break;
			case '5':
					$this->load->view('perfil_v', NULL, FALSE);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function traeDatosUsuario(){
		$idUsuario		= $this->session->userdata('idUsuario');
		$datosUsuario 	= $this->usuarios_m->traeDatosUsuario($idUsuario);
		unset($datosUsuario['password']);
		echo json_encode($datosUsuario);
	}

	public function subirDoc(){
		$idUsuario             = $this->session->userdata('idUsuario');
		$datosImagen = $_FILES;
		foreach ($datosImagen as $key => $value) {
			$data['url'] = $this->subirImagen($value,$idUsuario,$key);
			$data['url']['tipoDocumento'] = $key;
		}
		$datosDocumento['nomArchivo'] = $data['url']['nombre'];
		$datosDocumento['url'] = $data['url']['url'];
		$datosDocumento['tipoDocumento'] = $data['url']['tipoDocumento'];
		$datosDocumento['idUsuario'] = $idUsuario;

		
		$doc = $this->documentos_m->traerDocUsuario($datosDocumento['tipoDocumento'],$idUsuario);
		if($doc != 0){
			// if(file_exists($_SERVER["DOCUMENT_ROOT"]."/cge/".$doc['url'])){
			// 	unlink($_SERVER["DOCUMENT_ROOT"]."/cge/".$doc['url']);
			// }
			$datosDocumento['fechaAct'] = date('Y-m-d');
			$datosDocumento['estado'] = 2;
			$this->documentos_m->actualizaDocumento($datosDocumento,$doc['idArchivo']);
		}else{
			$datosDocumento['fechaCrea'] = date('Y-m-d');
			$iddocumento = $this->documentos_m->guardarDocumentoUsuario($datosDocumento);
		}

		// echo "<pre>";
		// 	print_r($iddocumento);
		// echo "</pre>";
		echo json_encode($data);
	}

	public function traerDocumentosUsuario(){
		$idUsuario = $this->session->userdata('idUsuario');
		// $idUsuario = 16;
		$documentos = $this->documentos_m->traerDocumentosUsuario($idUsuario);
		foreach ($documentos as $nombre => $value) {
			
			switch ($value['estado']) {
				case '1':
					$documentos[$nombre]['color'] = 'rechazado';
					break;
				case '2':
					$documentos[$nombre]['color'] = 'espera';
					break;
				case '3':
					$documentos[$nombre]['color'] = 'aceptado';
					break;
				
				default:
					# code...
					break;
			}
		}
		// echo "<pre>";
		// 	print_r($documentos);
		// echo "</pre>";
		echo (json_encode($documentos));
	}

	private function subirImagen($datosImagen,$idUsuario,$tipoDocumento){
		$datosUsuario = $this->usuarios_m->traeDatosUsuario($idUsuario);
		// echo "<pre>";
		// 	print_r($datosUsuario);
		// echo "</pre>";
		//cargamos la ruta absoluta
		$ruta      = exec('pwd');
		// creamos el directorio donde se guardaran los archivos del usuario, 
		$creaDir   = 'mkdir '.$ruta.'/statics/docs/'.$idUsuario;
		exec($creaDir,$var);
		//Cambiamos los permisos de directorio para poder escribir en él
		$cambiaPer = 'chmod 777 '.$ruta.'statics/docs/'.$idUsuario;
		exec($cambiaPer,$var);

		//obtenemos los datos del archivo
		$tamano  = $datosImagen['size'];
		$tipo    = $datosImagen['type'];
		$cadena  = array('%','&','?','¿','=','/','#','"','!','¡','_','$',' ');
		$archivo =  str_replace($cadena, '',$datosImagen['name']);
		$rfc = mb_substr($datosUsuario['RFC'],0,9);
		$nom = $rfc."_".$idUsuario."_".$archivo;
		// echo $nom;
		$tmp     = $datosImagen['tmp_name'];
		$prefijo = substr(md5(uniqid(rand())),0,6);
		$error   = $datosImagen['error'];
		
		/* si el archivo es uno de los formatos permitidos:..*/ 
			if ($error == '0') {
				
			    //guardamos el archivo a la carpeta asignada para las imgTemp
			    $destino =  $ruta.'/statics/docs/'.$idUsuario.'/'.$nom;
			    $url = 'statics/docs/'.$idUsuario.'/'.$nom;
				
			    if (move_uploaded_file($tmp,$destino)) {
			    	$dat['url'] = $url;
			    	$dat['nombre'] = $archivo;
			    	$dat['tipo'] = $tipo;
					return $dat;				
			    } else {
					return 0;
			    }
			} else {
			    return 0;
			}
		
	}
}

/* End of file perfil_c.php */
/* Location: ./application/controllers/perfil_c.php */