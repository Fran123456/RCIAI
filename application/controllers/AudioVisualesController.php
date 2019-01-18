<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AudioVisualesController extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model','general');
		require 'application/plus/noty.php';

	}

//TECLADOS-----------------------------------------------------------
  public function teclados()
  {
      $data = $this->general->where_('audiovisuales', 'teclado' ,'periferico');
       $this->load->view('Dashboard/audiovisuales/teclados', compact('data'));
  }

  public function teclados_add(){
    $this->load->view('Dashboard/audiovisuales/teclados_add');
  }


  public function add_teclado_db(){
    $data = array(
     'codigo' => $this->input->post('codigo'),
     'marca'=> $this->input->post('marca'),
     'serie'=> $this->input->post('serie'),
     'tipo'=> $this->input->post('tipo'),
     'equipo'=> $this->input->post('equipo'),
     'periferico'=> 'teclado',
    );

    $this->general->add_('audiovisuales', $data);
    $this->session->set_flashdata('success', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-teclados');
  }

  public function teclado_delete($id){
     $this->general->delete_('id', $id, 'audiovisuales');

     $this->session->set_flashdata('delete', 'Elemento eliminado correctamente');
     redirect(base_url().'Audiovisuales-teclados');
  }

  public function teclado_edit($id){
    $data = $this->general->where_('audiovisuales', $id ,'id');
    $this->load->view('Dashboard/audiovisuales/teclados_edit', compact('data'));
  }


 public function edit_teclado_db(){
    $data = array(
     'codigo' => $this->input->post('codigo'),
     'marca'=> $this->input->post('marca'),
     'serie'=> $this->input->post('serie'),
     'tipo'=> $this->input->post('tipo'),
     'equipo'=> $this->input->post('equipo'),
     'periferico'=> 'teclado',
    );

    $this->general->update_('audiovisuales', $this->input->post('id'), 'id' ,$data);
    $this->session->set_flashdata('edit', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-teclados');
  }
//TECLADOS-----------------------------------------------------------

//MOUSES--------------------------------------------------------------

  public function mouses()
  {
      $data = $this->general->where_('audiovisuales', 'mouse' ,'periferico');
       $this->load->view('Dashboard/audiovisuales/mouses', compact('data'));
  }

  public function mouses_add(){
    $this->load->view('Dashboard/audiovisuales/mouses_add');
  }


  public function add_mouse_db(){
    $data = array(
     'codigo' => $this->input->post('codigo'),
     'marca'=> $this->input->post('marca'),
     'serie'=> $this->input->post('serie'),
     'tipo'=> $this->input->post('tipo'),
     'equipo'=> $this->input->post('equipo'),
     'periferico'=> 'mouse',
    );

    $this->general->add_('audiovisuales', $data);
    $this->session->set_flashdata('success', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-mouses');
  }

  public function mouse_delete($id){
     $this->general->delete_('id', $id, 'audiovisuales');

     $this->session->set_flashdata('delete', 'Elemento eliminado correctamente');
     redirect(base_url().'Audiovisuales-mouses');
  }

  public function mouse_edit($id){
    $data = $this->general->where_('audiovisuales', $id ,'id');
    $this->load->view('Dashboard/audiovisuales/mouses_edit', compact('data'));
  }


 public function edit_mouse_db(){
    $data = array(
     'codigo' => $this->input->post('codigo'),
     'marca'=> $this->input->post('marca'),
     'serie'=> $this->input->post('serie'),
     'tipo'=> $this->input->post('tipo'),
     'equipo'=> $this->input->post('equipo'),
     'periferico'=> 'mouse',
    );

    $this->general->update_('audiovisuales', $this->input->post('id'), 'id' ,$data);
    $this->session->set_flashdata('edit', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-mouses');
  }


  //CPUS--------------------------------------------------------------------------------

  public function cpus()
  {
      $data = $this->general->select_('audiovisuales_cpu');
       $this->load->view('Dashboard/audiovisuales/cpus', compact('data'));
  }

  public function cpus_add(){
    $this->load->view('Dashboard/audiovisuales/cpus_add');
  }


  public function add_cpu_db(){
    $data = array(
     'codigo' => $this->input->post('codigo'),
     'disco'=> $this->input->post('disco'),
     'capacidad_dd'=> $this->input->post('capacidad_dd'),
     'ram'=> $this->input->post('ram'),
     'capacidad_ram'=> $this->input->post('capacidad_ram'),
     'procesador'=> $this->input->post('procesador'),
     'reloj'=> $this->input->post('reloj'),
     'motherboard'=> $this->input->post('motherboard'),
     'modelo_mod'=> $this->input->post('modelo_mod'),
     'equipo'=> $this->input->post('equipo'),
     'sistema_operativo'=> $this->input->post('sistema_operativo'),
    );

    $this->general->add_('audiovisuales_cpu', $data);
    $this->session->set_flashdata('success', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-cpus');
  }

  public function cpu_delete($id){
     $this->general->delete_('id', $id, 'audiovisuales_cpu');

     $this->session->set_flashdata('delete', 'Elemento eliminado correctamente');
     redirect(base_url().'Audiovisuales-cpus');
  }

  public function cpu_edit($id){
    $data = $this->general->where_('audiovisuales_cpu', $id ,'id');
    $this->load->view('Dashboard/audiovisuales/cpus_edit', compact('data'));
  }


  public function cpu_show($id){
    $data = $this->general->where_('audiovisuales_cpu', $id ,'id');
    $this->load->view('Dashboard/audiovisuales/cpus_show', compact('data'));
  }



 public function edit_cpu_db(){
   $data = array(
     'codigo' => $this->input->post('codigo'),
     'disco'=> $this->input->post('disco'),
     'capacidad_dd'=> $this->input->post('capacidad_dd'),
     'ram'=> $this->input->post('ram'),
     'capacidad_ram'=> $this->input->post('capacidad_ram'),
     'procesador'=> $this->input->post('procesador'),
     'reloj'=> $this->input->post('reloj'),
     'motherboard'=> $this->input->post('motherboard'),
     'modelo_mod'=> $this->input->post('modelo_mod'),
     'equipo'=> $this->input->post('equipo'),
     'sistema_operativo'=> $this->input->post('sistema_operativo'),
    );

    $this->general->update_('audiovisuales_cpu', $this->input->post('id'), 'id' ,$data);
    $this->session->set_flashdata('edit', 'Elemento agregado correctamente');
    redirect(base_url().'Audiovisuales-cpus');
  }
}
