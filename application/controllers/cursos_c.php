<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Cursos_c extends CI_Controller{
    
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
		function index(){
	    	$this->listaCursos();
	    }
		
		function listaCursos($idUsuario)
		{
			$data['idUsuario'] = $idUsuario;
			
			$data['cursos'] = $this->pedidos_m->traeProductos();
			
			$pedidos = $this->pedidos_m->traeDatosPedidoUsuario($idUsuario);
			
			foreach ($pedidos as $datPedido) {
				// echo "<pre>";
				// print_r($datPedido);
				foreach ($datPedido['datosDetallePedido'] as $datDetPedido) {
					$data['productos'][$datDetPedido['Productos_IdProducto']] = $datDetPedido['Productos_IdProducto'];
				}
			}
			
			// echo "<pre>";
			// print_r($data['productos']);
			// echo "</pre>";
			// vista con la lista de cursos seleccionables para compra
			$this->load->view('listaCursos_v',$data);
		}
		
		function carritoCursos()
		{
			foreach ($_POST as $key => $value) {
				if ($key == 'idUsuario') {
					$data[$key]=$value;
				}else{
					$data['productos'][$value]['IdProducto']=$value;
				}
			}

			$data['cursos'] = $this->pedidos_m->traeProductos();
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// vista con la lista de cursos seleccionables para compra
			$this->load->view('carritoCursos_v',$data);
		}
		
		function generaOrdenPago(){
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			
			$data['tipoPago'] = $_POST['TipoPago'];
			$data['productos'] = unserialize($_POST['Productos']);
			$data['datosUsuario'] = $this->usuarios_m->traeDatosUsuario($_POST['Usuarios_IdUsuario']);
			$cursos = $this->pedidos_m->traeProductos();
			
			foreach ($_POST as $key => $valor){
				if ($key != 'Productos') {
					$datosPedido[$key] = $valor; 
				}
			}
			
			//Se calcula ValPago
			$datosPedido['ValPago'] = $this->generaVal();
			
			//se calcula IdTransacción
			$datosPedido['IdTransaccion'] = date("ymzGis");
			//print_r($datosPedido);
			
			//Se guardan los datos para generar la orden de pago con lo datos seleccionados
			$data['idPedido'] = $this->pedidos_m->guardaPedido($datosPedido);
			
			// Agrego el NomCorto a cada producto seleccionado
			foreach ($cursos as $key => $value) {
				foreach ($data['productos'] as $llave => $valor) {
					if ($value['IdProducto'] == $valor['IdProducto']) {
						$data['productos'][$llave]['NomCorto'] = $value['NomCorto'];
					}
				}
			}

			$datosDetallePedido['Pedidos_IdPedido'] = $data['idPedido'];
			
			// gurado el detalle de producto por cada producto en el pedido
			foreach ($data['productos'] as $key => $value) {
				
				//Genera la referencia a pagar
				$datosDetallePedido['RefAPagar'] = $this->generaDV($value['NomCorto'].'13puami'.$_POST['Usuarios_IdUsuario']);
				
				$datosDetallePedido['Productos_IdProducto'] = $value['IdProducto'];
				$data['idDetallePedido'.$key] = $this->pedidos_m->guardaDetallePedido($datosDetallePedido);
			}			
			
			
			// Vista con la orden de pago
			$this->load->view('ordenPago_v',$data);
			
						
		}

		function generaVal(){
			$tamano = 8;
			$cadena = "";
			$posible = "0123456789abcdfghjkmnpqrstvwxyzABCDFGHIJKLMNOPQSTUVWXYZ#$%/()=?!*_";
			$i = 0;
			while ($i < $tamano) {
				$char = substr($posible, mt_rand(0, strlen($posible)-1), 1);
				$cadena .= $char;
				$i++;
			}
			return $cadena;	
		}
		
		function generaDV($var){ 
			$cadena =$var; 
			$cadena = trim($cadena);        //Limpiar cadena 
			$cadena = strtoupper($cadena);    //Convertir caracteres a mayusculas 
			$total=0; 
			// Obtencion de la matriz de verificación 
		    for ($i = 0; $i < strlen($cadena); $i++){ 
		        switch ($cadena[$i]) 
		            { 
		            case "A": 
		                $val=1; 
		                break; 
		            case "B": 
		                $val=2; 
		                break; 
		            case "C": 
		                $val=3; 
		                break; 
		            case "D": 
		                $val=4; 
		                break; 
		            case "E": 
		                $val=5; 
		                break; 
		            case "F": 
		                $val=6; 
		                break;     
		            case "G": 
		                $val=7; 
		                break; 
		            case "H": 
		                $val=8; 
		                break; 
		            case "I": 
		                $val=9; 
		                break; 
		            case "J": 
		                $val=10; 
		                break; 
		            case "K": 
		                $val=11; 
		                break; 
		            case "L": 
		                $val=12; 
		                break; 
		            case "M": 
		                $val=13; 
		                break; 
		            case "N": 
		                $val=14; 
		                break; 
		            case "O": 
		                $val=15; 
		                break; 
		            case "P": 
		                $val=16; 
		                break; 
		            case "Q": 
		                $val=17; 
		                break; 
		            case "R": 
		                $val=18; 
		                break;     
		            case "S": 
		                $val=19; 
		                break; 
		            case "T": 
		                $val=20; 
		                break; 
		            case "U": 
		                $val=21; 
		                break; 
		            case "V": 
		                $val=22; 
		                break; 
		            case "W": 
		                $val=23; 
		                break; 
		            case "X": 
		                $val=24; 
		                break; 
		            case "Y": 
		                $val=25; 
		                break; 
		            case "Z": 
		                $val=26; 
		                break; 
		            default: 
		            $val = $cadena[$i];     
		            } 
		            $matriz[$i] = $val; 
		            //echo $matriz[$i]." "; 
		        } 
		 
		         
			    // Fin de la obtencion de la matriz de verificación 
			    //echo "<br>Aplicando Multiplicador por elemento de la matriz<br>"; 
			    $ArrFactor = array(4,3,8); 
			    $k = 0;        //Contador para el arreglo de factores 
		        for ($idx = 0; $idx < count($matriz); $idx++)    //barrido de la matriz 
		            { 
		            if ($k > 2) $k = 0;  //resetea el contador del arreglo de factores 
			            $Aux = $matriz[$idx] * $ArrFactor[$k]; 
			            $k++; 
			            //echo $Aux." "; 
		            if ($Aux < 10) 
		            { 
			            $Aux = $Aux%10; 
			            //echo $Aux." "; 
		            } 
		            else{ 
			            while($Aux >= 10) 
			            { 
				            $Aux1 = $Aux/10; 
				            $Aux1 = (integer)$Aux1; 
				            $Aux2 = $Aux%10; 
				            $Aux = $Aux1 + $Aux2; 
			            } 
			            //echo $Aux." "; 
		            } 
		            $total = $total + $Aux; 
		             
		            //echo $total." "; 
		            } 
		            //echo "<br>".$total; 
		            $total1 = $total/10; 
		            $total1 = (ceil($total1))*10; 
		            $total = abs($total-$total1); 
		            //echo "<br>".$total; 
		            //echo "<br>".$cadena." ".$total; 
		            $cadena = $cadena.$total;             
		            //echo "<br>".$total; 
		            for ($idx = 0; $idx < count($matriz); $idx++) 
		            { 
		            	$matriz[$idx] = " "; 
		            } 
		            return $cadena; 
					
		}/*Fin de generaDV*/
	}    
?>