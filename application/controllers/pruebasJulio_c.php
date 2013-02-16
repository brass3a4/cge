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
		$this->load->view('pruebasJulio', NULL);
	}
	
	function paises() 
	{	
			echo 'Antes de entrar a la funcion....';
			  						
			$Data['datos'] = $this->catalogos_m->mTraerTodo('catPaises', 'IdPais', 'NomPais');
			
			echo 'Entro a la funcion.....';
			
			foreach($Data['datos'] as $key=>$value)
			{
				echo "<option value=".$key.">".$value['NomPais']."</option>";
			}
			
			
	}
	
	function estados() 
	{
			  						
			$Data['datos'] = $this->catalogos_m->mTraerTodo('catEstados', 'IdEstado', 'IdEstado');
			
			foreach($Data['datos'] as $key=>$value)
			{
				echo "<option value=".$key.">".$value['NomEstado']."</option>";
			}
			
			//print_r($Data['datos']);
			$this->load->view('pru_v', NULL);
	}
	
	function pru()
	{
		$data['datos']= $_GET;
		
		$this->load->view('pru2_v', $data);		
	}

}

?>
