<?php

class Dashboard extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data = array(
            'content' => 'admin/dashboard/index_view'
        );
        $this->load->view('themes/admin/template',$data);
    }
}
