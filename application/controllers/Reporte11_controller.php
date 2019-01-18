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
		$mensaje = "No hay registros para el parametro enviado.";
		$this->load->view('Dashboard/Reporteria/success', compact('mensaje'));
	}

	public function header__Admin(){
		        $ArrayTitulo = array(' Codigo equipo ',' Encargado ',' Nombre equipo ',' Dominio/grupo trabajo ', ' Sistema operativo ',' Nucleos ',' Procesador ',' RAM ',' Modelo motherboard ',	' Monitor serial ',' Monitor marca ',' Monitor tipo' ,' Teclado serial ',' Teclado marca ',' Teclado tipo ',' Mouse serial ',' Mouse marca ',' Mouse tipo ',' Ups serial ',' Ups marca ',' Ups tipo ',' Impresor serial ',' Impresor marca ',' Impresor tipo ',' Webcam serial ',' Webcam marca ',' Webcam tipo ',
		       );
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1','W1', 'X1', 'Y1', 'Z1', 'AA1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W', 'X', 'Y', 'Z', 'AA');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;
	}



	public function header__Admin_todo(){
		        $ArrayTitulo = array(' Codigo equipo ',' unidad ',' Encargado ',' Nombre equipo ',' Dominio/grupo trabajo ', ' Sistema operativo ',' Nucleos ',' Procesador ',' RAM ',' Modelo motherboard ',	' Monitor serial ',' Monitor marca ',' Monitor tipo' ,' Teclado serial ',' Teclado marca ',' Teclado tipo ',' Mouse serial ',' Mouse marca ',' Mouse tipo ',' Ups serial ',' Ups marca ',' Ups tipo ',' Impresor serial ',' Impresor marca ',' Impresor tipo ',' Webcam serial ',' Webcam marca ',' Webcam tipo ',
		       );
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1','W1', 'X1', 'Y1', 'Z1', 'AA1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W', 'X', 'Y', 'Z', 'AA', 'AB');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;
	}


	public function header__lab(){
		        $ArrayTitulo = array(' Codigo equipo ',' Nombre equipo ',' Dominio/grupo trabajo ', ' Sistema operativo ',' Nucleos ',' RAM ',' Procesador ',' Modelo motherboard ',	' Monitor serial ',' Monitor marca ',' Monitor tipo' ,' Teclado serial ',' Teclado marca ',' Teclado tipo ',' Mouse serial ',' Mouse marca ',' Mouse tipo ',' Ups serial ',' Ups marca ',' Ups tipo ',' Impresor serial ',' Impresor marca ',' Impresor tipo ',' Webcam serial ',' Webcam marca ',' Webcam tipo ',
		       );
			   $ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1','W1', 'X1', 'Y1', 'Z1');
			   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W', 'X', 'Y', 'Z');

               $Excel = array($ArrayColumnas, $ArrayTitulo, $ArrayColumnasLetra);
			   return $Excel;
	}

	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte11()
	{  
       $unidad = $this->input->post('unidad');

       if($unidad == 37){
       	  $unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
       	  $name = 'Reporte-pc-'.$unidadFinal[0]['unidad']."-".$this->date();
          $this->reporte_laboratorio_All($unidad, $name);
       }elseif($unidad == 'lab-01' || $unidad == 'lab-02' || $unidad == 'lab-03' || $unidad == 'lab-04' || $unidad == 'lab-05' || $unidad == 'lab-red' || $unidad == 'lab-hw'){
         	$name = 'Reporte-pc-'.$unidad."-".$this->date();
           $this->reporte_laboratorio_All($unidad, $name);

       }
       elseif($unidad == "todo"){
       	//$this->reporte_admin($unidad);

       	$this->reporte_admin_TODO($unidad);
       }
       else{
         	$this->reporte_admin($unidad);
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

				      if(isset($data['teclado'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('L'.$cont, $data['teclado'][$i][0]['serial'])
                       ->setCellValue('M'.$cont, $data['teclado'][$i][0]['marca'])
                       ->setCellValue('N'.$cont, $data['teclado'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('L'.$cont, "")
				      	->setCellValue('M'.$cont, "")
				      	->setCellValue('N'.$cont, "");
				      }

				      if(isset($data['mouse'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('O'.$cont, $data['mouse'][$i][0]['serial'])
                       ->setCellValue('P'.$cont, $data['mouse'][$i][0]['marca'])
                       ->setCellValue('Q'.$cont, $data['mouse'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('O'.$cont, "")
				      	->setCellValue('P'.$cont, "")
				      	->setCellValue('Q'.$cont, "");
				      }

				      if(isset($data['ups'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('R'.$cont, $data['ups'][$i][0]['serial'])
                       ->setCellValue('S'.$cont, $data['ups'][$i][0]['marca'])
                       ->setCellValue('T'.$cont, $data['ups'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('R'.$cont, "")
				      	->setCellValue('S'.$cont, "")
				      	->setCellValue('T'.$cont, "");
				      }

				      if(isset($data['impresor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('U'.$cont, $data['impresor'][$i][0]['serial'])
                       ->setCellValue('V'.$cont, $data['impresor'][$i][0]['marca'])
                       ->setCellValue('W'.$cont, $data['impresor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('U'.$cont, "")
				      	->setCellValue('V'.$cont, "")
				      	->setCellValue('W'.$cont, "");
				      }

				       if(isset($data['webcam'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('X'.$cont, $data['webcam'][$i][0]['serial'])
                       ->setCellValue('Y'.$cont, $data['webcam'][$i][0]['marca'])
                       ->setCellValue('Z'.$cont, $data['webcam'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('X'.$cont, "")
				      	->setCellValue('Y'.$cont, "")
				      	->setCellValue('Z'.$cont, "");
				      }

				   }

		          Excel::borders__($spreadsheet, '686868', "A1:Z".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
		          Excel::save__($spreadsheet,$name);
		         //SAVE

		}else{
			redirect(base_url().'error-404-reporteria-11');
		}

    }



	public function reporte_admin($unidad){
		$data = $this->reporte_data($unidad);

		if($unidad != "todo"){
			$unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
		}
		
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

				      if(isset($data['teclado'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('M'.$cont, $data['teclado'][$i][0]['serial'])
                       ->setCellValue('N'.$cont, $data['teclado'][$i][0]['marca'])
                       ->setCellValue('O'.$cont, $data['teclado'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('M'.$cont, "")
				      	->setCellValue('N'.$cont, "")
				      	->setCellValue('O'.$cont, "");
				      }

				      if(isset($data['mouse'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('P'.$cont, $data['mouse'][$i][0]['serial'])
                       ->setCellValue('Q'.$cont, $data['mouse'][$i][0]['marca'])
                       ->setCellValue('R'.$cont, $data['mouse'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('P'.$cont, "")
				      	->setCellValue('Q'.$cont, "")
				      	->setCellValue('R'.$cont, "");
				      }

				      if(isset($data['ups'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('S'.$cont, $data['ups'][$i][0]['serial'])
                       ->setCellValue('T'.$cont, $data['ups'][$i][0]['marca'])
                       ->setCellValue('U'.$cont, $data['ups'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('S'.$cont, "")
				      	->setCellValue('T'.$cont, "")
				      	->setCellValue('U'.$cont, "");
				      }

				      if(isset($data['impresor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('V'.$cont, $data['impresor'][$i][0]['serial'])
                       ->setCellValue('W'.$cont, $data['impresor'][$i][0]['marca'])
                       ->setCellValue('X'.$cont, $data['impresor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('V'.$cont, "")
				      	->setCellValue('W'.$cont, "")
				      	->setCellValue('X'.$cont, "");
				      }

				       if(isset($data['webcam'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('Y'.$cont, $data['webcam'][$i][0]['serial'])
                       ->setCellValue('Z'.$cont, $data['webcam'][$i][0]['marca'])
                       ->setCellValue('AA'.$cont, $data['webcam'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('Y'.$cont, "")
				      	->setCellValue('Z'.$cont, "")
				      	->setCellValue('AA'.$cont, "");
				      }

				   }

		          Excel::borders__($spreadsheet, '686868', "A1:AA".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
				   if($unidad != "todo"){
				   	Excel::save__($spreadsheet,'Reporte-pc-'.$unidadFinal[0]['unidad']."-".$this->date());
				   }else{
				   	Excel::save__($spreadsheet,'Reporte-pc-todo-'.$this->date());
				   }
		          
		         //SAVE*/

		}else{
			redirect(base_url().'error-404-reporteria');
		}
	}




	public function reporte_admin_TODO($unidad){
		$data = $this->reporte_data($unidad);

		if($unidad != "todo"){
			$unidadFinal = $this->General->where_('unidad', $unidad, 'id_unidad');
		}
		
		$header = $this->header__Admin_todo();
		if(count($data) > 0){
			   //confinguraciones iniciales con clase Excel para reporte.
		          $spreadsheet = Excel::Create_Excel__(null, 10);
				  Excel::Header_format__(null , null,'A1:AB1' , $spreadsheet);
		          Excel::Values_Header__($spreadsheet, 0, $header[0], $header[1]);

                  $cont = 1;
				   for ($i=0; $i <count($data['inventario']) ; $i++) { 
				   	$cont++;
				    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$cont, $data['inventario'][$i]['identificador'])
                     ->setCellValue('B'.$cont, $data['inventario'][$i]['lugar_name'])
				     ->setCellValue('C'.$cont, $data['inventario'][$i]['encargado_puesto'])
				     ->setCellValue('D'.$cont, $data['descripcion_sistema'][$i][0]['nombre'])
				     ->setCellValue('E'.$cont, $data['descripcion_sistema'][$i][0]['dominio'])
				     ->setCellValue('F'.$cont, $data['descripcion_sistema'][$i][0]['sistema_operativo'])
				     ->setCellValue('G'.$cont, $data['descripcion_sistema'][$i][0]['nucleo'])				     
				     ->setCellValue('H'.$cont, $data['descripcion_sistema'][$i][0]['memoria_fisica'])
				     ->setCellValue('I'.$cont, $data['placa_base'][$i][0]['procesador'])
				     ->setCellValue('J'.$cont, $data['placa_base'][$i][0]['modelo_placa']);
                    

                      if(isset($data['monitor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.$cont, $data['monitor'][$i][0]['serial'])
                       ->setCellValue('L'.$cont, $data['monitor'][$i][0]['marca'])
                       ->setCellValue('M'.$cont, $data['monitor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('K'.$cont, "")
				      	->setCellValue('L'.$cont, "")
				      	->setCellValue('M'.$cont, "");
				      }

				      if(isset($data['teclado'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('N'.$cont, $data['teclado'][$i][0]['serial'])
                       ->setCellValue('O'.$cont, $data['teclado'][$i][0]['marca'])
                       ->setCellValue('P'.$cont, $data['teclado'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('N'.$cont, "")
				      	->setCellValue('O'.$cont, "")
				      	->setCellValue('P'.$cont, "");
				      }

				      if(isset($data['mouse'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('Q'.$cont, $data['mouse'][$i][0]['serial'])
                       ->setCellValue('R'.$cont, $data['mouse'][$i][0]['marca'])
                       ->setCellValue('S'.$cont, $data['mouse'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('Q'.$cont, "")
				      	->setCellValue('R'.$cont, "")
				      	->setCellValue('S'.$cont, "");
				      }

				      if(isset($data['ups'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('T'.$cont, $data['ups'][$i][0]['serial'])
                       ->setCellValue('U'.$cont, $data['ups'][$i][0]['marca'])
                       ->setCellValue('V'.$cont, $data['ups'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('T'.$cont, "")
				      	->setCellValue('U'.$cont, "")
				      	->setCellValue('V'.$cont, "");
				      }

				      if(isset($data['impresor'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('W'.$cont, $data['impresor'][$i][0]['serial'])
                       ->setCellValue('X'.$cont, $data['impresor'][$i][0]['marca'])
                       ->setCellValue('Y'.$cont, $data['impresor'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('W'.$cont, "")
				      	->setCellValue('X'.$cont, "")
				      	->setCellValue('Y'.$cont, "");
				      }

				       if(isset($data['webcam'][$i][0]['serial'])){	 
                       $spreadsheet->setActiveSheetIndex(0)->setCellValue('Z'.$cont, $data['webcam'][$i][0]['serial'])
                       ->setCellValue('AA'.$cont, $data['webcam'][$i][0]['marca'])
                       ->setCellValue('AB'.$cont, $data['webcam'][$i][0]['nombre']);
				      }
				      else{
				      	$spreadsheet->setActiveSheetIndex(0)->setCellValue('Z'.$cont, "")
				      	->setCellValue('AA'.$cont, "")
				      	->setCellValue('AB'.$cont, "");
				      }

				      	

				   }

		          Excel::borders__($spreadsheet, '686868', "A1:AB".$cont);

		          //AUTOTAMAÑO DE LAS COLUMNAS
				   Excel::ColumnDimension_AutoSize__(true, $header[2], $spreadsheet);
				  //AUTOTAMAÑO DE LAS COLUMNAS

				  //SAVE
				   if($unidad != "todo"){
				   	Excel::save__($spreadsheet,'Reporte-pc-'.$unidadFinal[0]['unidad']."-".$this->date());
				   }else{
				   	Excel::save__($spreadsheet,'Reporte-pc-todo-'.$this->date());
				   }
		          
		         //SAVE*/

		}else{
			redirect(base_url().'error-404-reporteria');
		}
	}



	










    public function reporte_data($unidad){

	      if($unidad != 'todo' && $unidad != 37 && $unidad != 'lab-01' && $unidad != 'lab-02' && $unidad != 'lab-03' && $unidad != 'lab-04' && $unidad != 'lab-05' && $unidad != 'lab-red'&& $unidad != 'lab-hw'){
	        $inventario = $this->General->like_where('inventario_adm' , $unidad  ,'destino', 'identificador', 'PC');
	        $campoCoparacion = "identificador";
	       

	      }elseif($unidad == 'lab-01' || $unidad == 'lab-02' || $unidad == 'lab-03' || $unidad == 'lab-04' || $unidad == 'lab-05' || $unidad == 'lab-red' || $unidad == 'lab-hw'){
	      	$inventario = $this->General->where_('inventario_lab', $unidad ,'lab');
            $campoCoparacion = "identificador_lab";


          }elseif($unidad == 'todo'){

              $inventario = $this->General->like__('identificador', 'PC', 'inventario_adm');
               $campoCoparacion = "identificador";
           

          }
	      else{
	    //    $inventario = $this->General->select_('inventario_lab');
          $inventario = $this->General->where_no('inventario_lab', null ,'descripcion_sistema_id');
	      	
	        $campoCoparacion = "identificador_lab";

	      }


	      if(count($inventario) > 0)
	      {
	     	  //adaptadores, sistema y más
		      for ($i=0; $i <count($inventario) ; $i++) {
		      	$componentes['almacenamiento'][$i] = $this->General->where_('almacenamiento', $inventario[$i][$campoCoparacion] ,'pc_id');
		      	$componentes['descripcion_sistema'][$i] = $this->General->where_('descripcion_sistema', $inventario[$i][$campoCoparacion] ,'pc_ids');
		      	$componentes['placa_base'][$i] = $this->General->where_('placa_base', $inventario[$i][$campoCoparacion] ,'pc_id');

		      	$componentes['teclado'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'TECLADO', 'tipo');

		      	$componentes['mouse'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'MOUSE', 'tipo');

		      	$componentes['monitor'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'MONITOR', 'tipo');

		      	$componentes['impresor'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'IMPRESORES-MULTIFUNCIONALES', 'tipo');

		      	$componentes['webcam'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'WEBCAM', 'tipo');

		      	$componentes['ups'][$i] =$this->General->where_x2('inventario_bodega', $inventario[$i][$campoCoparacion] ,'pc_servidor_id', 'UPS', 'tipo');
		      }

		      $componentes['inventario']= $inventario;
	     }
	     else
	     {
	     	$componentes = array();
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
