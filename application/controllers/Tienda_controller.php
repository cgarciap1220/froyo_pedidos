<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tienda_controller
 *
 * @author Cindy
 */
class Tienda_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Productos_model');
    }
    
    function tienda()
    {
        $info['titulo'] = "Store";
        $productos = $this->Productos_model->tienda();
        $datos['productos'] = $productos;
        $this->load->view('tema/header',$info);
        $this->load->view('tienda/tienda',$datos);
        $this->load->view('tema/footer');
    }
}
