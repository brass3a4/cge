<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pedidos_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}

	function traeProductos(){
		
		$this->db->select('*');
		$this->db->from('Productos');
		$this->db->where('Estatus',1);
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $producto) {
				$productos[$producto['IdProducto']] = $producto; 
			}
		
			return $productos;
		}else{
			return '0';
		}
	}
	
	function traeProductosClave($claveP){
		
		$this->db->select('*');
		$this->db->from('Productos');
		$this->db->where('Estatus',1);
		$this->db->where('CveProducto',$claveP);
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $producto) {
				$productos[$producto['IdProducto']] = $producto; 
			}
		
			return $productos;
		}else{
			return '0';
		}
	}
	
	function guardaPedido($datosPedido){
		if (isset($datosPedido)) {
			//print_r($datosPedido);
			$this->db->insert('Pedidos', $datosPedido);
			
			$consultaIdPedido = $this->db->select_max('IdPedido')->from('Pedidos')->get();
			
			if($consultaIdPedido->num_rows() > 0){
                
                foreach ($consultaIdPedido->result_array() as $pedido) {
                
                    $idPedido = $pedido['IdPedido'];
        	
                }
				
                return $idPedido;
				
            }else{
            	
            	return '0';
            }
			
		} 
		
	}/* fin de guardaPedido*/
	
	function guardaDetallePedido($datosDetallePedido){
		if (isset($datosDetallePedido)) {
			$this->db->insert('DetallePedido', $datosDetallePedido);
			
			$consultaIdDetallePedido = $this->db->select_max('IdDetallePedido')->from('DetallePedido')->get();
			
			if($consultaIdDetallePedido->num_rows() > 0){
                
                foreach ($consultaIdDetallePedido->result_array() as $detallePedido) {
                
                    $idDetallePedido = $detallePedido['IdDetallePedido'];
        	
                }
				
                return $idDetallePedido;
				
            }else{
            	
            	return '0';
            }
			
		} 
		
	}/* fin de guardaDetallePedido*/
	
	function traeValPago($ValPago){
		$this->db->select('ValPago');
		$this->db->from('Pedidos');
		$this->db->where('ValPago',$ValPago);
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $pedido) {
				$pedidos[$pedido['IdPedido']] = $pedido; 
			}
		
			return $pedidos;
		}else{
			return '0';
		}
	}/* fin de traeValPago*/
	
	function traeDatosPedido($idPedido){
		$this->db->select('*');
		$this->db->from('Pedidos');
		$this->db->where('IdPedido',$idPedido);
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $datosPedido) {
				$datos['datosPedido'] = $datosPedido; 
			}
		
			$this->db->select('*');
			$this->db->from('DetallePedido');
			$this->db->where('Pedidos_IdPedido',$idPedido);
			$consulta = $this->db->get();
			
			if($consulta->num_rows() > 0){
				foreach ($consulta->result_array() as $datosDetallePedido) {
					$datos['datosDetallePedido'][$datosDetallePedido['Productos_IdProducto']] = $datosDetallePedido; 
				}
			}
		
			return $datos;
		}else{
			return '0';
		}
	}
	
	function traeDatosPedidoUsuario($idUsuario){
		$this->db->select('*');
		$this->db->from('Pedidos');
		$this->db->where('Usuarios_IdUsuario',$idUsuario);
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $datosPedido) {
				$datos[$datosPedido['IdPedido']] = $datosPedido; 
				
				$this->db->select('*');
				$this->db->from('DetallePedido');
				$this->db->where('Pedidos_IdPedido',$datos[$datosPedido['IdPedido']]['IdPedido']);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $datosDetallePedido) {
						$datos[$datosPedido['IdPedido']]['datosDetallePedido'][$datosDetallePedido['IdDetallePedido']] = $datosDetallePedido; 
					}
				}
				
			}
			
			
		
			return $datos;
		}else{
			return '0';
		}
	}
}
