<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class GeneraPdf_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
		$this->load->helper(array('html', 'url'));
	    $this->load->model(array('usuarios_m','pedidos_m')); // Load the model
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
				$contenido['cad3'] = '"Formación docente en la enseñanza escolarizada de inglés para niños" se ha realizado con éxito.'."\n\n";
				$contenido['soliciud'] = 'Su número de solicitud es: '.$idUsuario. "\n";
				$contenido['usuario'] = 'Usuario: '.$usuario."\n";
				$contenido['contrasena'] = 'contraseña: '.$datos['password']."\n\n\n";
				$contenido['login'] = 'Para completar su registro por favor ingrese a: '.base_url().'login_c'."\n";
				$contenido['pd'] = 'En este paso debe subir todos los documentos solicitados en la convocatoria.';			
                
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
	
		function crearPosgrado($usuario = NULL)
		{
			
	        	$pdf = new FPDF();

			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			if($idUsuario != '0'){
				
				$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				//echo '<pre>';
				//print_r($datos);
				
				$contenido["cad1"] = 'Estimado candidato:'."\n\n";
				$contenido['nombre'] = $datos['Nombre'].' ';
				$contenido['aPat'] = $datos['aPaterno'].' ';
				$contenido['aMat'] = $datos['aMaterno'].' ';
				$contenido['cad2'] = 'su preregistro y solicitud de ingreso al Posgrado Virtual: ';
				$contenido['cad3'] = '"Política y Cultura en América Latina" se ha realizado con éxito.'."\n\n";
				$contenido['soliciud'] = 'Su número de solicitud es: '.$idUsuario. "\n";
				$contenido['usuario'] = 'Usuario: '.$usuario."\n";
				$contenido['contrasena'] = 'contraseña: '.$datos['password']."\n\n\n";
				$contenido['saludo'] = 'Reciba un cordial saludo.'."\n".'Coordinación Académica'."\n\n\n";
				$contenido['login'] = 'Para completar su registro por favor ingrese a: '.base_url().'login_c'."\n";
				$contenido['pd'] = 'En este paso debe subir todos los documentos solicitados en la convocatoria.';			
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

		function crearDipomado($usuario = NULL)
		{
			
	        $pdf = new FPDF();

			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			if($idUsuario != '0'){
				
				$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				//echo '<pre>';
				//print_r($datos);
				
				$contenido["cad1"] = 'Estimado candidato:'."\n\n";
				$contenido['nombre'] = $datos['Nombre'].' ';
				$contenido['aPat'] = $datos['aPaterno'].' ';
				$contenido['aMat'] = $datos['aMaterno'].' ';
				$contenido['cad2'] = 'su preregistro y solicitud de ingreso al Diplomado Virtual: ';
				$contenido['cad3'] = '"Políticas y Desarrollo Cultural" se ha realizado con éxito.'."\n\n";
				$contenido['soliciud'] = 'Su número de solicitud es: '.$idUsuario. "\n";
				$contenido['usuario'] = 'Usuario: '.$usuario."\n";
				$contenido['contrasena'] = 'contraseña: '.$datos['password']."\n\n\n";
				$contenido['saludo'] = 'Reciba un cordial saludo.'."\n".'Coordinación Académica del Curso'."\n\n\n";
				$contenido['login'] = 'Para completar su registro por favor ingrese a: '.base_url().'login_c'."\n";
				$contenido['pd'] = 'En este paso debe subir todos los documentos solicitados en la convocatoria.';	
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

		function generaOrdenPagoPDF($tipoPago,$idPedido){
			switch ($tipoPago) {
				case 'PVU':
					
					break;
					
				case 'PVBR':
					
					$this->generaOrdenPVBR($idPedido);
					break;
					
				case 'PVBX':
					
					break;
					
				case 'TBR':
					
					break;
					
				case 'TBX':
					
					break;
					
				case 'PLBR':
					
					break;

				default:
					
					break;
			}
		}
		
		function generaOrdenPVBR($idPedido){
			
			$datos = $this->pedidos_m->traeDatosPedido($idPedido);
			$datosUsuario = $this->usuarios_m->traeDatosUsuario($datos['datosPedido']['Usuarios_IdUsuario']);
			$cursos = $this->pedidos_m->traeProductos();
			
			foreach ($cursos as $key => $value) {
				foreach ($datos['datosDetallePedido'] as $llave => $valor) {
					if ($value['IdProducto'] == $valor['Productos_IdProducto']) {
						$datos['datosDetallePedido'][$llave]['Producto'] = $value['Producto'];
						$datos['datosDetallePedido'][$llave]['Precio'] = $value['Precio'];
					}
				}
			
			}
			
			// echo '<pre>';
			// print_r($datos);
			$pdf = new FPDF();

			//$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			//if($idUsuario != '0'){
				
				//$datos = $this->usuarios_m->traeDatosUsuario($idUsuario);
				//echo '<pre>';
				//print_r($datos);
				
				$contenido["folio"] = 'Folio número: '.$datos['datosPedido']['IdTransaccion']."\n\n";
				$contenido["datosAcceso"] = 'Datos de acceso'."\n\n";
				$contenido["usr"] = 'Usuario: '.$datosUsuario['usuario']."\n";
				$contenido["pass"] = 'Contraseña: '.$datosUsuario['password']."\n\n";
				$contenido["indica"] = 'Indicaciones importantes:'."\n\n";
				$contenido["cad1"] = '*Le pedimos que realice el pago de cada curso por separado.'."\n";
				$contenido["cad2"] = '*Para finalizar su suscripción le pedimos que una vez que haya realizado el pago nos envíe su(s) comprobante(s) escaneado(s) con su nombre completo, a la dirección de correo: pagocursos@virtuami.izt.uam.mx'."\n\n";
				$contenido["cad3"] = '*Le pedimos que todos los campos del comprobante escaneado se vean correctamente.'."\n\n";
	
                $text = ""; 
				$pdf->AddPage();
				$pdf->SetFont('Arial','',11);

				$pdf->Image($_SERVER["DOCUMENT_ROOT"]."/cge/statics/img/image.jpeg",1,1,250);

				foreach ($contenido as $row) {
					$text = $text.$row;
				}

				$pdf->Ln(50);
				$text = utf8_decode($text);
				$pdf->Multicell(0, 5, $text, 0, 'J', false);
				
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',15);
				
				$contenidoCursos['titulo'] = 'Recibo de pago curso'."\n";
				$contenidoCursos['titulo2'] = 'Favor de cobrar los conceptos por separado';
				
				$text2="";
				foreach ($contenidoCursos as $row) {
					$text2 = $text2.$row;
				}
				
				$text2 = utf8_decode($text2);
				$pdf->Multicell(0, 5, $text2, 0, 'C', false);
				
				
				$pdf->Ln(5);
				$pdf->SetFont('Arial','',11);
				
				foreach ($datos['datosDetallePedido'] as $datosDet) {
					$contenidoPago['titulo'] = "\n".'Pago en ventanilla BANCOMER'."\n";
					$contenidoPago['convenio'] = 'Convenio CIE: 11511754'."\n";
					$contenidoPago['concepto'] = 'Concepto a pagar: '.$datosDet['RefAPagar']."\n";
					$contenidoPago['monto'] = 'Monto a pagar: $'.$datosDet['Precio']."\n";
				
				
					$text3="";
					foreach ($contenidoPago as $row) {
						$text3 = $text3.$row;
					}
					
					$text3 = utf8_decode($text3);
					$pdf->Multicell(0, 5, $text3, 0, 'J', false);
					
					$pdf->Ln(5);
					
					$pdf->Cell(90,5,'Nombre del Curso',1,0,'C',0);
					$pdf->Cell(90,5,'Total',1,1,'C',0);
					
					$pdf->Cell(90,5,$datosDet['Producto'],1,0,'C',0);
					$pdf->Cell(90,5,'$'.$datosDet['Precio'],1,1,'C',0);
					
					$pdf->Ln(5);
					$lineas = "Recorta aquí -------------------------------------------------------------------------------------------------------------------------------------------------";
					$lineas = utf8_decode($lineas);
					$pdf->Multicell(0, 5, $lineas, 0, 'C', false);
				}
				
				$pdf->Output();
           

		 	//}
		}
	}    
?>
