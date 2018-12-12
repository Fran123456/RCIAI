<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte11_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model', 'General');
		$this->load->model('Reporte11_Model','R11');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}


	public function error_message__(){
		$mensaje = "No hay registros.";
		$this->load->view('Dashboard/Reporteria/success', compact('mensaje'));
	}

	public function header__(){
		       $ArrayTitulo = array(
		       	'Codigo equipo',
		       	'Encargado',
		       	'Nombre equipo',
		       	'Dominio', 
		       	'Grupo de trabajo',
		       	'Sistema operativo',
		       	'Nucleos',
		       	'RAM',
		       	'Procesador',
		       	'Motherboard',
		       	'Modelo motherboard',
		       	'Monitor serial',
		       	'Monitor marca',
                'Monitor tipo',
                'Teclado serial',
		       	'Teclado marca',
                'Teclado tipo',
                'Mouse serial',
		       	'Mouse marca',
                'Mouse tipo',
                'Ups serial',
		       	'Ups marca',
                'Ups tipo',
                'Impresor serial',
		       	'Impresor marca',
                'Impresor tipo',
                'Webcam serial',
		       	'Webcam marca',
                'Webcam tipo',
		       );
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1','W1', 'X1', 'Y1', 'Z1', 'AA1', 'AB1','AC1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W', 'X', 'Y', 'Z', 'AA', 'AB','AC');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;

	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte11()
	{  

		$data = $this->reporte_data(2);
	//	$header = $this->header__();

		
 $spreadsheet = Excel::Create_Excel__(null, 10);
		if(count($data) > 0){

		       //confinguraciones iniciales con clase Excel para reporte.
		       //   $spreadsheet = Excel::Create_Excel__(null, 10);
				 // Excel::Header_format__(null , null,'A1:AC1' , $spreadsheet);
		        //  Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);
           
                   

/*
		         //impresion de datos.
		           $cont = 1;
				   for ($i=0; $i <count($data['movimientos']) ; $i++) { 
				   	$cont++;
				     $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$cont, $data['movimientos'][$i]['fecha_retiro'])
				     ->setCellValue('B'.$cont, $data['movimientos'][$i]['fecha_cambio'])
				     ->setCellValue('C'.$cont, $data['movimientos'][$i]['codigo_id']);

				     if(isset($data['unidad_pertenece_viejo'][$i][0]['unidad'])){	 
				     	$spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$cont, $data['unidad_pertenece_viejo'][$i][0]['unidad']);
				     }else{
				       $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$cont, "");
				     }

				     if(isset($data['unidad_traslado_viejo'][$i][0]['unidad'])){	 
				     	$spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$cont, $data['unidad_traslado_viejo'][$i][0]['unidad']);
				     }else{
				       $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$cont, "");
				     }

				     $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$cont, $data['movimientos'][$i]['cambio'])
				     ->setCellValue('G'.$cont, $data['movimientos'][$i]['descripcion_cambio']);


				     if(isset($data['unidad_origen_nuevo'][$i][0]['unidad'])){	 
				     	$spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$cont, $data['unidad_origen_nuevo'][$i][0]['unidad']);
				     }else{
				       $spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$cont, "");
				     }


				    $spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$cont, $data['movimientos'][$i]['descripcion_equipoRetirado'])
				     ->setCellValue('J'.$cont, $data['movimientos'][$i]['descripcion_equipoNuevo'])
				     ->setCellValue('K'.$cont, $data['movimientos'][$i]['encargado'])
				     ->setCellValue('L'.$cont, $data['movimientos'][$i]['tecnico']);

				   }
		           
				  Excel::borders__($spreadsheet, '686868', "A1:AC".$cont);*/

		          //AUTOTAMAÑO DE LAS COLUMNAS
			//	   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		         
		         //SAVE



		}else{
			redirect(base_url().'error-404-reporteria');
		}

		 Excel::save__($spreadsheet,'nombre');
	}


	public function reporte_data($unidad){

      if($unidad != 37){
        $inventario = $this->General->like_where('inventario_adm' , $unidad  ,'destino', 'identificador', 'PC');
        $campoCoparacion = "identificador";
      }else{
        $inventario = $this->General->select_('inventario_lab');
        $campoCoparacion = "identificador_lab";
      }

      if(count($inventario) > 0)
      {
     	  //adaptadores, sistema y más
	      for ($i=0; $i <count($inventario) ; $i++) {
	      	$componentes['almacenamiento'] = $this->General->where_('almacenamiento', $inventario[$i][$campoCoparacion] ,'pc_id');
	      	$componentes['descripcion_sistema'] = $this->General->where_('descripcion_sistema', $inventario[$i][$campoCoparacion] ,'pc_ids');
	      	$componentes['placa_base'] = $this->General->where_('placa_base', $inventario[$i][$campoCoparacion] ,'pc_id');

	      	$componentes['teclado'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'TECLADO', 'tipo');

	      	$componentes['mouse'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'MOUSE', 'tipo');

	      	$componentes['monitor'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'MONITOR', 'tipo');

	      	$componentes['impresor'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'IMPRESORES-MULTIFUNCIONALES', 'tipo');

	      	$componentes['webcam'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'WEBCAM', 'tipo');

	      	$componentes['ups'] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'UPS', 'tipo');
	      }

	      $componentes['inventario'] = $inventario;
     }
     else
     {
     	$componentes = array();
     }
    
      return $componentes;
	}
}

?>

