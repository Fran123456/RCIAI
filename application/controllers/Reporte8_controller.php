<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte8_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model', 'General');
		$this->load->model('Reporte8_Model','R8');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}


	public function error_message__(){
		$mensaje = "No hay registro para el año o mes que ha proporcionado.";
		$this->load->view('Dashboard/Reporteria/success', compact('mensaje'));
	}

	public function header__(){
		       $ArrayTitulo = array(
		       	'Retiro del equipo',
		       	'cambio del equipo',
		       	'Código del Equipo',
		       	'Unidad que pertenece', 
		       	'Unidad que se traslada el equipo',
		       	'¿Qué cambio sufrio el equipo?',
		       	'Descripción porque se hizo el cambio',
		       	'De donde se saco el equipo para el cambio',
		       	'Características del equipo que se retira.',
		       	'Caracteristicas de equipo que queda en función con ese código de inventario',
		       	'Nombre del Encargado del Equipo',
		       	'Nombre de Técnico que reporta el cambio');
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;

	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte8_year()
	{  
		$year = $this->input->post('year');
		$data = $this->data_factory_year($year);
		$header = $this->header__();

		if(count($data) > 0){

		       //confinguraciones iniciales con clase Excel para reporte.
		          $spreadsheet = Excel::Create_Excel__(null, 10);
				  Excel::Header_format__(null , null,'A1:L1' , $spreadsheet);
		          Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);



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
		           
				  Excel::borders__($spreadsheet, '686868', "A1:L".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		          Excel::save__($spreadsheet,'Reporte-movimientos-año-'.$year);
		         //SAVE*/

		}else{
			redirect(base_url().'error-404-reporteria');
		}
	}



	public function reporte8_mes()
	{  //2018-12
		$year = $this->input->post('year').'-'.$this->input->post('dia');


		$data = $this->data_factory_mouth($year);
		$header = $this->header__();

		if(count($data) > 0){
 
		       //confinguraciones iniciales con clase Excel para reporte.
		          $spreadsheet = Excel::Create_Excel__(null, 10);
				  Excel::Header_format__(null , null,'A1:L1' , $spreadsheet);
		          Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);



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
		           
				  Excel::borders__($spreadsheet, '686868', "A1:L".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		          Excel::save__($spreadsheet,'Reporte-movimientos-por-mes-'.$year);
		         //SAVE

		}else{
			redirect(base_url().'error-404-reporteria');
		}
	}


	public function data_factory_year($year){
       $movimientoYears = $this->General->like__('fecha_cambio', $year, 'movimiento');

       if(count($movimientoYears) > 0){
       	for ($i=0; $i <count($movimientoYears) ; $i++) { 
       	 $unidadesPertenece[$i] = $this->General->where_('unidad', $movimientoYears[$i]['unidad_pertenece_id'], 'id_unidad');
       	 $unidadesTraslado[$i] = $this->General->where_('unidad', $movimientoYears[$i]['unidad_traslado_id'], 'id_unidad');
       	 $origenUnidadNuevo[$i] = $this->General->where_('unidad', $movimientoYears[$i]['origen_nuevoEquipo_id'], 'id_unidad');
       	 $destinoUnidadNuevo[$i] = $this->General->where_('unidad', $movimientoYears[$i]['destino_nuevoEquipo_id'], 'id_unidad');
       }

       $data = array(
        'movimientos' => $movimientoYears,
        'unidad_pertenece_viejo' => $unidadesPertenece,
        'unidad_traslado_viejo' => $unidadesTraslado,
        'unidad_origen_nuevo' => $origenUnidadNuevo,
        'unidad_destino_nuevo'=> $destinoUnidadNuevo,
       );
       }else{
       	$data = array();
       }
       
       return $data;
	}

	public function data_factory_mouth($mouth){
     // $mouth = '2018-12-07';
     // $mouth =substr($mouth, 0,7);


      $movimientoYears = $this->General->like__('fecha_cambio', $mouth, 'movimiento');

      if(count($movimientoYears) > 0){
      	for ($i=0; $i <count($movimientoYears) ; $i++) { 
       	 $unidadesPertenece[$i] = $this->General->where_('unidad', $movimientoYears[$i]['unidad_pertenece_id'], 'id_unidad');
       	 $unidadesTraslado[$i] = $this->General->where_('unidad', $movimientoYears[$i]['unidad_traslado_id'], 'id_unidad');
       	 $origenUnidadNuevo[$i] = $this->General->where_('unidad', $movimientoYears[$i]['origen_nuevoEquipo_id'], 'id_unidad');
       	 $destinoUnidadNuevo[$i] = $this->General->where_('unidad', $movimientoYears[$i]['destino_nuevoEquipo_id'], 'id_unidad');
       }

       $data = array(
        'movimientos' => $movimientoYears,
        'unidad_pertenece_viejo' => $unidadesPertenece,
        'unidad_traslado_viejo' => $unidadesTraslado,
        'unidad_origen_nuevo' => $origenUnidadNuevo,
        'unidad_destino_nuevo'=> $destinoUnidadNuevo,
       );
      }else{
       	$data = array();
       }
       
       return $data;
	}
}
?>
