<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class MenuRegistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('usuarios_m','pedidos_m')); // Load the model
			$this->is_logged_in();	        			
	   	}

		private function is_logged_in(){
			$logged_in = $this->session->userdata('logged_in');
			if(!isset($logged_in) or $logged_in != TRUE){
				redirect(base_url().'login_c');
			}
		}
		function index($verifica = NULL){
	    	$this->principal(NULL);
	    }
		
		function principal($usr = NULL)
		{
			$idUsuario = $this->usuarios_m->traeUsuarioId($usr);
			
			$data['idUsuario']=$idUsuario;

			$data['archivos'] = $this->usuarios_m->traeArchivos($idUsuario,'1');
			
			$data['archivosLegal'] = $this->usuarios_m->traeArchivos($idUsuario,'2');
			
			$data['idRol'] = $this->usuarios_m->traeRolUsuario($idUsuario);
			 	
			$data['usuario'] = $usr;
			
			$data['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($idUsuario);
			
			$pedidos= $this->pedidos_m->traeDatosPedidoUsuario($idUsuario);
			
			
			$sumaCursos = 0;
			if (isset($pedidos) && !empty($pedidos)) {
				
				foreach ($pedidos as $pedido) {
					$sumaCursos = $sumaCursos + count($pedido['datosDetallePedido']);
				}
			}
			$data['numCursos'] = $sumaCursos;
			
			
			// si el usuario tiene archivos valor = 1 en caso contrario valor = 0
			if(isset($data['archivos']) && $data['archivos'] != '0'){
				$data['valor']='1';
			}else{
				$data['valor']='0';
			}

			// si el usuario tiene archivos legalizados valor = 1 en caso contrario valor = 0
			if(isset($data['archivosLegal']) && $data['archivosLegal'] != '0'){
				$data['valor2']='1';
			}else{
				$data['valor2']='0';
			}
<<<<<<< HEAD
=======
			
>>>>>>> 76d9beaee6f95c71520e6078da2450e2477101fc
			
			/* Dependiendo del rol del usuario abre diferentes vistas*/
			switch ($data['idRol']) {
				
				case '1':
						// vista para curso root
						redirect(base_url().'admin_c');
					break;
				
				case '2':
						// vista para curso ingles
						redirect(base_url().'adminDocs_c');
					break;
				
				case '3':
						// vista para curso ingles
						$this->load->view('menuRegistro_v',$data);
					break;
				case '4':
						// vista para curso diplomado en ciencias póliticas
						$this->load->view('menuRegistroD_v',$data);
					break;
				case '5':
						// vista para posgrados
						$this->load->view('menuRegistroP_v',$data);
					break;
				case '9':
						// vista para posgrados
						$this->load->view('menuRegistroC_v',$data);
					break;
					
				case '10':
						
						// vista para Talleres
						$this->load->view('menuRegistroT_v',$data);
					break;
				
				default:
					
					break;
			}
			
<<<<<<< HEAD
			/* Dependiendo del rol del usuario abre diferentes vistas*/
			switch ($data['idRol']) {
				case '2':
						// vista para curso ingles
						redirect(base_url().'adminDocs_c');
					break;
				
				case '3':
						// vista para curso ingles
						$this->load->view('menuRegistro_v',$data);
					break;
				case '4':
						// vista para curso diplomado en ciencias póliticas
						$this->load->view('menuRegistroD_v',$data);
					break;
				case '5':
						// vista para posgrados
						$this->load->view('menuRegistroP_v',$data);
					break;
				case '9':
						// vista para posgrados
						$this->load->view('menuRegistroC_v',$data);
					break;
					
				case '10':
						
						// vista para Talleres
						$this->load->view('menuRegistroT_v',$data);
					break;
				
				default:
					
					break;
			}
			
		}
	   	
		function cargaDocsLegal($usuario)
		{
			$data['usuario'] = $usuario;
			$this->load->view('registroDocsLegalP_v',$data);
		}
=======
		}
	   	
		function cargaDocsLegal($usuario)
		{
			$data['usuario'] = $usuario;
			$this->load->view('registroDocsLegalP_v',$data);
		}
>>>>>>> 76d9beaee6f95c71520e6078da2450e2477101fc
		
		function cargaDocs($usuario,$idRol)
		{
			$data['usuario'] = $usuario;
			
			if(isset($idRol)){
				/* dependiendo del rol manda a abrir la vista correspondiente*/
				switch ($idRol) {
					case '3':
							$this->load->view('registroDocs_v',$data);
						break;
					case '4':
							//echo "Aspirante diplomado politicas";
							$this->load->view('registroDocsD_v',$data);
						break;
					case '5':
							
							$this->load->view('registroDocsP_v',$data);
						break;
					case '9':
							
							$this->load->view('registroDocsC_v',$data);
						break;
					
					default:
						
						break;
				}	
			}
		}
		
		/* Esta función sube archivos al usuario
		 * @param:
		 * 			$usuario [String]
		 * 
		 * */
		function cargarPDF($usuario)
		{
			
			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			/*Si el usuario existe:*/
			if($idUsuario != '0'){
<<<<<<< HEAD
				
				$archivos = $this->usuarios_m->traeArchivos($idUsuario,'1');
				
=======
				
				$archivos = $this->usuarios_m->traeArchivos($idUsuario,'1');
				
>>>>>>> 76d9beaee6f95c71520e6078da2450e2477101fc
				//cargamos la ruta absoluta
				$ruta = exec('pwd');
				// creamos el directorio donde se guardaran los archivos del usuario, 
				$creaDir = 'mkdir '.$ruta.'/statics/docs/'.$usuario;
				exec($creaDir,$var);
				//Cambiamos los permisos de directorio para poder escribir en él
				$cambiaPer = 'chmod 777 '.$ruta.'/statics/docs/'.$usuario;
				exec($cambiaPer,$var);
				
				// obtenemos los datos del archivo
				$i=1;
				foreach ($_FILES as $row) {
					$tamano[$i] = $row['size'];
					$tipo[$i] = $row['type'];
					$archivo[$i] = $row['name'];
					$tmp[$i] = $row['tmp_name'];
					$prefijo[$i] = substr(md5(uniqid(rand())),0,6);
					$i++;
				}
				
				$i=1;
				// Para cada archivo...	
				foreach ($archivo as $row) {
					
					//si existe el archivo obtrenemos el idArchivo, en caso contrario asignamos a la variable $idArchivo = NULL
					if(isset($archivos[$i])){
						$idArchivo = $archivos[$i]['IdArchivo'];
						
					}else{
						$idArchivo = NULL;
					}
					
					/* si el archivo es uno de los formatos permitidos:..*/ 
					if($tipo[$i] == "application/pdf" || $tipo[$i] == "application/msword" || $tipo[$i] == "image/jpg" || $tipo[$i] == "image/png" || $tipo[$i] == "image/jpeg" || $tipo[$i] == "image/gif"){			
						if ($archivo[$i] != "") {
						    // guardamos el archivo a la carpeta asignada al usuario
						    $destino[$i] =  $ruta.'/statics/docs/'.$usuario."/".$prefijo[$i]."_".$archivo[$i];
						    $url[$i] = '/statics/docs/'.$usuario."/".$prefijo[$i]."_".$archivo[$i];
							
							
						    if (move_uploaded_file($tmp[$i],$destino[$i])) {
									
								$datos['archivos'] = array('url'=>$url[$i],'nomArchivo'=>$archivo[$i], 'IdUsuario' => $idUsuario,'IdTipoDocumento' => '1');
								
								$mensaje = $this->usuarios_m->llenaTabla($datos,$idArchivo);
								$status = "Archivo subido: <b>".$prefijo[$i]."_".$archivo[$i]."</b>";
								
								
						    } else {
						    	
								$status = "Error al subir el archivo ".$archivo[$i];
								
						    }
						} else {
						    $status = "Error al subir el archivo";
							
							
						}
					}else{
						echo 'No es valido el tipo archivo';
					}
					$i++;
				}// fin for
				redirect('menuRegistro_c/principal/'.$usuario);
				//$this->principal($usuario);
			}/* fin if idUsuario */
			
		}/* fin de cargaPDF()*/
		
				/* Esta función sube archivos al usuario
		 * @param:
		 * 			$usuario [String]
		 * 
		 * */
		function cargarPDFLegal($usuario)
		{
			
			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			
			/*Si el usuario existe:*/
			if($idUsuario != '0'){
				
				$archivos = $this->usuarios_m->traeArchivos($idUsuario,'2');
				
				//cargamos la ruta absoluta
				$ruta = exec('pwd');
				// creamos el directorio donde se guardaran los archivos del usuario, 
				$creaDir = 'mkdir '.$ruta.'/statics/docs/'.$usuario.'/docsCertificados';
				exec($creaDir,$var);
				//Cambiamos los permisos de directorio para poder escribir en él
				$cambiaPer = 'chmod 777 '.$ruta.'/statics/docs/'.$usuario.'/docsCertificados';
				exec($cambiaPer,$var);
				
				// obtenemos los datos del archivo
				$i=1;
				foreach ($_FILES as $row) {
					$tamano[$i] = $row['size'];
					$tipo[$i] = $row['type'];
					$archivo[$i] = $row['name'];
					$tmp[$i] = $row['tmp_name'];
					$prefijo[$i] = substr(md5(uniqid(rand())),0,6);
					$i++;
				}
				
				$i=1;
				// Para cada archivo...	
				foreach ($archivo as $row) {
					
					//si existe el archivo obtrenemos el idArchivo, en caso contrario asignamos a la variable $idArchivo = NULL
					if(isset($archivos[$i])){
						$idArchivo = $archivos[$i]['IdArchivo'];
						
					}else{
						$idArchivo = NULL;
					}
					
					/* si el archivo es uno de los formatos permitidos:..*/ 
					if($tipo[$i] == "application/pdf" || $tipo[$i] == "application/msword" || $tipo[$i] == "image/jpg" || $tipo[$i] == "image/png" || $tipo[$i] == "image/jpeg" || $tipo[$i] == "image/gif"){			
						if ($archivo[$i] != "") {
						    // guardamos el archivo a la carpeta asignada al usuario
						    $destino[$i] =  $ruta.'/statics/docs/'.$usuario."/docsCertificados/".$prefijo[$i]."_".$archivo[$i];
						    $url[$i] = '/statics/docs/'.$usuario."/docsCertificados/".$prefijo[$i]."_".$archivo[$i];
							
							
						    if (move_uploaded_file($tmp[$i],$destino[$i])) {
									
								$datos['archivos'] = array('url'=>$url[$i],'nomArchivo'=>$archivo[$i], 'IdUsuario' => $idUsuario, 'IdTipoDocumento' => '2');
								
								$mensaje = $this->usuarios_m->llenaTabla($datos,$idArchivo);
								$status = "Archivo subido: <b>".$prefijo[$i]."_".$archivo[$i]."</b>";
								
								
						    } else {
						    	
								$status = "Error al subir el archivo ".$archivo[$i];
								
						    }
						} else {
						    $status = "Error al subir el archivo";
							
							
						}
					}else{
						echo 'No es valido el tipo archivo';
					}
					$i++;
				}// fin for
				redirect('menuRegistro_c/principal/'.$usuario);
				//$this->principal($usuario);
			}/* fin if idUsuario */
			
		}/* fin de cargaPDFLegal()*/
	}    
?>