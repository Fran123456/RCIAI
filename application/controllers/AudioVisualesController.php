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


}
