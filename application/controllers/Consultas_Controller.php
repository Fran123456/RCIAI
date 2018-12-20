<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Consultas_Model','consulta');
		require 'application/plus/noty.php';
	}

	#función para mostrar la vista para la vista 
	public function vista_detalle_equipo()
	{
		//cargamos la vista
		$this->load->view('Dashboard/consultas/consulta_codigo_view');
	}
}