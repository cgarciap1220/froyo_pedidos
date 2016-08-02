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
        $this->db->join('categoria','producto.categoria_id = categoria.id_categoria');
        $this->db->join('subcategoria','producto.subcategoria_id = subcategoria.id_subcategoria');
        $query = $this->db->get('producto');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
    
    function seleccionar_producto_id($id)
    {
        $this->db->where('codigo_producto',$id);
        $query = $this->db->get('producto');
        return $query->result();
    }
    
    function modificar_producto($id,$data)
    {
        $this->db->where('codigo_producto',$id);
        return $this->db->update('producto',$data);
    }
    
    function quitar_producto($id)
    {
        $this->db->where('codigo_producto',$id);
        return $this->db->delete('producto');
    }
}