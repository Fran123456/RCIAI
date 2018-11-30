<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hardware_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Hardware_Model' , 'hard');
		$this->load->model('Sustitucion_Model', 'sus');
		require 'application/plus/noty.php';

	}

//PARA ADAPTADORES//
	public function adaptadores_all()
	{
       $info = $this->hard->get_('adaptador_red');
	   $this->load->view('Dashboard/hardware/adaptadores_list_view', compact('info'));
	}

	public function adaptadores_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('adaptador_red', $code ,'pc_id');
		$this->load->view('Dashboard/hardware/edit/adaptadores_edit', compact('data'));
		
	}
	public function adaptador_update(){
		$codigo = $this->input->post('1');
        $campos = array('adaptador_1','tipo_adaptador','direccion_ip','subred_ip','gateway','servidor_primario','servidor_dns','servidor_dhcp','direccion_mac','tarjeta_extra');
        $data = array();
		for ($i=1; $i <=10 ; $i++) { 
		    $data[$campos[$i-1]] = $this->input->post($i+1);
		}
		$this->sus->update_('adaptador_red', $codigo, 'pc_id' ,$data);
		$this->session->set_flashdata('yupi', 'Actualización completada');
		redirect(base_url().'adaptadores-red/edit-red/'.$codigo,'refresh');
	}
//PARA ADAPTADORES//

//PARA VIDEO//
	public function video_all()
	{
       $info = $this->hard->get_('adaptador_video');
	   $this->load->view('Dashboard/hardware/video_list_view', compact('info'));
	}

	public function video_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('adaptador_video', $code ,'pc_id');
		$this->load->view('Dashboard/hardware/edit/video_edit', compact('data'));
		
	}
	public function video_update(){
		$codigo = $this->input->post('1');
        $campos = array('monitor_marca','tipo','modelo','serie','adaptador1','adaptador_ram','tipo_dac','monitor_pc1','resolucion_video','velocidad');
        $data = array();
		for ($i=1; $i <=10 ; $i++) { 
		    $data[$campos[$i-1]] = $this->input->post($i+1);
		}
		
		
		$this->sus->update_('adaptador_video', $codigo, 'pc_id' ,$data);
		$this->session->set_flashdata('yupi', 'Actualización completada');
		redirect(base_url().'adaptadores-video/edit-video/'.$codigo,'refresh');
	}
	//PARA VIDEO

//PARA ALMACENAMIENTO//
	public function almacenamiento_all()
	{
       $info = $this->hard->get_('almacenamiento');
	   $this->load->view('Dashboard/hardware/almacenamiento_list_view', compact('info'));
	}

	public function almacenamiento_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('almacenamiento', $code ,'pc_id');
		$this->load->view('Dashboard/hardware/edit/almacenamiento_edit', compact('data'));
		
	}
	public function almacenamiento_update(){
		$codigo = $this->input->post('1');
        $campos = array('disco_fisico1','capacidad','marca_disco','dvd1','disco_logico','sistema_archivos','tamaño','espacio_libre','letra_unidad');
        $data = array();
		for ($i=1; $i <=9 ; $i++) { 
		    $data[$campos[$i-1]] = $this->input->post($i+1);
		}
		
		$this->sus->update_('almacenamiento', $codigo, 'pc_id' ,$data);
		$this->session->set_flashdata('yupi', 'Actualización completada');
		redirect(base_url().'almacenamiento/edit-almacenamiento/'.$codigo,'refresh');
	}
	//PARA ALMACENAMIENTO



	
}
