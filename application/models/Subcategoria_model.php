<?php
class Subcategoria_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function obtener_categorias()
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

    
    
    
 
}
