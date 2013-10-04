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
	
	function traeProductosTipo($tipoProd){
		
		$this->db->select('IdProducto');
		$this->db->from('ProductosTipoProducto');
		
		$this->db->where('IdTipoProducto',$tipoProd);
		$cunsultaTipo = $this->db->get();
		
		if($cunsultaTipo->num_rows() > 0){
			foreach ($cunsultaTipo->result_array() as $prod) {
				//$prodTipo[$prod['IdProducto']] = $prod;
				
				$this->db->select('*');
				$this->db->from('Productos');
				$this->db->where('IdProducto',$prod['IdProducto']);
				$this->db->where('Estatus',1);
				$consulta = $this->db->get();
				
				if($consulta->num_rows() > 0){
					foreach ($consulta->result_array() as $producto) {
						$productos[$producto['IdProducto']] = $producto; 
					}
				
					
				}
				
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
		$this->db->where('EstatusPedido',1);
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
	
	function cancelaPedido($idPedido){
		if (isset($idPedido) && !empty($idPedido)) {
			$data = array('EstatusPedido' => 0);
			$this->db->where('IdPedido', $idPedido);
			$this->db->update('Pedidos', $data);
			
			return 1;
		}else{
			return 0;
		}
	}

	function traeUsuariosProducto($idProducto)
	{
		if (isset($idProducto)) {
			$this->db->select('Pedidos_IdPedido');
			$this->db->from('DetallePedido');
			$this->db->where('Productos_IdProducto',$idProducto);
			$consulta = $this->db->get();
			
			if ($consulta->num_rows() > 0) {
				foreach ($consulta->result_array() as $pedido) {
					$this->db->select('Usuarios_IdUsuario');
					$this->db->from('Pedidos');
					$this->db->where('IdPedido',$pedido['Pedidos_IdPedido']);
					$this->db->where('EstatusPedido',1);
					$query = $this->db->get();
					
					if ($query->num_rows() > 0) {
						foreach ($query->result_array() as $usuarios) {
							
							//$usuariosT[$usuarios['Usuarios_IdUsuario']] = $usuarios['Usuarios_IdUsuario']; 	
							$this->db->select('*');
							$this->db->from('Usuarios');
							$this->db->where('IdUsuario', $usuarios['Usuarios_IdUsuario']);
							$consulta = $this->db->get();
							
							if($consulta->num_rows() > 0){
								foreach ($consulta->result_array() as $DatosUsuario) {
									$usuariosT[$DatosUsuario['IdUsuario']]= $DatosUsuario; 
									
									$this->db->select('*');
									$this->db->from('DatosUsuario');
									$this->db->where('IdUsuario',$DatosUsuario['IdUsuario']);
									$consulta = $this->db->get();
									if($consulta->num_rows() > 0){
										foreach ($consulta->result_array() as $row) {
											$usuariosT[$DatosUsuario['IdUsuario']][$row['NomCampo']] = $row['Datos']; 
										}
									}
								}
							}
							
						}
						
					}
					
				}
				if (isset($usuariosT)) {
					
					return $usuariosT;	
				}else{
					return 0;
				}
				
			}else{
				return 0;
			}
			
		}else{
			return 0;
		}
	}
}
