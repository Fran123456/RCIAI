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
		
	}
	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte5()
	{
		$laptops = $this->General->like__('identificador', 'LAP', 'inventario_adm');
		for ($i=0; $i <count($laptops) ; $i++) { 
			$areas[$i] = $this->General->where_('unidad', $laptops[$i]['destino'] ,'id_unidad');
			$bodega[$i] = $this->General->where_('inventario_bodega', $laptops[$i]['serial'], 'serial');
			$placa[$i] = $this->General->where_('placa_base', $laptops[$i]['identificador'], 'pc_id');
			$sistema[$i] = $this->General->where_('descripcion_sistema', $laptops[$i]['identificador'], 'pc_ids');
			$disco[$i] = $this->General->where_('almacenamiento', $laptops[$i]['identificador'], 'pc_id');
			$video[$i] = $this->General->where_('adaptador_video', $laptops[$i]['identificador'], 'pc_id');
		}
     
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
		     $spreadsheet->getDefaultStyle()
		    ->getFont()
		    ->setName('Arial')
		    ->setSize(10);
          $spreadsheet->setActiveSheetIndex(0)
		    ->setCellValue('A1', 'CODIGO  ')->setCellValue('B1', 'MARCA ')->setCellValue('C1', 'MODELO ')->setCellValue('D1', 'SERIAL ')
		    ->setCellValue('E1', 'UNIDAD  ')->setCellValue('F1', 'DISCO DURO  ')->setCellValue('G1', 'RAM  ')->setCellValue('H1', 'PROCESADOR  ')->setCellValue('I1', 'SISTEMA OPERATIVO  ');
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
		    $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setAutoSize(true);
            $spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('G')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('H')
            ->setAutoSize(true);
             $spreadsheet->getActiveSheet()
            ->getColumnDimension('I')
            ->setAutoSize(true);
		
        $writer = new Xlsx($spreadsheet);
        $filename = 'REPORTE-DE-LAPTOPS';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file 
      
        
	/*	$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'name-of-the-generated-file';
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file */
	}
}
?>