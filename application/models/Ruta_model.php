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
    
    public function obtener_ruta($id)
    {
        $this->db->where('id_ruta',$id);
        $query = $this->db->get('ruta');
        if($query->num_rows() == 0)
        {
            return FALSE;
        }
        else
        {
            return $query->result();
        }
    }
    
    public function insertar_ruta($data)
    {
        $this->db->where('ruta', $data['ruta']);
        $query = $this->db->get('ruta');

            if ($query->num_rows() == 0) {
                return $this->db->insert('ruta',$data);
            }else{
                return FALSE;
            }
    }
    
    public function obtener_id_ruta()
    {
        return $this->db->insert_id();
    }
    
    public function insertar_ruta_ciudad($ruta_ciudad)
    {
        $this->db->insert('ciudad_ruta',$ruta_ciudad);
    }
    
    public function seleccionar_ruta_ciudad($id)
    {
        $sql = "SELECT ciudad.*
                FROM ruta
                INNER JOIN ciudad_ruta ON ruta.id_ruta = ciudad_ruta.ruta_id
                INNER JOIN ciudad ON ciudad_ruta.ciudad_id = ciudad.id_ciudad
                WHERE ruta.id_ruta = '$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function eliminar_ruta_ciudad($id)
    {
        $sql = "DELETE FROM ciudad_ruta
                WHERE ciudad_ruta.ruta_id = '$id' ";
        return $this->db->query($sql);
        
    }
    
    function actualizar_ruta($id,$data)
    {
        $this->db->where('id_ruta',$id);
        return $this->db->update('ruta',$data);
        
    }
    function eliminar_ruta($id)
    {
        $this->db->where('id_ruta',$id);
        return $this->db->delete('ruta');
        
    }
    
}
