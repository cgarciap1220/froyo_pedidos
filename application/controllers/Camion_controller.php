<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Camion_controller
 *
 * @author Cindy
 */
class Camion_controller extends CI_Controller
{
   public function __construct() 
    {
        parent::__construct(); 
        $this->load->model('Camion_model');
    }
    
    function listar_camiones()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $limit = 10;
            $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
            /* URL a la que se desea agregar la paginación*/
            $config['base_url'] = base_url().'Camion_controller/listar_camiones/';
            /*Obtiene el total de registros a paginar */
            $config['total_rows'] = $this->Camion_model->obtener_cant_registros_camion();
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

            $info['titulo'] = "List Truck";
            $query = $this->Camion_model->listar_camion($limit,$offset);
            if(isset($query)){
                    
                if ($query == FALSE)
                {

                    $data['vacio'] = 'No data to print';
                            
                    $this->load->view('tema/header',$info);
                    $this->load->view('camion/listar_camion',$data);
                    $this->load->view('tema/footer');
                            
                }else{

                    $data['query'] = $query;

                    $this->load->view('tema/header',$info);
                    $this->load->view('camion/listar_camion',$data);
                    $this->load->view('tema/footer'); 
                }
            }
            else
            {
                $this->session->set_flashdata('correcto',' Empty input .');
                redirect('Usuario_controller/listar_usuario', 'refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        }    
    }
    
    function vista_agregar_camion()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $info['titulo'] = "Add Truck";
            $data['ruta'] = $this->Camion_model->obtener_rutas();
            $data['chofer'] = $this->Camion_model->obtener_chofer();
            $this->load->view('tema/header',$info);
            $this->load->view('camion/insertar_camion',$data);
            $this->load->view('tema/footer');
        }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        } 
    }
    
    function agregar_camion()
    {
        $marca = $this->security->xss_clean(strip_tags($this->input->post('marca')));
        $modelo = $this->security->xss_clean(strip_tags($this->input->post('modelo')));
        $placa = $this->security->xss_clean(strip_tags($this->input->post('placa')));
        $rutas = $this->security->xss_clean($this->input->post('ruta'));
        $choferes = $this->security->xss_clean($this->input->post('chofer'));
        
        if(($marca != "")&&($modelo != "")&&($placa != "")&&($rutas != "")&&($choferes != ""))
        {
            $data = array(
                'marca'=>$marca,
                'modelo'=>$modelo,
                'placa'=>$placa
            );
            $query = $this->Camion_model->agregar_camion($data);
            if (isset($query)) 
            {
                if ($query == FALSE) 
                {
                    $this->session->set_flashdata('error',' Existing Truck Please check');
                    redirect('Camion_controller/vista_agregar_camion', 'refresh');
                }
                else
                {
                    $idcamion = $this->Camion_model->obtener_id_camion();
                    for($i = 0;$i<count($rutas);$i++)
                    {
                        $camion_ruta = array('camion_id'=>$idcamion,
                            'ruta_id'=>$rutas[$i]);
                        $this->Camion_model->insertar_ruta_camion($camion_ruta);
                    }
                    for($i = 0;$i<count($choferes);$i++)
                    {
                        $camion_chofer = array('camion_id_camion'=>$idcamion,
                            'chofer_id_chofer'=>$choferes[$i]);
                        $this->Camion_model->insertar_chofer_camion($camion_chofer);
                    }
                    $this->session->set_flashdata('correcto',' Truck added successfully.');
                    redirect('Camion_controller/vista_agregar_camion', 'refresh');
                }
            }
        }
        else{
            $this->session->set_flashdata('correcto',' Empty input.');
            redirect('Camion_controller/vista_agregar_camion', 'refresh');
        }
        
    }
            
    function vista_modificar_camion()
    { 
        if($this->session->userdata('correo') && ($this->session->userdata('rol_id') == 1)) 
        {
            $info['titulo'] = "Update Truck";
            $id = $this->uri->segment(3);
            $data['ruta'] = $this->Camion_model->obtener_rutas();
            $data['chofer'] = $this->Camion_model->obtener_chofer();
            $data['camion'] = $this->Camion_model->obtener_camion_id($id);
            $data['ruta_camion'] = $this->Camion_model->seleccionar_ruta_camion($id);
            $data['chofer_camion'] = $this->Camion_model->seleccionar_chofer_camion($id);
            $this->load->view('tema/header',$info);
            $this->load->view('camion/modificar_camion',$data);
            $this->load->view('tema/footer');
        }
        else
        {
            $this->session->set_flashdata('error','Login to access.');
            redirect('Login_controller/index','refresh');
        } 
    }
    
    function actualizar_camion()
    {
        $id = $this->uri->segment(3);
        $marca = $this->security->xss_clean(strip_tags($this->input->post('marca')));
        $modelo = $this->security->xss_clean(strip_tags($this->input->post('modelo')));
        $placa = $this->security->xss_clean(strip_tags($this->input->post('placa')));
        $rutas = $this->security->xss_clean($this->input->post('ruta'));
        $choferes = $this->security->xss_clean($this->input->post('chofer'));
        
        if(($marca != "")&&($modelo != "")&&($placa != "")&&($rutas != "")&&($choferes != ""))
        {
            $data = array(
                'marca'=>$marca,
                'modelo'=>$modelo,
                'placa'=>$placa
            );
            
            $query = $this->Camion_model->actualizar_camion($id,$data);
            if (isset($query) && $query == TRUE)
                {   
                    $this->Camion_model->eliminar_ruta_camion($id);
                    for($i = 0;$i<count($rutas);$i++)
                    {
                        $camion_ruta = array('camion_id'=>$id,
                            'ruta_id'=>$rutas[$i]);
                        $this->Camion_model->insertar_ruta_camion($camion_ruta);
                    }
                    $this->Camion_model->eliminar_chofer_camion($id);
                    for($i = 0;$i<count($choferes);$i++)
                    {
                        $camion_chofer = array('camion_id_camion'=>$id,
                            'chofer_id_chofer'=>$choferes[$i]);
                        $this->Camion_model->insertar_chofer_camion($camion_chofer);
                    }
                    
                    
                    $this->session->set_flashdata('correcto','The truck is successfully updated');
                    redirect('Camion_controller/vista_modificar_camion/'.$id,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('error','Failed to update , revice information');
                    $this->vista_modificar_camion($id);
                }
        }
        
    }
    
    function eliminar_camion()
    {
        $id = $this->uri->segment('3');
        if (isset($id) && $id != '') 
        {
            $query = $this->Camion_model->eliminar_camion($id);

            if (isset($query) && $query == TRUE) 
            {
                $this->session->set_flashdata('correcto','Registry is successfully deleted ');
                redirect('Camion_controller/listar_camiones/','refresh');
            }
            else
            {
                $this->session->set_flashdata('error','Registry is not eliminated');
                redirect('Camion_controller/listar_camiones/','refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('error',' ');
            redirect('Camion_controller/listar_camiones/','refresh');
        }
    }
}
