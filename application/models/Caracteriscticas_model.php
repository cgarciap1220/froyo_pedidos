<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caracteriscticas_model
 *
 * @author Cindy
 */
class Caracteriscticas_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function insertar_presentacion($data)
    {
        return $this->db->insert('presentacion',$data);
    }
    
    function obtener_id_presentacion()
    {
        return $this->db->insert_id();
    }
    
    function insertar_caracteristicas($data)
    {
        return $this->db->insert('producto_caracteristicas',$data);
    }
}
