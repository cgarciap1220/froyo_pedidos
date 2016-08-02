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
        $this->load->model('Categoria_model');
        $this->load->model('Subcategoria_model');
        
    }
    public function pagina_agregar_producto()
    {
        $data['categoria'] = $this->Categoria_model->seleccionar_categoria();
        $data['subcategoria'] = $this->Subcategoria_model->seleccionar_subcategoria();
        $this->load->view('producto/crear_producto',$data);
    }
    
    function agregar_producto()
    {
        $this->load->helper('text_helper');
        //$codigo_producto = $this->input->post('codigo_producto');
        $nombre_producto = $this->input->post('nombre_producto');
        $nivel_ventas = $this->input->post('nivel_ventas');
        $stoke = $this->input->post('stoke');
        $estado = $this->input->post('estado');
        $categoria = $this->input->post('categoria');
        $subcategoria = $this->input->post('subcategoria');
        $peso = $this->input->post('peso');
        $fecha_creacion = date('Y-m-d');
        date_default_timezone_set("America/Guatemala");
        $hora_creacion = date('g:i:s a', time() - 3600 * date('I'));
        $descripcion = $this->input->post('descripcion');
        //GARGAR IMAGEN
        $nombre_imagen = url_title(convert_accented_characters($_FILES['userfile']['name']),'_',true);
        $nombre_modificado = str_replace('jpg','',$nombre_imagen);
        $nombre_modificado .= '.jpg';
        $config['max_size'] = 6000;
        $config['quality'] = '90%';
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $nombre_modificado;
        $this->load->library('upload',$config);
        $this->upload->do_upload();
        //PROCESAR IMAGEN
        $config2['source_image'] = './uploads/'.$nombre_modificado;
        $config2['width'] = 800;
        $config2['height'] = 600;
        $this->load->library('image_lib',$config2);
        if(!$this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }
        $foto = 'uploads/'.$nombre_modificado;
        if($estado == "Seleccionar")
        {
            $estado = null;
        }
        if($stoke == "Seleccionar")
        {
            $stoke = null;
        }
        if($categoria == "Seleccionar")
        {
            $categoria = null;
        }
        if($subcategoria == "Seleccionar")
        {
            $subcategoria = null;
        }
        
        if(($nombre_producto != "")&&($nivel_ventas != "")&&($categoria != NULL)&&($estado != NULL)&&($stoke != NULL)&&($foto != "") && ($peso !=""))
        {
            $data = array('nombre_producto'=>$nombre_producto,
                        'nivel_ventas'=>$nivel_ventas = $nivel_ventas,
                        'foto_small' => $foto,
                        'foto_media' => $foto,
                        'foto_big' => $foto,
                        'stoke' => $stoke,
                        'estado' =>  $estado,
                        'categoria_id' => $categoria,
                        'subcategoria_id' =>  $subcategoria,
                        'peso' => $peso,
                        'fecha_creacion' => $fecha_creacion,
                        'hora_creacion' => $hora_creacion,
                        'descripcion' => $descripcion,
         );
            $insertar = $this->Productos_model->insertar_producto($data);
            if ($insertar == true)
            {
                $codigo_producto = $this->Productos_model->obtener_codigo_producto();
                $this->session->set_flashdata('correcto','Se agregó su producto exitosamente');
                redirect('Caracteristicas_controller/pagina_agregar_producto_caracteristicas/'.$codigo_producto,'refresh');
                //$this->pagina_agregar_producto_caracteristicas($codigo_producto);
            }
            else
            {
                $this->session->set_flashdata('error','No se insertó correctamente el producto');
                redirect('Productos_controller/pagina_agregar_producto','refresh');
            }
        }
    }
        
    public function pagina_modificar_producto($cod) 
    {
        /*$user = $this->session->userdata('usuario');
        $rol = $this->session->userdata('rol');
        if ( $rol == "Secretaria" or $rol == "Administrador") 
        {  */ 
            $info['title'] = "Actualizar Producto";
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
            $data['categoria'] = $this->Categoria_model->seleccionar_categoria();
            $data['subcategoria'] = $this->Subcategoria_model->seleccionar_subcategoria();
            /*$this->load->view('theme/front_end/header',$info);
            $this->load->view('theme/front_end/footer');*/
            $this->load->view('producto/actualizar_producto', $data);
       /* }
        else 
        {
            $this->session->set_flashdata('error', 'Tiene que iniciar su sesión para acceder a esta página');
            redirect('inicio_controller/index/', 'refresh');
            //$this->redi();
        }*/
    }
        
    function actualizar_producto()
    {
        $this->load->helper('text_helper');
        $id = $this->uri->segment('3');
        //$codigo_producto = $this->input->post('codigo_producto');
        $nombre_producto = $this->input->post('nombre_producto');
        $nivel_ventas = $this->input->post('nivel_ventas');
        $stoke = $this->input->post('stoke');
        $estado = $this->input->post('estado');
        $categoria = $this->input->post('categoria');
        $subcategoria = $this->input->post('subcategoria');
        $peso = $this->input->post('peso');
        /*$fecha_creacion = date('Y-m-d');
        date_default_timezone_set("America/Guatemala");
        $hora_creacion = date('g:i:s a', time() - 3600 * date('I'));*/
        $descripcion = $this->input->post('descripcion');
        //$imagen = $this->input->post('userfile');
        $nombre_imagen = url_title(convert_accented_characters($_FILES['userfile']['name']),'_',true);
        if($estado == "Seleccionar")
        {
            $estado = null;
        }
        if($stoke == "Seleccionar")
        {
            $stoke = null;
        }
        if($categoria == "Seleccionar")
        {
            $categoria = null;
        }
        if($subcategoria == "Seleccionar")
        {
            $subcategoria = null;
        }
        //$foto = 'assets/images/'.$nombre_modificado;
         if(($codigo_producto != "") &&($nombre_producto != "")&&($nivel_ventas != "")&&($categoria != NULL)&&($estado != NULL)&&($stoke != NULL) && ($peso !=""))
        {
            if($nombre_imagen != "")
            {
                //$nombre_imagen = url_title(convert_accented_characters($_FILES['userfile']['name']),'_',true);
                $nombre_modificado = str_replace('jpg','',$nombre_imagen);
                $nombre_modificado .= '.jpg';
                $config['max_size'] = 6000;
                $config['quality'] = '90%';
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['file_name'] = $nombre_modificado;
                $this->load->library('upload',$config);
                $this->upload->do_upload();
                //PROCESAR IMAGEN
                $config2['source_image'] = './uploads/'.$nombre_modificado;
                $config2['width'] = 800;
                $config2['height'] = 600;
                $this->load->library('image_lib',$config2);
                if(!$this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                }
                $foto = 'uploads/'.$nombre_modificado;
               
                $data = array('codigo_producto'=>$codigo_producto,
                        'nombre_producto'=>$nombre_producto,
                        'nivel_ventas'=>$nivel_ventas = $nivel_ventas,
                        'stoke' => $stoke,
                        'estado' =>  $estado,
                        'categoria_id' => $categoria,
                        'subcategoria_id' =>  $subcategoria,
                        'peso' => $peso,
                        'descripcion' => $descripcion,
                        'foto_small' => $foto,
                        'foto_media' => $foto,
                        'foto_big' => $foto,
                );
               $actualizar = $this->Productos_model->modificar_producto($id,$data);
            }
            else
            {
                $data = array('codigo_producto'=>$codigo_producto,
                            'nombre_producto'=>$nombre_producto,
                            'nivel_ventas'=>$nivel_ventas = $nivel_ventas,
                            'stoke' => $stoke,
                            'estado' =>  $estado,
                            'categoria_id' => $categoria,
                            'subcategoria_id' =>  $subcategoria,
                            'peso' => $peso,
                            'descripcion' => $descripcion,

                        );
                $actualizar = $this->Productos_model->modificar_producto($id,$data);
            }
            if ($actualizar == true)
            {
                $this->session->set_flashdata('correcto','Se actualizó su producto exitosamente');
                $this->pagina_modificar_producto($codigo_producto);
            }
            else
            {
                $this->session->set_flashdata('error','No se actualizó correctamente el producto');
                $this->pagina_modificar_producto($codigo_producto);
            }
        }
    }
    //function obtener_productos() 
     public function index()
    {   
        $productos = $this->Productos_model->seleccionar_productos_all();
        
            if($productos != False)
            {
                $data['valor'] = true;
                $data['productos'] = $productos;
                /*$this->load->view('theme/front_end/header',$info);
                $this->load->view('theme/front_end/footer');*/
                $this->load->view('producto/listar_productos', $data);
            }
            else
            {   
                $data['valor'] = $productos;
                $data['productos']="No hay información que mostrar";
                /*$this->session->set_flashdata('error', 'No hay información que mostrar');
                 redirect('productos_controller/index/', 'refresh');*/
                        $this->load->view('producto/listar_productos', $data);
            }
            
        /*}
        else 
        {
            $this->session->set_flashdata('error', 'Tiene que iniciar su sesión para acceder a esta página');
            redirect('inicio_controller/index/', 'refresh');
            //$this->redi();
        }*/
    }
    
    function eliminar_producto() 
    {
        $id = $this->uri->segment('3');
        $eliminar = $this->Productos_model->quitar_producto($id);
        if($eliminar == TRUE)
        {
            $this->session->set_flashdata('correcto','Se eliminó correctamente el producto');
            redirect('productos_controller/index/', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('correcto','No se pudo eliminar el producto correctamente');
            redirect('productos_controller/index/', 'refresh');
        }
        
    }
    
    
}
