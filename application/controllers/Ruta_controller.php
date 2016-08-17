<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ruta_controller
 *
 * @author Cindy
 */
class Ruta_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct();     
        $this->load->model('Ruta_model');
    }
    
    function listar_rutas()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $limit = 10;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Ruta_controller/listar_rutas/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Ruta_model->obtener_cant_registros_ruta();
            /*Obtiene el numero de registros a mostrar por pagina */
             $config['per_page'] = $limit;
             $config['num_links'] = 20;
            /*Indica que segmento de la URL tiene la paginación, por default es 3*/
            $config['uri_segment'] = '3';
            /*Se personaliza la paginación para que se adapte a bootstrap*/
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_link'] = '<button class="btn btn-white btn-sm" type="button">First</button>';//primer link
            $config['last_link'] = '<button class="btn btn-white btn-sm" type="button">Last</button>';//último link
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Back';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            /* Se inicializa la paginacion*/
            $this->pagination->initialize($config);

            $info['titulo'] = "List Route";
            $query = $this->Ruta_model->listar_ruta($limit,$offset);
            if(isset($query)){
                    
                if ($query == FALSE)
                {

                    $data['vacio'] = 'No data to print';
                            
                    $this->load->view('tema/header',$info);
                    $this->load->view('ruta/listar_ruta',$data);
                    $this->load->view('tema/footer');
                            
                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('ruta/listar_ruta',$data);
                    $this->load->view('tema/footer');
                }
            }
            else
            {
                $this->session->set_flashdata('correcto',' Empty input .');
                redirect('Usuario_controller/listar_usuario', 'refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }    
        
        
        
    }
    
    function vista_agregar_ruta()
    { 
        $info['titulo'] = "Add Route";
        $this->load->view('tema/header',$info);
        $this->load->view('ruta/insertar_ruta');
        $this->load->view('tema/footer');
    }
    
    function vista_modificar_ruta()
    { 
        $info['titulo'] = "Update Route";
        $this->load->view('tema/header',$info);
        $this->load->view('ruta/modificar_ruta');
        $this->load->view('tema/footer');
    }
    
}
