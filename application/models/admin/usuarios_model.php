<?php

class Usuarios_Model extends CI_Model{
    
    
    
    public function crearUsuario($nombre,$usuario,$contrasena,$email){
        $data = array(
            'nombre'        => $nombre,
            'usuario'       => $usuario,
            'contrasena'    => $contrasena,
            'email'         => $email
        );
        
        return $this->db->insert('users',$data);
        
    }
    
    function username_check($usuario){
        //active record
        $this->db->where('usuario',$usuario); //consulta donde el campo usuario = $usuario
        $query = $this->db->get('users'); // obtiene los datos de la tabla users $query es un objeto
        if($query->num_rows()>0){
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function email_check($email){
        //active record
        $this->db->where('email',$email); //consulta donde el campo usuario = $usuario
        $query = $this->db->get('users'); // obtiene los datos de la tabla users $query es un objeto
        if($query->num_rows()>0){
            return FALSE;
        } else {
            return TRUE;
        }        
    }
    
    public function actualizarUsuario(){
        
    }
}
