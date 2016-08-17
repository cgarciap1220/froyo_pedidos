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
    
    function obtener_codigo_producto()
    {
        return $this->db->insert_id();
    }
    
    function seleccionar_productos_all($limit,$offset)
    {
        $sql = "SELECT producto.*, categoria.categoria, subcategoria.subcategoria FROM producto
                INNER JOIN categoria ON producto.categoria_id = categoria.id_categoria 
                LEFT JOIN subcategoria ON producto.subcategoria_id = subcategoria.id_subcategoria 
                limit {$limit} offset {$offset}";
        $query = $this->db->query($sql);
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
    
    function obtener_cant_registros_productos()
    {
        $sql = "SELECT producto.*, categoria.categoria, subcategoria.subcategoria FROM producto
                INNER JOIN categoria ON producto.categoria_id = categoria.id_categoria 
                LEFT JOIN subcategoria ON producto.subcategoria_id = subcategoria.id_subcategoria";
        $query = $this->db->query($sql);
        return $query->num_rows();
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
    
    function seleccionar_subcategoria_categoria($id)
    {
        $this->db->where('categoria_id',$id);
        $query = $this->db->get('subcategoria');
        if($query->num_rows() > 0)
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
    
    function seleccionar_categoria()
    {
        $query = $this->db->get('categoria');
        if( $query->num_rows() > 0)
            return $query->result();
        else
            return FALSE;
    }
    
    function tienda()
    {
        $query = $this->db->get('producto');
        if( $query->num_rows() > 0)
            return $query->result_array();
        else
            return FALSE;
    }
}
