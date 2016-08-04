<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Principal_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

		}
		
		public function principal()
		{
			
			$info['titulo'] = 'Froyo Sistem Order';
				
			$this->load->view('tema/header', $info);
			$this->load->view('principal/principal');
			$this->load->view('tema/footer');
			
		}


	}
