<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ciudad_model
 *
 * @author Cindy
 */
class Ciudad_model extends CI_Model {
   
    public function __construct() {
		parent::__construct();
	}
        
    //funcion para obtener los registros de la tba ciudad y mostrarlos en el select
    public function obtener_ciudades()
    {
        $query = $this->db->get('ciudad');
        return $query->result();
    }
}
