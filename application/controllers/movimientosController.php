<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class MovimientosController extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('movimientosModel','mov');
		require 'application/plus/noty.php';

	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function index()
	{
		$this->load->view('Dashboard/movimientos/movimientoGeneral');
	}


	//muestra un listado de las asignaciones
	public function asignaciones()
	{
		#hgetAsignacion() nos traera la consulta con los datos para mostrar en una tabla
		$datos['detalle'] = $this->mov->getAsignacion();
		$this->load->view('Dashboard/movimientos/asignaciones',$datos);
	}

}//fin de la clase lab_lista_Controller



 ?>
