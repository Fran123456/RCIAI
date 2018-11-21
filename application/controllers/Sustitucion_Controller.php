<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sustitucion_Controller extends CI_Controller {
    const table = 'inventario_bodega';
	
	public function __construct(){
      parent::__construct();
      
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Sustitucion_Model', 'sus');
		require 'application/plus/noty.php';

	}

	
    
    /*
    *
    *
    */

    //Metodos de utilidad

	 public function _token()
     {
        $variable = "";
        $parte1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $parte2 = rand(100000, 999999). "-" . rand(1000, 9999);
        $parte3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $variable = 'token--'. $parte1 . $parte2 . $parte3 ;
        return $variable;
     }



     public function get_pc(){
      $id = filter_input(INPUT_POST,'dato');
      $pcs = $this->sus->likex2_where('inventario_adm' , $id  ,'destino', 'identificador', 'PC', 'SVR');
      echo json_encode($pcs);
     }

     public function get_perifericos_PC(){
      $id = filter_input(INPUT_POST,'dato');
      $arrayNot = array('CPU','DISCO DURO EXTERNO','LAPTOP','ACCES POINT RADIO U MASFERRER','IMPRESORES MATRICIALES','IMPRESORES MULTIFUNCIONALES','IMPRESOR DESJEKT','SCANNER','WEBCAN','UPS');
      $perifericos = $this->sus->where_not('inventario_bodega', $id ,'pc_servidor_id', 'tipo', $arrayNot);
      echo json_encode($perifericos);
     }

     public function unidad_(){
     	$unidades = $this->sus->get_unidades();
     	return $unidades;
     }
    
    //Metodos de utilidad


     /*
     *
     *
     *
     *
     */


     //metodos para ver vistas de sustitucion 

     public function vista_sustituir_periferico(){
     	 $serial = $this->uri->segment(2);
     	 $infoPeriferico = $this->sus->where_(self::table, $serial ,'serial');
     	 $unidades = $this->unidad_();
         $this->load->view('Dashboard/bodega/sustitucion/sustituir_periferico_View', compact('infoPeriferico', 'unidades'));
     }


     public function perifericos_disponible(){
			$data  = $this->sus->perifericos_disponible();
			$this->load->view('Dashboard/bodega/disponible_perifericos', compact('data'));
	}

	public function sustituir_periferico_form(){
		$serialNueva = $this->input->post('serialNueva');
		$serialVieja = $this->input->post('perichange');
		$codigoPC = $this->input->post('selectPC');
		$unidad = $this->input->post('unidadS');

		$datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
		$datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');

		print_r($datosSerialVieja);
		echo "<br>";
		print_r($datosSerialNueva);

		$perifericoDeRegreso = array(
			'origen' => $unidad,
			'fecha_salida' => null,
			'destino' => 1,
			'pc_servidor_id' => null,
			'pc_servidor_antiguo_id' => $datosSerialVieja[0]['pc_servidor_id'],
		);

        $perifericoDeIda = array(
            'origen' => 1,
            'fecha_salida' => $this->input->post('fechaI'),
            'destino' => $unidad,
            'pc_servidor_id' => $datosSerialVieja[0]['pc_servidor_id'],
            'pc_servidor_antiguo_id' => $datosSerialNueva[0]['pc_servidor_id'],
        );
		
	}


     //metodos para ver vistas de sustitucion 
     /*
     *
     *
     *
     *
     */



}
