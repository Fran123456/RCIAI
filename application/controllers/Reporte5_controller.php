<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Reporte5_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model', 'General');
		$this->load->model('Reporte4_Model','R4');

		require 'application/plus/noty.php';
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function index()
	{
        $unidades = $this->SUS->select_('unidad');
		$this->load->view('Dashboard/movimientos/formulario_', compact('unidades'));
	}

	 

}



?>
