<?php

class Formulario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->_is_logged_in();
    }

    public function index() {
        $data = array(
            'content' => 'admin/usuarios/formulario_view'
        );
        $this->load->view('themes/admin/template', $data);
    }

    

}
