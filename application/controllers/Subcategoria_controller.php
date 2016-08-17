<?php
class Subcategoria_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subcategoria_model');
    }

    function vista_agregar_subcategoria()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $query = $this->Subcategoria_model->obtener_categorias();

            $info['titulo'] = "Add Subcategory";

            if (isset($query)) {
                if ($query == FALSE) {
                    $this->session->set_flashdata('error','No categories to show');
                    redirect('Categoria_controller/vista_agregar_categoria', 'refresh');
                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('subcategoria/insertar_subcategoria',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

     function obtener_subcategoria_categoria()
    {
        $data['categoria_id'] =  $this->security->xss_clean(strip_tags($this->input->post('categoria_id')));
        $data['subcategoria'] =  $this->security->xss_clean(strip_tags($this->input->post('subcategoria')));

        if (($data['categoria_id'] !='') && ($data['subcategoria'] !='')) {
            $query = $this->Subcategoria_model->procesa_categoria_subcategoria($data);

            if (isset($query)) {
                if ($query == FALSE) {
                    $this->session->set_flashdata('error',' Existing  Please check');
                    redirect('Subcategoria_controller/vista_agregar_subcategoria', 'refresh');
                }else{
                    $this->session->set_flashdata('correcto',' Subcategory added successfully.');
                    redirect('Subcategoria_controller/vista_agregar_subcategoria', 'refresh');
                }
            }

        }else{
            $this->session->set_flashdata('error',' Empty input .');
            redirect('Subcategoria_controller/vista_agregar_subcategoria', 'refresh');
        }
    }

    //carga la vista  de listar usuiaros solo si existen las variables de sesion
    function listar_subcategorias()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $limit = 3;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Subcategoria_controller/listar_subcategorias/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Subcategoria_model->obtener_cant_registros_subcategorias();
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
            $info['titulo'] = "List Subcategory";
            $sub_array = array();
            $query = $this->Subcategoria_model->obtener_categorias($limit,$offset);


                if(isset($query) && $query != FALSE)
                {
                    $data['query'] = $query;

                    foreach ($query as $key )
                    {
                        $id = $key->id_categoria;
                        $subcategoria = $this->Subcategoria_model->subcategoria($id);
                        if (isset($subcategoria) && $subcategoria != FALSE) {
                            array_push($sub_array, $subcategoria);
                        }
                    }

                        $data['subcategoria'] = $sub_array;
                        $this->load->view('tema/header',$info);
                        $this->load->view('subcategoria/listar_subcategoria',$data);
                        $this->load->view('tema/footer');

                }
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

    //Carga carga el formulario con los datos del registro a actualizar.
    function vista_modificar_subcategoria()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $query = $this->Subcategoria_model->obtener_categorias();

            $info['titulo'] = "Update Subcategory";
            $id = $this->uri->segment(3);
            $subquery = $this->Subcategoria_model->editar_subcategorias($id);

            if (isset($query)) {
                if ($query != FALSE) {
                    $data['query'] = $query;
                    $data['subquery']  =$subquery;
                    $data['id'] = $id;

                    $this->load->view('tema/header',$info);
                    $this->load->view('subcategoria/modificar_subcategoria',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

    function modificar_subcategoria()
    {

        $id = $this->uri->segment('3');

       $data['categoria_id'] =  $this->security->xss_clean(strip_tags($this->input->post('categoria_id')));
       $data['subcategoria'] =  $this->security->xss_clean(strip_tags($this->input->post('subcategoria')));

       if($data['categoria_id'] !='' &&  $data['subcategoria'] !=''){
                $query = $this->Subcategoria_model->modificar_subcategorias($id, $data);

            if (isset($query) && $query == TRUE)
            {
                $this->session->set_flashdata('correcto','The subcategory is successfully updated');
                redirect('Subcategoria_controller/vista_modificar_subcategoria/'.$id,'refresh');
            }
            else
            {
                $this->session->set_flashdata('error','Failed to update , revice information');
                $this->vista_modificar_subcategoria($id);
            }
        }else{
            $this->session->set_flashdata('correcto',' Empty input .');
            redirect('Subcategoria_controller/vista_agregar_subcategoria', 'refresh');
        }
    }

    function eliminar_subcategoria(){
        $id = $this->uri->segment('3');
        if (isset($id) && $id != '') {
            $query = $this->Subcategoria_model->eliminar_subcategoria($id);

            if (isset($query) && $query == TRUE) {
                $this->session->set_flashdata('correcto','Registry is successfully deleted ');
                redirect('Subcategoria_controller/listar_subcategorias/','refresh');
            }else{
                $this->session->set_flashdata('error','Registry is not eliminated');
                redirect('Subcategoria_controller/listar_subcategorias/','refresh');
            }
        }else{
            $this->session->set_flashdata('error',' ');
            redirect('Subcategoria_controller/listar_subcategorias/','refresh');
        }
    }


}
