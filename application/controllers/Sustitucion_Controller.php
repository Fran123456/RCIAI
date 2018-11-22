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
      $arrayNot = array('CPU','DISCO DURO EXTERNO','LAPTOP','ACCES POINT RADIO U MASFERRER','IMPRESORES MATRICIALES','IMPRESORES MULTIFUNCIONALES','IMPRESOR DESJEKT','SCANNER','WEBCAM','UPS');
      $perifericos = $this->sus->where_not('inventario_bodega', $id ,'pc_servidor_id', 'tipo', $arrayNot);
      echo json_encode($perifericos);
     }



      public function get_perifericos_inventario(){
      $id = filter_input(INPUT_POST,'dato');
      //$id = 'WEBCAM001USAM';
      $perifericos = $this->sus->join_admin($id);
    /*  if(count($perifericos) == 0){
        $perifericos = $this->sus->join_lab($id);
      }  */

      echo json_encode($perifericos);
     }



     public function get_perifericos_PC_lab(){
      $id = filter_input(INPUT_POST,'dato');
      $arrayNot = array('CPU','DISCO DURO EXTERNO','LAPTOP','ACCES POINT RADIO U MASFERRER','IMPRESORES MATRICIALES','IMPRESORES MULTIFUNCIONALES','IMPRESOR DESJEKT','SCANNER','WEBCAN','UPS');
      $perifericos = $this->sus->where_not('inventario_bodega', $id ,'pc_servidor_id', 'tipo', $arrayNot);
      echo json_encode($perifericos);
     }

     public function unidad_(){
     	$unidades = $this->sus->get_unidades();
     	return $unidades;
     }

     public function get_movimiento($tablaInventario , $campoInventario){
        $serialNueva = $this->input->post('serialNueva');
		$serialVieja = $this->input->post('perichange');
		
        $infoCodigo = $this->sus->where_($tablaInventario, $this->input->post('cod'), $campoInventario);
		$datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
		$datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');


     	$movimiento = array(
          'token' => $this->_token(),
          'fecha_retiro' => $this->input->post('fechaR'),
          'fecha_cambio' => $this->input->post('fechaI'),
          'codigo_id' =>  $this->input->post('cod'),
           'unidad_pertenece_id' => $infoCodigo[0]['destino'],
           'unidad_traslado_id' => $datosSerialNueva[0]['origen'],
           'cambio' => $this->input->post('cambioA'),
           'descripcion_cambio' => $this->input->post('descripcionA'),
           'origen_nuevoEquipo_id' => 1,
           'destino_nuevoEquipo_id' => $infoCodigo[0]['destino'],
            'descripcion_equipoRetirado' => $this->input->post('desRetirado'),
           'descripcion_equipoNuevo' => $this->input->post('desNew'),
           'encargado' =>$this->input->post('encA'),
           'tecnico' => $this->input->post('tec'),
           'tipoHardSoft' => 'HARDWARE-EXTERNO',
           'tipo_movimiento' => 'Sustitucion-bodega',
           'serial_nuevo' => $serialNueva,
     	);

     	return $movimiento;
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



 //--------------------------------------------------------------------------------------
       public function vista_sustituir_periferico_code(){
       $serial = $this->uri->segment(2);
       $infoPeriferico = $this->sus->where_(self::table, $serial ,'serial');
       $unidades = $this->unidad_();
         $this->load->view('Dashboard/bodega/sustitucion/sustituir_periferico_code_View', compact('infoPeriferico', 'unidades'));
       }

     
      public function perifericos_disponible_code(){
        $data  = $this->sus->perifericos_disponible_code();
        $this->load->view('Dashboard/bodega/disponible_perifericos_code', compact('data'));
       }

      //-------------------------------------------------------------------------------


  public function vista_sustituir_periferico_code_unidad(){
       $serial = $this->uri->segment(2);
       $infoPeriferico = $this->sus->where_(self::table, $serial ,'serial');
       $unidades = $this->unidad_();
         $this->load->view('Dashboard/bodega/sustitucion/sustituir_periferico_code_unidad_View', compact('infoPeriferico', 'unidades'));
       }





     
//sustitucion sin codigo
	public function sustituir_periferico_form(){
		$serialNueva = $this->input->post('serialNueva');
		$serialVieja = $this->input->post('perichange');
		$codigoPC = $this->input->post('cod');
		$centinela = substr($codigoPC, 0,2);
		

		if($centinela == "LA"){
			 $infoCodigo = $this->sus->where_('inventario_lab', $codigoPC, 'identificador_lab');
		}
		if($centinela == "PC" || $centinela == "SV"){
			$infoCodigo = $this->sus->where_('inventario_adm', $codigoPC, 'identificador');
		}
		
		$datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
		$datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');

		$perifericoDeRegreso = array(
			'estatus' => $this->input->post('estado'),
			'origen' => $infoCodigo[0]['destino'],
			'fecha_salida' => null,
			'destino' => 1,
			'pc_servidor_id' => null,
			'pc_servidor_antiguo_id' => $datosSerialVieja[0]['pc_servidor_id'],
		);

    $perifericoDeIda = array(
        'estatus' => 'En uso',
        'origen' => 1,
        'fecha_salida' => $this->input->post('fechaI'),
        'destino' => $infoCodigo[0]['destino'],
        'pc_servidor_id' => $datosSerialVieja[0]['pc_servidor_id'],
        'pc_servidor_antiguo_id' => $datosSerialNueva[0]['pc_servidor_id'],
       );

       //actualización del periferico arruinado 
        $this->sus->update_(self::table, $serialVieja, 'serial' ,$perifericoDeRegreso);

        //actualizacion del periferico nuevo
	     	$this->sus->update_(self::table, $serialNueva, 'serial' ,$perifericoDeIda);

    if($centinela == "LA"){
    	 $mov = $this->get_movimiento('inventario_lab' , 'identificador_lab');
    	 $this->sus->add_('movimiento', $mov);
    	  $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
           redirect(base_url());
    }
    if($centinela == "PC" || $centinela == "SV"){
       $mov = $this->get_movimiento('inventario_adm' , 'identificador');
       $this->sus->add_('movimiento', $mov);
       $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
          redirect(base_url().'mantenimiento-administrativo');
    }
        
	}








  //sustitucion con codigo
  public function sustituir_periferico_form_code(){
    $serialNueva = $this->input->post('serialNueva');
    $serialVieja = $this->input->post('perichange');
    $codigoPC = $this->input->post('cod');
    $centinela = substr($codigoPC, 0,2);


    if($centinela == "LA"){
       $infoCodigo = $this->sus->where_('inventario_lab', $codigoPC, 'identificador_lab');
    }
    if($centinela == "PC" || $centinela == "SV"){
      $infoCodigo = $this->sus->where_('inventario_adm', $codigoPC, 'identificador');
    }
    
    $datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
    $datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');

    $perifericoDeRegreso = array(
      'estatus' => $this->input->post('estado'),
      'origen' => $infoCodigo[0]['destino'],
      'fecha_salida' => null,
      'destino' => 1,
      'pc_servidor_id' => null,
      'pc_servidor_antiguo_id' => $datosSerialVieja[0]['pc_servidor_id'],
    );

    $perifericoDeIda = array(
        'estatus' => 'En uso',
        'origen' => 1,
        'fecha_salida' => $this->input->post('fechaI'),
        'destino' => $infoCodigo[0]['destino'],
        'pc_servidor_id' => $datosSerialVieja[0]['pc_servidor_id'],
        'pc_servidor_antiguo_id' => $datosSerialNueva[0]['pc_servidor_id'],
       );
     
     $inventario = array(
       'origen' => 1,
       'compra_id' => $datosSerialNueva[0]['compra_id'],
       'serial' => $serialNueva,
     );

  

       //actualización del periferico arruinado 
        $this->sus->update_(self::table, $serialVieja, 'serial' ,$perifericoDeRegreso);

        //actualizacion del periferico nuevo
       $this->sus->update_(self::table, $serialNueva, 'serial' ,$perifericoDeIda);

    if($centinela == "LA"){
       $this->sus->update_('inventario_lab', $serialVieja, 'serial' ,$inventario);
       $mov = $this->get_movimiento('inventario_lab' , 'identificador_lab');
       $this->sus->add_('movimiento', $mov);
       $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
       redirect(base_url());
    }
    if($centinela == "PC" || $centinela == "SV"){
       $this->sus->update_('inventario_adm', $serialVieja, 'serial' ,$inventario);
       $mov = $this->get_movimiento('inventario_adm' , 'identificador');
       $this->sus->add_('movimiento', $mov);
       $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
         redirect(base_url().'mantenimiento-administrativo');
    }
        
  }




  //sustitucion con codigo y unidad :v
  public function sustituir_periferico_form_code_unidad(){
    $centi = "lab";
    $serialNueva = $this->input->post('serialNueva');
    $serialVieja = $this->input->post('perichange');
    $codigoPC = $this->input->post('cod');
    $centinela = substr($codigoPC, 0,2);


 
       $infoCodigo = $this->sus->where_('inventario_lab', $codigoPC, 'identificador_lab');
       if(count($infoCodigo) == 0){
              $infoCodigo = $this->sus->where_('inventario_adm', $codigoPC, 'identificador');
              $centi = "admin";
       }
   

    
    
    $datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
    $datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');

    $perifericoDeRegreso = array(
      'estatus' => $this->input->post('estado'),
      'origen' => $infoCodigo[0]['destino'],
      'fecha_salida' => null,
      'destino' => 1,
      'pc_servidor_id' => null,
      'pc_servidor_antiguo_id' => $datosSerialVieja[0]['pc_servidor_id'],
    );

    $perifericoDeIda = array(
        'estatus' => 'En uso',
        'origen' => 1,
        'fecha_salida' => $this->input->post('fechaI'),
        'destino' => $infoCodigo[0]['destino'],
        'pc_servidor_id' => $datosSerialVieja[0]['pc_servidor_id'],
        'pc_servidor_antiguo_id' => $datosSerialNueva[0]['pc_servidor_id'],
       );
     
     $inventario = array(
       'origen' => 1,
       'compra_id' => $datosSerialNueva[0]['compra_id'],
       'serial' => $serialNueva,
     );

   


  

      //actualización del periferico arruinado 
        $this->sus->update_(self::table, $serialVieja, 'serial' ,$perifericoDeRegreso);

        //actualizacion del periferico nuevo
       $this->sus->update_(self::table, $serialNueva, 'serial' ,$perifericoDeIda);

     if($centi == "lab"){
       $this->sus->update_('inventario_lab', $serialVieja, 'serial' ,$inventario);
       $mov = $this->get_movimiento('inventario_lab' , 'identificador_lab');
       $this->sus->add_('movimiento', $mov);
       $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
       redirect(base_url());
     }

      if($centi == "admin"){
       $this->sus->update_('inventario_adm', $serialVieja, 'serial' ,$inventario);
       $mov = $this->get_movimiento('inventario_adm' , 'identificador');
       $this->sus->add_('movimiento', $mov);
       $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
         redirect(base_url().'mantenimiento-administrativo');
     }
        
  }



     //metodos para ver vistas de sustitucion 
     /*
     *
     *
     *
     *
     */



}
