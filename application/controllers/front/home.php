<?php

class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        //echo 'inicio';
        $data = array(
            'content' => 'front/inicio/index_view'
        );
        $this->load->view('themes/front/template',$data);
    }
       
    public function mi_cuenta(){
        echo 'mi cuenta de prueba';
    }
}