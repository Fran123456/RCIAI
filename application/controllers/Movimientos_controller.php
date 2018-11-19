<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Movimientos_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('Movimientos_model','mov');
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
		#getAsignacion() nos traera la consulta con los datos para mostrar en una tabla
		$datos['detalle'] = $this->mov->getAsignacion();
		$this->load->view('Dashboard/movimientos/asignaciones',$datos);
	}


	//funcion que muestra el detalle de los movimientos de asignacion
	//recibe el id_cambio 
	public function detalleAsignacion($id)
	{
		#getDetalleAsig($id) nos trae los campos necesarios 
		#donde $id es id_cambio
		$resultado = $this->mov->getDetalleAsig($id);
		if($resultado){
		//vamos a obtener las unidades
			foreach ($resultado as $u) {
				$origen = $this->mov->getOrigen_destino($u->origen_nuevoEquipo_id);
				$u->origen_nuevoEquipo_id = $origen;
				$destino = $this->mov->getOrigen_destino($u->destino_nuevoEquipo_id);
				$u->destino_nuevoEquipo_id = $destino;
			}
		}
		$datos['detalle'] = $resultado;
		//print_r($datos['detalle']);

		#mandamos los datos a la vista que tendra el detalle
		$this->load->view('Dashboard/movimientos/detalleAsignacion',$datos);
	}

	//función para el prestamos de equipo de laboratorio
	public function prestamos()
	{
		echo "prestamo";
	}

}//fin de la clase lab_lista_Controller



 ?>
