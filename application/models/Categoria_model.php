<?php

class Categoria_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    // funcion para insertar categoria, verifica que no se repita 
    public function procesa_categoria_insertar($data)
    {
    
    $this->db->where('categoria', $data['categoria']);
    $query = $this->db->get('categoria');

        if ($query->num_rows() == 0) {
            return $this->db->insert('categoria',$data);
        }else{
            return FALSE;
        }

    }
    // funcion para listar categorias , verifica que haya contenido
    public function listar_categorias()
    {
        $this->db->order_by('categoria','asc');
        $query = $this->db->get('categoria');
        
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }

    }

    //funcion para cargar la vista del formulario de categoria, con el registro solicitado
    public function editar_categorias($id)
    {
        $this->db->where('id_categoria', $id);
        $query = $this->db->get('categoria');

        if ($query->num_rows() == 1) {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function modificar_categorias($id,$data)
    {
        $this->db->where('id_categoria',$id);
        return $this->db->update('categoria',$data);
    }


     public function eliminar_categoria($id)
    {
         $this->db->where('id_categoria',$id);
         return $this->db->delete('categoria');   
    }
    
    
}