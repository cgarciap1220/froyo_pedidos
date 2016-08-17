<?php
class Chofer_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct(); 
        $this->load->model('Chofer_model');       
    }

    //carga la vista solo si existen las variables de sesion 
    function vista_agregar_chofer()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $info['titulo'] = "Add Driver";

            $this->load->view('tema/header',$info);
            $this->load->view('chofer/insertar_chofer');
            $this->load->view('tema/footer');
        
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
        
    }

    //Procesa los datos del formulario de insertar chofer
    function agregar_chofer()
    {
        $data['nombre'] =  $this->security->xss_clean(strip_tags($this->input->post('nombre')));
        $data['dpi'] =  $this->security->xss_clean(strip_tags($this->input->post('dpi')));
        $data['direccion'] =  $this->security->xss_clean(strip_tags($this->input->post('direccion')));
        $data['telefono'] =  $this->security->xss_clean(strip_tags($this->input->post('telefono')));
        $data['no_licencia'] =  $this->security->xss_clean(strip_tags($this->input->post('no_licencia')));
        $data['fecha_vencimiento'] =  $this->security->xss_clean(strip_tags($this->input->post('fecha_vencimiento')));

        
        if (($data['nombre'] !='') && ($data['dpi'] !='') && ($data['direccion'] !='') && ($data['telefono'] !='') && ($data['no_licencia'] !='') && ($data['fecha_vencimiento'] !='')) {
            $query = $this->Chofer_model->procesa_agegar_chofer($data);

            if (isset($query)) {
                if ($query == FALSE) {
                    $this->session->set_flashdata('error',' Existing driver Please check');
                    redirect('Chofer_controller/vista_agregar_chofer', 'refresh');
                }else{
                    $this->session->set_flashdata('correcto',' Driver added successfully.');
                    redirect('Chofer_controller/vista_agregar_chofer', 'refresh');
                }
            }

        }else{
            $this->session->set_flashdata('correcto',' Empty input .');
            redirect('Chofer_controller/vista_agregar_chofer', 'refresh');
        }


    }
    
    //Carga la lista de choferes existentes.
    function listar_chofer()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $limit = 10;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Chofer_controller/listar_chofer/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Chofer_model->obtener_cant_registros_chofer();
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
            
            
            $query = $this->Chofer_model->listar_chofer($limit,$offset);

            $info['titulo'] = "Show Driver";

            if(isset($query)){

                if ($query == FALSE) {

                    $data['vacio'] = 'No data to print';

                    $this->load->view('tema/header',$info);
                    $this->load->view('chofer/listar_chofer');
                    $this->load->view('tema/footer');

                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('chofer/listar_chofer',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }
    
    //Carga carga el formulario con los datos del registro a actualizar.
    function vista_modificar_chofer()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "Update Driver";
            $id = $this->uri->segment(3);
            $query = $this->Chofer_model->editar_chofer($id);
            if (isset($query)) {
                if ($query != FALSE) {
                    $data['query'] = $query;
                    $data['id'] = $id;

                    $this->load->view('tema/header',$info);
                    $this->load->view('chofer/modificar_chofer',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

    function ingresar_modificacion_chofer()
    {
        $id = $this->uri->segment('3');

        $data['nombre'] =  $this->security->xss_clean(strip_tags($this->input->post('nombre')));
        $data['dpi'] =  $this->security->xss_clean(strip_tags($this->input->post('dpi')));
        $data['direccion'] =  $this->security->xss_clean(strip_tags($this->input->post('direccion')));
        $data['telefono'] =  $this->security->xss_clean(strip_tags($this->input->post('telefono')));
        $data['no_licencia'] =  $this->security->xss_clean(strip_tags($this->input->post('no_licencia')));
        $data['fecha_vencimiento'] =  $this->security->xss_clean(strip_tags($this->input->post('fecha_vencimiento')));


        if(($data['nombre'] !='') && ($data['dpi'] !='') && ($data['direccion'] !='') && ($data['telefono'] !='') && ($data['no_licencia'] !='') && ($data['fecha_vencimiento'] !='')){

            $query = $this->Chofer_model->modificar_chofer($id, $data);


            if (isset($query) && $query == TRUE)
            {
                $this->session->set_flashdata('correcto','The driver is successfully updated');
                redirect('Chofer_Controller/vista_modificar_chofer/'.$id,'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','Failed to update , revice information');
                redirect('Chofer_Controller/vista_modificar_chofer/'.$id,'refresh');
            }
        }else{
            $this->session->set_flashdata('correcto',' Empty input .');
            redirect('Chofer_Controller/vista_modificar_chofer'.$id, 'refresh');
        }
    }

     function eliminar_chofer()
    {
        $id = $this->uri->segment('3');
        if (isset($id) && $id != '') {
            $query = $this->Chofer_model->eliminar_chofer($id);

            if (isset($query) && $query == TRUE) {
                $this->session->set_flashdata('correcto','Registry is successfully deleted ');
                redirect('Chofer_Controller/listar_chofer/','refresh');
            }else{
                $this->session->set_flashdata('error','Registry is not eliminated');
                redirect('Chofer_Controller/listar_chofer/','refresh');
            }
        }else{
            $this->session->set_flashdata('error',' ');
            redirect('Chofer_Controller/listar_chofer/','refresh');
        }
    }


    
}

