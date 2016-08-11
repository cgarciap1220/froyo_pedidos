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

            $info['titulo'] = "List Subcategory";
            $sub_array = array();
            $query = $this->Subcategoria_model->obtener_categorias();


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



}
