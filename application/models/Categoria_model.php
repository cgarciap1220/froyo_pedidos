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
    public function listar_categorias($limit,$offset)
    {
        $this->db->order_by('categoria','asc');
        $query = $this->db->get('categoria',$limit,$offset);

        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result();
        }

    }
    
    public function obtener_cant_registros_categoria() 
    {
       $query = $this->db->get('categoria');
       return $query->num_rows();
        
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


    public function obtener_categorias_subcategorias($id)
    {
            $this->db->where('categoria_id',$id);
            $query = $this->db->get('subcategoria');

            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                return FALSE;
            }
    }

    public function obtener_categorias_productos($id)
    {
            $this->db->where('categoria_id',$id);
            $query = $this->db->get('producto');

            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                return FALSE;
            }
    }

     public function eliminar_categoria($id)
    {
         $this->db->where('id_categoria',$id);
         return $this->db->delete('categoria');
    }


}