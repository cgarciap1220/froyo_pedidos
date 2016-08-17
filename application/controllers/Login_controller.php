<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');
	}

	function index()
	{       
	    $data['titulo'] = 'Froyo Sistem Order';
		$this->load->view('login', $data);
	}

	public function procesa_login()
	{
        $data['email'] = $this->security->xss_clean(strip_tags($this->input->post('email')));
		$data['pass'] = $this->security->xss_clean(strip_tags(md5($this->input->post('pass'))));
			
		if (($data['email']!= '') && ($data['pass'] != '')){
			$query = $this->Login_model->procesa_login($data);
		}

		if(isset($query)){
				if ($query == FALSE) {
					$this->session->set_flashdata('error',' User or password incorrect, !!Vuelva a intentar¡¡');
					redirect('Login_controller/index','refresh');
				}else{
					foreach ($query as $key ) {
						$data['id_usuario'] =  $key->id_usuario;
						$data['nombre'] =  $key->nombre;
						$data['correo'] =  $key->correo;
						$data['telefono'] =  $key->telefono;
						$data['compannia'] =  $key->compannia;
						$data['zipcode'] =  $key->zipcode;
						$data['ciudad'] =  $key->ciudad;
						$data['estado'] =  $key->estado;
						$data['direccion'] =  $key->direccion;
						$data['rol_id'] =  $key->rol_id;
						$data['fecha_registro'] =  $key->fecha_registro;
						$data['hora_registro'] =  $key->hora_registro;

						$this->session->set_userdata($data);
					}
				
						$this->session->set_flashdata('correcto','Login Successful.');
						redirect('Principal_controller/principal', 'refresh');
				}	
			}else{
				redirect('Login_controller/index','refresh');
			}

	}

	public function cerrar()
	{
		$this->session->sess_destroy();
	    redirect('Login_controller/index','refresh');
	    $this->session->set_flashdata('correcto', 'Loguot');
	}


}
