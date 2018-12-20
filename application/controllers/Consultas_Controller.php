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
}
