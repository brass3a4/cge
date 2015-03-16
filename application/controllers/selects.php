<?php

class Selects extends CI_Controller{
    
     public function __construct() {
         parent::__construct();
     }
     
     public function index (){
         $this->load->view('selects_view');
     }
}
