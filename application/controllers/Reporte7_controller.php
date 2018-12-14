<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte7_controller extends CI_Controller {

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
		$mensaje = "No hay registros para el parametro enviado.";
		$this->load->view('Dashboard/Reporteria/success', compact('mensaje'));
	}

	public function header__Admin(){
		        $ArrayTitulo = array(' Codigo PC ', '  Nombre encargado  ', '  Nombre equipo  ','  Marca  ' , ' Tipo ', ' Serie ', '  Codigo UPS ');
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;
	}


	public function header__lab(){
		        $ArrayTitulo = array(' Codigo PC ', '  Nombre equipo  ','  Marca  ' , ' Tipo ', ' Serie ', '  Codigo UPS ');
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte7()
	{  
       $unidad = $this->input->post('unidad4');

       if($unidad == 37){
       	  $unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
       	  $name = 'Reporte-ups-'.$unidadFinal[0]['unidad']."-".$this->date();
          $this->reporte_laboratorio_All($unidad, $name);

       }elseif($unidad == 'lab-01' || $unidad == 'lab-02' || $unidad == 'lab-03' || $unidad == 'lab-04' || $unidad == 'lab-05' || $unidad == 'lab-red' || $unidad == 'lab-hw'){
         	$name = 'Reporte-ups-'.$unidad."-".$this->date();
           $this->reporte_laboratorio_All($unidad, $name);

       }
       else{
         //	$this->reporte_admin($unidad);
       }

	}

    public function reporte_laboratorio_All($unidad, $name){

        $data = $this->reporte_data($unidad);
		$header = $this->header__lab();
		if(count($data) > 0){
			
			   //confinguraciones iniciales con clase Excel para reporte.
		          $spreadsheet = Excel::Create_Excel__(null, 10);
				  Excel::Header_format__(null , null,'A1:Z1' , $spreadsheet);
		          Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);

                  $cont = 1;
				   for ($i=0; $i <count($data['inventario']) ; $i++) { 
				   	$cont++;
				    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$cont, $data['inventario'][$i]['identificador_lab'])
				     ->setCellValue('B'.$cont, $data['descripcion_sistema'][$i][0]['nombre'])
				     ->setCellValue('C'.$cont, $data['descripcion_sistema'][$i][0]['dominio'])
				     ->setCellValue('D'.$cont, $data['descripcion_sistema'][$i][0]['sistema_operativo'])
				     ->setCellValue('E'.$cont, $data['descripcion_sistema'][$i][0]['nucleo'])				     
				     ->setCellValue('F'.$cont, $data['descripcion_sistema'][$i][0]['memoria_fisica'])
				     ->setCellValue('G'.$cont, $data['placa_base'][$i][0]['procesador'])
				     ->setCellValue('H'.$cont, $data['placa_base'][$i][0]['modelo_placa']);
                    

                      if(isset($data['monitor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$cont, $data['monitor'][$i][0]['serial'])
                       ->setCellValue('J'.$cont, $data['monitor'][$i][0]['marca'])
                       ->setCellValue('K'.$cont, $data['monitor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('I'.$cont, "")
				      	->setCellValue('J'.$cont, "")
				      	->setCellValue('K'.$cont, "");
				      }


				   }

		          Excel::borders__($spreadsheet, '686868', "A1:Z".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		          Excel::save__($spreadsheet,$name);
		         //SAVE*/

		}else{
			redirect(base_url().'error-404-reporteria-11');
		}

    }



	public function reporte_admin($unidad){
		$data = $this->reporte_data($unidad);
		$unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
		$header = $this->header__Admin();
		if(count($data) > 0){
			   //confinguraciones iniciales con clase Excel para reporte.
		          $spreadsheet = Excel::Create_Excel__(null, 10);
				  Excel::Header_format__(null , null,'A1:AA1' , $spreadsheet);
		          Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);

                  $cont = 1;
				   for ($i=0; $i <count($data['inventario']) ; $i++) { 
				   	$cont++;
				    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$cont, $data['inventario'][$i]['identificador'])
				     ->setCellValue('B'.$cont, $data['inventario'][$i]['encargado_puesto'])
				     ->setCellValue('C'.$cont, $data['descripcion_sistema'][$i][0]['nombre'])
				     ->setCellValue('D'.$cont, $data['descripcion_sistema'][$i][0]['dominio'])
				     ->setCellValue('E'.$cont, $data['descripcion_sistema'][$i][0]['sistema_operativo'])
				     ->setCellValue('F'.$cont, $data['descripcion_sistema'][$i][0]['nucleo'])				     
				     ->setCellValue('H'.$cont, $data['descripcion_sistema'][$i][0]['memoria_fisica'])
				     ->setCellValue('G'.$cont, $data['placa_base'][$i][0]['procesador'])
				     ->setCellValue('I'.$cont, $data['placa_base'][$i][0]['modelo_placa']);
                    

                      if(isset($data['monitor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('J'.$cont, $data['monitor'][$i][0]['serial'])
                       ->setCellValue('K'.$cont, $data['monitor'][$i][0]['marca'])
                       ->setCellValue('L'.$cont, $data['monitor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('J'.$cont, "")
				      	->setCellValue('K'.$cont, "")
				      	->setCellValue('L'.$cont, "");
				      }


				   }

		          Excel::borders__($spreadsheet, '686868', "A1:AA".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		          Excel::save__($spreadsheet,'Reporte-pc-'.$unidadFinal[0]['unidad']."-".$this->date());
		         //SAVE*/

		}else{
			redirect(base_url().'error-404-reporteria');
		}
	}




    public function reporte_data($unidad){

	      if($unidad != 37 && $unidad != '01' && $unidad != '02' && $unidad != '03' && $unidad != '04' && $unidad != '05' && $unidad != 'red'&& $unidad != 'hw'){
	        $inventario = $this->General->like_where('inventario_adm' , $unidad  ,'destino', 'identificador', 'UPS');
	        $campoCoparacion = "identificador";


		      if(count($inventario) > 0)
		      {
		     	  //adaptadores, sistema y más
			      for ($i=0; $i <count($inventario) ; $i++) {
			      	$componentes['dataups'][$i] = $this->General->where_('inventario_bodega', $inventario[$i]['serial'] ,'serial');
			      	$componentes['pc'][$i] = $this->General->where_('inventario_adm', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'identificador');
			      	$componentes['descripcion'][$i] = $this->General->where_('descripcion_sistema', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'pc_ids');
			      }
			       $componentes['inventario']= $inventario;
		     }
		     else
		     {
		     	$componentes = array();
		     }



	      }elseif($unidad == '01' || $unidad == '02' || $unidad == '03' || $unidad == '04' || $unidad == '05' || $unidad == 'red' || $unidad == 'hw'){
	      	    $inventario = $this->General->like_where('inventario_lab' , $unidad  ,'lab', 'identificador_lab', 'UPS');
                $campoCoparacion = "identificador_lab";


              if(count($inventario) > 0)
		      {
		     	  //adaptadores, sistema y más
			      for ($i=0; $i <count($inventario) ; $i++) {
			      	$componentes['dataups'][$i] = $this->General->where_('inventario_bodega', $inventario[$i]['serial'] ,'serial');
			      	$componentes['pc'][$i] = $this->General->where_('inventario_lab', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'identificador_lab');
			      	$componentes['descripcion'][$i] = $this->General->where_('descripcion_sistema', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'pc_ids');
			      }
			       $componentes['inventario']= $inventario;
		     }
		     else
		     {
		     	$componentes = array();
		     }

          } 
	      else{
	        $inventario = $this->General->like__('identificador_lab', 'UPS', 'inventario_lab');
	        $campoCoparacion = "identificador_lab";

	        if(count($inventario) > 0)
		      {
		     	  //adaptadores, sistema y más
			      for ($i=0; $i <count($inventario) ; $i++) {
			      	$componentes['dataups'][$i] = $this->General->where_('inventario_bodega', $inventario[$i]['serial'] ,'serial');
			      	$componentes['pc'][$i] = $this->General->where_('inventario_lab', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'identificador_lab');
			      	$componentes['descripcion'][$i] = $this->General->where_('descripcion_sistema', $componentes['dataups'][$i][0]['pc_servidor_id'] ,'pc_ids');
			      }
			       $componentes['inventario']= $inventario;
		     }
		     else
		     {
		     	$componentes = array();
		     }
	      }


	      
	    
	      return $componentes;
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
