<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model {

		public function __construct() {
			parent::__construct();
		}

		public function procesa_login($data){
			$this->db->where('correo', $data['email']);
			$this->db->where('clave', $data['pass']);
			$query = $this->db->get('usuario');

			if ($query->num_rows() == 0) {
				return FALSE;
			}else{
				return $query->result();
			}
		
		}

	}