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
    $this->load->model('BUY_elements_Model','element');
		require 'application/plus/noty.php';

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

	public function index(){
		//vamos a obtener los datos del modelo
		$data['detalle'] = $this->bod->DetalleBodega();
		$this->load->view('Dashboard/bodega/bodega_view',$data);
	}//fin de index


	//esta función se encargara de obtener los datos de bodega según el serial del articulo almacenado
	public function detalle($serial){
		//vamos a obtener el detalle de los articulos por medio de su serial
		$resultado = $this->bod->getDetalle2($serial);

		//comprabamos si se devuelve datos o false
		if($resultado){
			foreach ($resultado as $u) {
				$origen = $this->bod->getUnidades2($u->origen);
				$u->origen = $origen;
				$destino = $this->bod->getUnidades2($u->destino);
				$u->destino = $destino;
			}
			$data['detalle'] = $resultado;//print_r($data);
			$this->detalle_articulo($data);
		}else{
			$this->msg_error();
		}
	}//fin de detalle



	//función para cargar la vista que mostrara los detalles de un articulo en bodega
	public function detalle_articulo($data){
		$this->load->view('Dashboard/bodega/detalle_bodega',$data);
	}// fin de detalle_articulo

	//funcion que nos mostrara un mensaje en caso de error
	public function msg_error(){
		$this->load->view('Dashboard/bodega/msg_error');
	}

	//función para mostrar la tabla que tiene los elementos en bodega que no han sido asignados
/*	public function mostrar_disponible(){
		//función en el modelo para obtener los elementos que no son asignados
		//que su destino es bodega de informatica ( 1 )
		$dato['detalle']  = $this->bod->disponible();

		$this->load->view('Dashboard/bodega/disponible',$dato);
	}
*/
//NUEVO AGREGADO A ULTIMA HORA*********************************************************************
	//función para mostrar la tabla que tiene solo las pc en bodega disponibles que no han sido asignadas
    public function pc_disponible(){
        $dato['detalle'] = $this->bod->disponiblePC();
        $dato['titulo'] = 'Maquinas disponibles en Bodega';

       $this->load->view('Dashboard/bodega/disponible_PC',$dato);
    }


    public function cpu_disponibles(){
        $dato['detalle'] = $this->bod->disponiblePC();
        $dato['titulo'] = 'CPU disponibles en Bodega';

       $this->load->view('Dashboard/bodega/disponible_cpu',$dato);
    }





    //función para mostrar las laptops disponibles
    public function laptop_disponible(){
        $dato['detalle'] = $this->bod->disponibleLaptop();
        $dato['titulo'] = "Laptop's disponibles en Bodega";

       $this->load->view('Dashboard/bodega/disponible_laptop',$dato);
    }//fin de laptop_disponible

    #función que nos trae todos los discos duros extraibles disponibles en bodega que no estan asignados
    public function dde_disponible(){
    	$dato['detalle'] = $this->bod->disponibleDDE();
        $dato['titulo'] = "DDE's disponibles en Bodega";
        $this->load->view('Dashboard/bodega/disponible_dde',$dato);
    }




      public function otros_disponible(){
      $dato['detalle'] = $this->bod->disponibleotros();
        $dato['titulo'] = "DDE's disponibles en Bodega";
      //  $this->load->view('Dashboard/bodega/disponible_otros',$dato);
    }



		//función para mostrar la tabla que tiene los elementos en bodega que no han sido asignados
	public function mostrar_disponible(){
			//función en el modelo para obtener los elementos que no son asignados
			//que su destino es bodega de informatica ( 1 )
			$dato['detalle']  = $this->bod->disponible();
			$dato['titulo'] = 'Elementos disponibles en Bodega';

			$this->load->view('Dashboard/bodega/disponible',$dato);
	}//fin de mostrar disponible
	//NUEVO AGREGADO A ULTIMA HORA*********************************************************************




function showCodePC(){
    $dato = filter_input(INPUT_POST, 'dato');
   // $dato = $this->input->post('dato');
    $result = $this->bod->get_code($dato);
    echo json_encode($result);
 }


	//función que nos permite obtener las unidades del area administrativa
	public function getUnidadesAdm(){
		$data=$this->bod->getUnidades();
		echo json_encode($data);
	}#fin de getUnidadesAdm

	public function getEquipo(){
		$area = $this->input->post("area");

			$a='hola';
			echo json_encode($a);

		//$elemento = $this->input->get('elemento');var_dump($elemento);
	}

	//esto se encargara de insertar los perifericos a su tabla correspondiente
	public function insertarElementos(){
		$aux = //tendra los datos a insertar
		$type = $this->input->post('tipo-'.($i+1));
         if($type == "IMPRESORES MATRICIALES" || $type == "IMPRESORES MULTIFUNCIONALES" || $type == "IMPRESOR DESJEKT" || $type == "IMPRESOR DESJEKT" || $type == "WEBCAN" || $type == "WEBCAN" || $type == "PARLANTES" || $type == "LECTOR PARA MEMORIA SD"){
					 $this->shopping->add_periferico_Out($aux);
         }else{
            $this->shopping->add_periferico_Adicional($aux);
         }
	}

	//FRANCISCO METODOS

	public function show_add_bodega(){
		$unidades = $this->get_unidades();
		$this->load->view('Dashboard/bodega/add_bodega_View', compact('unidades'));
	}
   //trae datos de unidades para ajax en asignar un periferico etc..
	public function get_unidades(){
		$unidades =$this->bod->get_u();
		return $unidades;
	}
   //trae codigos para ajax en asignar un periferico etc..	-
	public function get_codigos(){
		$id = filter_input(INPUT_POST,'dato');
		$codigos = $this->bod->get_c($id);
		echo json_encode($codigos);
	}




  public function get_codigos_todos(){
    $id = filter_input(INPUT_POST,'dato');
    $codigos = $this->bod->get_all($id);
    echo json_encode($codigos);
  }


public function get_codigosLAB(){
    $id = filter_input(INPUT_POST,'dato');
    $codigos = $this->bod->get_lab($id);
    echo json_encode($codigos);
  }






	public function add_periferito_to_Bodega(){
       $campos = array('serial', 'nombre', 'marca','capacidad','tipo','velocidad' ,'estatus','fecha_ingreso','origen','fecha_salida','destino');
       $data = array();
       for ($i=0; $i <count($campos) ; $i++) {
       	$data[$campos[$i]] = $this->input->post('bo-'.$i);
       }

      $var = $this->bod->add_bodega_periferico($data);
      if($var == true){
         $this->session->set_flashdata('true', 'Periferico agregado correctamente');
         redirect(base_url().'bodega_Controller/detalle/'.$this->input->post('bo-0') ,'refresh');
      }else{
      	$this->session->set_flashdata('false', 'el elemento no se ha podido agregar');
      }

	}


	//METODO PARA ASIGNAR UN ELEMENTO DE BODEGA


    //función para mostrar la vista para asignar un nuevo elemento en bodega
    #VALIDA PERIFERICOS PARA ASIGNAR ADEMAS LOS MUESTRA
	public function validar_elemento(){
		$identificador = $this->uri->segment(2);
		$data = $this->bod->getDetalle($identificador);
		$unidades = $this->bod->get_u();
		$this->load->view('Dashboard/bodega/asignar_bodega_periferico',compact('data','unidades'));
	}#fin de asignar_elemento

    #VALIDA PC PARA ASIGNAR ADEMAS LOS MUESTRA
	
	public function asignar_pc_View(){
         $idpc = $this->uri->segment(2);
         $elementos = $this->bod->get_perifericos_pc($idpc);
		      $unidades = $this->bod->get_u();
       
       //obtener info de pC 
          
          $info = array(
            'descripcionSistema' => $this->bod->descripcion_Sistema($elementos[0]['pc_servidor_id']),
            'placa_base' => $this->bod->placa($elementos[0]['pc_servidor_id']),
            'almacenamiento' => $this->bod->almacenamiento($elementos[0]['pc_servidor_id']),
          );




		$this->load->view('Dashboard/bodega/asignar_bodega_pc_View', compact('unidades','idpc','elementos', 'info'));
	}


	public function asignar_dde_View(){
        $idpc = $this->uri->segment(2);
        $data = $this->bod->get_dde($idpc);
	     	$unidades = $this->bod->get_u();
        $datos = $this->bod->obtener_laptop($idpc);
		    $this->load->view('Dashboard/bodega/asignar_bodega_dde_view', compact('data','unidades','idpc', 'datos'));
	}



  public function asignar_otro_View(){
        $idpc = $this->uri->segment(2);
        $data = $this->bod->get_dde($idpc);
        $unidades = $this->bod->get_u();
        $datos = $this->bod->obtener_laptop($idpc);
        $this->load->view('Dashboard/bodega/asignar_bodega_otros_view', compact('data','unidades','idpc', 'datos'));
  }

    public function asignar_otro_pc_View(){
        $idpc = $this->uri->segment(2);
        $data = $this->bod->get_dde($idpc);
        $unidades = $this->bod->get_u();
        $datos = $this->bod->obtener_laptop($idpc);
        $this->load->view('Dashboard/bodega/asignar_otros', compact('data','unidades','idpc', 'datos'));
  }


      public function asignar_laptop_View(){
         $idpc = $this->uri->segment(2);
		   $unidades = $this->bod->get_u();
       $datos = $this->bod->obtener_laptop($idpc);


          $info = array(
            'descripcionSistema' => $this->bod->descripcion_Sistema($datos[0]['pc_servidor_id']),
            'placa_base' => $this->bod->placa($datos[0]['pc_servidor_id']),
            'almacenamiento' => $this->bod->almacenamiento($datos[0]['pc_servidor_id']),
          );


		   $this->load->view('Dashboard/bodega/asignar_bodega_laptop_View', compact('unidades','idpc','datos','info'));
	   }


function unidadesajax(){
  $data = $this->bod->todo();
  echo json_encode($data);
}

	


	public function catch_asignacion_dde(){
    $comx = null;
    $lab_adm = null;
     if($this->input->post('comprac') != ""){
      $comx = $this->input->post('comprac');
     }
    

		 $serial = $this->input->post('serial');
		 $data = $this->bod->get_element_bodega($serial);
		 $unidad= $this->bod->get_u_letra($this->input->post('unidad'));
		 $compraid = $this->bod->get_bodega($this->input->post('serial'));


  

		 //actualizacion en bodega
        $dataUpdate = array(
            'estatus' => 'En uso',
            'origen' => 1,
            'fecha_salida'=> $this->input->post('fecha'),
            'destino' => $this->input->post('unidad'),
        );
       

        if($this->input->post('cd') == "0"){
                  $admin = array(
                  'identificador' => $this->input->post('codigopc'),
                  'encargado_puesto' => $this->input->post('enc'),
                  'fecha_ingreso' => $this->input->post('fecha'),
                  'origen' => 1,
                  'destino' => $unidad[0]['id_unidad'],
                  'compra_id' => $comx,
                  'lugar_name' => $unidad[0]['unidad'],
                  'serial' => $this->input->post('serial'),
                   );
        }else{

              $lab = $this->input->post('labo');
              if($lab == 'LAB1'){$datalab = 'lab-01';}
              if($lab == 'LAB2'){$datalab = 'lab-02';}
              if($lab == 'LAB3'){$datalab = 'lab-03';}
              if($lab == 'LAB4'){$datalab = 'lab-04';}
              if($lab == 'LAB5'){$datalab = 'lab-05';}
              if($lab == 'HW'){$datalab = 'lab-hw';}
              if($lab == 'RED'){$datalab = 'lab-red';}

                $admin = array(
                  'identificador_lab' => $this->input->post('codigopc'),
                  'fecha_ingreso' => $this->input->post('fecha'),
                  'origen' => 1,
                  'destino' => $unidad[0]['id_unidad'],
                  'serial' => $this->input->post('serial'),
                  'lab' => $datalab,
                  'compra_id' => $comx,
                   );

        }

       


         $mov = array(
            'token' => $this->_token(),
                    'fecha_cambio' => $this->input->post('fecha'),
                    'codigo_id' => $this->input->post('codigopc'),
                    //'unidad_pertenece_id' => 1,
                    //'unidad_traslado_id' => $dataPC[0]['destino'],
                    'cambio' => $this->input->post('cambio'),
                    'descripcion_cambio' => $this->input->post('desMov'),
                    'origen_nuevoEquipo_id' => 1,
                    'destino_nuevoEquipo_id' =>  $this->input->post('unidad'),
                    'descripcion_equipoNuevo' =>  $this->input->post('desequipo'),
                    'encargado' => $this->input->post('enc'),
                    'tecnico' => $this->input->post('tecnico'),
                    'tipoHardSoft'=> 'HARDWARE-EXTERNO',
                    'tipo_movimiento' => 'Asignacion-bodega',
                    'serial_nuevo' =>  $this->input->post('serial'),
           );

      
        //print_r($admin);
        #actualizamos el inventario de bodega
        $this->bod->update_('inventario_bodega', 'serial' ,$this->input->post('serial'), $dataUpdate);

        if($this->input->post('unidad')=="37"){
          $this->bod->add_('inventario_lab',$admin);
          $this->session->set_flashdata('sus' , 'Asignación realizada correctamente');
                 redirect(base_url());
        }else{
          $this->bod->add_('movimiento',$mov);
          $this->bod->add_('inventario_adm',$admin);
          $this->session->set_flashdata('sus' , 'Asignación realizada correctamente');
          redirect(base_url().'mantenimiento-administrativo');
        }         
	}





public function catch_asignacion_otro(){
    $comx = null;
     if($this->input->post('comprac') != ""){
      $comx = $this->input->post('comprac');
     }
   
  

     $serial = $this->input->post('serial');
     $data = $this->bod->get_element_bodega($serial);
     $unidad= $this->bod->get_u_letra($this->input->post('unidad'));
     $compraid = $this->bod->get_bodega($this->input->post('serial'));

     //actualizacion en bodega
        $dataUpdate = array(
            'estatus' => 'En uso',
            'origen' => 1,
            'fecha_salida'=> $this->input->post('fecha'),
            'destino' => $this->input->post('unidad'),
        );

        $admin = array(
        'identificador' => $this->input->post('codigopc'),
        'encargado_puesto' => $this->input->post('enc'),
        'fecha_ingreso' => $this->input->post('fecha'),
        'origen' => 1,
        'destino' => $this->input->post('unidad'),
        'compra_id' => $comx,
        'lugar_name' => $unidad[0]['unidad'],
        'serial' => $this->input->post('serial'),
         );


         $mov = array(
            'token' => $this->_token(),
                    'fecha_cambio' => $this->input->post('fecha'),
                    'codigo_id' => $this->input->post('codigopc'),
                    //'unidad_pertenece_id' => 1,
                    //'unidad_traslado_id' => $dataPC[0]['destino'],
                    'cambio' => $this->input->post('cambio'),
                    'descripcion_cambio' => $this->input->post('desMov'),
                    'origen_nuevoEquipo_id' => 1,
                    'destino_nuevoEquipo_id' =>  $this->input->post('unidad'),
                    'descripcion_equipoNuevo' =>  $this->input->post('desequipo'),
                    'encargado' => $this->input->post('encargado'),
                    'tecnico' => $this->input->post('tecnico'),
                    'tipoHardSoft'=> 'HARDWARE-EXTERNO',
                    'tipo_movimiento' => 'Asignacion-bodega',
                    'serial_nuevo' =>  $this->input->post('serial'),
           );

      
        //print_r($admin);
        #actualizamos el inventario de bodega
        $this->bod->update_('inventario_bodega', 'serial' ,$this->input->post('serial'), $dataUpdate);
        #agregamos al inventario administrativo
        $this->bod->add_('inventario_adm',$admin);
        $this->bod->add_('movimiento',$mov);

                if($this->input->post('unidad')=="37"){
                 $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
                 redirect(base_url().'detalle-lab/'.$pc);
                 }else{
                     $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
                 redirect(base_url().'mantenimiento-administrativo');
                 }
  }








#ASIGNACION PARA PERIFERICOS 
	function catch_asignacion(){

  


    $centinela = $this->input->post('fantasma');
    $codexGea = $this->input->post('fantasma2');
    $desty = $this->bod->get_u_letra($this->input->post('unidad'));

    if($this->input->post('compraid') ==""){
      $comprita = null;
    }else{
      $comprita = $this->input->post('compraid');
    }

    if($centinela == "concodigo"){
      $codigochidito = $this->input->post('cod1').$this->input->post('cod2').$this->input->post('cod3');
      if($codexGea == "admin"){
        $administrativo = array(
          'identificador' => $codigochidito,
          'encargado_puesto' => $this->input->post('enc'),
          'fecha_ingreso' =>  $this->input->post('fecha'),
          'origen' =>  1,
          'destino' => $this->input->post('unidad'),
          'compra_id' => $comprita,
          'lugar_name' => $desty[0]['unidad'],
          'serial' => $this->input->post('serial'),
    );
        $this->bod->add_('inventario_adm', $administrativo);
      }else{
        //lab
           $datalab = "";
          $lab = $this->input->post('cod3');
          if($lab == 'LAB1'){$datalab = 'lab-01';}
          if($lab == 'LAB2'){$datalab = 'lab-02';}
          if($lab == 'LAB3'){$datalab = 'lab-03';}
          if($lab == 'LAB4'){$datalab = 'lab-04';}
          if($lab == 'LAB5'){$datalab = 'lab-05';}
          if($lab == 'HW'){$datalab = 'lab-hw';}
          if($lab == 'RED'){$datalab = 'lab-red';}


          $administrativo = array(
          'identificador_lab' => $codigochidito,
          'fecha_ingreso' =>  $this->input->post('fecha'),
          'origen' =>  1,
          'destino' => $this->input->post('unidad'),
          'serial' => $this->input->post('serial'),
          'lab' => $datalab ,
          'compra_id' => $comprita,

    );
          $this->bod->add_('inventario_lab', $administrativo);
      }


    }


      $serial = $this->input->post('serial');
      $pc = $this->input->post('op');

      $data = $this->bod->get_element_bodega($serial);
      $dataPC = $this->bod->get_pc($pc);

      //actualizacion en bodega
      $dataUpdate = array(
            'estatus' => 'En uso',
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
		    
			     $mov = array(
			     	'token' => $this->_token(),
                    'fecha_cambio' => $this->input->post('fecha'),
                    'codigo_id' => $pc,
                    //'unidad_pertenece_id' => 1,
                    //'unidad_traslado_id' => $dataPC[0]['destino'],
                    'cambio' => $this->input->post('cambio'),
                    'descripcion_cambio' => $this->input->post('desMov'),
                    'origen_nuevoEquipo_id' => 1,
                    'destino_nuevoEquipo_id' =>  $dataPC[0]['destino'],
                    'descripcion_equipoNuevo' =>  $this->input->post('desequipo'),
                    'encargado' => $this->input->post('encargado'),
                    'tecnico' => $this->input->post('tecnico'),
                    'tipoHardSoft'=> 'HARDWARE-EXTERNO',
                    'tipo_movimiento' => 'Asignacion-bodega',
                    'serial_nuevo' => $serial,
			     );

			     $this->bod->movimiento_add($mov);


                 if($this->input->post('unidad')=="37"){
					       $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
		             redirect(base_url().'detalle-lab/'.$pc);
                 }else{
                     $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
		             redirect(base_url().'mantenimiento-administrativo');
                 }
		        

	       }
	       else
	       {
	       		$this->session->set_flashdata('error_update' , 'Asignación no se ha podido realizar');
	       		redirect(base_url() ,'refresh');
	       }




	}

	public function catch_asignacion_pc(){
        $data = $this->catch_pc_asignada($this->input->post('s-0'));
      
        //actualizar bodega
        for ($i=0; $i < count($data['actualizacion_bodega']) ; $i++) { 
        	$this->bod->update_('inventario_bodega', 'serial' ,$data['seriales'][$i], $data['actualizacion_bodega'][$i][0]);
        }


        $idpcanterior =  $this->input->post('pcanterior');
        $codigoActual = $this->input->post('codigopc');

        //Actualizamos las tablas relacionadas al pc
        $datos = array('pc_id' => $codigoActual,);
        $datos2 = array('pc_ids' => $codigoActual,);
        $table = array('adaptador_red','adaptador_video','almacenamiento','placa_base');
        for ($i=0; $i <count($table) ; $i++) { 
          $this->bod->update_pc('pc_id', $idpcanterior, $table[$i], $datos);
        }
          $this->bod->update_pc('pc_ids', $idpcanterior, 'descripcion_sistema', $datos2);
        //actualizamos las pc relacionadas al pc
        
      
        //admin
        if($this->input->post('centinela') == "admin"){
          $this->bod->add_('inventario_adm', $data['administrativo']);
        }if($this->input->post('centinela') == "lab"){
           $this->bod->add_('inventario_lab', $data['administrativo']);
        }

        $this->bod->add_('movimiento', $data['mov']);


                 if($this->input->post('unidad')=="37"){
                  $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
                 redirect(base_url().'detalle-lab/'.$this->input->post('codigopc'));
                 }else{
                     $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
                 redirect(base_url().'mantenimiento-administrativo');
                 }   
	}

      public function catch_asignacion_laptop(){
        $data = $this->catch_laptop_asignada();
        


        $idpcanterior =  $data['laptopInfo'][0]['pc_servidor_id'];
        $codigoActual = $this->input->post('codigopc');
         

        //Actualizamos las tablas relacionadas al pc
       $datos = array('pc_id' => $codigoActual,);
        $datos2 = array('pc_ids' => $codigoActual,);
        $table = array('adaptador_red','adaptador_video','almacenamiento','placa_base');
        for ($i=0; $i <count($table) ; $i++) { 
          $this->bod->update_pc('pc_id', $idpcanterior, $table[$i], $datos);
        }
          $this->bod->update_pc('pc_ids', $idpcanterior, 'descripcion_sistema', $datos2);
        //actualizamos las pc relacionadas al pc 


        //actualizacion de bodega
        $this->bod->update_('inventario_bodega', 'serial' ,$data['serial'], $data['bodega']);

       
        //admin
          $this->bod->add_('inventario_adm', $data['administrativo']);
          $this->bod->add_('movimiento', $data['mov']);
        
      
               
               $this->session->set_flashdata('buy' , 'Asignación realizada correctamente');
		            redirect(base_url().'mantenimiento-administrativo');
                 
                 
	 }


	public function catch_laptop_asignada(){

    $compraVal = null;
    if($this->input->post('buyx') != ''){
      $compraVal = $this->input->post('buyx');
    }



		$laptopInfo = $this->bod->get_bodega($this->input->post('serial'));
		//$compraid = $laptopInfo[0]['compra_id'];
		$destino = $this->bod->get_u_letra($this->input->post('unidad'));
		$des = array();
		$placa = array();
        $adaptador = array();
        $video = array();
        $almacenamiento = array();
        
        $c = 0; $cc = 0;$ccc=0;
        $names = array('nombre','fabricante','sistema_operativo','nucleo','usuario_registrado','memoria_fisica','serie_des', 'dominio');
	    $nameshard = array('procesador','velocidad_reloj','fabricante_procesador','modelo_placa','marca_ram');
        $namesadap = array('direccion_ip','tarjeta_extra');
        $namesVideo = array('monitor_marca','tipo','modelo');
        $namesDisco = array('disco_fisico1','capacidad','marca_disco','dvd1');

        $des['pc_ids'] = $this->input->post('codigopc'); 
		for ($l=0; $l <8 ; $l++) { 
		$des[$names[$l]] = $this->input->post('des-'.$l);
		}

        $placa['pc_id'] = $this->input->post('codigopc');
        $adaptador['pc_id'] = $this->input->post('codigopc'); 
        $video['pc_id'] = $this->input->post('codigopc');
        $almacenamiento['pc_id'] = $this->input->post('codigopc');
		for ($r=0; $r <14; $r++) {
			if($r >= 0 && $r <5){
            $placa[$nameshard[$r]] = $this->input->post('o-'.$r);
			}
			if($r >=5 && $r <7){
             $adaptador[$namesadap[$c]] = $this->input->post('o-'.$r);
             $c++;
			}
			if($r >=7 && $r <10){
             $video[$namesVideo[$cc]] = $this->input->post('o-'.$r);
             $cc++;
			}
			if($r >=10 && $r <14){
             $almacenamiento[$namesDisco[$ccc]] = $this->input->post('o-'.$r);
             $ccc++;
			}
		}
		$bodega = array(
         'estatus'=> 'En uso',
         'origen'=> 1,
         'fecha_salida' => $this->input->post('fecha'),
         'destino' =>$this->input->post('unidad') ,
         'pc_servidor_id' => $this->input->post('codigopc'),
         'pc_servidor_antiguo_id' => $laptopInfo[0]['pc_servidor_id'],
		);

		$administrativo = array(
          'identificador' => $this->input->post('codigopc'),
          'encargado_puesto' => $this->input->post('enc'),
          'des_sistema_id' => $this->input->post('codigopc'),
          'placa_base_id' => $this->input->post('codigopc'),
          'adaptador_red_id' => $this->input->post('codigopc'),
          'adaptador_video_id' => $this->input->post('codigopc'),
          'almacenamiento_id' => $this->input->post('codigopc'),
          'fecha_ingreso' =>  $this->input->post('fecha'),
          'origen' =>  1,
          'destino' => $this->input->post('unidad'),
          'compra_id' => $compraVal,
          'lugar_name' => $destino[0]['unidad'],
          'serial' => $this->input->post('serial'),
		);

		 $mov = array(
			     	'token' => $this->_token(),
                    'fecha_cambio' => $this->input->post('fecha'),
                    'codigo_id' => $this->input->post('codigopc'),
                    //'unidad_pertenece_id' => 1,
                    //'unidad_traslado_id' => $dataPC[0]['destino'],
                    'cambio' => $this->input->post('cambio'),
                    'descripcion_cambio' => $this->input->post('desMov'),
                    'origen_nuevoEquipo_id' => 1,
                    'destino_nuevoEquipo_id' =>  $this->input->post('unidad'),
                    'descripcion_equipoNuevo' =>  $this->input->post('desequipo'),
                    'encargado' => $this->input->post('encargado'),
                    'tecnico' => $this->input->post('tecnico'),
                    'tipoHardSoft'=> 'HARDWARE-EXTERNO',
                    'tipo_movimiento' => 'Asignacion-bodega',
                    'serial_nuevo' => $this->input->post('serial'),
		);
      
      $data = array(
      	  'serial'=> $this->input->post('serial'),
         'actualizacion_descripcion' => $des,
         'actualizacion_placa'=> $placa,
         'actualizacion_adaptador' => $adaptador,
         'actualizacion_video' => $video,
         'actualizacion_almacenamiento' => $almacenamiento,
         'administrativo' => $administrativo,
         'codigo' => $this->input->post('codigopc'),
         'bodega' =>$bodega,
         'mov' => $mov,
         'laptopInfo' => $laptopInfo,
       );
      return $data;

	}

	public function catch_pc_asignada($serial){

		$destino = $this->bod->get_u_letra($this->input->post('unidad'));
		$arraySeriales = array();
		$infoSerialesUP = array();
		$infoSerialesDEFI = array();
		$des = array();
		$placa = array();
        $adaptador = array();
        $video = array();
        $almacenamiento = array();
        $perifericos = array();
        $software = $this->software__();
        $c = 0; $cc = 0;$ccc=0;

		$names = array('nombre','fabricante','sistema_operativo','nucleo','usuario_registrado','memoria_fisica','serie');
	    $nameshard = array('procesador','velocidad_reloj','fabricante_procesador','modelo_placa','marca_ram');
        $namesadap = array('direccion_ip','tarjeta_extra');
        $namesVideo = array('monitor_marca','tipo','modelo');
        $namesDisco = array('disco_fisico1','capacidad','marca_disco','dvd1');

        for ($e=0; $e <$this->input->post('n_seriales') ; $e++) { 
        	$arraySeriales[$e] = $this->input->post('s-'.$e); 
			$infoSerialesUP[$e] = $this->bod->get_bodega($arraySeriales[$e]);
        }
        
		for ($i=0; $i <$this->input->post('n_seriales') ; $i++) { 
			
			$infoSerialesDEFI[$i][0]['origen'] = $infoSerialesUP[$i][0]['destino'];
			$infoSerialesDEFI[$i][0]['destino'] = $this->input->post('unidad');
			$infoSerialesDEFI[$i][0]['pc_servidor_antiguo_id'] = $infoSerialesUP[$i][0]['pc_servidor_id'];
			$infoSerialesDEFI[$i][0]['pc_servidor_id'] =  $this->input->post('codigopc');
			$infoSerialesDEFI[$i][0]['fecha_salida'] =  $this->input->post('fecha');

		  $periferico[$i]['serie'] = $infoSerialesUP[$i][0]['serial'];
		  $periferico[$i]['nombre'] = $infoSerialesUP[$i][0]['nombre'];
		  $periferico[$i]['marca'] = $infoSerialesUP[$i][0]['marca'];
		  $periferico[$i]['PC_id'] = $this->input->post('codigopc');

		}

		$des['pc_ids'] = $this->input->post('codigopc'); 
		for ($l=0; $l <6 ; $l++) { 
		$des[$names[$l]] = $this->input->post('des-'.$l);
		}

        $placa['pc_id'] = $this->input->post('codigopc');
        $adaptador['pc_id'] = $this->input->post('codigopc'); 
        $video['pc_id'] = $this->input->post('codigopc');
        $almacenamiento['pc_id'] = $this->input->post('codigopc');
		for ($r=0; $r <14; $r++) {
			if($r >= 0 && $r <5){
            $placa[$nameshard[$r]] = $this->input->post('o-'.$r);
			}
			if($r >=5 && $r <7){
             $adaptador[$namesadap[$c]] = $this->input->post('o-'.$r);
             $c++;
			}
			if($r >=7 && $r <10){
             $video[$namesVideo[$cc]] = $this->input->post('o-'.$r);
             $cc++;
			}
			if($r >=10 && $r <14){
             $almacenamiento[$namesDisco[$ccc]] = $this->input->post('o-'.$r);
             $ccc++;
			}
		}


    if($this->input->post('centinela') == 'lab'){
          $datalab = "";
          $lab = $this->input->post('cod1');
          if($lab == 'LAB1'){$datalab = 'lab-01';}
          if($lab == 'LAB2'){$datalab = 'lab-02';}
          if($lab == 'LAB3'){$datalab = 'lab-03';}
          if($lab == 'LAB4'){$datalab = 'lab-04';}
          if($lab == 'LAB5'){$datalab = 'lab-05';}
          if($lab == 'HW'){$datalab = 'lab-hw';}
          if($lab == 'RED'){$datalab = 'lab-red';}



          $administrativo = array(
          'identificador_lab' => $this->input->post('codigopc'),
          'descripcion_sistema_id' => $this->input->post('codigopc'),
          'placa_base_id' => $this->input->post('codigopc'),
          'adaptador_red_id' => $this->input->post('codigopc'),
          'adaptador_video_id' => $this->input->post('codigopc'),
          'almacenamiento_id' => $this->input->post('codigopc'),
          'fecha_ingreso' =>  $this->input->post('fecha'),
          'origen' =>  1,
          'destino' => $this->input->post('unidad'),
          'lab' => $datalab ,
          'compra_id' => $infoSerialesUP[0][0]['compra_id'],
    );
    }
    if($this->input->post('centinela') == 'admin'){
      $administrativo = array(
          'identificador' => $this->input->post('codigopc'),
          'encargado_puesto' => $this->input->post('enc'),
          'des_sistema_id' => $this->input->post('codigopc'),
          'placa_base_id' => $this->input->post('codigopc'),
          'adaptador_red_id' => $this->input->post('codigopc'),
          'adaptador_video_id' => $this->input->post('codigopc'),
          'almacenamiento_id' => $this->input->post('codigopc'),
          'fecha_ingreso' =>  $this->input->post('fecha'),
          'origen' =>  1,
          'destino' => $this->input->post('unidad'),
          'compra_id' => $infoSerialesUP[0][0]['compra_id'],
          'lugar_name' => $destino[0]['unidad'],
    );
    }

		


    $mov = array(
            'token' => $this->_token(),
                    'fecha_cambio' => $this->input->post('fecha'),
                    'codigo_id' => $this->input->post('codigopc'),
                    //'unidad_pertenece_id' => 1,
                    //'unidad_traslado_id' => $dataPC[0]['destino'],
                    'cambio' => $this->input->post('cambio'),
                    'descripcion_cambio' => $this->input->post('desMov'),
                    'origen_nuevoEquipo_id' => 1,
                    'destino_nuevoEquipo_id' =>  $this->input->post('unidad'),
                    'descripcion_equipoNuevo' =>  $this->input->post('desequipo'),
                    'encargado' => $this->input->post('encargado'),
                    'tecnico' => $this->input->post('tecnico'),
                    'tipoHardSoft'=> 'HARDWARE-EXTERNO',
                    'tipo_movimiento' => 'Asignacion-bodega',
                    'serial_nuevo' => $serial,
    );
      
      $data = array(
         'seriales'=>$arraySeriales,
         'actualizacion_bodega' => $infoSerialesDEFI,
         'actualizacion_descripcion' => $des,
         'actualizacion_placa'=> $placa,
         'actualizacion_adaptador' => $adaptador,
         'actualizacion_video' => $video,
         'actualizacion_almacenamiento' => $almacenamiento,
         'administrativo' => $administrativo,
         'codigo' => $this->input->post('codigopc'),
         'mov' => $mov,       
       );
      return $data;

	}

	public function software__(){
		  	$numeroSoftware = $this->input->post('softwareCONT');
		  	$elementos = array('-descripcion','-empresa','-nombre_carpeta','-version','-nombreArchivo',);
		  	$e = array('nombre','empresa','nom_carpeta', 'version','nom_archivo',
		  	);
		  	
		    $software = array();
		  	for ($i=0; $i <$numeroSoftware; $i++) {
		  		
		  		$software[$i]['pc_id'] = $this->input->post('codigopc');
		  		for ($t=0; $t <count($elementos) ; $t++) {

		  			$software[$i][$e[$t]] = $this->input->post($i.$elementos[$t]);
		  		}
		  	}
		  	return $software;
		  }

}//fin de la clase bodega_Controller

 ?>
