<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class GeneraPdf_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
		$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
	       	//$this->load->library('cezpdf');
		//$this->load->library('email');
		
	        $this->load->library('fpdf');
		
		define('FPDF_FONTPATH',$_SERVER["DOCUMENT_ROOT"].'/cge/application/libraries/font/');

			
	   	}

	    function index($msg = NULL){
	    	//$this->crear();
	    	//$this->headers();
	    }
		
		function crear($usuario = NULL)
		{
			
	        	$pdf = new FPDF();

			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			if($idUsuario != '0'){
				
				$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				//echo '<pre>';
				//print_r($datos);
				
				$contenido["cad1"] = 'Estimado profesor:'."\n\n";
				$contenido['nombre'] = $datos['Nombre'].' ';
				$contenido['aPat'] = $datos['aPaterno'].' ';
				$contenido['aMat'] = $datos['aMaterno'].' ';
				$contenido['cad2'] = 'su preregistro y solicitud de ingreso al Diplomado Virtual: ';
				$contenido['cad3'] = '"Formación docente en la enseñanza escolarizada de inglés para niños" se ha realizado con exito.'."\n\n";
				$contenido['soliciud'] = 'Su número de solicitud es: '.$idUsuario. "\n";
				$contenido['usuario'] = 'Usuario: '.$usuario."\n";
				$contenido['contrasena'] = 'contraseña: '.$datos['password']."\n\n\n";
				$contenido['login'] = 'Para completar su registro por favor ingrese a: '.base_url().'login_c';			
                		$text = ""; 
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',12);

				$pdf->Image($_SERVER["DOCUMENT_ROOT"]."/cge/statics/img/image.jpeg",1,1,250);

				foreach ($contenido as $row) {
					$text = $text.$row;
				}

				$pdf->Ln(60);
				$text = utf8_decode($text);
				$pdf->Multicell(0, 5, $text, 0, 'J', false);

				$pdf->Output();
           

		 	}


		}		
	
	

	}    
?>
