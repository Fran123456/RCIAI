<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte5_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model', 'General');
		$this->load->model('Reporte4_Model','R4');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte5()
	{  $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1','H1','I1');
	   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E', 'F', 'G','H','I');

      //peticiiones de datos al a db
	   $unidad = $this->input->post('unidad2');
	   if($unidad == 'todo'){
          $laptops = $this->General->like__('identificador', 'LAP', 'inventario_adm');
          $name = 'Reporte-laptops-'.$this->date();
	   }else{
	   	 //$laptops = $this->General->like__('identificador', 'LAP', 'inventario_adm');
	   	$laptops = $this->General->like_where('inventario_adm' , $unidad  ,'destino', 'identificador', 'LAP');
	   	$unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
	   	$name = 'Reporte-laptops-'.$unidadFinal[0]['unidad'].'-'.$this->date();
	   }
		


		for ($i=0; $i <count($laptops) ; $i++) { 
			$areas[$i] = $this->General->where_('unidad', $laptops[$i]['destino'] ,'id_unidad');
			$bodega[$i] = $this->General->where_('inventario_bodega', $laptops[$i]['serial'], 'serial');
			$placa[$i] = $this->General->where_('placa_base', $laptops[$i]['identificador'], 'pc_id');
			$sistema[$i] = $this->General->where_('descripcion_sistema', $laptops[$i]['identificador'], 'pc_ids');
			$disco[$i] = $this->General->where_('almacenamiento', $laptops[$i]['identificador'], 'pc_id');
			$video[$i] = $this->General->where_('adaptador_video', $laptops[$i]['identificador'], 'pc_id');
		}

     //confinguraciones iniciales con clase Excel para reporte.
          $spreadsheet = Excel::Create_Excel__(null, null);
		  Excel::Header_format__(null , null,'A1:I1' , $spreadsheet);
          Excel::Values_Header__($spreadsheet, 0, $ArrayColumnas, $ArrayTitulo = array('  CODIGO  ','  MARCA ','  MODELO  ','  SERIAL  ','  UNIDAD  ','  DISCO DURO  ','  RAM  ','  PROCESADOR  ','  SISTEMA OPERATIVO  '));

        //impresion de datos.
           $cont = 1;
		   for ($i=0; $i <count($laptops) ; $i++) { 
		   	$cont++;
		     $spreadsheet->setActiveSheetIndex(0)
		      ->setCellValue('A'.$cont, $laptops[$i]['identificador'])
		      ->setCellValue('B'.$cont, $bodega[$i][0]['marca'])
		      ->setCellValue('C'.$cont, $video[$i][0]['modelo'])
		      ->setCellValue('D'.$cont, $bodega[$i][0]['serial'])
		      ->setCellValue('E'.$cont, $areas[$i][0]['unidad'])
		      ->setCellValue('F'.$cont, $disco[$i][0]['capacidad'])
		      ->setCellValue('G'.$cont, $sistema[$i][0]['memoria_fisica'])
		      ->setCellValue('H'.$cont, $placa[$i][0]['procesador'])
		      ->setCellValue('I'.$cont, $sistema[$i][0]['sistema_operativo']);
		   }
           
		   Excel::borders__($spreadsheet, '686868', "A1:I".$cont);

         //AUTOTAMAÑO DE LAS COLUMNAS
		  Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
		 //AUTOTAMAÑO DE LAS COLUMNAS

		//SAVE
        Excel::save__($spreadsheet,$name);
        //SAVE
	}


      public function date(){
      	$hoy = getdate();
      	$d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];
        $today = $d . "-". $m . "-". $y;
        return $today;
      }

}
?>
