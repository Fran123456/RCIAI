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

	#función para verificar los códigos de los inventarios
	public function verificar_codigo()
	{
		$codigo = $this->input->post('codigo');
		//verificamos si el codigo esta en el inventario administrativo
		$respuesta1 = $this->consulta->verificar($codigo,'identificador','inventario_adm');

		if($respuesta1 == false)
		{
			//si es falso verificamos en inventario_lab
			$respuesta2 = $this->consulta->verificar($codigo,'identificador_lab','inventario_lab');
			return $respuesta2;
		}
		else
		{
			return $respuesta1;
		}
	}

	#función para obtener el detalle del equipo
	public function get_detalle()
	{
		$codigo = $this->input->post('codigo');
		$cod = $this->input->post('cod');

		//verificamos si es equipo de laboratorio o administrativo
		switch ($cod) {
			case 'LA':
				$detalle = $this->consulta->detalle_equipo($codigo,'identificador_lab','inventario_lab','descripcion_sistema_id');
				
			break;
			
			case 'PC':
				$detalle = $this->consulta->detalle_equipo($codigo,'identificador','inventario_adm','des_sistema_id');
				
				
			break;
		}
		echo json_encode($detalle);
	}

	#función para obtener los perifericos
	public function get_perifericos()
	{
		$id = $this->input->post('codigo');
		$perifericos = $this->consulta->get_perifericos($id);
		echo json_encode($perifericos);
	}

	#función para obtener el software instalado de adm
	public function adm_software()
	{
		$id = $this->input->post('codigo');
		$sw = $this->consulta->adm_software($id);
		echo json_encode($sw);
	}

	#función para obtener el software instalado de lab
	public function lab_software()
	{
		$id = $this->input->post('codigo');
		$sw = $this->consulta->lab_software($id);
		echo json_encode($sw);
	}

	/////////////////////// para inventario por unidad y laboratorio ///////////////////////
	
	#vista para consultar el detalle por unidad
	public function vista_detalle_unidad()
	{
		$this->load->view('Dashboard/consultas/consulta_unidad_view');
	}

	public function get_detalle_unidad()
	{
		$unidad = $this->input->post('unidad');

		//vamos a verificar si es una unidad administrativa o un laboratorio
		switch ($unidad) {
			case 'lab-01':
			case 'lab-02':
			case 'lab-03':
			case 'lab-04':
			case 'lab-05':
			case 'lab-HW':
			case 'lab-red':
				$detalle = $this->consulta->get_detalle_lab($unidad);
			break;
			
			default:
				$detalle = $this->consulta->get_detalle_administrativo($unidad);
			break;
		}

		echo json_encode($detalle);
	}

	///////////////////////////////// para consulta de compra ///////////////////////
	public function vista_detalle_compra()
	{
		$this->load->view('Dashboard/consultas/consulta_compras_view');
	}

	//función para obtener la compra por el numero de factura
	public function codigo_factura()
	{
		$factura = $this->input->post('codigo_factura');

		$datos = $this->consulta->get_factura($factura);

		echo json_encode($datos);
	}

	//función para obtener todas las compras de una unidad
	public function unidad_factura()
	{
		$unidad = $this->input->post('unidad');

		//vamos a verificar si es una unidad administrativa o un laboratorio
		switch ($unidad) {
			case 'lab-01':
			case 'lab-02':
			case 'lab-03':
			case 'lab-04':
			case 'lab-05':
			case 'lab-HW':
			case 'lab-red':
				$datos = $this->consulta->get_compras_lab($unidad);
			break;
			
			default:
				$datos = $this->consulta->get_compras_adm($unidad);
			break;
		}
		echo json_encode($datos);
	}
}
