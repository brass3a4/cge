<?php

class Myform extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('myform_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|max_length[255]');			
		$this->form_validation->set_rules('usuario', 'username', 'required|trim|max_length[50]');			
		$this->form_validation->set_rules('contrasena', 'contraseña', 'required|trim|max_length[32]');			
		$this->form_validation->set_rules('re_contrasena', 'Vuela a escribir su contraseña', 'required|trim|max_length[32]');			
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|trim|valid_email|max_length[100]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('myform_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'nombre' => set_value('nombre'),
					       	'usuario' => set_value('usuario'),
					       	'contrasena' => set_value('contrasena'),
					       	're_contrasena' => set_value('re_contrasena'),
					       	'email' => set_value('email')
						);
					
			// run insert model to write data to db
		
			if ($this->myform_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('myform/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>