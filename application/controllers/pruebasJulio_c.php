<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PruebasJulio_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('catalogos_m', 'usuarios_m'));
       }
	
	function index()
	{
		$data['datos']=$this->pru();
		$this->load->view('pruebasJulio', $data);
	}
	
		
	function pru()
	{
		$datos = array( 'saludo' => 'hola');
		
		$variable = $this->usuarios_m->guardaUsuario($datos);
		
		return $variable;
	}

}

?>
