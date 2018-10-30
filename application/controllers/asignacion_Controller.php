<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class bodega_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		$this->load->model('bodega_Model','bod');
		require 'application/plus/noty.php';

	}

	
	//METODO PARA ASIGNAR UN ELEMENTO DE BODEGA

	function catch_asignacion(){
      $serial = $this->input->post('serial');
      $pc = $this->input->post('op');

      $data = $this->bod->get_element_bodega($serial);
      $dataPC = $this->bod->get_pc($pc);

      //actualizacion en bodega
      $dataUpdate = array(
            'estatus' => 'en uso',
            'origen' => 1,
            'fecha_salida'=> $this->input->post('fecha'),
            'destino' => $dataPC[0]['destino'],
            'pc_servidor_id' => $pc,
            'pc_servidor_antiguo_id' => $data[0]['pc_servidor_id'],
       );

      //actualizamos en bodega
       $validator =  $this->bod->update_bodega__($serial, $dataUpdate);

	       if($validator == true)
	       {
		    

		         //validamos si es para administracion o para laboratorios
			     if(substr($pc, 0,2) == 'PC'){
			       $dataPeriferico = array(
			       	'serie' => $serial,
			       	'nombre' => $data[0]['nombre'],
			       	'tipo' => $data[0]['tipo'],
			       	'marca' => $data[0]['marca'],
			       	'PC_id' => $pc,
			       );
			     }
			     else{
		            $dataPeriferico = array(
			       	'serie' => $serial,
			       	'nombre' => $data[0]['nombre'],
			       	'tipo' => $data[0]['tipo'],
			       	'marca' => $data[0]['marca'],
			       	'PC_lab_id' => $pc,
			       );
			     }


		         //Agregamos los perifericos
		         if($data[0]['tipo'] == "IMPRESORES MATRICIALES" || $data[0]['tipo'] == "IMPRESORES MULTIFUNCIONALES" || $data[0]['tipo'] == "IMPRESOR DESJEKT" || $data[0]['tipo'] == "IMPRESOR DESJEKT" || $data[0]['tipo'] == "WEBCAN" || $data[0]['tipo'] == "WEBCAN" || $data[0]['tipo'] == "PARLANTES" || $data[0]['tipo'] == "LECTOR PARA MEMORIA SD"){
					 $this->bod->add_periferico_Out($dataPeriferico);

		         }else{
		            $this->bod->add_periferico_Adicional($dataPeriferico);
		         }

		         $this->session->set_flashdata('update' , 'Asignación realizada correctamente');
		          if(substr($pc, 0,2) == 'PC'){
		          	 redirect(base_url().'administrativo_Controller/detalle/'.$pc ,'refresh');
		          }else{
		             redirect(base_url().'lab_lista_Controller/detalle/'.$pc,'refresh');
		          }

	       }
	       else
	       {
	       		$this->session->set_flashdata('error_update' , 'Asignación no se ha podido realizar');
	       		redirect(base_url() ,'refresh');
	       }
	}


}//fin de la clase bodega_Controller

 ?>
