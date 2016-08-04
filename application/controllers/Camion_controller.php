<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Camion_controller
 *
 * @author Cindy
 */
class Camion_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();        
    }
    
    function listar_camiones()
    { 
        $info['titulo'] = "Show Truck";
        $this->load->view('tema/header',$info);
        $this->load->view('camion/listar_camion');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_camion()
    { 
        $info['titulo'] = "Add Truck";
        $this->load->view('tema/header',$info);
        $this->load->view('camion/insertar_camion');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_camion()
    { 
        $info['titulo'] = "Update Truck";
        $this->load->view('tema/header',$info);
        $this->load->view('camion/modificar_camion');
        $this->load->view('tema/footer');
    }
    
}
