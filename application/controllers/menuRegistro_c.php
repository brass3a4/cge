<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class MenuRegistro_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('usuarios_m'); // Load the model
			//$this->load->library('email');
	        			
	   	}

		function index($verifica = NULL){
	    	$this->principal(NULL);
	    }
		
		function principal($usr = NULL)
		{
			$idUsuario = $this->usuarios_m->traeUsuarioId($usr);
			
			$data['archivos'] = $this->usuarios_m->traeArchivos($idUsuario); 	
			$data['usuario'] = $usr;
			
			if(isset($data['archivos']) && $data['archivos'] != '0'){
				$data['valor']='1';
			}else{
				$data['valor']='0';
			}
			
			
			$this->load->view('menuRegistro_v',$data);
		}
	   
		
		function cargaDocs($usuario)
		{
			$data['usuario'] = $usuario;	
			$this->load->view('registroDocs_v',$data);
		}
		
		function cargarPDF($usuario)
		{
			$idUsuario = $this->usuarios_m->traeUsuarioId($usuario);
			if($idUsuario != '0'){
			
				$ruta = exec('pwd');
				
				$creaDir = 'mkdir '.$ruta.'/statics/docs/'.$usuario;
				exec($creaDir,$var);
				$cambiaPer = 'chmod 777 '.$ruta.'/statics/docs/'.$usuario;
				exec($cambiaPer,$var);
				
				// obtenemos los datos del archivo
				$tamano['1'] = $_FILES["file"]['size'];
				$tipo['1'] = $_FILES["file"]['type'];
				$archivo['1'] = $_FILES["file"]['name'];
				$tmp['1'] = $_FILES['file']['tmp_name'];
				$prefijo['1'] = substr(md5(uniqid(rand())),0,6);
				
				$tamano['2'] = $_FILES["file2"]['size'];
				$tipo['2'] = $_FILES["file2"]['type'];
				$archivo['2'] = $_FILES["file2"]['name'];
				$tmp['2'] = $_FILES['file2']['tmp_name'];
				$prefijo['2'] = substr(md5(uniqid(rand())),0,6);
				
				$tamano['3'] = $_FILES["file3"]['size'];
				$tipo['3'] = $_FILES["file3"]['type'];
				$archivo['3'] = $_FILES["file3"]['name'];
				$tmp['3'] = $_FILES['file3']['tmp_name'];
				$prefijo['3'] = substr(md5(uniqid(rand())),0,6);
				
				for ($i=1; $i < 4; $i++) {
					 
					if($tipo[$i] == "application/pdf" || $tipo[$i] == "application/msword" || $tipo[$i] == "image/jpg" || $tipo[$i] == "image/png" || $tipo[$i] == "image/jpeg" || $tipo[$i] == "image/gif"){			
						if ($archivo[$i] != "") {
						    // guardamos el archivo a la carpeta files
						    $destino[$i] =  $ruta.'/statics/docs/'.$usuario."/".$prefijo[$i]."_".$archivo[$i];
						    $url[$i] = '/statics/docs/'.$usuario."/".$prefijo[$i]."_".$archivo[$i];
							print_r($destino[$i].'</br>');
						    if (move_uploaded_file($tmp[$i],$destino[$i])) {
									
								$datos['archivos'] = array('url'=>$url[$i],'nomArchivo'=>$archivo[$i], 'IdUsuario' => $idUsuario, 'IdArchivo' => $i);
								$mensaje = $this->usuarios_m->llenaTabla($datos);	
								$status = "Archivo subido: <b>".$prefijo[$i]."_".$archivo[$i]."</b>";
								
								
						    } else {
						    	
								$status = "Error al subir el archivo ".$prefijo[$i]."_".$archivo[$i];
								
						    }
						} else {
						    $status = "Error al subir el archivo";
							
							
						}
					}else{
						echo 'No es valido el tipo archivo';
					}
				}
				redirect('menuRegistro_c/principal/'.$usuario);
				//$this->principal($usuario);
			}/* fin if idUsuario */
		}
	}    
?>