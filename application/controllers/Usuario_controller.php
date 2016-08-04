<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_controller
 *
 * @author Cindy
 */
class Usuario_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
    }
    
    function listar_usuarios()
    {
        $info['titulo'] = "Users";
        $this->load->view('tema/header',$info);
        $this->load->view('usuarios/listar_usuarios');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_usuario()
    { 
        $info['titulo'] = "Add User";
        $this->load->view('tema/header',$info);
        $this->load->view('usuarios/registrar_usuarios');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_usuario()
    { 
        $info['titulo'] = "Update User";
        $this->load->view('tema/header',$info);
        $this->load->view('usuarios/modificar_usuario');
        $this->load->view('tema/footer');
    }
}
