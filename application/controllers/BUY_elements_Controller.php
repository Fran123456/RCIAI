<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BUY_elements_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('BUY_elements_Model','element');
		require 'application/plus/noty.php';

	}

	public function index()
	{
		$this->load->view('Dashboard/dashboard_View', compact('hoy', 'data'));
	}

 #obtiene unidad
  public function unidad(){
    $data = $this->element->get_unidad();
    echo json_encode($data);
  }

  public function get_pc_unidad(){
    $name= $this->input->post('uni');
    $data = $this->element->pc_unidad($name);
    return $data;
  }

  public function get_pc_labxlab(){
     $id = filter_input(INPUT_POST, 'dato');
    $data = $this->element->labxlab($id);
    echo json_encode($data);
  }

   public function add_PC($compraA = null, $cantidad = null)
   {
    $compra = $compraA;
		$this->load->view('Dashboard/shopping/buy/BUY_validate_View', compact('compra', 'cantidad'));
   }

    public function __idElemento($tipo)
     {
        $variable = "";
        $parte1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $parte2 = rand(100000, 999999). "-" . rand(1000, 9999);
        $parte3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

        if($tipo == 'Servidor'){
          $parte4 = "servidor--";
          $variable = $parte4 .$parte1 . $parte2 . $parte3 ;
        }
        elseif($tipo =='PC'){
          $parte4 = "PC--";
          $variable = $parte4. $parte1 . $parte2 . $parte3 ;
        }elseif($tipo =="LAP"){
          $parte4 = "LAP--";
          $variable = $parte4. $parte1 . $parte2 . $parte3 ;
        }
        return $variable;
    }


 #valida la compra
   public function validate_buy()
   {
      $factura= $this->input->post('factura');
      if($factura == ""){
         $this->session->set_flashdata('error', 'El campo campos codigo factura esta vacio');
         $this->add_PC();
      }
      else
      {
          $data = $this->element->validate_buy($factura);
          if(count($data)>0){

           if($data[0]['cantidad'] == $data[0]['rest']){
              $this->session->set_flashdata('error', 'La factura existe, sin embargo ya no puede agregar más productos a la compra');
             $this->add_PC();
           }else{
            #VALIDA CUANTOS ELEMENTOS HAY DISPOIBLES PARA PODER AGREGAR
            $cantidad = $data[0]['cantidad'] - $data[0]['rest'];
            $mensaje = "";
            if($cantidad == 1){
                $mensaje = "Puede agregar " . $cantidad . " elemento más";
            }else{
              $mensaje = "Puede agregar " . $cantidad . " elementos más";
            }

             $unidad = $this->element->get_unidad_unique($this->input->post('uni'));
             $datos = array(
              'data' => $data,
              'cantidad' => $cantidad,
              'mensaje' => $mensaje,
              'unidad'=> $unidad,
              'tipo'=> $this->input->post('tipo'),
              'todos' => $this->get_pc_unidad(),
            );
            $this->load->view('Dashboard/shopping/buy/BUY_add_element_View', compact('datos'));
           }

          }
          else
          {
            $this->session->set_flashdata('error', 'El N° de factura ingresado no existe');
            $this->add_PC();
          }
      }

   }


//NUEVO PURO
    public function buy_edit(){
      $total = $this->input->post('rest')+1;
      $data = array(
        'rest' => $total,
      );
      $this->element->updateBUY($data, $this->input->post('idcompra'));
    }

    public function unidadxdata_add(){
      $data2 = array(
            'compra_id' => $this->input->post('idcompra'),
            'unidad_id'=> $this->input->post('destino-0'),
            'cantidad' => '1',
         );
         $this->element->add_unidad_data($data2);
    }

    public function unidadxdata_update(){
      $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));
      $data = array(
            'cantidad' => $unidadxdata[0]['cantidad'] + 1,
      );
      $this->element->updateUnidadxdata($data, $this->input->post('idcompra'), $this->input->post('destino-0'));
    }
  //NUEVO PURO


public function laptop_nuevo_add(){
   $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

     if( count($unidadxdata) == 0){
         $this->unidadxdata_add();
         $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }

		 $data = array(

		 'serial' => $this->input->post('serial'),
		 'marca' => $this->input->post('marca'),
		 'tipo' => 'LAPTOP',
		 'estatus' => 'En uso',
		 'fecha_ingreso' => $this->input->post('ingreso-1'),
		 'origen' => $this->input->post('OrigenPC_Falso-1'),
		 'destino' => $this->input->post('destino-0'),

	 );

				$this->element->add_periferico_nuevo($data);

       $this->catch_info_pc();
       $this->generate_admin_pc();


    $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
}


   public function pc_nuevo_add(){
    $cantidad = $this->input->post('cantidadTotal');

    if($this->input->post('codigopc')  != null){
     $pcservidor =$this->input->post('codex3');
    }else{
       $pcservidor = $this->__idElemento($this->input->post('tipo'));
    }


    for ($i=0; $i <$cantidad ; $i++) {
     $tipoPeriferico = $this->input->post($i.'-ele');
      $data = array(
        'serial' => $this->input->post('serial-'.$i.'-'.$tipoPeriferico),
        'nombre' => $this->input->post('nombre-'.$i.'-'.$tipoPeriferico) ,
        'marca' =>  $this->input->post('marca-'.$i.'-'.$tipoPeriferico),
        'capacidad' =>  $this->input->post('capacidad-'.$i.'-'.$tipoPeriferico),
        'tipo' =>  $this->input->post('tipo-'.$i.'-'.$tipoPeriferico),
        'velocidad' => $this->input->post('velocidad-'.$i.'-'.$tipoPeriferico),
        'estatus' => 'En uso',
        'fecha_ingreso' => $this->input->post('ingreso-1'),
        'origen' =>$this->input->post('OrigenPC_Falso-1') ,
        'destino' => $this->input->post('destino-0'),
        'compra_id' => $this->input->post('idcompra'),
        'pc_servidor_id' => $pcservidor,
      );
     $this->element->add_periferico_nuevo($data);
    }
    $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

     if( count($unidadxdata) == 0){
         $this->unidadxdata_add();
          $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }

    

    $this->catch_info_pc($pcservidor);


    if($this->input->post('codigopc')  != null)
    {
          $this->generate_admin_pc();
    }


    $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
  }






public function otro_asignado_add_new(){
    $soldado =  $this->input->post('mejor');
    $servidorPC = $this->input->post('codex0') .$this->input->post('codex').$this->input->post('codex1');
    $lugarName = $this->element->get_unidad_unique($this->input->post('destino-0'));
    if($soldado == 0){
       //no asignado
       $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'), //tipo si es vga , etc
       'marca' =>$this->input->post('marca-0'),
        'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('codex0'), //tipo de perfericos
         'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>'nuevo',
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '4',
       'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
      );
       $this->element->add_data($data, 'inventario_bodega');
    }


      $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

     if( count($unidadxdata) == 0){

           $this->unidadxdata_add();
           $this->buy_edit();
       }
       else{
           $this->unidadxdata_update();
            $this->buy_edit();
       }


      $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
      redirect(base_url().'add-element-buy');
  }




  public function otro_asignado_add_lab(){
    $soldado =  $this->input->post('mejor');
    $servidorPC = $this->input->post('codex0') .$this->input->post('codex').$this->input->post('codex1');
    $lugarName = $this->element->get_unidad_unique($this->input->post('destino-0'));
    if($soldado == 0){
       //no asignado
       $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'), //tipo si es vga , etc
       'marca' =>$this->input->post('marca-0'),
        'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('codex0'), //tipo de perfericos
         'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>'En uso',
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '4',
       'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
      );

       $this->element->add_data($data, 'inventario_bodega');
    }else{
      $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'), //tipo si es vga , etc
       'marca' =>$this->input->post('marca-0'),
        'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('codex0'), //tipo de perfericos
         'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>'En uso',
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '4',
       'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
        'pc_servidor_id' => $this->input->post('unidadesU'),
      );
       $this->element->add_data($data, 'inventario_bodega');
    }


      $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

     if( count($unidadxdata) == 0){

           $this->unidadxdata_add();
           $this->buy_edit();
       }
       else{
           $this->unidadxdata_update();
            $this->buy_edit();
       }

       //agregamos a lab
       $labox = array(
        'identificador_lab' => $servidorPC,
        'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
        'origen' => '4',
        'destino' =>$this->input->post('destino-0'),
         'serial' =>$this->input->post('serial-0'),
         'lab' =>$this->input->post('codex0'),
         'compra_id' => $this->input->post('idcompra'),
       );
       $this->element->labo_pc($labox);


      $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
      redirect(base_url().'add-element-buy');
  }


















  public function otro_asignado_add(){
    $soldado =  $this->input->post('mejor');
    $servidorPC = $this->input->post('codex0') .$this->input->post('codex').$this->input->post('codex1');
    $lugarName = $this->element->get_unidad_unique($this->input->post('destino-0'));
    if($soldado == 0){
       //no asignado
       $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'), //tipo si es vga , etc
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'), //tipo de perfericos
         'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>'En uso',
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '4',
       'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
      );
       $this->element->add_data($data, 'inventario_bodega');

    }else{
      //no asignado
       $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'), //tipo si es vga , etc
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'), //tipo de perfericos
         'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>'En uso',
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '4',
       'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
         'pc_servidor_id ' =>$this->input->post('unidadesU') ,
      );
      $this->element->add_data($data, 'inventario_bodega');
    }


      $dataAdmin = array(
        'identificador' => $servidorPC,
        'encargado_puesto' =>$this->input->post('encargado'),
        'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
        'origen' => '4',
        'destino' =>$this->input->post('destino-0'),
        'compra_id' =>$this->input->post('idcompra'),
        'lugar_name' =>$lugarName[0]['unidad'],
        'serial' =>$this->input->post('serial-0'),
      );
      $this->element->add_data($dataAdmin, 'inventario_adm');

      $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

     if( count($unidadxdata) == 0){

           $this->unidadxdata_add();
           $this->buy_edit();
       }
       else{
           $this->unidadxdata_update();
            $this->buy_edit();
       }


      $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
      redirect(base_url().'add-element-buy');
  }





//metodo nuevo 28/11/2018 para guardar laptop nueva pero en bodeha con su info 


 public function laptop_new(){

    
       $pcservidor = $this->__idElemento('LAP');
    
     $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'),
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'),
       'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>$this->input->post('estatus-0'),
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' =>$this->input->post('origen-0'),
       'destino' =>$this->input->post('destino-0'),
       'compra_id' =>$this->input->post('idcompra'),
       'pc_servidor_id' => $pcservidor,
     );
       $this->element->add_periferico_nuevo($data);
       $this->catch_info_pc($pcservidor);
      

     $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

   if( count($unidadxdata) == 0){
         $this->unidadxdata_add();
         $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }
    $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
   }


//metodo nuevo 28/11/2018 para guardar laptop nueva pero en bodeha con su info :'v'





















 public function periferico_nuevo_add(){
     $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'),
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'),
       'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>$this->input->post('estatus-0'),
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' =>$this->input->post('origen-0'),
       'destino' =>$this->input->post('destino-0'),
       'compra_id' =>$this->input->post('idcompra'),
     );
     $this->element->add_periferico_nuevo($data);

     $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

   if( count($unidadxdata) == 0){

         $this->unidadxdata_add();
         $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }
     $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
   }


   public function periferico_asignado_add(){
     $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'),
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'),
       'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>$this->input->post('estatus-0'),
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '1',
       'destino' =>$this->input->post('destino-0'),
       'compra_id' =>$this->input->post('idcompra'),
        'pc_servidor_id' =>$this->input->post('selectQ'),
     );

     $this->element->add_periferico_nuevo($data);

     $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

   if( count($unidadxdata) == 0){

         $this->unidadxdata_add();
         $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }

     $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
   }



public function disco_asignado_add(){
     $data = array(
       'serial' =>$this->input->post('serial-0'),
       'nombre' =>$this->input->post('nombre-0'),
       'marca' =>$this->input->post('marca-0'),
       'capacidad' =>$this->input->post('capacidad-0'),
        'tipo' =>$this->input->post('tipo-0'),
       'velocidad' =>$this->input->post('velocidad-0'),
       'estatus' =>$this->input->post('estatus-0'),
       'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
       'origen' => '1',
       'destino' =>$this->input->post('destino-0'),
       'compra_id' =>$this->input->post('idcompra'),
     );

     $this->element->add_periferico_nuevo($data);

     $unidadxdata = $this->element->unidadxdata($this->input->post('idcompra'), $this->input->post('destino-0'));

   if( count($unidadxdata) == 0){

         $this->unidadxdata_add();
         $this->buy_edit();
     }
     else{
         $this->unidadxdata_update();
          $this->buy_edit();
     }


        $admin = array(
          'identificador' => $this->input->post('codex3'),
          'encargado_puesto' =>$this->input->post('encargado'),
          'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
           'origen' => $this->input->post('OrigenPC_Falso-1'),
           'destino' => $this->input->post('destino-0'),
           'lugar_name' =>$this->input->post('destinoPC-1'),
           'serial' =>$this->input->post('serial-0'),
        );
        $this->element->admin_pc($admin);



     $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
     redirect(base_url().'add-element-buy');
   }







   public function generate_admin_pc(){

    $data = array(
     'identificador' => $this->input->post('codex3'),
     'encargado_puesto' =>$this->input->post('encargado'),
     'des_sistema_id' => $this->input->post('codex3'),
     'placa_base_id' => $this->input->post('codex3'),
     'adaptador_red_id'=> $this->input->post('codex3'),
     'adaptador_video_id' => $this->input->post('codex3'),
     'almacenamiento_id' => $this->input->post('codex3'),
     'fecha_ingreso' =>$this->input->post('ingreso-1'),
     'origen' => $this->input->post('OrigenPC_Falso-1'),
     'destino' => $this->input->post('destino-0'),
     'compra_id'=> $this->input->post('idcompra'),
      'lugar_name' =>$this->input->post('destinoPC-1')
    );
    $this->element->admin_pc($data);
      
   }

  public function catch_info_pc($codigo){
    $descripcion = array(
      'pc_ids' => $codigo,
      'nombre' => $this->input->post('0-e'),
      'fabricante' => $this->input->post('3-e'),
        'sistema_operativo' => $this->input->post('4-e'),
        'nucleo' => $this->input->post('5-e'),
        'usuario_registrado' => $this->input->post('1-e'),
        'memoria_fisica' => $this->input->post('6-e'),
        'dominio' => $this->input->post('2-e'),
        'serie_des' => $this->input->post('7-e'),
    );

    $red = array(
      'pc_id' => $codigo,
      'direccion_ip' => $this->input->post('5-c'),
      'tarjeta_extra' => $this->input->post('6-c'),
    );

    $video = array(
       'pc_id' => $codigo,
       'monitor_marca' =>$this->input->post('7-c') ,
      'modelo' => $this->input->post('8-c'),
      'serie' => $this->input->post('9-c'),
    );

    $almacenamiento = array(
       'pc_id' => $codigo,
       'disco_fisico1' => $this->input->post('10-c'),
       'capacidad' => $this->input->post('11-c'),
        'marca_disco' => $this->input->post('12-c'),
        'dvd1' => $this->input->post('13-c'),
    );

       $placaBase= array(
        'pc_id' => $codigo,
       'procesador' => $this->input->post('0-c'),
       'velocidad_reloj' => $this->input->post('1-c'),
       'fabricante_procesador ' => $this->input->post('2-c'),
        'modelo_placa' => $this->input->post('3-c'),
        'marca_ram' => $this->input->post('4-c'),
    );


        $this->element->add_data($descripcion, 'descripcion_sistema');
       $this->element->add_data($red, 'adaptador_red');
        $this->element->add_data($video,'adaptador_video');
        $this->element->add_data($almacenamiento,'almacenamiento');
       $this->element->add_data($placaBase,'placa_base');
    

  }



  #VALIDAR SERIAL
  public function codigosAdmin(){
    $id = filter_input(INPUT_POST, 'dato');
    $data = $this->element->getCodigos($id);
    echo json_encode($data);
  }

  public function unidad_seleccionada(){
     $id = filter_input(INPUT_POST, 'dato');
     $data = $this->element->u($id);
     echo json_encode($data);
  }

	public function pc_unidad()
	{
		$id = filter_input(INPUT_POST, 'dato');
		$data = $this->element->pc_unidad($id);
		echo json_encode($data);
	}


  public function codigos_lab(){
    $id = filter_input(INPUT_POST, 'dato');
    $data = $this->element->getCodigoslab($id);
    echo json_encode($data);
  }

   public function serial__todo(){
    $data = $this->element->getSerial_todo();
    echo json_encode($data);
  }


  #VALIDAR SERIAL
  public function serial__(){
    $id = filter_input(INPUT_POST, 'dato');
    $data = $this->element->getSerial($id);
    echo json_encode($data);
  }

}
