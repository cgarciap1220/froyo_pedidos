<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chofer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function procesa_agegar_chofer($data)
    {
    
    $this->db->where('nombre', $data['nombre']);
    $this->db->where('dpi', $data['dpi']);
    
    $query = $this->db->get('chofer');

        if ($query->num_rows() == 0) {
            return $this->db->insert('chofer',$data);
        }else{
            return FALSE;
        }

    }
    
    public function obtener_cant_registros_chofer()
    {
        $query = $this->db->get('chofer');
        return $query->num_rows();
    }

    // funcion para listar choferes , verifica que haya contenido
    public function listar_chofer($limit,$offset)
    {
        $this->db->order_by('id_chofer','asc');
        $query = $this->db->get('chofer',$limit,$offset);

        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }

    }

    //funcion para cargar la vista del formulario de choferes, con el registro solicitado
    public function editar_chofer($id)
    {
        $this->db->where('id_chofer', $id);
        $query = $this->db->get('chofer');

        if ($query->num_rows() == 1) {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    // actualiza el registro 
    public function modificar_chofer($id,$data)
    {
        $this->db->where('id_chofer',$id);
        return $this->db->update('chofer',$data);
    }
	// borra el registro 
    public function eliminar_chofer($id)
    {
         $this->db->where('id_chofer',$id);
         return $this->db->delete('chofer');
    }

}