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

/**********************************************************************************************************************
********************************  ASIGNACION **************************************************************************
***********************************************************************************************************************/
	
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


/**********************************************************************************************************************
********************************  SUSTITUCIÓN **************************************************************************
***********************************************************************************************************************/

	//función que muestra el listado de los movimientos de sustitución
	public function sustituciones()
	{
		#getSustitucion() nos traera la consulta con los datos a mostrar en la tabla
		$datos['detalle'] = $this->mov->getSustitucion();
		$this->load->view('Dashboard/movimientos/sustituciones',$datos);
	}

	

	//función para obtener el detalle de la Sustitucion
	public function detalleSustitucion($id)
	{
		#getDetalleAsig($id) nos trae los campos necesarios 
		#donde $id es id_cambio
		$resultado = $this->mov->getDetalleSus($id);
		if($resultado){
		//vamos a obtener las unidades
			foreach ($resultado as $u) {
				//equipo nuevo
				$origen = $this->mov->getOrigen_destino($u->origen_nuevoEquipo_id);
				$u->origen_nuevoEquipo_id = $origen;
				$destino = $this->mov->getOrigen_destino($u->destino_nuevoEquipo_id);
				$u->destino_nuevoEquipo_id = $destino;

				//equipo viejo
				$origenViejo = $this->mov->getOrigen_destino($u->unidad_pertenece_id);
				$u->unidad_pertenece_id = $origenViejo;
				$destinoViejo = $this->mov->getOrigen_destino($u->unidad_traslado_id);
				$u->unidad_traslado_id = $destinoViejo;
			}
		}
		$datos['detalle'] = $resultado;
		//print_r($datos['detalle']);

		#mandamos los datos a la vista que tendra el detalle
		$this->load->view('Dashboard/movimientos/detalleSustitucion',$datos);
	}



	/**********************************************************************************************************************
********************************    PRESTAMOS     *************************************************************************
***********************************************************************************************************************/
//función para el prestamos de equipo de laboratorio
	public function prestamos()
	{
		echo "prestamo";
	}

	//función que se encarga de verificar si el codigo existe en algún inventario
	# devuelve 1 si esta en inventario_adm
	# devuelve 2 si esta en inventario_lab
	# devuelve 0 si no se encuentra en la base de datos
	public function verificar_codigo()
	{
		$codigo = $this->input->post('codigo');//obtenemos el codigo que mandamos de la función ajax
		
		#vamos primero a consultar en la tabla inventario_adm
		$valor = $this->mov->verificarAdmin($codigo);

		//verificamos si el codigo se encuentra en el inventario admin
		if($valor)
		{
			$result = 1; #si esta en inventario_adm
		}else{
			//si el codigo no esta en el inventario_adm, consultamos en inventario_lab
			$valor = $this->mov->verificarLab($codigo);
			if($valor)
			{
				$result = 2; #si esta en inventario_lab 
			}
			else
				$result = 0; #si no esta en ningún inventario
		}
		echo json_encode($result);
	}

	//función que verifica si hay equipos en el laboratorio seleccionado
	public function obtener_equipo()
	{
		$laboratorio = $this->input->post('lab');
		$resultado = $this->mov->obtener_equipo($laboratorio);

		if($resultado)
		{
			echo json_encode($resultado);
		}else{
			echo json_encode(false);
		}
	}

}//fin de la clase lab_lista_Controller



 ?>
