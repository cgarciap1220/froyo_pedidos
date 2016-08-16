<?php
class Categoria_Controller extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
    }
     //Carga la vista de instertar categoria y da parametros de seguridad.
    function vista_agregar_categoria()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $info['titulo'] = "Show Category";

            $this->load->view('tema/header',$info);
            $this->load->view('categoria/insertar_categoria');
            $this->load->view('tema/footer');
        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

   //Procesa los datos del formulario de insertar categoría
    function agregar_categoria()
    {
        $data['categoria'] =  $this->security->xss_clean(strip_tags($this->input->post('categoria')));


        if ($data['categoria'] !='' ) {
            $query = $this->Categoria_model->procesa_categoria_insertar($data);

            if (isset($query)) {
                if ($query == FALSE) {
                    $this->session->set_flashdata('error',' Existing category Please check');
                    redirect('Categoria_controller/vista_agregar_categoria', 'refresh');
                }else{
                    $this->session->set_flashdata('correcto',' Category added successfully.');
                    redirect('Categoria_controller/vista_agregar_categoria', 'refresh');
                }
            }

        }else{
            $this->session->set_flashdata('correcto',' Empty input .');
            redirect('Categoria_controller/vista_agregar_categoria', 'refresh');
        }


    }

    //Carga la lista de categorias existentes.
    function listar_categorias()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {

            $query = $this->Categoria_model->listar_categorias();

            $info['titulo'] = 'List Category';

            if(isset($query)){

                if ($query == FALSE) {

                    $data['vacio'] = 'No data to print';

                    $this->load->view('tema/header',$info);
                    $this->load->view('categoria/listar_categoria',$data);
                    $this->load->view('tema/footer');

                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('categoria/listar_categoria',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

    //Carga carga el formulario con los datos del registro a actualizar.
    function vista_modificar_categoria()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) {
            $info['titulo'] = "Update Category";
            $id = $this->uri->segment(3);
            $query = $this->Categoria_model->editar_categorias($id);

            if (isset($query)) {
                if ($query != FALSE) {
                    $data['query'] = $query;
                    $data['id'] = $id;

                    $this->load->view('tema/header',$info);
                    $this->load->view('categoria/modificar_categoria',$data);
                    $this->load->view('tema/footer');
                }
            }

        }else{
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }
    }

    //Actualiza el registro solicitado.
    public function ingresar_modificacion_categoria()
    {
            $id = $this->uri->segment('3');

            $data['categoria']  =  $this->security->xss_clean(strip_tags($this->input->post('categoria')));


            if($data['categoria'] !=''){
                $query = $this->Categoria_model->modificar_categorias($id, $data);

                if (isset($query) && $query == TRUE)
                {
                    $this->session->set_flashdata('correcto','The categoria is successfully updated');
                    redirect('Categoria_controller/vista_modificar_categoria/'.$id,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('error','Failed to update , revice information');
                    $this->vista_modificar_categoria($id);
                }
            }else{
                $this->session->set_flashdata('correcto',' Empty input .');
                redirect('Categoria_controller/vista_agregar_categoria', 'refresh');
            }

    }


    function eliminar_categoria(){
        $id = $this->uri->segment('3');
        if (isset($id) && $id != '') {
            $query = $this->Categoria_model->eliminar_categoria($id);

            if (isset($query) && $query == TRUE) {
                $this->session->set_flashdata('correcto','Registry is successfully deleted ');
                redirect('Categoria_controller/listar_categorias/','refresh');
            }else{
                $this->session->set_flashdata('error','Registry is not eliminated');
                redirect('Categoria_controller/listar_categorias/','refresh');
            }
        }else{
            $this->session->set_flashdata('error',' ');
            redirect('Categoria_controller/listar_categorias/','refresh');
        }
    }



}
