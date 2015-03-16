<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/*
	 * 
    Copyright 2013, i(dh)eas, Litigio Estratégico en Derechos Humanos A.C


    This file is part of bd(i).

    bd(i) is free software: you can redistribute it and/or modify


    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    bd(i) is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with bd(i). If not, see <http://www.gnu.org/licenses/>.


	 * */
class Catalogos_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}
	
	/* Este modelo trae los datos de un catálogo que sólo tienen un nivel de alcance
	 * @param $nombreCatalogo
	 * */
	
	public function mTraerDatosCatalogoNombre($nombreCatalogo){
		
		//$nombreCatalogo = 'estatusPerpetradorCatalogo';
		
		$this->db->select('*');
		$this->db->from($nombreCatalogo);
		
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		if ($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $row) {
				$datos[$nombreCatalogo][] = $row;
			}
		
			return $datos;
		}else{
			$mensaje = 'No hay datos en el catalogo'+$nombreCatalogo;
			return (isset($mensaje));
		}
		
	}/* Fin de mTraerDatosCatalogoNombre*/
	
	
	function mTraerTodo($tabla, $llave_primaria = null, $order_by = null){
            
            if(!$order_by){
                
                $consulta = $this->db->select('*')->from($tabla)->get();
                
            } else {
                
                $consulta = $this->db->select('*')->from($tabla)->order_by($order_by)->get();
                
            }
            
            if($llave_primaria){
                
                foreach($consulta->result_array() as $fila){
                 
                    $datos[$fila[$llave_primaria]] = $fila;
                    
                }
                    
            } else {
                
                foreach($consulta->result_array() as $fila){
                 
                    $datos = $fila;
                    
                }
                    
            }
             
            if(isset($datos)){
                
                return $datos;
                
            } else {
                
                return null;
                
            }
            
        }
	
	
}
