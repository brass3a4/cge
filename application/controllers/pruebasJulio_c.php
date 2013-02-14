<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PruebasJulio_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('catalogos_m'));
       }
	
	function index() 
	{	
			echo 'Antes de entrar a la funcion....';
			  						
			$Data['datos'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			
			echo 'Entro a la funcion.....';
			
			$this->load->view('pruebasJulio', $Data);
	}

}

?>
