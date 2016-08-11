<?php
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
        $data['correo']       =  $this->security->xss_clean(strip_tags($this->input->post('correo')));
        $data['clave']        =  $this->security->xss_clean(strip_tags(md5($this->input->post('clave'))));
        $data['rol_id']       =  $this->security->xss_clean(strip_tags($this->input->post('rol')));
        $data['compannia']    =  $this->security->xss_clean(strip_tags($this->input->post('compania')));
        $data['nombre']       =  $this->security->xss_clean(strip_tags($this->input->post('contacto')));
        $data['telefono']     =  $this->security->xss_clean(strip_tags($this->input->post('telefono')));
        $data['estado']       =  $this->security->xss_clean(strip_tags($this->input->post('abbr')));
        $data['ciudad']       =  $this->security->xss_clean(strip_tags($this->input->post('ciudad')));
        $data['zipcode']      =  $this->security->xss_clean(strip_tags($this->input->post('zipcode')));
        $data['direccion']    =  $this->security->xss_clean(strip_tags($this->input->post('direccion')));
        
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
            $this->session->set_flashdata('correcto',' Empty input .');
            redirect('Usuario_controller/vista_agregar_usuario', 'refresh');
        }


    }

    //carga la vista  de listar usuiaros solo si existen las variables de sesion 
    function listar_usuarios()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "List Users";
            $this->load->view('tema/header',$info);
            $this->load->view('usuarios/listar_usuarios');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }
    //Procesa los datos del formulario de busqueda de los usuarios. 
    function busqueda_usuarios()
    {
        $data['tipo_usuario'] = $this->security->xss_clean(strip_tags($this->input->post('tipo_usuario')));
        if (isset($data['tipo_usuario']) && $data['tipo_usuario'] !='') {

            $query = $this->Usuario_model->procesa_busqueda_usuarios($data);

            $info['titulo'] = 'List Users';

            if(isset($query)){
                    
                if ($query == FALSE) {

                    $data['vacio'] = 'No data to print';
                            
                    $this->load->view('tema/header',$info);
                    $this->load->view('usuarios/listar_usuarios',$data);
                    $this->load->view('tema/footer');
                            
                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('usuarios/listar_usuarios', $data);
                    $this->load->view('tema/footer');    
                }
            }else{
                $this->session->set_flashdata('correcto',' Empty input .');
                redirect('Usuario_controller/listar_usuario', 'refresh');
            }
        }

     
    }
    //carga la vista de modificar usuarios y coloca el contenido del registro especifico 
    function vista_modificar_usuario()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "Update User";
            $id = $this->uri->segment(3); 
            $query = $this->Usuario_model->editar_usuario($id);

            if (isset($query)) {
                if ($query != FALSE) {
                    $data['query'] = $query;
                    $data['id'] = $id;

                    $this->load->view('tema/header',$info);
                    $this->load->view('usuarios/modificar_usuario',$data);
                    $this->load->view('tema/footer');
                }
            }
            }else{
                $this->session->set_flashdata('error','Login to access.');
                redirect('Login_controller/login','refresh');
            }
    }

    public function ingresar_modificacion_usuario()
    {
            $id = $this->uri->segment('3');

            $data['correo']       =  $this->security->xss_clean(strip_tags($this->input->post('correo')));
            $data['clave']        =  $this->security->xss_clean(strip_tags(md5($this->input->post('clave'))));
            $data['rol_id']       =  $this->security->xss_clean(strip_tags($this->input->post('rol')));
            $data['compannia']    =  $this->security->xss_clean(strip_tags($this->input->post('compania')));
            $data['nombre']       =  $this->security->xss_clean(strip_tags($this->input->post('contacto')));
            $data['telefono']     =  $this->security->xss_clean(strip_tags($this->input->post('telefono')));
            $data['estado']       =  $this->security->xss_clean(strip_tags($this->input->post('abbr')));
            $data['ciudad']       =  $this->security->xss_clean(strip_tags($this->input->post('ciudad')));
            $data['zipcode']      =  $this->security->xss_clean(strip_tags($this->input->post('zipcode')));
            $data['direccion']    =  $this->security->xss_clean(strip_tags($this->input->post('direccion')));

            if(($data['correo'] !='') && ($data['clave'] !='') && ($data['rol_id'] !='') && ($data['compannia'] !='')&& ($data['nombre'] !='') && ($data['telefono'] !='') && ($data['estado'] !='') && ($data['ciudad'] !='') && ($data['zipcode'] !='') && ($data['direccion'] !='')){
                $query = $this->Usuario_model->modificar_usuario($id, $data);

                if (isset($query) && $query == TRUE)
                {
                    $this->session->set_flashdata('correcto','The user is successfully updated');
                    redirect('Usuario_controller/vista_modificar_usuario/'.$id,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('error','Failed to update , revice information');
                    $this->vista_modificar_usuario($id);
                }
            }


    }

    function eliminar_usuario(){
            $id = $this->uri->segment('3');
            if (isset($id) && $id != '') {
                $query = $this->Usuario_model->eliminar_usuario($id);

                if (isset($query) && $query == TRUE) {
                    $this->session->set_flashdata('correcto','Registry is successfully deleted ');
                    redirect('Usuario_controller/listar_usuarios/','refresh');
                }else{
                    $this->session->set_flashdata('error','Registry is not eliminated');
                    redirect('Usuario_controller/listar_usuarios/','refresh');
                }
            }else{
                $this->session->set_flashdata('error',' ');
                redirect('Usuario_controller/listar_usuarios/','refresh');
            }

      
    }
}
