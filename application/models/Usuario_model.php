<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function procesa_insertar($data){
	$this->db->where('correo', $data['correo']);
	$this->db->where('compannia', $data['compannia']);
	$query = $this->db->get('usuario');

		if ($query->num_rows() == 0) {
			return $this->db->insert('usuario',$data);
		}else{
			return FALSE;
		}

	}

}