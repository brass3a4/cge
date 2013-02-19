<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Preregistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('catalogos_m', 'usuarios_m')); // Load the model
			$this->load->library('email');
	        			
	   	}

	    function index(){
	    	
			$this->preRegistro();
	 	}
		
		/* Esta función */
		function preRegistro()
		{
			$datos['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$this->load->view('preregistroGeneral_v',$datos);
		}
		
		function preDatos()
		{
			$data['catPais'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			$data['datos'] = $_POST;
			
			
			
			$this->load->view('preDatos_v',$data);
		}
		
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
				$this->load->view('confirmacion_v',$datosN);
				
				$this->enviaCorreo($data,$credenciales,$IdUsuario);
				
				
				
				
				
			}else{
				echo "<script>alert('Error al Guardar Usuario, intente de nuevo')window.close()</script>";
			}
			
			
			
		}
		
		function enviaCorreo($data,$credenciales,$IdUsuario)
		{
			//Configuración para mandar el correo
			//$config['protocol'] = 'mail';
			//$config['wordwrap'] = FALSE;				
			//$config['mailtype']='html';
			
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'rentzana@virtuami.izt.uam.mx';
			$config['smtp_pass'] = 'rentzana75#';
			$config['smtp_timeout'] = '7';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'text'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			
			
			$this->email->initialize($config);
			$this->email->from('rentzana@virtuami.izt.uam.mx', 'Diplomado Virtual');
			$this->email->to($data['Usuarios_email']);
			$this->email->subject('Gracias por Registrarse');
			$msj='Estimado profesor: '.$data['Usuarios_Nombre'].' '.$data['Usuarios_aPaterno'].' '.$data['Usuarios_aMaterno'].', su preregistro y solicitud de ingreso al Diplomado Virtual: "Formación docente en la enseñanza escolarizada de inglés para niños" ha realizado con exito:
					Su número de solicitud es: '.$IdUsuario.' 
					Su usuario y contraseña asignados son:
					Usuario: '.$credenciales['usuario'].'
					contraseña: '.$credenciales['password'].'';
			$this->email->message($msj);		
			if(!($this->email->send()))
			  {
			   show_error($this->email->print_debugger());
			  }		
			}
		
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
		
		function creaUsuario($datosUsuario,$IdUsuario)
		{
			$nombre = $this->normaliza($datosUsuario['Nombre']);
			
			$aPSinEspacios = $this->limpiaEspacios($datosUsuario['aPaterno']);
	
			$aPaterno = $this->normaliza($aPSinEspacios);
			
			$usuario = $nombre[0].$aPaterno.$IdUsuario;
			
			return $usuario;
		}
		
		function limpiaEspacios($cadena){
			
		    $cadenaSin = preg_replace( "([ ]+)", "", $cadena );
			
		    return $cadenaSin;
		}
		
		function normaliza ($cadena){
		    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		    $cadena = utf8_decode($cadena);
		    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
		    $cadena = strtolower($cadena);
		    return utf8_encode($cadena);
		}
		
		function cargarPDF()
		{
			echo "<pre>";
			print_r($_FILES);
			echo "</pre>";
		}
	}  
?>