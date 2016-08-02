<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subcategoria_controller
 *
 * @author Cindy
 */
class Subcategoria_controller extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Subcategoria_model');
    }
    function obtener_subcategoria_categoria()
    {
        $id = $this->uri->segment('3');
        $data['subcategoria'] = $this->Subcategoria_model->seleccionar_subcategoria_categoria($id);
        $this->load->view('otros/subcategoria', $data);
    }
}
