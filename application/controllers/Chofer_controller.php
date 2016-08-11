<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chofer_controller
 *
 * @author Cindy
 */
class Chofer_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();        
    }
    
    function listar_chofer()
    { 
        $info['titulo'] = "Show Driver";
        $this->load->view('tema/header',$info);
        $this->load->view('chofer/listar_chofer');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_chofer()
    { 
        $info['titulo'] = "Add Driver";
        $this->load->view('tema/header',$info);
        $this->load->view('chofer/insertar_chofer');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_chofer()
    { 
        $info['titulo'] = "Update Driver";
        $this->load->view('tema/header',$info);
        $this->load->view('chofer/modificar_chofer');
        $this->load->view('tema/footer');
    }
    
}
