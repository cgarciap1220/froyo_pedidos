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
        
    }
    
    function tienda()
    {
        $info['titulo'] = "Store";
        $this->load->view('tema/header',$info);
        $this->load->view('tienda/tienda');
        $this->load->view('tema/footer');
    }
}
