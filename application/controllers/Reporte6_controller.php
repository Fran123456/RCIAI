<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte6_controller extends CI_Controller {

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
	public function reporte6()
	{  
	 $ArrayTitulo = array('CODIGO','TIPO','ENCARGADO','PC');
	   $ArrayColumnas = array('A1','B1', 'C1', 'D1');
	   $ArrayColumnasLetra = array('A','B', 'C', 'D');

	   

      //peticiiones de datos al a db
		$impresores = $this->General->like__('identificador', 'IMPR', 'inventario_adm');
		for ($i=0; $i <count($impresores) ; $i++) { 
			$bodega[$i] = $this->General->where_('inventario_bodega', $impresores[$i]['serial'], 'serial');
		}

	
		

     //confinguraciones iniciales con clase Excel para reporte.
          $spreadsheet = Excel::Create_Excel__(null, null);
		  Excel::Header_format__(null , null,'A1:D1' , $spreadsheet);
          Excel::Values_Header__($spreadsheet, 0, $ArrayColumnas, $ArrayTitulo);

        //impresion de datos.
           $cont = 1;
		   for ($i=0; $i <count($impresores) ; $i++) { 
		   	$cont++;
		     $spreadsheet->setActiveSheetIndex(0)
		      ->setCellValue('A'.$cont, $impresores[$i]['identificador'])
		      ->setCellValue('B'.$cont, $bodega[$i][0]['tipo'])
		      ->setCellValue('C'.$cont, $impresores[$i]['encargado_puesto'])
		      ->setCellValue('D'.$cont, $bodega[$i][0]['pc_servidor_id']);
		   }
           
		   Excel::borders__($spreadsheet, '686868', "A1:D".$cont);

         //AUTOTAMAÑO DE LAS COLUMNAS
		  Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
		 //AUTOTAMAÑO DE LAS COLUMNAS

		//SAVE
        Excel::save__($spreadsheet,'Reporte-impresores');
        //SAVE*/

        
       
	}

}
?>
