<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class PreregistroT_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('catalogos_m', 'usuarios_m')); // Load the model
			$this->load->library('email');
	        			
	   	}

	    function index(){
	    	
			$this->preRegistro();
	 	}
		
		/* Esta función carga la vista del formulario para hacer el preregistro*/
		function preRegistro()
		{
			$datos['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$this->load->view('preregistroT_v',$datos);
		}
		
		/*Esta función carga la vista de previsualizacion de datos para ser confirmados*/
		function preDatos()
		{
			$data['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$data['datos'] = $_POST;
			
			
			
			$this->load->view('preDatosT_v',$data);
		}
		
		/*Esta función guarda los datos de un usuario nuevo*/
		function guardaDatos()
		{
			// Quitamos la serialización que se hizo en la vista preDatos_v	
			$data = unserialize($_POST['datos']);
			
			// Partimos el arreglo original dependiendo de la cadena inicial antes del guion bajo (_) en varios arreglos
			foreach($data as $campo => $valor){ 
			
	            $pos = strpos($campo, '_');
				
	            $nombre_tabla = substr($campo, 0, $pos);
		
	            $nombre_campo = substr($campo, ++$pos);
				
				if(!empty($valor))
	            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        	}
			
			$IdUsuario = $this->usuarios_m->guardaUsuario($datos);
			
			$usuario = $this->creaUsuario($datos['Usuarios'],$IdUsuario);
			
			$pass = $this->generaPass();
			
			$credenciales = array('usuario' => $usuario, 'password' => $pass);
			
			$verifica = $this->usuarios_m->guardaCredenciales($credenciales,$IdUsuario);
			
			if($verifica == 1){
				$datosN = array('data' => $data, 'credenciales' => $credenciales, 'IdUsuario' => $IdUsuario);
				$this->load->view('confirmacionT_v',$datosN);
				
				$this->enviaCorreo($data,$credenciales,$IdUsuario);
			}else{
				echo "<script>alert('Error al Guardar Usuario, intente de nuevo')window.close()</script>";
			}
			
			
			
		}
		
		/*Esta función envia un correo de confirmacion al usuario por su registro existoso
		 * @param $data[Array], $credenciales[Array],$IdUsuario[INT]
		 * */ 
		function enviaCorreo($data,$credenciales,$IdUsuario)
		{
			
			//Configuración para mandar el correo
			// $config['protocol'] = 'mail';
			// $config['wordwrap'] = FALSE;				
			//$config['mailtype']='html';
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'rentzana@virtuami.izt.uam.mx';
			$config['smtp_pass'] = 'rentzana75#';

			$config['smtp_timeout'] = '7';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			
			
			$this->email->initialize($config);
			$this->email->from('rentzana@virtuami.izt.uam.mx', 'Talleres 2a Semana de la Educación Virtual');
			$this->email->to($data['Usuarios_email'],$data['DatosUsuario_email2']);
			$this->email->subject('Gracias por Registrarse');
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
							Estimad@ participante:<br><br> <b>'.$data['Usuarios_Nombre'].' '.$data['Usuarios_aPaterno'].' '.$data['Usuarios_aMaterno'].'</b>, 
											su preregistro al Sistema para acompañarnos en alguno de los talleres
											en modalidad mixta que se impartirán en el marco de la 2ª Semana de la Educación Virtual, se ha 
											realizado con éxito:<br> 
											<br>
											Su número de solicitud es: '.$IdUsuario.'<br> 
											Su usuario y contraseña asignados son:<br><br>
											<b>
											Usuario: '.$credenciales['usuario'].'<br>
											Contraseña: '.$credenciales['password'].'<br>
											</br>
											Para completar su registro y elegir el taller en el que se encuentra interesad@, por favor ingrese 
											<a href="'.base_url().'login_c">Aquí </a>
											<br><br>
											Reciba un cordial saludo<br>
											Coordinación de Educación Virtual<br>
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
			
		/*Esta función genera una contraseña*/
		function generaPass()
		{
			$tamano = 8;
			$cadena = "";
			$posible = "0123456789abcdfghjkmnpqrstvwxyzABCDFGHIJKLMNOPQSTUVWXYZ@&#$%*";
			$i = 0;
			while ($i < $tamano) {
				$char = substr($posible, mt_rand(0, strlen($posible)-1), 1);
				$cadena .= $char;
				$i++;
			}
			return $cadena;	
		}
		
		/* Esta función genera un usuario a partir del nombre del usuario y su idUsuario
		 * @param $datosUsuario[Array], IdUsuario [INT]
		 * @return $usuario [Array]
		 * */
		function creaUsuario($datosUsuario,$IdUsuario)
		{
			$nombre = $this->normaliza($datosUsuario['Nombre']);//Quita acentos del nombre
			
			$aPSinEspacios = $this->limpiaEspacios($datosUsuario['aPaterno']);//Quita los espacios si hay en el apellido paterno
	
			$aPaterno = $this->normaliza($aPSinEspacios);//quita los acentos del nombre
			
			$usuario = $nombre[0].$aPaterno.$IdUsuario;//toma la primera letra del nombre y la concatena con el apellido y el idUsuario
			
			return $usuario;
		}
		
		/*Esta función quita los espacios de una cadena
		 * @param $cadena [string]
		 * @return $cadenaSin [String]
		 * */
		function limpiaEspacios($cadena){
			
		    $cadenaSin = preg_replace( "([ ]+)", "", $cadena );
			
		    return $cadenaSin;
		}
		
		/*Esta funcion quita acentos,tildes, etc
		 * @param $cadena [String]
		 * @return $cadena [String]
		 * */
		function normaliza ($cadena){
		    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		    $cadena = utf8_decode($cadena);
		    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
		    $cadena = strtolower($cadena);
		    return utf8_encode($cadena);
		}
		
	}  
?>
