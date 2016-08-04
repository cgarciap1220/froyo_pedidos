<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contacto_controller
 *
 * @author Cindy
 */
class Contacto_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
    }
    
    function contacto()
    {
        $info['titulo'] = "Contact";
        $this->load->view('tema/header',$info);
        $this->load->view('contacto/contacto');
        $this->load->view('tema/footer');
    }
}