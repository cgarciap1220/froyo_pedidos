<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function procesa_insertar($data)
	{
		$this->db->where('correo', $data['correo']);
		$query = $this->db->get('usuario');

			if ($query->num_rows() == 0) {
				return $this->db->insert('usuario',$data);
			}else{
				return FALSE;
			}

	}

	public function procesa_busqueda_usuarios($tipo_usuario)
	{

		if ($tipo_usuario == 5) {
			$this->db->where('rol_id', 5);
		}else{
			$this->db->where('rol_id !=', 5);
		}

		$query = $this->db->get('usuario');
		return $query->num_rows();
		
	}
        
        public function procesa_busqueda_usuarios_row($limit,$offset,$tipo_usuario)
	{

		if ($tipo_usuario == 5) {
			$this->db->where('rol_id', 5);
		}else{
			$this->db->where('rol_id !=', 5);
		}

		$query = $this->db->get('usuario',$limit,$offset);
		
		if($query->num_rows() == 0){
			return FALSE;
		}else{
			return $query->result();
		}
	}

	public function editar_usuario($id){
		$this->db->where('id_usuario', $id);
		$query = $this->db->get('usuario');

		if ($query->num_rows() == 1) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function modificar_usuario($id,$data)
    {
        $this->db->where('id_usuario',$id);
        return $this->db->update('usuario',$data);
    }

    public function eliminar_usuario($id)
    {
    	 $this->db->where('id_usuario',$id);
    	 return $this->db->delete('usuario');	
    }

    

}