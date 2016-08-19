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
    
    function eliminar_camion($id)
    {
        $this->db->where('id_camion',$id);
        return $this->db->delete('camion');
        
    }
    
    function obtener_rutas()
    {
        $query = $this->db->get('ruta');
        return $query->result();
    }
    
    function obtener_chofer()
    {
        $query = $this->db->get('chofer');
        return $query->result();
    }
    
    function agregar_camion($data)
    {
        $this->db->where('placa', $data['placa']);
        $query = $this->db->get('camion');
        if ($query->num_rows() == 0) {
            return $this->db->insert('camion',$data);
        }else{
            return FALSE;
        }
    }
    
    public function obtener_id_camion()
    {
        return $this->db->insert_id();
    }
    
    public function insertar_ruta_camion($camion_ruta)
    {
        $this->db->insert('ruta_camion',$camion_ruta);
    }
    
    public function insertar_chofer_camion($camion_chofer)
    {
        $this->db->insert('camion_chofer',$camion_chofer);
    }
   
    public function obtener_camion_id($id)
    {
        $this->db->where('id_camion',$id);
        $query = $this->db->get('camion');
        if($query->num_rows() == 0)
        {
            return FALSE;
        }
        else
        {
            return $query->result();
        }
    }
    
    public function seleccionar_ruta_camion($id)
    {
        $sql = "SELECT ruta.*
                FROM camion
                INNER JOIN ruta_camion ON camion.id_camion = ruta_camion.camion_id
                INNER JOIN ruta ON ruta_camion.ruta_id = ruta.id_ruta
                WHERE camion.id_camion = '$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function eliminar_ruta_camion($id)
    {
        $sql = "DELETE FROM ruta_camion
                WHERE ruta_camion.camion_id = '$id' ";
        return $this->db->query($sql);
        
    }
    
    public function seleccionar_chofer_camion($id)
    {
        $sql = "SELECT chofer.*
                FROM camion
                INNER JOIN camion_chofer ON camion.id_camion = camion_chofer.camion_id_camion
                INNER JOIN chofer ON camion_chofer.chofer_id_chofer = chofer.id_chofer
                WHERE camion.id_camion = '$id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function eliminar_chofer_camion($id)
    {
        $sql = "DELETE FROM camion_chofer
                WHERE camion_chofer.camion_id_camion = '$id' ";
        return $this->db->query($sql);
        
    }
    
    function actualizar_camion($id,$data)
    {
        $this->db->where('id_camion',$id);
        return $this->db->update('camion',$data);
    }
}
