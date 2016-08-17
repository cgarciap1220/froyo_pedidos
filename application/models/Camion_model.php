<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Camion_model
 *
 * @author Cindy
 */
class Camion_model extends CI_Model
{
    public function __construct() 
    {
	parent::__construct();
    }
    
    public function listar_camion($limit,$offset) 
    {
       $query = $this->db->get('camion',$limit,$offset);
       if($query->num_rows() == 0)
        {
            return FALSE;
        }
        else
        {
            return $query->result();
        }
    }
    
    public function obtener_cant_registros_camion() 
    {
       $query = $this->db->get('camion');
       return $query->num_rows();
        
    }
}
