<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_controller
 *
 * @author Cindy
 */
class Usuario_controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }
    
    //carga la vista solo si existen las variables de sesion 
    function vista_agregar_usuario()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "Add User";
            $this->load->view('tema/header',$info);
            $this->load->view('usuarios/registrar_usuarios');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
        
    }
    //Procesa los datos del formulario de registro de usuarios.
    function agregar_usuario()
    {
        $data['correo']            =  $this->security->xss_clean(strip_tags($this->input->post('correo')));
        $data['clave']        =  $this->security->xss_clean(strip_tags(md5($this->input->post('clave'))));
        $data['rol_id']             =  $this->security->xss_clean(strip_tags($this->input->post('rol')));
        $data['compannia']         =  $this->security->xss_clean(strip_tags($this->input->post('compania')));
        $data['nombre']    =  $this->security->xss_clean(strip_tags($this->input->post('contacto')));
        $data['telefono']       =  $this->security->xss_clean(strip_tags($this->input->post('telefono')));
        $data['estado']           =  $this->security->xss_clean(strip_tags($this->input->post('abbr')));
        $data['ciudad']            =  $this->security->xss_clean(strip_tags($this->input->post('ciudad')));
        $data['zipcode']        =  $this->security->xss_clean(strip_tags($this->input->post('zipcode')));
        $data['direccion']         =  $this->security->xss_clean(strip_tags($this->input->post('direccion')));
        
        if (($data['correo'] !='') && ($data['clave'] !='') && ($data['rol_id']  !='') && ($data['compannia'] !='') && ($data['nombre'] !='') && ($data['telefono'] !='') && ($data['estado'] !='') && ($data['ciudad'] !='') && ($data['zipcode'] !='') && ($data['direccion'] !='') ) {
            $query = $this->Usuario_model->procesa_insertar($data);

            if (isset($query)) {
                if ($query == FALSE) {
                    $this->session->set_flashdata('error',' Existing user Please check');
                    redirect('Usuario_controller/vista_agregar_usuario', 'refresh');
                }else{
                    $this->session->set_flashdata('correcto',' User added successfully.');
                    redirect('Usuario_controller/vista_agregar_usuario', 'refresh');
                }
            }

        }else{
                $this->session->set_flashdata('correcto',' campos vacios .');
                redirect('Usuario_controller/vista_agregar_usuario', 'refresh');
        }


    }

    function listar_usuarios()
    {
        $info['titulo'] = "Users";
        $this->load->view('tema/header',$info);
        $this->load->view('usuarios/listar_usuarios');
        $this->load->view('tema/footer');
    }
    
    
    function vista_modificar_usuario()
    { 
        $info['titulo'] = "Update User";
        $this->load->view('tema/header',$info);
        $this->load->view('usuarios/modificar_usuario');
        $this->load->view('tema/footer');
    }
}
