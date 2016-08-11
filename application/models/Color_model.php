<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Color_model
 *
 * @author Cindy
 */
class Color_model extends CI_Model
{
      public function __construct() 
    {
        parent::__construct();
    }
    
    function seleccionar_color()
    {
        $query = $this->db->get('color');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
}
