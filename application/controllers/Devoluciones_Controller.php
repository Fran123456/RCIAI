<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Devoluciones_controller extends CI_Controller {

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
      $elementos = $this->SUS->where_('inventario_bodega' ,'PRESTADO' , 'estatus');
       $unidad = array();
      for ($i=0; $i <count($elementos) ; $i++) { 
         $unidad['origen'][$i] = $this->SUS->where_('unidad'  , $elementos[$i]['origen'] ,'id_unidad' );
         $unidad['destino'][$i] = $this->SUS->where_('unidad',  $elementos[$i]['destino'], 'id_unidad' );
      }

		  $this->load->view('Dashboard/movimientos/devoluciones_list', compact('elementos','unidad'));
	}

	public function regreso(){
     $serial = $this->uri->segment(2);
     $elemento = $this->SUS->where_('inventario_bodega',$serial,'serial');

     $up = array(
      'estatus'=> "En uso",
      'origen' => $elemento[0]['destino'],
      'destino' =>$elemento[0]['origen'],
      'pc_servidor_id' => $elemento[0]['pc_servidor_antiguo_id'],
      'pc_servidor_antiguo_id' => $elemento[0]['pc_servidor_id'],
     );

     $this->SUS->update_('inventario_bodega', $serial, 'serial' ,$up);



	   $this->session->set_flashdata('validar', 'Elemento agregado a la compra correctamente');
        redirect(base_url().'Devoluciones-list');
	}


  public function no_regreso(){
     $serial = $this->uri->segment(2);
     $elemento = $this->SUS->where_('inventario_bodega',$serial,'serial');

     $up = array(
      'estatus'=> "En uso",
     );

     $this->SUS->update_('inventario_bodega', $serial, 'serial' ,$up);
     $this->session->set_flashdata('validar2', 'Elemento agregado a la compra correctamente');
        redirect(base_url().'Devoluciones-list');
  }




}//fin de la clase lab_lista_Controller



 ?>
