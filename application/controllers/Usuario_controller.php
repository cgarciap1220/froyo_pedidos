<?php
class Usuario_controller extends CI_Controller 
{
    public function __construct() 

    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Ciudad_model');
    }
    
    //carga la vista solo si existen las variables de sesion 
    function vista_agregar_usuario()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "Add User";
            $data['ciudad'] = $this->Ciudad_model->obtener_ciudades();
            $this->load->view('tema/header',$info);
            $this->load->view('usuarios/registrar_usuarios',$data);
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
        $tipo_usuario = $this->security->xss_clean(strip_tags($this->input->post('tipo_usuario')));
        $buscar = $this->security->xss_clean(strip_tags($this->input->post('mostrar')));
        if($buscar =='List now')
        {
            $this->session->unset_userdata('$tipo_usuario');
            $this->session->unset_userdata('pag');
            
        }
        $pag = $this->session->userdata('pag');
        if ($pag!=null){
            $pag++;
           $this->mostrar_resultados_busqueda_usuarios();
        }
        /*else
            $pag=0;*/
        if ($pag==null){
                $pag=1;
                 $parametros = array(
                     'tipo_usuario' =>$tipo_usuario,
                     'pag' => $pag,
                     );
                $this->session->set_userdata($parametros);
                $this->mostrar_resultados_busqueda_usuarios();
        }
        
    }
    
    function mostrar_resultados_busqueda_usuarios()
    {
        $pag = $this->session->userdata('pag');
        $pag++;
        $pag = array('pag' => $pag,);
        $this->session->set_userdata($pag);
        $tipo_usuario =  $this->session->userdata('tipo_usuario');
        if($tipo_usuario != "") 
        {
            $limit = 10;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Usuario_controller/mostrar_resultados_busqueda_usuarios/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Usuario_model->procesa_busqueda_usuarios($tipo_usuario);
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

            $info['titulo'] = 'List Users';
            $query = $this->Usuario_model->procesa_busqueda_usuarios_row($limit,$offset,$tipo_usuario);
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
        else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }
    //carga la vista de modificar usuarios y coloca el contenido del registro especifico 
    function vista_modificar_usuario()
    { 
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)||($this->session->userdata('rol_id') == 2)||($this->session->userdata('rol_id') == 3)||($this->session->userdata('rol_id') == 4)||($this->session->userdata('rol_id') == 5))) {
            $info['titulo'] = "Update User";
            $id = $this->uri->segment(3); 
            $query = $this->Usuario_model->editar_usuario($id);
            $data['ciudad'] = $this->Ciudad_model->obtener_ciudades();
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
    
    function listar_clientes()
    {
        if($this->session->userdata('correo') && (($this->session->userdata('rol_id') == 1)|| ($this->session->userdata('rol_id') == 2))) {
            $info['titulo'] = "List Users";
            $this->load->view('tema/header',$info);
            $this->load->view('usuarios/listar_clientes');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }
    
    
}
