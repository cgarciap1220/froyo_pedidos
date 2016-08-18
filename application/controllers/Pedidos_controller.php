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
         if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4) ||($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Show Order";
            $this->load->view('tema/header',$info);
            $this->load->view('pedidos/listar_pedido');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }      
    }
    
    function listar_pedidos_pendientes()
    { 
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4) ||($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Show Order Pending";
            $this->load->view('tema/header',$info);
            $this->load->view('pedidos/listar_pedido_pendientes');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }        
    }
    
    function listar_pedidos_enviados()
    { 
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4) ||($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Show Order Sent";
            $this->load->view('tema/header',$info);
            $this->load->view('pedidos/listar_pedido_enviados');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }     
    }
    
    function vista_agregar_pedido()
    {   
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4) ||($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Add Order";
            $this->load->view('tema/header',$info);
            $this->load->view('pedidos/insertar_pedido');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }     
    }
    
    function vista_modificar_pedido()
    {   
         if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4) ||($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Update Order";
            $this->load->view('tema/header',$info);
            $this->load->view('pedidos/modificar_pedido');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        } 
    }
    
}
