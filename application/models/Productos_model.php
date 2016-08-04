<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Productos_model
 *
 * @author Cindy
 */
class Productos_model extends CI_Model {
     
    public function __construct() 
    {
        parent::__construct();
    }
    
    function insertar_producto($data)
    {
        return $this->db->insert('producto',$data);
    }
    
    function seleccionar_productos_all()
    {
        $query = $this->db->get('producto');
        return $query->result();
    }
}
