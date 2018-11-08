<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddAdmin_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Admin_elements_Model','element');
		require 'application/plus/noty.php';

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


	#valida la compra
    public function validate_buy()
    {
             #VALIDA CUANTOS ELEMENTOS HAY DISPOIBLES PARA PODER AGREGAR
              $unidad = $this->element->get_unidad_unique($this->input->post('uni'));
              $datos = array(
               'unidad'=> $unidad,
               'tipo'=> $this->input->post('tipo'),
               'todos' => $this->get_pc_unidad(),
             );
             $this->load->view('Dashboard/administrativo/buy/BUY_add_element_View', compact('datos'));
    }


   public function add_PC($compraA = null, $cantidad = null)
   {
    $compra = $compraA;
		$this->load->view('Dashboard/administrativo/buy/validate_View', compact('compra', 'cantidad'));
   }


	 public function generate_admin_pc(){
		 if($this->input->post('serial' != null)){
			 $serial = $this->input->post('serial');
		 }else{
			 $serial = null;
		 }

    $data = array(
     'identificador' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'encargado_puesto' =>$this->input->post('encargado'),
     'des_sistema_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'placa_base_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'adaptador_red_id'=> $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'adaptador_video_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'almacenamiento_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
     'fecha_ingreso' =>$this->input->post('ingreso-1'),
     'origen' => $this->input->post('OrigenPC_Falso-1'),
     'destino' => $this->input->post('destino-0'),
      'lugar_name' =>$this->input->post('destinoPC-1'),
			'serial' =>$serial,
    );
    $this->element->admin_pc($data);
   }





	 public function pc_nuevo_add(){
     $cantidad = $this->input->post('cantidadTotal');
     $pcservidor = $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3');

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
         'pc_servidor_id' => $pcservidor,
       );
      $this->element->add_periferico_nuevo($data);
     }
           $this->catch_info_pc();
           $this->generate_admin_pc();

     //$this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
      redirect(base_url());
   }



	 public function periferico_asignado_add(){
		 $data = array(
			 'serial' =>$this->input->post('serial-0'),
			 'nombre' =>$this->input->post('nombre-0'),
			 'marca' =>$this->input->post('marca-0'),
			 'capacidad' =>$this->input->post('capacidad-0'),
				'tipo' =>$this->input->post('tipo-0'),
			 'velocidad' =>$this->input->post('velocidad-0'),
			 'estatus' =>'En uso',
			 'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
			 'origen' => $this->input->post('OrigenPC_Falso-1'),
			 'destino' =>$this->input->post('destino-0'),
				'pc_servidor_id' =>$this->input->post('selectQ'),
		 );

		 $this->element->add_periferico_nuevo($data);


		// $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
		 redirect(base_url());
	 }


	 public function laptop_nuevo_add(){
     $code = $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3');
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

	     //$this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
	      redirect(base_url());
	 }



	public function disco_asignado_add(){
	      $data = array(
	        'serial' =>$this->input->post('serial-0'),
	        'nombre' =>$this->input->post('nombre-0'),
	        'marca' =>$this->input->post('marca-0'),
	        'capacidad' =>$this->input->post('capacidad-0'),
	         'tipo' =>$this->input->post('tipo-0'),
	        'velocidad' =>$this->input->post('velocidad-0'),
	        'estatus' =>'En uso',
	        'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
	        'origen' => '4',
	        'destino' =>$this->input->post('destino-0'),
	      );

	      $this->element->add_periferico_nuevo($data);



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



	  //    $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
	      redirect(base_url());
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
         'pc_servidor_id ' => $this->input->post('unidadesU'),
      );
      $this->element->add_data($data, 'inventario_bodega');
    }


      $dataAdmin = array(
        'identificador' => $servidorPC,
        'encargado_puesto' =>$this->input->post('encargado'),
        'fecha_ingreso' =>$this->input->post('fecha_ingreso-0'),
        'origen' => '4',
        'destino' =>$this->input->post('destino-0'),
        'lugar_name' =>$lugarName[0]['unidad'],
        'serial' =>$this->input->post('serial-0'),
      );
      $this->element->add_data($dataAdmin, 'inventario_adm');



    //  $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
      redirect(base_url());
  }











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









  public function catch_info_pc(){
    $descripcion = array(
      'pc_ids' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
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
      'pc_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
      'direccion_ip' => $this->input->post('5-c'),
      'tarjeta_extra' => $this->input->post('6-c'),
    );

    $video = array(
       'pc_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
       'monitor_marca' =>$this->input->post('7-c') ,
      'modelo' => $this->input->post('8-c'),
      'serie' => $this->input->post('9-c'),
    );

    $almacenamiento = array(
       'pc_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
       'disco_fisico1' => $this->input->post('10-c'),
       'capacidad' => $this->input->post('11-c'),
        'marca_disco' => $this->input->post('12-c'),
        'dvd1' => $this->input->post('13-c'),
    );

       $placaBase= array(
        'pc_id' => $this->input->post('codigopc1').$this->input->post('codigopc2').$this->input->post('codigopc3'),
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
