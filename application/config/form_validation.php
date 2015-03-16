<?php

$config = array(
    'usuarios_crear' => array(
        array(
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'required|trim|min_length[4]|max_length[80]'
        ),
        array(
            'field' => 'usuario',
            'label' => 'username',
            'rules' => 'required|trim|min_length[4]|max_length[30]|callback__username_check'
        ),
        array(
            'field' => 'contrasena',
            'label' => 'contraseña',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 're_contrasena',
            'label' => 'Vuela a escribir su contraseña',
            'rules' => 'trim|required|matches[contrasena]'
        ),
        array(
            'field' => 'email',
            'label' => 'Correo Electrónico',
            'rules' => 'required|trim|valid_email|max_length[100]|callback__email_check'
        )
    )
);
       /* $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('usuario', 'username', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('contrasena', 'contraseña', 'required|trim|max_length[32]');
        $this->form_validation->set_rules('re_contrasena', 'Vuela a escribir su contraseña', 'required|trim|max_length[32]');
        $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|trim|valid_email|max_length[100]');
        * trim|required|email|is_unique[usuarios.NomUsuario]
        */