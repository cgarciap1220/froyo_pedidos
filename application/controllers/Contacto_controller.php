<?php
class Contacto_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
    }
    
    function contacto()
    {
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1) || ($this->session->userdata('rol_id') == 5))) 
        {
            $info['titulo'] = "Contact";
            $this->load->view('tema/header',$info);
            $this->load->view('contacto/contacto');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }  
    }

    function enviar_contacto(){

    	$data['compania']   =  $this->security->xss_clean(strip_tags($this->input->post('compania')));
		$data['contacto']   =  $this->security->xss_clean(strip_tags($this->input->post('contacto')));
		$data['email'] =  $this->security->xss_clean(strip_tags($this->input->post('email')));
		$data['mensaje']  =  $this->security->xss_clean(strip_tags($this->input->post('mensaje')));

			if(($data['compania'] != "") && ($data['contacto'] != "") && ($data['email'] != "") && ($data['mensaje'] != ""))
			{
				$this->load->library('email');
				$configuracion['mailtype'] = 'html';
				$this->email->initialize($configuracion);
				$this->email->from('gerber.zirion@gmail.com', 'Gestor de pedidos Froyo Gelato');
				$this->email->to('gerber.zirion@gmail.com');

				$this->email->subject('Contacto pedidos web');
				$this->email->message('Contact name:'.$data['compania'].'<br>E-mail:'.$data['contacto'].'<br>Telephone:'.$data['email'].'<br>Message:'.$data['mensaje']);

				$this->email->send();
				
				$this->session->set_flashdata('correcto','We have received your information , we will contact as soon as possible');

	            redirect('Contacto_controller/contacto','refresh');
			}

    }
}