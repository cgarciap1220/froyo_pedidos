<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ruta_controller
 *
 * @author Cindy
 */
class Ruta_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();        
    }
    
    function listar_rutas()
    { 
        $info['titulo'] = "Show Route";
        $this->load->view('tema/header',$info);
        $this->load->view('ruta/listar_ruta');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_ruta()
    { 
        $info['titulo'] = "Add Route";
        $this->load->view('tema/header',$info);
        $this->load->view('ruta/insertar_ruta');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_ruta()
    { 
        $info['titulo'] = "Update Route";
        $this->load->view('tema/header',$info);
        $this->load->view('ruta/modificar_ruta');
        $this->load->view('tema/footer');
    }
    
}
