<?php

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('admin/Usuarios_Model'));
        // $this->_is_logged_in();
    }

    public function index() {
        $data = array(
            'content' => 'admin/usuarios/index_view'
        );
        $this->load->view('themes/admin/template', $data);
    }

    public function login() {
        echo 'login';
    }

    public function _is_logged_in() {
        /* $is_logged_in = $this->session->userdata('is_logged_in');
          if (!isset($is_logged_in) || $is_logged_in != TRUE) {
          $this->login();
          } else { */
        $data = array(
            'content' => 'admin/dashboard'
        );
        // $this->load->view('themes/admin/template',$data);
        //}
    }

    public function crear() {
            $data = array(
                'content' => 'admin/usuarios/crear_view'
            );
            $this->load->view('themes/admin/template', $data);
    }

    public function crear_usuario() {

        if ($this->form_validation->run('usuarios_crear',TRUE)) {
            /*echo '<pre>';
            print_r($_POST);
            echo '</pre>';*/
            $nombre = $this->input->post('nombre');
            $usuario = $this->input->post('usuario');
            $contrasena = $this->input->post('contrasena');
            $email = $this->input->post('email');
            $insert = $this->Usuarios_Model->crearUsuario($nombre,$usuario,$contrasena,$email);
        } else {
            $data = array(
                'content' => 'admin/usuarios/crear_view'
            );
            $this->load->view('themes/admin/template', $data);
        }        
    }
    
    function _username_check($usuario){
        return $this->Usuarios_Model->username_check($usuario);
    }
    
    function _email_check($email){
        return $this->Usuarios_Model->email_check($email);        
    }

    public function borrar($IdUsuario) {
        
    }

    public function editar($IdUsuario) {
        
    }

    public function desactivar($IdUsuario) {
        
    }

    public function activar($dUsuario) {
        
    }

    public function perfil($IdUsuario) {
        
    }

    public function logout() {
        
    }

}
