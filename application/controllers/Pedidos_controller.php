<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedidos_controller
 *
 * @author Cindy
 */
class Pedidos_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();        
    }
    
    function listar_pedidos()
    { 
        $info['titulo'] = "Show Order";
        $this->load->view('tema/header',$info);
        $this->load->view('pedidos/listar_pedido');
        $this->load->view('tema/footer');
    }
    
    function listar_pedidos_pendientes()
    { 
        $info['titulo'] = "Show Order Pending";
        $this->load->view('tema/header',$info);
        $this->load->view('pedidos/listar_pedido_pendientes');
        $this->load->view('tema/footer');
    }
    
    function listar_pedidos_enviados()
    { 
        $info['titulo'] = "Show Order Sent";
        $this->load->view('tema/header',$info);
        $this->load->view('pedidos/listar_pedido_enviados');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_pedido()
    { 
        $info['titulo'] = "Add Order";
        $this->load->view('tema/header',$info);
        $this->load->view('pedidos/insertar_pedido');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_pedido()
    { 
        $info['titulo'] = "Update Order";
        $this->load->view('tema/header',$info);
        $this->load->view('pedidos/modificar_pedido');
        $this->load->view('tema/footer');
    }
    
}
