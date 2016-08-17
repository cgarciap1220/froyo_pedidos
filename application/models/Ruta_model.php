<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ruta_model
 *
 * @author Cindy
 */
class Ruta_model extends CI_Model
{
    public function __construct() 
    {
	parent::__construct();
    }
    
    public function listar_ruta($limit,$offset) 
    {
       $query = $this->db->get('ruta',$limit,$offset);
       if($query->num_rows() == 0)
        {
            return FALSE;
        }
        else
        {
            return $query->result();
        }
    }
    
    public function obtener_cant_registros_ruta() 
    {
       $query = $this->db->get('ruta');
       return $query->num_rows();
    }
}
