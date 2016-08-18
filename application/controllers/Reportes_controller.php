<?php
class Reportes_controller extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();        
    }

    function listar_reportes()
    { 
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 4)||($this->session->userdata('rol_id') == 2))) 
            {

            $info['titulo'] = "Show Category";

            $this->load->view('tema/header',$info);
            $this->load->view('reportes/reportes');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }  
    }
}
