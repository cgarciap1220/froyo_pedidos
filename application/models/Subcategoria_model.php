<?php
class Subcategoria_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   
    function seleccionar_categorias()
    {
        $this->db->order_by('categoria','asc');
        $query = $this->db->get('categoria');
        if( $query->num_rows() > 0){
            return $query->result();
        }
        else{
            return FALSE;
        }
    }
    function obtener_categorias($limit,$offset)
    {
        $this->db->order_by('categoria','asc');
        $query = $this->db->get('categoria',$limit,$offset);
        if( $query->num_rows() > 0){
            return $query->result();
        }
        else{
            return FALSE;
        }
    }

    public function obtener_cant_registros_subcategorias()
    {
        $query = $this->db->get('categoria');
        return $query->num_rows();
    }

    public function procesa_categoria_subcategoria($data)
    {

    $this->db->where('categoria_id', $data['categoria_id']);
    $this->db->where('subcategoria', $data['subcategoria']);
    $query = $this->db->get('subcategoria');

        if ($query->num_rows() == 0) {
            return $this->db->insert('subcategoria',$data);
        }else{
            return FALSE;
        }

    }

    public function subcategoria($id)
    {
        $this->db->where('categoria_id', $id);
        $query = $this->db->get('subcategoria');

        if ($query->num_rows() != 0) {
            return $query->result_array();
        }else{
            return FALSE;
        }
    }

   public function editar_subcategorias($id)
    {
        $this->db->where('id_subcategoria', $id);
        $query = $this->db->get('subcategoria');

        if ($query->num_rows() == 1) {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function modificar_subcategorias($id,$data)
    {
        $this->db->where('id_subcategoria',$id);
        return $this->db->update('subcategoria',$data);
    }

    public function eliminar_subcategoria($id)
    {
         $this->db->where('id_subcategoria',$id);
         return $this->db->delete('subcategoria');
    }

}
