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

class Agregar_catalogos_c extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('file', 'url'));

    }
    
    public function index(){

        $this->cAgregarCatalogosLugares();
        

    }
    
    /*
     * @name: Agrega los catalogos de derechos afectados
     * @param: no_aplica
     * @descripcion: Esta función agrega el catalogo de paises a la bse de datos.
     * 
     */
    



   
    public function cAgregarCatalogosLugares(){
        
        $paises = read_file('/var/apps/www/sitio/cge/application/controllers/catalogos/paises.csv');
        
        $estados = read_file('/var/apps/www/sitio/cge/application/controllers/catalogos/CatalogosEdos.csv');
        
        $municipios = read_file('/var/apps/www/sitio/cge/application/controllers/catalogos/CatalogosMunicipios.csv');
	/*$paises = get_filenames('/var/apps/www/sitio/cge/application/controllers/catalogos/');*/
		
	$paises = explode('&', $paises);
		
        $estados = explode('&', $estados);
        
        $municipios = explode('&', $municipios);
        
        foreach($paises as $pais){
            
            $datos_pais = explode('¬', $pais);
            
            $lugares['paisesCatalogo'][$datos_pais[0]] = array('paisId' => trim($datos_pais[0]), 'nombre' => trim($datos_pais[1]));
            
        }
        
        foreach($estados as $estado){
            
            $datos_estado = explode('¬', $estado);
            
            $lugares['estadosCatalogo'][trim($datos_estado[0])] = array('estadoId' => trim($datos_estado[0]), 'nombre' => trim($datos_estado[1]), 'paises_paisId' => trim($datos_estado[2]));
            
        }
        
        foreach($municipios as $municipio){
            
            $datos_municipio = explode('¬', $municipio);
            
            $lugares['municipiosCatalogo'][trim($datos_municipio[0])] = array('municipioId' => trim($datos_municipio[0]), 'nombre' => trim($datos_municipio[1]), 'estados_estadoId' => trim($datos_municipio[2]));
            
        }
        
        //$this->agregar_catalogos_m->mAgregarCatalogos($lugares);
       // $this->
        /*echo '<pre>';
        print_r($lugares);
        echo '</pre>';*/
        
        echo '<br />Catalogos de lugares insertados exitosamente.<br />';
        
    }

}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */
