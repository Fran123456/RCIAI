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




	//PARA SISTEMA//
	public function sistema_all()
	{
       $info = $this->hard->get_('descripcion_sistema');
	   $this->load->view('Dashboard/hardware/sistema_list_view', compact('info'));
	}

	public function sistema_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('descripcion_sistema', $code ,'pc_ids');
		$this->load->view('Dashboard/hardware/edit/sistema_edit', compact('data'));
		
	}
	public function sistema_update(){
		$codigo = $this->input->post('1');
        $campos = array('nombre','fabricante','sistema_operativo','nucleo','paquete_servicio','version','usuario_registrado','memoria_fisica','dominio' ,'modelo','serie_des','organizacion','idioma','zona_horaria','usuario_sesion','version_DirectX', 'caja_sistema');
        $data = array();
		for ($i=1; $i <=count($campos) ; $i++) { 
		    $data[$campos[$i-1]] = $this->input->post($i+1);
		}
		 
		$this->sus->update_('descripcion_sistema', $codigo, 'pc_ids' ,$data);
		$this->session->set_flashdata('yupi', 'Actualización completada');
		redirect(base_url().'sistema/edit-sistema/'.$codigo,'refresh');
	}
	//PARA SISTEMA



  //PARA COMPONENTES//
	public function componentes_all()
	{
       $info = $this->hard->get_('placa_base');
	   $this->load->view('Dashboard/hardware/componentes_list_view', compact('info'));
	}

	public function componentes_edit(){
		$code = $this->uri->segment(3);
		$data = $this->sus->where_('placa_base', $code ,'pc_id');
		$this->load->view('Dashboard/hardware/edit/componentes_edit', compact('data'));
		
	}
	public function componentes_update(){
		$codigo = $this->input->post('1');
        $campos = array('procesador','velocidad_reloj','fabricante_procesador','etiqueta_BIOS','fabricante_BIOS','version_BIOS','num_serie_BIOS','fecha_instalacion_BIOS' ,'fabricante_placa','modelo_placa','version_placa','marca_ram','ranura_memoria','ranura_sistema_0','ranura_sistema_1', 'ranura_sistema_2','ranura_sistema_3','ranura_sistema_4');
        $data = array();
		for ($i=1; $i <=count($campos) ; $i++) { 
		    $data[$campos[$i-1]] = $this->input->post($i+1);
		}
		 
		$this->sus->update_('placa_base', $codigo, 'pc_id' ,$data);
		$this->session->set_flashdata('yupi', 'Actualización completada');
		redirect(base_url().'componentes/edit-componentes/'.$codigo,'refresh');
	
	}
	//PARA COMPONENTES




	
}
