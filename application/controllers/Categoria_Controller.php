<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria_Controller
 *
 * @author Cindy
 */
class Categoria_Controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();        
    }
    
    function listar_categorias()
    { 
        $info['titulo'] = "Show Category";
        $this->load->view('tema/header',$info);
        $this->load->view('categoria/listar_categoria');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_categoria()
    { 
        $info['titulo'] = "Add Category";
        $this->load->view('tema/header',$info);
        $this->load->view('categoria/insertar_categoria');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_categoria()
    { 
        $info['titulo'] = "Update Category";
        $this->load->view('tema/header',$info);
        $this->load->view('categoria/modificar_categoria');
        $this->load->view('tema/footer');
    }
    
}
