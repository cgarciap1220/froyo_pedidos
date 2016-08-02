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
class Subcategoria_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function seleccionar_subcategoria_categoria($id)
    {
        $this->db->where('categoria_id',$id);
        $query = $this->db->get('subcategoria');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
    
    function seleccionar_subcategoria()
    {
        $query = $this->db->get('subcategoria');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
}
