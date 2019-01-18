<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class form_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Sustitucion_Model', 'SUS');
		$this->load->model('Hardware_Model','HAR');

		require 'application/plus/noty.php';
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function index()
	{
        $unidades = $this->SUS->select_('unidad');
		$this->load->view('Dashboard/movimientos/formulario_', compact('unidades'));
	}

	public function send(){

		$data = array(
		'token' => $this->_token(),
          'fecha_retiro'=>$this->input->post('fecha_retiro'),
          'fecha_cambio'=>$this->input->post('fecha_cambio'),
          'codigo_id'=>$this->input->post('codigo_id'),
          'unidad_pertenece_id'=>$this->input->post('unidad_pertenece_id'),
          'unidad_traslado_id'=>$this->input->post('unidad_traslado_id'),
          'cambio'=>$this->input->post('cambio'),
          'descripcion_cambio'=>$this->input->post('descripcion_cambio'),
          'origen_nuevoEquipo_id'=>$this->input->post('origen_nuevoEquipo_id'),
          'destino_nuevoEquipo_id'=>$this->input->post('destino_nuevoEquipo_id'),
          'descripcion_equipoRetirado'=>$this->input->post('descripcion_equipoRetirado'),
          'descripcion_equipoNuevo'=>$this->input->post('descripcion_equipoNuevo'),
          'encargado'=>$this->input->post('encargado'),
          'tecnico'=>$this->input->post('tecnico'),
          'tipoHardSoft'=>$this->input->post('tipoHardSoft'),
          'tipo_movimiento'=>$this->input->post('tipo_movimiento'),
          'serial_nuevo'=>$this->input->post('serial_nuevo'),
		);
		$this->SUS->add_('movimiento', $data);


	 $this->session->set_flashdata('validar', 'Elemento agregado a la compra correctamente');
         redirect(base_url().'movimientos');
	}

	public function _token()
     {
        $variable = "";
        $parte1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $parte2 = rand(100000, 999999). "-" . rand(1000, 9999);
        $parte3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $variable = 'token--'. $parte1 . $parte2 . $parte3 ;
        return $variable;
     }



}//fin de la clase lab_lista_Controller



 ?>
