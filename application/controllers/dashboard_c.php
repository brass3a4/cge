<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('dashboard_m','documentos_m','usuarios_m'));
		$this->load->library(array('fpdf','excel','email'));
		// Datos para la integracion SSO de Disqus
		define('DISQUS_SECRET_KEY', 'E34Fn2jAfmQ4qNumQKJsPB1NrFzLZIny66J3VeCaaCfPiLARbM07DPorynxgp0pT');
		define('DISQUS_PUBLIC_KEY', 'qNAFZhESxUoAY7NNCnCI16N0YcFU1Y49Tyt4D3nNIjrIq23JRMHtG7LNIxOz4y3n');
		// Ruta para las fuentes de fpdf
		define('FPDF_FONTPATH',$_SERVER["DOCUMENT_ROOT"].'/cge/application/libraries/font/');

		$this->is_logged_in();	
	}

	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url().'login_c');
		}
	}

	public function index()
	{
		$this->load->view('dashboard_v', NULL, FALSE);
	}

	public function excel($rol){
		$usuariosN = $this->dashboard_m->traerUsuariosEstudios(1,$rol);
		$usuariosE = $this->dashboard_m->traerUsuariosEstudios(2,$rol);
		$usuarios = array_merge($usuariosN,$usuariosE);
		
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		foreach ($usuarios as $key => $value) {
			$i = $key+1;
			$this->excel->getActiveSheet()->setCellValue('A'.$i,$i);
			$this->excel->getActiveSheet()->setCellValue('B'.$i, $value['Nombre']." ".$value['aPaterno']." ".$value['aMaterno']);
			$this->excel->getActiveSheet()->setCellValue('C'.$i, $value['email']);
		}
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="posgrado.xlsx"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function diplomado(){
		$this->load->view('dashboardD_v', NULL, FALSE);	
	}

	public function relacion($rol){

		$usuariosN = $this->dashboard_m->traerUsuariosEstudios(1,$rol);
		foreach ($usuariosN as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				

				if((isset($documentosUsuario['actaFrente']) && $documentosUsuario['actaFrente']['estado'] == 3) && 
					(isset($documentosUsuario['certiAtras']) && $documentosUsuario['certiAtras']['estado'] == 3) &&
					(isset($documentosUsuario['certiFrente']) && $documentosUsuario['certiFrente']['estado'] == 3) &&
					(isset($documentosUsuario['curpFrente']) && $documentosUsuario['curpFrente']['estado'] == 3) &&
					(isset($documentosUsuario['cv']) && $documentosUsuario['cv']['estado'] == 3) &&
					(isset($documentosUsuario['ifeFrente']) && $documentosUsuario['ifeFrente']['estado'] == 3) &&
					(isset($documentosUsuario['tituloLicAtras']) && $documentosUsuario['tituloLicAtras']['estado'] == 3) &&
					(isset($documentosUsuario['tituloLicFrente']) && $documentosUsuario['tituloLicFrente']['estado'] == 3)
				){
					unset($usuariosN[$value['IdUsuario']]);	

				}

				
			}else{
				// Retiramos a los usuariosN que no tengan documentos
				unset($usuariosN[$value['IdUsuario']]);
			}
		}
		$usuariosE = $this->dashboard_m->traerUsuariosEstudios(2,$rol);
		foreach ($usuariosE as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				if((isset($documentosUsuario['actaFrente']) && $documentosUsuario['actaFrente']['estado'] == 3) && 
					(isset($documentosUsuario['certiAtras']) && $documentosUsuario['certiAtras']['estado'] == 3) &&
					(isset($documentosUsuario['certiFrente']) && $documentosUsuario['certiFrente']['estado'] == 3) &&
					(isset($documentosUsuario['curpFrente']) && $documentosUsuario['curpFrente']['estado'] == 3) &&
					(isset($documentosUsuario['cv']) && $documentosUsuario['cv']['estado'] == 3) &&
					(isset($documentosUsuario['ifeFrente']) && $documentosUsuario['ifeFrente']['estado'] == 3) &&
					(isset($documentosUsuario['tituloLicAtras']) && $documentosUsuario['tituloLicAtras']['estado'] == 3) &&
					(isset($documentosUsuario['tituloLicFrente']) && $documentosUsuario['tituloLicFrente']['estado'] == 3)
				){
					unset($usuariosE[$value['IdUsuario']]);	

				}
			}else{
				// Retiramos a los usuariosE que no tengan documentos
				unset($usuariosE[$value['IdUsuario']]);
			}
		}
		$usuariosA = $this->dashboard_m->traerUsuariosEstudiosAceptados($rol);
		foreach ($usuariosA as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				if(!isset($documentosUsuario['actaFrente']) || $documentosUsuario['actaFrente']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['certiAtras']) || $documentosUsuario['certiAtras']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['certiFrente']) || $documentosUsuario['certiFrente']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['curpFrente']) || $documentosUsuario['curpFrente']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['cv']) || $documentosUsuario['cv']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['ifeFrente']) || $documentosUsuario['ifeFrente']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['tituloLicAtras']) || $documentosUsuario['tituloLicAtras']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
				if(!isset($documentosUsuario['tituloLicFrente']) || $documentosUsuario['tituloLicFrente']['estado'] != 3){
					unset($usuariosA[$value['IdUsuario']]);	

				}
			}else{
				unset($usuariosA[$value['IdUsuario']]);
			}

		}
		$usuariosS = $this->dashboard_m->traerUsuariosEstudiosAceptados($rol);
		foreach ($usuariosS as $key => $value) {
			$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($value['IdUsuario']);
			if($documentosUsuario != 0){
				// Retiramos a los usuarios que no tengan documentos
				unset($usuariosS[$value['IdUsuario']]);
			}
		}

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetMargins(10,10,10);

		if(!empty($usuariosN)){
			$pdf->SetFont('Arial','B',12);
			$pdf->Multicell(0,0, "Nacionales", 0, 'L', false);
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(5);
			$i=1;
		    foreach ($usuariosN as $key => $value) {
		    	$text = trim($value['Nombre'])." ".trim($value['aPaterno'])." ".trim($value['aMaterno']);
		    	$pdf->Cell(90, 5, $i.".- ".utf8_decode($text), 0, 'L', false);
		    	$pdf->Multicell(0,5, strtoupper(utf8_decode($value['nacionalidad'])), 0, 'L', false);
		    	$i++;
		    }
		}
	    if(!empty($usuariosE)){
		    $pdf->Ln(5);
		    $pdf->SetFont('Arial','B',12);
			$pdf->Multicell(0,0, "Extranjeros", 0, 'L', false);
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(5);
			$i=1;
		    foreach ($usuariosE as $key => $value) {
		    	$text = trim($value['Nombre'])." ".trim($value['aPaterno'])." ".trim($value['aMaterno']);
		    	$pdf->Cell(90, 5, $i.".- ".utf8_decode($text), 0, 'L', false);
		    	$pdf->Multicell(0,5, strtoupper(utf8_decode($value['nacionalidad'])), 0, 'L', false);
		    	$i++;
		    }
		}

		if(!empty($usuariosA)){
		    $pdf->Ln(5);
		    $pdf->SetFont('Arial','B',12);
			$pdf->Multicell(0,0, "Verificados", 0, 'L', false);
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(5);
			$i=1;
		    foreach ($usuariosA as $key => $value) {
		    	$text = trim($value['Nombre'])." ".trim($value['aPaterno'])." ".trim($value['aMaterno']);
		    	$pdf->Cell(90, 5, $i.".- ".utf8_decode($text), 0, 'L', false);
		    	$pdf->Multicell(0,5, strtoupper(utf8_decode($value['nacionalidad'])), 0, 'L', false);
		    	$i++;
		    }
		}

		if(!empty($usuariosS)){
		    $pdf->Ln(5);
		    $pdf->SetFont('Arial','B',12);
			$pdf->Multicell(0,0, utf8_decode("Sin interacción"), 0, 'L', false);
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(5);
			$i=1;
		    foreach ($usuariosS as $key => $value) {
		    	$text = trim($value['Nombre'])." ".trim($value['aPaterno'])." ".trim($value['aMaterno']);
		    	$pdf->Cell(90, 5, $i.".- ".utf8_decode($text), 0, 'L', false);
		    	$pdf->Multicell(0,5, strtoupper(utf8_decode($value['nacionalidad'])), 0, 'L', false);
		    	$i++;
		    }
		}
		// echo "Hola";
		$pdf->Output('relacion.pdf','D');
	}

	public function documentoPdf($idArchivo){
		// $idArchivo = 39;
		$pdf = new FPDF('P','in','letter');
		$datosArchivo = $this->dashboard_m->traerDatosArchivo($idArchivo);
		$idusuario = $datosArchivo['IdUsuario'];
		switch ($datosArchivo['tipoDocumento']) {
			case 'tituloLicFrente':
				$nombre = 'Titulo de licienciatura (Frente)';
				break;

			case 'tituloLicAtras':
				$nombre = 'Titulo de licienciatura (Vuelta)';
				break;

			case 'certiFrente':
				$nombre = 'Certificado de licenciatura (Frente)';
				break;

			case 'certiAtras':
				$nombre = 'Certificado de licenciatura (Vuelta)';
				break;

			case 'actaFrente':
				$nombre = 'Acata de nacimiento (Frente)';
				break;

			case 'actaAtras':
				$nombre = 'Acata de nacimiento (Vuelta)';
				break;

			case 'cv':
				$nombre = 'Curriculum Vitae';
				break;

			case 'curpFrente':
				$nombre = 'CURP';
				break;

			case 'ifeFrente':
				$nombre = 'INE (Frente)';
				break;

			case 'ifeAtras':
				$nombre = 'INE (Vuelta)';
				break;

			default:
				# code...
				break;
		}
		$rutaArchivo = $datosArchivo['url'];
		$datosUsuario = $this->usuarios_m->traeDatosUsuario($idusuario);
		// echo "<pre>";
		// 	print_r($datosUsuario);
		// echo "</pre>";
		$tamano = getimagesize($_SERVER["DOCUMENT_ROOT"].'/cge/'.$rutaArchivo);
		$ancho = $tamano[0];
		$alto = $tamano[1];

		$pdf->AddPage();

		if($alto >= $ancho){
			$pdf->Image($_SERVER["DOCUMENT_ROOT"].'/cge/'.$rutaArchivo,0.5,0.5,0,10);
		}else{
			$pdf->Image($_SERVER["DOCUMENT_ROOT"].'/cge/'.$rutaArchivo,0.5,0.5,7.5,0);
		}
	    
		// $pdf->SetY(10.21);
	    // Select Arial italic 8
	    $pdf->SetFont('Arial','B',10);
	    $pdf->SetTextColor(160);
	    // Print centered page number
	    $footer = trim($datosUsuario['Nombre'])." ".trim($datosUsuario['aPaterno'])." ".trim($datosUsuario['aMaterno'])." -- ".$nombre;
	    $pdf->Multicell(0,0, utf8_decode($footer), 0, 'L', false);

	    $rfc = mb_substr($datosUsuario['RFC'],0,9);
		$nom = $rfc."_".$idusuario."_".$datosArchivo['tipoDocumento'].".pdf";

		$pdf->Output($nom,'D');
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
				if (!isset($documentosUsuario['constAtras'])) {
					$usuarios[$key]['constAtras']['color'] = 'vacia';
					$usuarios[$key]['constAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['constFrente'])) {
					$usuarios[$key]['constFrente']['color'] = 'vacia';
					$usuarios[$key]['constFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
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
				if($usuarios[$key]['actaFrente']['color'] == 'aceptado' && 
					$usuarios[$key]['certiAtras']['color'] == 'aceptado' &&
					$usuarios[$key]['certiFrente']['color'] == 'aceptado' &&
					$usuarios[$key]['curpFrente']['color'] == 'aceptado' &&
					$usuarios[$key]['cv']['color'] == 'aceptado' &&
					$usuarios[$key]['ifeFrente']['color'] == 'aceptado' &&
					$usuarios[$key]['tituloLicAtras']['color'] == 'aceptado' &&
					$usuarios[$key]['tituloLicFrente']['color'] == 'aceptado')
				{
					unset($usuarios[$key]);

				}
				// if($valorDocs >= 26){
				// 	unset($usuarios[$value['IdUsuario']]);	
				// }
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
				if (!isset($documentosUsuario['actaAtras'])) {
					$usuarios[$key]['actaAtras']['color'] = 'vacia';
					$usuarios[$key]['actaAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['constAtras'])) {
					$usuarios[$key]['constAtras']['color'] = 'vacia';
					$usuarios[$key]['constAtras']['url'] = 'statics/img/sisreg_jpg-.jpg';
				}
				if (!isset($documentosUsuario['constFrente'])) {
					$usuarios[$key]['constFrente']['color'] = 'vacia';
					$usuarios[$key]['constFrente']['url'] = 'statics/img/sisreg_jpg-.jpg';
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

				if($usuarios[$key]['actaFrente']['color'] != 'aceptado' || 
					$usuarios[$key]['certiAtras']['color'] != 'aceptado' ||
					$usuarios[$key]['certiFrente']['color'] != 'aceptado' ||
					$usuarios[$key]['curpFrente']['color'] != 'aceptado' ||
					$usuarios[$key]['cv']['color'] != 'aceptado' ||
					$usuarios[$key]['ifeFrente']['color'] != 'aceptado' ||
					$usuarios[$key]['tituloLicAtras']['color'] != 'aceptado' ||
					$usuarios[$key]['tituloLicFrente']['color'] != 'aceptado')
				{
					unset($usuarios[$key]);

				}
				// if($valorDocs < 26){
				// }
				// print_r($usuarios[$key]);
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
		$idUsuario = $this->input->post('idUsuario');
		// $idUsuario = 16;
		$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($idUsuario);
		echo "<pre>";
			print_r($documentosUsuario);
		echo "</pre>";
	}

	public function aceptarDocumento(){
		$idArchivo = $this->input->post('idArchivo');
		$this->dashboard_m->aceptarDocumento($idArchivo);
		$datosArchivo = $this->dashboard_m->traerDatosArchivo($idArchivo);
		$documentosUsuario = $this->documentos_m->traerDocumentosUsuario($datosArchivo['IdUsuario']);
		if($documentosUsuario != 0){
			if($documentosUsuario['actaFrente']['estado'] == 3 && 
				$documentosUsuario['certiAtras']['estado'] == 3 &&
				$documentosUsuario['certiFrente']['estado'] == 3 &&
				$documentosUsuario['curpFrente']['estado'] == 3 &&
				$documentosUsuario['cv']['estado'] == 3 &&
				$documentosUsuario['ifeFrente']['estado'] == 3 &&
				$documentosUsuario['tituloLicAtras']['estado'] == 3 &&
				$documentosUsuario['tituloLicFrente']['estado'] == 3){

					$this->enviarAceptarDocumento($idArchivo);
			}
		}
		echo 'aceptado';
	}

	public function rechazarDocumento(){
		$idArchivo = $this->input->post('idArchivo');
		$res = $this->dashboard_m->rechazarDocumento($idArchivo);
		$this->enviarRechazarDocumento($idArchivo);
		echo 'rechazado';
	}

	public function dsq_hmacsha1($data, $key) {
		$blocksize=64;
		$hashfunc='sha1';
		if (strlen($key)>$blocksize)
			$key=pack('H*', $hashfunc($key));
		$key=str_pad($key,$blocksize,chr(0x00));
		$ipad=str_repeat(chr(0x36),$blocksize);
		$opad=str_repeat(chr(0x5c),$blocksize);
		$hmac = pack(
			'H*',$hashfunc(
				($key^$opad).pack(
					'H*',$hashfunc(
						($key^$ipad).$data
					)
				)
			)
		);
		return bin2hex($hmac);
	}

	public function disqus(){

		// $data = array(
		// "id" => 1,
		// "username" => 'brass3a4',
		// "email" => 'bras3a4@gmail.com'
		// );
		// $message = base64_encode(json_encode($data));
		// $timestamp = time();
		// $hmac = $this->dsq_hmacsha1($message . ' ' . $timestamp, DISQUS_SECRET_KEY);
		// // echo "Hola";
		// $datos['message'] = $message;
		// $datos['hmac'] = $hmac;
		// $datos['timestamp'] = $timestamp;
		// // $datos['datosUsuario'] = $data;
		// $datos['DISQUS_PUBLIC_KEY'] = DISQUS_PUBLIC_KEY;
		// // $text ='var disqus_config = function() {
		// // 		this.page.remote_auth_s3 = "'.$message.' '.$hmac.' '.$timestamp.'";
		// // 		this.page.api_key = "'.DISQUS_PUBLIC_KEY.'";}';
		// echo json_encode($datos);
		// 
		$this->load->view('disqus', NULL, FALSE);

	}

	public function enviarRechazarDocumento($idArchivo)
	{
		// echo $idArchivo;
		$datosArchivo = $this->dashboard_m->traerDatosArchivo($idArchivo);
		$datosUsuario = $this->usuarios_m->traeDatosUsuario($datosArchivo['IdUsuario']);

		// $datosUsuario['correoElec'] = 'brass3a4@gmail.com';
		// $datosUsuario['nombre'] = 'Julio';
		// $datosUsuario['aPaterno'] = 'Martinez';
		// $datosUsuario['aMaterno'] = 'Cruz';
		// 
		//Configuración para mandar el correo
		// $config['protocol'] = 'mail';
		//$config['wordwrap'] = FALSE;				
		//$config['mailtype']='html';
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'csep@virtuami.izt.uam.mx';
		$config['smtp_pass'] = 'J$angr4doR';

		$config['smtp_timeout'] = '7';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		
		
		$this->email->initialize($config);
		$this->email->from('csep@virtuami.izt.uam.mx', 'Sistema de registro VIRTU@MI');
		$this->email->to($datosUsuario['email']);
		$this->email->subject('Acuse de documento rechazado');
		$msj = '<html>
					<head>
					    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					    
					</head>
					<body>
						<table width="100%" style="background-image:url('.base_url().'statics/img/image2.jpeg);">
						<tr>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						</tr>
						<tr>
						
						Estimado candidato:<br><br><b>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'</b> hemos recibido su documentación digitalizada, sin embargo, uno o más de sus
						documentos no han podido ser verificados por la Coordinación de Sistemas Escolares de la Unidad Iztapalapa, 
						debido a alguna de las siguientes situaciones:
						<ul>
							<li>El documento no se encuentra completo o hace falta la cara posterior del mismo..</li>
							<li>Una o más secciones de su documento no son legibles o no alcanzan a distinguirse con detalle.</li>
							<li>El documento enviado no cumple con lo solicitado o es un documento diferente al requerido.</li>
						</ul>
						<p>Debido a ello le pedimos que reingrese con sus datos de usuario al Sistema de Registro, revise sus documentos, 
							atienda las indicaciones incluidas en el sistema de comentarios, e incorpore nuevamente, en el espacio 
							correspondiente, el documento solicitado. Si tiene alguna duda utilice el sistema de comentarios y esté al pendiente 
							de la respuesta ingresando de manera frecuente a este espacio.</p>

						<p>¡De antemano, muchas gracias!</p>

						A T E N T A M E N T E<br><br>

						Sistema de registro VIRTU@MI<br>
						Coordinación de Educación Virtual<br>
						Universidad Autónoma Metropolitana Unidad Iztapalapa<br>
						<i>Casa abierta al tiempo</i>				
						</tr>
						</table>				
						
					</body>
				</html>';
		
		$this->email->message($msj);		
		if(!($this->email->send()))
		{
		   show_error($this->email->print_debugger());
		}
	}

	public function enviarAceptarDocumento($idArchivo)
	{
		// echo $idArchivo;
		$datosArchivo = $this->dashboard_m->traerDatosArchivo($idArchivo);
		$datosUsuario = $this->usuarios_m->traeDatosUsuario($datosArchivo['IdUsuario']);

		//Configuración para mandar el correo
		// $config['protocol'] = 'mail';
		//$config['wordwrap'] = FALSE;				
		//$config['mailtype']='html';
		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'csep@virtuami.izt.uam.mx';
		$config['smtp_pass'] = 'J$angr4doR';

		$config['smtp_timeout'] = '7';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		
		
		$this->email->initialize($config);
		$this->email->from('csep@virtuami.izt.uam.mx', 'Sistema de registro VIRTU@MI');
		$this->email->to($datosUsuario['email']);
		$this->email->subject('Acuse de documentos verificados');
		$msj = '<html>
					<head>
					    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					    
					</head>
					<body>
						<table width="100%" style="background-image:url('.base_url().'statics/img/image2.jpeg);">
						<tr>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						</tr>
						<tr>
						
						Estimado candidato:<br><br><b>'.$datosUsuario['Nombre'].' '.$datosUsuario['aPaterno'].' '.$datosUsuario['aMaterno'].'</b> hemos recibido correctamente todos sus documentos digitalizados y estos ya han sido
						verificados satisfactoriamente por la Coordinación de Sistemas Escolares de la Unidad Iztapalapa.
						
						<p>Para continuar con su proceso de registro, considere las etapas siguientes de la convocatoria del programa de su 
						elección. Le pedimos que ponga especial atención a los requisitos correspondientes a la entrega de documentación 
						de forma física, por si requiere realizar algún trámite que pueda comenzar a gestionar (esto último únicamente si su 
						convocatoria así lo solicita).</p>

						<p>Por su atención, muchas gracias.</p>

						A T E N T A M E N T E<br><br>

						Sistema de registro VIRTU@MI<br>
						Coordinación de Educación Virtual<br>
						Universidad Autónoma Metropolitana Unidad Iztapalapa<br>
						<i>Casa abierta al tiempo</i>				
						</tr>
						</table>				
						
					</body>
				</html>';
		
		$this->email->message($msj);		
		if(!($this->email->send()))
		{
		   show_error($this->email->print_debugger());
		}
	}
}


/* End of file dashboard_c.php */
/* Location: ./application/controllers/dashboard_c.php */