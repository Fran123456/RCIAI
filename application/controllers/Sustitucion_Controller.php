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



      public function get_laptop(){
      $id = filter_input(INPUT_POST,'dato');
      $data = $this->sus->where_('inventario_adm', $id ,'identificador');
      echo json_encode($data);
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



  /*SUSTITUCION DE LAPTOP (*_*/
   public function vista_laptop_sustituir(){
     $serial = $this->uri->segment(2);

      $infoPeriferico = $this->sus->where_(self::table, $serial ,'serial');
      $unidades = $this->unidad_();
      $codex = $infoPeriferico[0]['pc_servidor_id'];
      $sistema = $this->sus->where_('descripcion_sistema', $codex ,'pc_ids');
      $placa = $this->sus->where_('placa_base', $codex ,'pc_id');
     
     $this->load->view('Dashboard/bodega/sustitucion/sustituir_laptop_code_View', compact('infoPeriferico', 'unidades', 'sistema', 'placa'));
   }



    //sustitucion con codigo
  public function sustituir_laptop_chida(){
    $serialNueva = $this->input->post('serialNueva');
    $serialVieja = $this->input->post('perichange');
    $codigoPC = $this->input->post('cod'); //viejo


    $infoCodigo = $this->sus->where_('inventario_adm', $codigoPC, 'identificador'); //para actualizar admin

    $datosSerialNueva = $this->sus->where_('inventario_bodega', $serialNueva  ,'serial');
    $datosSerialVieja = $this->sus->where_('inventario_bodega', $serialVieja ,'serial');


    $perifericoDeRegreso = array(
      'estatus' => $this->input->post('estado'),
      'origen' => $infoCodigo[0]['destino'],
      'fecha_salida' => null,
      'destino' => 1,
      'pc_servidor_id' => $datosSerialNueva[0]['pc_servidor_id'],
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

     //Actualizacion de informacion de PC >:v si no va tronar alv 

     $codigoAdmin =  $datosSerialVieja[0]['pc_servidor_id'];
     $codigoBodega = $datosSerialNueva[0]['pc_servidor_id'];
     
     $ida = array('pc_id' => $codigoAdmin);
     $regreso = array('pc_id' => $codigoBodega);

       $this->actualizacion_info_red($codigoAdmin, $codigoBodega);
       $this->actualizacion_info_video($codigoAdmin, $codigoBodega);
       $this->actualizacion_info_almacenamiento($codigoAdmin, $codigoBodega);
        $this->actualizacion_info_sistema($codigoAdmin, $codigoBodega);
     
       $this->actualizacion_info_placa($codigoAdmin, $codigoBodega);

       //actualización del periferico arruinado 
        $this->sus->update_(self::table, $serialVieja, 'serial' ,$perifericoDeRegreso);

        //actualizacion del periferico nuevo
       $this->sus->update_(self::table, $serialNueva, 'serial' ,$perifericoDeIda);
    
       $this->sus->update_('inventario_adm', $serialVieja, 'serial' ,$inventario);


       $mov = $this->get_movimiento('inventario_adm' , 'identificador');
    
       $this->sus->add_('movimiento', $mov);

      $this->session->set_flashdata('change', 'Elemento agregado a la compra correctamente');
         redirect(base_url().'mantenimiento-administrativo');
    
        
  }


  public function actualizacion_info_red($codigoAdmin, $codigoBodega){
     //PARA ADAPATADORES DE RED
      $infoida = $this->sus->where_('adaptador_red', $codigoBodega ,'pc_id'); //que viene de bodega a admin
      $inforegreso = $this->sus->where_('adaptador_red', $codigoAdmin ,'pc_id');//que pasa de admin a bodega

      $adaptadorIDA = array(
      'adaptador_1' => $inforegreso[0]['adaptador_1'],
      'tipo_adaptador' => $inforegreso[0]['tipo_adaptador'],
      'direccion_ip' => $inforegreso[0]['direccion_ip'],
      'subred_ip' => $inforegreso[0]['subred_ip'],
      'gateway' => $inforegreso[0]['gateway'],
      'servidor_primario' => $inforegreso[0]['servidor_primario'],
      'servidor_dns' => $inforegreso[0]['servidor_dns'],
       'servidor_dhcp' => $inforegreso[0]['servidor_dhcp'],
       'direccion_mac' => $inforegreso[0]['direccion_mac'],
       'tarjeta_extra' => $inforegreso[0]['tarjeta_extra'],
     );
      $this->sus->update_('adaptador_red', $codigoBodega, 'pc_id' ,$adaptadorIDA);

     $adaptadorRegreso = array(
      'adaptador_1' => $infoida[0]['adaptador_1'],
      'tipo_adaptador' => $infoida[0]['tipo_adaptador'],
      'direccion_ip' => $infoida[0]['direccion_ip'],
      'subred_ip' => $infoida[0]['subred_ip'],
      'gateway' => $infoida[0]['gateway'],
      'servidor_primario' => $infoida[0]['servidor_primario'],
      'servidor_dns' => $infoida[0]['servidor_dns'],
       'servidor_dhcp' => $infoida[0]['servidor_dhcp'],
       'direccion_mac' => $infoida[0]['direccion_mac'],
       'tarjeta_extra' => $infoida[0]['tarjeta_extra'],
     );
     $this->sus->update_('adaptador_red', $codigoAdmin, 'pc_id' , $adaptadorRegreso);
     //PARA ADAPATADORES DE RED
  }




   public function actualizacion_info_video($codigoAdmin, $codigoBodega){
     //PARA ADAPATADORES DE video
      $infoida = $this->sus->where_('adaptador_video', $codigoBodega ,'pc_id'); //que viene de bodega a admin
      $inforegreso = $this->sus->where_('adaptador_video', $codigoAdmin ,'pc_id');//que pasa de admin a bodega

      $videoIDA = array(
      'monitor_marca' => $inforegreso[0]['monitor_marca'],
      'tipo' => $inforegreso[0]['tipo'],
      'modelo' => $inforegreso[0]['modelo'],
      'serie' => $inforegreso[0]['serie'],
      'adaptador1' => $inforegreso[0]['adaptador1'],
      'adaptador_ram' => $inforegreso[0]['adaptador_ram'],
       'tipo_dac' => $inforegreso[0]['tipo_dac'],
       'monitor_pc1' => $inforegreso[0]['monitor_pc1'],
       'resolucion_video' => $inforegreso[0]['resolucion_video'],
       'velocidad' => $inforegreso[0]['velocidad'],
     );
      $this->sus->update_('adaptador_video', $codigoBodega, 'pc_id' ,$videoIDA);

     $videoRegreso = array(
      'monitor_marca' => $infoida[0]['monitor_marca'],
      'tipo' => $infoida[0]['tipo'],
      'modelo' => $infoida[0]['modelo'],
      'serie' => $inforegreso[0]['serie'],
      'adaptador1' => $infoida[0]['adaptador1'],
      'adaptador_ram' => $infoida[0]['adaptador_ram'],
       'tipo_dac' => $infoida[0]['tipo_dac'],
       'monitor_pc1' => $infoida[0]['monitor_pc1'],
       'resolucion_video' => $infoida[0]['resolucion_video'],
       'velocidad' => $infoida[0]['velocidad'],
     );
     $this->sus->update_('adaptador_video', $codigoAdmin, 'pc_id' , $videoRegreso);
     //PARA ADAPATADORES DE video
   }






   public function actualizacion_info_almacenamiento($codigoAdmin, $codigoBodega){
     //PARA ADAPATADORES DE video
      $infoida = $this->sus->where_('almacenamiento', $codigoBodega ,'pc_id'); //que viene de bodega a admin
      $inforegreso = $this->sus->where_('almacenamiento', $codigoAdmin ,'pc_id');//que pasa de admin a bodega

      $almacenamientoIDA = array(
      'disco_fisico1' => $inforegreso[0]['disco_fisico1'],
      'capacidad' => $inforegreso[0]['capacidad'],
      'marca_disco' => $inforegreso[0]['marca_disco'],
      'dvd1' => $inforegreso[0]['dvd1'],
      'disco_logico' => $inforegreso[0]['disco_logico'],
      'sistema_archivos' => $inforegreso[0]['sistema_archivos'],
       'tamaño' => $inforegreso[0]['tamaño'],
       'espacio_libre' => $inforegreso[0]['espacio_libre'],
       'letra_unidad' => $inforegreso[0]['letra_unidad'],
     );
      $this->sus->update_('almacenamiento', $codigoBodega, 'pc_id' ,$almacenamientoIDA);

     $almacenamientoRegreso = array(
      'disco_fisico1' => $infoida[0]['disco_fisico1'],
      'capacidad' => $infoida[0]['capacidad'],
      'marca_disco' => $infoida[0]['marca_disco'],
      'dvd1' => $inforegreso[0]['dvd1'],
      'disco_logico' => $infoida[0]['disco_logico'],
      'sistema_archivos' => $infoida[0]['sistema_archivos'],
       'tamaño' => $infoida[0]['tamaño'],
       'espacio_libre' => $infoida[0]['espacio_libre'],
       'letra_unidad' => $infoida[0]['letra_unidad'],
     );
     $this->sus->update_('almacenamiento', $codigoAdmin, 'pc_id' , $almacenamientoRegreso);
     //PARA ADAPATADORES DE video
   }



   public function actualizacion_info_sistema($codigoAdmin, $codigoBodega){
     //PARA ADAPATADORES DE video
      $infoida = $this->sus->where_('descripcion_sistema', $codigoBodega ,'pc_ids'); //que viene de bodega a admin
      $inforegreso = $this->sus->where_('descripcion_sistema', $codigoAdmin ,'pc_ids');//que pasa de admin a bodega

      $descripcion_sistemaIDA = array(
      'nombre' => $inforegreso[0]['nombre'],
      'fabricante' => $inforegreso[0]['fabricante'],
      'sistema_operativo' => $inforegreso[0]['sistema_operativo'],
      'nucleo' => $inforegreso[0]['nucleo'],
      'paquete_servicio' => $inforegreso[0]['paquete_servicio'],
      'version' => $inforegreso[0]['version'],
       'usuario_registrado' => $inforegreso[0]['usuario_registrado'],
       'memoria_fisica' => $inforegreso[0]['memoria_fisica'],
       'dominio' => $inforegreso[0]['dominio'],
        'modelo' => $inforegreso[0]['modelo'],
      'serie_des' => $inforegreso[0]['serie_des'],
      'organizacion' => $inforegreso[0]['organizacion'],
      'idioma' => $inforegreso[0]['idioma'],
      'zona_horaria' => $inforegreso[0]['zona_horaria'],
       'usuario_sesion' => $inforegreso[0]['usuario_sesion'],
       'version_DirectX' => $inforegreso[0]['version_DirectX'],
       'caja_sistema' => $inforegreso[0]['caja_sistema'],


     );
      $this->sus->update_('descripcion_sistema', $codigoBodega, 'pc_ids' ,$descripcion_sistemaIDA);

     $descripcion_sistemaRegreso = array(
      'nombre' => $infoida[0]['nombre'],
      'fabricante' => $infoida[0]['fabricante'],
      'sistema_operativo' => $infoida[0]['sistema_operativo'],
      'nucleo' => $inforegreso[0]['nucleo'],
      'paquete_servicio' => $infoida[0]['paquete_servicio'],
      'version' => $infoida[0]['version'],
       'usuario_registrado' => $infoida[0]['usuario_registrado'],
       'memoria_fisica' => $infoida[0]['memoria_fisica'],
       'dominio' => $infoida[0]['dominio'],
        'modelo' => $infoida[0]['modelo'],
      'serie_des' => $infoida[0]['serie_des'],
      'organizacion' => $infoida[0]['organizacion'],
      'idioma' => $infoida[0]['idioma'],
      'zona_horaria' => $infoida[0]['zona_horaria'],
       'usuario_sesion' => $infoida[0]['usuario_sesion'],
       'version_DirectX' => $infoida[0]['version_DirectX'],
       'caja_sistema' => $infoida[0]['caja_sistema'],
     );
     $this->sus->update_('descripcion_sistema', $codigoAdmin, 'pc_ids' , $descripcion_sistemaRegreso);
     //PARA ADAPATADORES DE video
   }




    public function actualizacion_info_placa($codigoAdmin, $codigoBodega){
     //PARA ADAPATADORES DE video
      $infoida = $this->sus->where_('placa_base', $codigoBodega ,'pc_id'); //que viene de bodega a admin
      $inforegreso = $this->sus->where_('placa_base', $codigoAdmin ,'pc_id');//que pasa de admin a bodega

      $placa_baseIDA = array(
      'procesador' => $inforegreso[0]['procesador'],
      'velocidad_reloj' => $inforegreso[0]['velocidad_reloj'],
      'fabricante_procesador' => $inforegreso[0]['fabricante_procesador'],
      'etiqueta_BIOS' => $inforegreso[0]['etiqueta_BIOS'],
      'fabricante_BIOS' => $inforegreso[0]['fabricante_BIOS'],
      'version_BIOS' => $inforegreso[0]['version_BIOS'],
       'num_serie_BIOS' => $inforegreso[0]['num_serie_BIOS'],
       'fecha_instalacion_BIOS' => $inforegreso[0]['fecha_instalacion_BIOS'],
       'fabricante_placa' => $inforegreso[0]['fabricante_placa'],


       'modelo_placa' => $inforegreso[0]['modelo_placa'],
      'version_placa' => $inforegreso[0]['version_placa'],
      'marca_ram' => $inforegreso[0]['marca_ram'],
      'ranura_memoria' => $inforegreso[0]['ranura_memoria'],
      'ranura_sistema_0' => $inforegreso[0]['ranura_sistema_0'],
      'ranura_sistema_1' => $inforegreso[0]['ranura_sistema_1'],
       'ranura_sistema_2' => $inforegreso[0]['ranura_sistema_2'],
       'ranura_sistema_3' => $inforegreso[0]['ranura_sistema_3'],
       'ranura_sistema_4' => $inforegreso[0]['ranura_sistema_4'],
     );
      $this->sus->update_('placa_base', $codigoBodega, 'pc_id' ,$placa_baseIDA);

     $placa_baseRegreso = array(
      'procesador' => $infoida[0]['procesador'],
      'velocidad_reloj' => $infoida[0]['velocidad_reloj'],
      'fabricante_procesador' => $infoida[0]['fabricante_procesador'],
      'etiqueta_BIOS' => $inforegreso[0]['etiqueta_BIOS'],
      'fabricante_BIOS' => $infoida[0]['fabricante_BIOS'],
      'version_BIOS' => $infoida[0]['version_BIOS'],
       'num_serie_BIOS' => $infoida[0]['num_serie_BIOS'],
       'fecha_instalacion_BIOS' => $infoida[0]['fecha_instalacion_BIOS'],
       'fabricante_placa' => $infoida[0]['fabricante_placa'],

           'modelo_placa' => $infoida[0]['modelo_placa'],
      'version_placa' => $infoida[0]['version_placa'],
      'marca_ram' => $infoida[0]['marca_ram'],
      'ranura_memoria' => $inforegreso[0]['ranura_memoria'],
      'ranura_sistema_0' => $infoida[0]['ranura_sistema_0'],
      'ranura_sistema_1' => $infoida[0]['ranura_sistema_1'],
       'ranura_sistema_2' => $infoida[0]['ranura_sistema_2'],
       'ranura_sistema_3' => $infoida[0]['ranura_sistema_3'],
       'ranura_sistema_4' => $infoida[0]['ranura_sistema_4'],
     );
     $this->sus->update_('placa_base', $codigoAdmin, 'pc_id' , $placa_baseRegreso);
     //PARA ADAPATADORES DE video
   }



   /*SUSTITUCION DE LAPTOP (*_*/




/*SUSTITUCION DE PCU :'V QUE SED*/

public function vista_cpu_sustituir(){
     $serial = $this->uri->segment(2);

      $infoPeriferico = $this->sus->where_(self::table, $serial ,'serial');
      $unidades = $this->unidad_();
      $codex = $infoPeriferico[0]['pc_servidor_id'];
      $sistema = $this->sus->where_('descripcion_sistema', $codex ,'pc_ids');
      $placa = $this->sus->where_('placa_base', $codex ,'pc_id');
     
     $this->load->view('Dashboard/bodega/sustitucion/sustituir_cpu_code_View', compact('infoPeriferico', 'unidades', 'sistema', 'placa'));
   }








     //metodos para ver vistas de sustitucion 
     /*
     *
     *
     *
     *
     */



}
