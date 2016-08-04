<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subsubcategoria_controller
 *
 * @author Cindy
 */
class Subsubcategoria_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Subsubcategoria_model');
    }
    
    function obtener_subsubcategoria_subcategoria()
    {
        $id = $this->uri->segment('3');
        $data['subsubcategoria'] = $this->Subsubcategoria_model->seleccionar_subsubcategoria_subcategoria($id);
        $this->load->view('otros/subsubcategoria', $data);
    }
    
    function listar_subcategorias()
    { 
        $info['titulo'] = "Show Subcategory";
        $this->load->view('tema/header',$info);
        $this->load->view('subcategoria/listar_subcategoria');
        $this->load->view('tema/footer');
    }
    
    function vista_agregar_subcategoria()
    { 
        $info['titulo'] = "Add Subcategory";
        $this->load->view('tema/header',$info);
        $this->load->view('subcategoria/insertar_subcategoria');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_subcategoria()
    { 
        $info['titulo'] = "Update Subcategory";
        $this->load->view('tema/header',$info);
        $this->load->view('subcategoria/modificar_subcategoria');
        $this->load->view('tema/footer');
    }
}
