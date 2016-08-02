<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caracteristicas_controller
 *
 * @author Cindy
 */
class Caracteristicas_controller extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Color_model');
        $this->load->model('Sabor_model');
        $this->load->model('Caracteriscticas_model');
        
    }
    
    public function pagina_agregar_producto_caracteristicas($codigoproducto)
    {
        $data['color'] = $this->Color_model->seleccionar_color();
        $data['sabor'] = $this->Sabor_model->seleccionar_sabor();
        $data['codigoproducto'] = $codigoproducto;
        $this->load->view('producto/producto_caracteristicas',$data);
    }
    
    function agregar_producto_caracteristicas()
    {
        $this->load->helper('text_helper');
        //$si = $this->uri->segment('3');
        $codigo_producto = $this->input->post('codigo_producto');
        $codigo_especifico = $this->input->post('codigo_especifico');
        $ancho = $this->input->post('ancho');
        $alto = $this->input->post('alto');
        $largo = $this->input->post('largo');
        $tamanno = $this->input->post('tamanno');
        $existencia = $this->input->post('existencia');
        $precio = $this->input->post('precio');
        $color = $this->input->post('color');
        $sabor = $this->input->post('sabor');
        $nombre_imagen = url_title(convert_accented_characters($_FILES['userfile']['name']),'_',true);
        
        if($existencia == "Seleccionar")
        {
            $existencia = null;
        }
        if($color == "Seleccionar")
        {
            $color = null;
        }
        if($sabor == "Seleccionar")
        {
            $sabor = null;
        }
        
        if(($alto != "") && ($ancho != "")&&($largo != "") && ($tamanno != "")&&($precio != "")&&($codigo_producto != ""))
        {
            $presentacion = array(
                'alto'=>$alto,
                'ancho'=>$ancho,
                'largo'=>$largo,
                'tamanno'=>$tamanno,
                'precio'=>$precio,
                'producto_codigo'=>$codigo_producto,
            );
            $insert_pres = $this->Caracteriscticas_model->insertar_presentacion($presentacion);
            if($insert_pres)
            {
                $id_present = $this->Caracteriscticas_model->obtener_id_presentacion();
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
                $caract = array(
                        'producto_codigo'=>$codigo_producto,
                        'color_id'=>$color,
                        'sabor_id'=>$sabor,
                        'existencia'=>$existencia,
                        'foto'=>$foto,
                        'codigo_especifico'=>$codigo_especifico,
                    );
                $insert_caract = $this->Caracteristicas_model->insertar_caracteristicas($caract);
                echo 'hola';
            }
        }
        
        
        /*if(($si == 'false'))
        {
            redirect('productos_controller/index/', 'refresh');
            
        }
        else
        {*/
            redirect('caracteristicas_controller/pagina_agregar_producto_caracteristicas/'.$codigo_producto,'refresh');
        //}
       
    }
    
}
