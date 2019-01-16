<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Desecho_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Sustitucion_Model', 'SUS');
    $this->load->model('GeneralReporte_Model','general');

		require 'application/plus/noty.php';
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function index()
	{
      $elementos = $this->SUS->where_('inventario_bodega' ,'Desechado' , 'estatus');
       $unidad = array();
      for ($i=0; $i <count($elementos) ; $i++) { 
         $unidad['origen'][$i] = $this->SUS->where_('unidad'  , $elementos[$i]['origen'] ,'id_unidad' );
         $unidad['destino'][$i] = $this->SUS->where_('unidad',  $elementos[$i]['destino'], 'id_unidad' );
      }

		  $this->load->view('Dashboard/bodega/desecho/desecho_list', compact('elementos','unidad'));
	}

  public function EliminarElemento($id){
    $this->general->delete_('serial', $id, 'inventario_bodega');

    $this->session->set_flashdata('validar', 'hoga');
    redirect( base_url().'Eliminar-bodega');
  }


 public function del__all(){

   $this->general->delete_('estatus', 'Desechado', 'inventario_bodega');

    $this->session->set_flashdata('validar', 'hoga');
    redirect( base_url().'Eliminar-bodega');
  
 }



}//fin de la clase lab_lista_Controller



 ?>
