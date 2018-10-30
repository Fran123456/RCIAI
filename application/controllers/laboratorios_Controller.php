<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laboratorios_Controller extends CI_Controller {

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
		$this->load->view('Dashboard/laboratorios/BUY_add_pc_lab_asignar');
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
        elseif('PC'){
          $parte4 = "PC--";
          $variable = $parte4. $parte1 . $parte2 . $parte3 ;
        }
        return $variable;
    }


public function pc_nuevo_add(){
    $cantidad = $this->input->post('cantidadTotal');

     $pcservidor =$this->input->post('lab');

     
    
    for ($i=0; $i <$cantidad ; $i++) {
     $tipoPeriferico = $this->input->post($i.'-ele'); 

     $auxData = $this->serial_chida($this->input->post('serial-'.$i.'-'.$tipoPeriferico));

       if(count($auxData) > 0){
           $data = array(
              'estatus' => 'En uso',
              'fecha_salida' => $this->input->post('ingreso-1'),
              'origen' => $auxData[0]['destino'],
              'destino' => '37',
              'pc_servidor_id' => $pcservidor,
               'pc_servidor_antiguo_id' =>$auxData[0]['pc_servidor_id'] ,        
            );

           $this->element->updatePeriferico($this->input->post('serial-'.$i.'-'.$tipoPeriferico) , $data);
       }else{
           $data = array(
          'serial' => $this->input->post('serial-'.$i.'-'.$tipoPeriferico),
          'nombre' => $this->input->post('nombre-'.$i.'-'.$tipoPeriferico) ,
          'marca' =>  $this->input->post('marca-'.$i.'-'.$tipoPeriferico),
          'capacidad' =>  $this->input->post('capacidad-'.$i.'-'.$tipoPeriferico),
          'tipo' =>  $this->input->post('tipo-'.$i.'-'.$tipoPeriferico),
          'velocidad' => $this->input->post('velocidad-'.$i.'-'.$tipoPeriferico),
          'estatus' => $this->input->post('estado-'.$i.'-'.$tipoPeriferico),
          'fecha_ingreso' => $this->input->post('ingreso-1'),
          'origen' =>$this->input->post('OrigenPC_Falso-1') ,
          'destino' => $this->input->post('destino-0'),
          'compra_id' => $this->input->post('idcompra'),
          'pc_servidor_id' => $pcservidor,
          );
          $this->element->add_periferico_nuevo($data);
       }
        

    } 

      $this->catch_info_pc();

    $this->session->set_flashdata('buy', 'Elemento agregado a la compra correctamente');
    redirect(base_url().'detalle-lab/'.$pcservidor);
  }




 public function catch_info_pc(){
       $descripcion = $this->catch_descripcion();
       $placa = $this->catch_placa();
       $red = $this->catch_red();
       $video = $this->catch_video();
       $disk = $this->catch_disk();
       $admin = $this->generate_admin_pc();

         $this->element->add_data($descripcion, 'descripcion_sistema');
         $this->element->add_data($red, 'adaptador_red');
         $this->element->add_data($video,'adaptador_video');
         $this->element->add_data($disk,'almacenamiento');
         $this->element->add_data($placa,'placa_base');

         $this->element->labo_pc($admin);
 }

public function generate_admin_pc(){
   $val = $this->input->post('codigoPC-1');
   $dat = "";
   if($val == 'LAB1'){
      $dat = 'lab-01';
   }

    if($val == 'LAB2'){
      $dat = 'lab-02';
   }

    if($val == 'LAB3'){
      $dat = 'lab-03';
    }


    if($val == 'LAB4'){
      $dat = 'lab-04';
    }

    if($val == 'LAB5'){
      $dat = 'lab-05';
    }
  
    if($val == 'HW'){
      $dat = 'lab-HW';
    }

   if($val == 'RED'){
      $dat = 'lab-RED';
    }


    $data = array(
     'identificador_lab' => $this->input->post('lab'),
     'descripcion_sistema_id' => $this->input->post('lab'),
     'placa_base_id' => $this->input->post('lab'),
     'adaptador_red_id'=> $this->input->post('lab'),
     'adaptador_video_id' => $this->input->post('lab'),
     'almacenamiento_id' => $this->input->post('lab'),
     'fecha_ingreso' =>$this->input->post('ingreso-1'),
     'origen' => $this->input->post('OrigenPC_Falso-1'),
     'destino' => $this->input->post('destino-0'),
     'lab' => $dat,
     'compra_id'=> $this->input->post('idcompra'),
      
    );
    return $data;
    //$this->element->admin_pc($data);
     
   }




   public function catch_descripcion(){
      $nameTableTocamp = array('nombre','fabricante','sistema_operativo','nucleo','paquete_servicio','version','usuario_registrado',' memoria_fisica','dominio','modelo','serie_des','organizacion','idioma','zona_horaria','usuario_sesion','version_DirectX','caja_sistema');
      $data = array();
      $data['pc_ids'] = $this->input->post('lab');
        for ($i=0; $i <17 ; $i++) {
              $data[$nameTableTocamp[$i]] = $this->input->post('des-'.$i);
        }
        return $data;

    }


     public function catch_placa(){
      $nameTablecamp = array('procesador','velocidad_reloj','fabricante_procesador','etiqueta_BIOS','fabricante_BIOS','version_BIOS','num_serie_BIOS','fecha_instalacion_BIOS','fabricante_placa','modelo_placa','version_placa','marca_ram','ranura_memoria','ranura_sistema_0','ranura_sistema_1','ranura_sistema_2','ranura_sistema_3','ranura_sistema_4');
      $data['pc_id'] = $this->input->post('lab');
      for ($i=0; $i <18; $i++) {
         $data[$nameTablecamp[$i]] = $this->input->post('placa-'.$i);
      }
     return $data;
    }



     public function catch_red(){
      $nameTablecamp = array('adaptador_1','tipo_adaptador','direccion_ip','subred_ip','gateway','servidor_primario','servidor_dns','servidor_dhcp','direccion_mac');

      $data['pc_id'] = $this->input->post('lab');
      for ($i=0; $i <9; $i++) {
         $data[$nameTablecamp[$i]] = $this->input->post('adaptadores-'.$i);
      }
      return $data;
    }




    public function catch_video(){
      $nameTablecamp = array('adaptador1','adaptador_ram','tipo_dac','monitor_pc1','resolucion_video','velocidad');

      $data['pc_id'] = $this->input->post('lab');
      for($i=0; $i <6; $i++) {
         $data[$nameTablecamp[$i]] = $this->input->post('video-'.$i);
      }
     return $data;
    }


    public function catch_disk(){
      $data = array(
         'pc_id' =>  $this->input->post('lab'),
         'disco_fisico1' =>$this->input->post('almacenamiento-0'),
         'capacidad' =>$this->input->post('almacenamiento-1'),
          'dvd1' =>$this->input->post('almacenamiento-6'),
         'disco_logico' =>$this->input->post('almacenamiento-2'),
         'sistema_archivos' =>$this->input->post('almacenamiento-3'),
         'tamaño' =>$this->input->post('almacenamiento-4'),
         'espacio_libre' =>$this->input->post('almacenamiento-5'),
         'letra_unidad' =>$this->input->post('almacenamiento-7'),

      );
      return $data;
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


    public function buy_edit(){
      $total = $this->input->post('rest')+1;
      $data = array(
        'rest' => $total,
      );
      $this->element->updateBUY($data, $this->input->post('idcompra'));
    }











































public function serial_chida($id){
    $data = $this->element->getSerial($id);
    return $data;
  }



  #VALIDAR SERIAL
  public function codigosAdmin(){
    $id = filter_input(INPUT_POST, 'dato');
    $data = $this->element->getCodigos($id);
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











