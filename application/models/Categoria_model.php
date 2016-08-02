<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subcategoria_model
 *
 * @author Cindy
 */
class Categoria_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function seleccionar_categoria()
    {
        $query = $this->db->get('categoria');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
}
