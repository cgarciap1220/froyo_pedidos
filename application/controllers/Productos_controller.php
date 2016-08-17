<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Productos_controller
 *
 * @author Cindy
 */
class Productos_controller extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Productos_model');
        $this->load->model('Productos_model');
        $this->load->model('Productos_model');
    }
    
    //function obtener_productos() 
     public function mostrar_productos()
    {   
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {    
            $limit = 10;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Productos_controller/mostrar_productos/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Productos_model->obtener_cant_registros_productos();
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
            $config['first_link'] = 'First';//primer link
            $config['last_link'] = 'Last';//último link
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Back';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            /* Se inicializa la paginacion*/
            $this->pagination->initialize($config);
            
            $productos = $this->Productos_model->seleccionar_productos_all($limit,$offset);
        
            if($productos != False)
            {
                
                $data['productos'] = $productos;
                $info['titulo'] = "List Product";
                $this->load->view('tema/header',$info);
                $this->load->view('producto/listar_productos', $data);
                $this->load->view('tema/footer');
            }
            else
            {   
                $data['valor'] = $productos;
                $data['productos']="There is no information to display";
                $info['titulo'] = "Show Product";
                $this->load->view('tema/header',$info);
                $this->load->view('producto/listar_productos', $data);
                $this->load->view('tema/footer');
                        
            }
        }    
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        } 
    }
    
    public function vista_agregar_producto()
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $data['valor'] = true;
            $data['categoria'] = $this->Productos_model->seleccionar_categoria();
            $data['subcategoria'] = $this->Productos_model->seleccionar_subcategoria();

            $info['titulo'] = "Add Product";
            $this->load->view('tema/header',$info);
            $this->load->view('producto/crear_producto', $data);
            $this->load->view('tema/footer');
        }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }   
        
    }
    
    function agregar_producto()
    {
        $nombre_producto = $this->security->xss_clean(strip_tags($this->input->post('nombre_producto')));
        $nivel_ventas = $this->security->xss_clean(strip_tags($this->input->post('nivel_ventas')));
        $estado = $this->security->xss_clean(strip_tags($this->input->post('estado')));
        $categoria = $this->security->xss_clean(strip_tags($this->input->post('categoria')));
        $subcategoria = $this->security->xss_clean(strip_tags($this->input->post('subcategoria')));
        $descripcion = $this->security->xss_clean(strip_tags($this->input->post('descripcion')));
        $fecha_creacion = date('Y-m-d');
        date_default_timezone_set("America/Guatemala");
        $hora_creacion = date('g:i:s a', time() - 3600 * date('I'));
        if($nivel_ventas == "Select level")
        {
            $nivel_ventas = null;
        }
        if($estado == "Select state")
        {
            $estado = null;
        }
       if($categoria == "Select category")
        {
            $categoria = null;
        }
        if($subcategoria == "Select subcategory")
        {
            $subcategoria = null;
        }
        //$foto = 'assets/images/'.$nombre_modificado;
        if(($nombre_producto != "")&&($nivel_ventas != "Select level")&&($categoria != "Select category")&&($subcategoria != "Select subcategory")&&($estado != ""))
        {
            $data = array('nombre_producto'=>$nombre_producto,
                        'nivel_ventas'=>$nivel_ventas = $nivel_ventas,
                        'estado' =>  $estado,
                        'categoria_id' => $categoria,
                        'subcategoria_id' =>  $subcategoria,
                        'fecha_creacion' => $fecha_creacion,
                        'hora_creacion' => $hora_creacion,
                        'descripcion' => $descripcion,
            );
            $insertar = $this->Productos_model->insertar_producto($data);
            if ($insertar == true)
            {
                $codigo_producto = $this->Productos_model->obtener_codigo_producto();
                $this->session->set_flashdata('correcto','Your product is successfully added');
                redirect('Caracteristicas_controller/pagina_agregar_producto_caracteristicas/'.$codigo_producto,'refresh');
                
            }
            else
            {
                $this->session->set_flashdata('error','No correctly added the product');
                redirect('Productos_controller/pagina_agregar_producto','refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('error','There are empty fields, please check your information.');
            redirect('Productos_controller/pagina_agregar_producto', 'refresh');
        }
    }
        
    public function vista_modificar_producto($cod) 
    {
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $info['titulo'] = "Update Product";
            $id = $this->uri->segment('3');
            if($id != $cod)
            {
                $cod_prod = $cod;
            }
            else
            {
                $cod_prod = $id;
            }
            $data['producto'] = $this->Productos_model->seleccionar_producto_id($cod_prod);
            $data['prod_id'] = $cod_prod;
            $data['categoria'] = $this->Productos_model->seleccionar_categoria();
            $data['subcategoria'] = $this->Productos_model->seleccionar_subcategoria();
            $info['titulo'] = "Update Product";
            $this->load->view('tema/header',$info);
            $this->load->view('producto/actualizar_producto', $data);
            $this->load->view('tema/footer');
           
       }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        } 
    }
        
    function actualizar_producto()
    {
        $this->load->helper('text_helper');
        $codigo_producto = $this->uri->segment('3');
        $nombre_producto = $this->security->xss_clean(strip_tags($this->input->post('nombre_producto')));
        $nivel_ventas = $this->security->xss_clean(strip_tags($this->input->post('nivel_ventas')));
        $estado = $this->security->xss_clean(strip_tags($this->input->post('estado')));
        $categoria = $this->security->xss_clean(strip_tags($this->input->post('categoria')));
        $subcategoria = $this->security->xss_clean(strip_tags($this->input->post('subcategoria')));
        $descripcion = $this->security->xss_clean(strip_tags($this->input->post('descripcion')));
        
        if($nivel_ventas == "Select level")
        {
            $nivel_ventas = null;
        }
        if($estado == "Select state")
        {
            $estado = null;
        }
       if($categoria == "Select category")
        {
            $categoria = null;
        }
        if($subcategoria == "Select subcategory")
        {
            $subcategoria = null;
        }
        //$foto = 'assets/images/'.$nombre_modificado;
        if(($nombre_producto != "")&&($nivel_ventas != "Select level")&&($categoria != "Select category")&&($subcategoria != "Select subcategory")&&($estado != ""))
        {
            $data = array('nombre_producto'=>$nombre_producto,
                            'nivel_ventas'=>$nivel_ventas,
                            'estado' =>  $estado,
                            'categoria_id' => $categoria,
                            'subcategoria_id' =>  $subcategoria,
                            'descripcion' => $descripcion,
                        );
                $actualizar = $this->Productos_model->modificar_producto($codigo_producto,$data);
            }
            if ($actualizar == true)
            {
                $this->session->set_flashdata('correcto','Successfully he updated your product');
                $this->vista_modificar_producto($codigo_producto);
            }
            else
            {
                $this->session->set_flashdata('error','Not properly update the product');
                $this->pagina_modificar_producto($codigo_producto);
            }
       
    }
        
    function eliminar_producto() 
    {
        $id = $this->uri->segment('3');
        $eliminar = $this->Productos_model->quitar_producto($id);
        if($eliminar == TRUE)
        {
            $this->session->set_flashdata('correcto','The product was successfully removed');
            redirect('productos_controller/mostrar_productos/', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('correcto','Could not remove the product correctly');
            redirect('productos_controller/mostrar_productos/', 'refresh');
        }
        
    }
    
    function obtener_subcategoria_categoria()
    {
        $id = $this->uri->segment('3');
        $data['subcategoria'] = $this->Productos_model->seleccionar_subcategoria_categoria($id);
        $this->load->view('otros/subcategoria', $data);
    }
    
    
}
