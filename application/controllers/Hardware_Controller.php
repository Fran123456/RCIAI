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
       $info = $this->hard->get_('adaptador_red');
	   $this->load->view('Dashboard/hardware/adaptadores_list_view', compact('info'));
	}

	public function video_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('adaptador_red', $code ,'pc_id');
		$this->load->view('Dashboard/hardware/edit/adaptadores_edit', compact('data'));
		
	}
	public function video_update(){
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
	//PARA VIDEO
	
}
