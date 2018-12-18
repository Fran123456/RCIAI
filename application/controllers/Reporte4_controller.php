<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Reporte4_controller extends CI_Controller {

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
	public function index()
	{
        $unidades = $this->SUS->select_('unidad');
		$this->load->view('Dashboard/movimientos/formulario_', compact('unidades'));
	}


	//muestra la vista general de los movimientos que se pueden realizar
	public function reporte4()
	{  $year = $this->input->post('year');
	   $data =  $this->data_set($year);


       
       if(count($data) >0){
      
	   $name = "Reporte-compras-". $year;

		$ArrayColumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1','H1','I1');
	   $ArrayColumnasLetra = array('A','B', 'C', 'D', 'E', 'F', 'G','H','I');

      
		
     //confinguraciones iniciales con clase Excel para reporte.
          $spreadsheet = Excel::Create_Excel__(null, null);
		  Excel::Header_format__(null , null,'A1:I1' , $spreadsheet);
          Excel::Values_Header__($spreadsheet, 0, $ArrayColumnas, $ArrayTitulo = array('  TIPO PRODUCTO  ','  DETALLE ','  CANTIDAD  ','  PROVEEDOR  ','  FACTURA  ','  FECHA COMPRA  ','  GARANTIA ','  UNIDAD  ','  TOTAL COMPRA  '));

        //impresion de datos.
           

           $cont = 1;
		   for ($i=0; $i <count($data['compra']) ; $i++) { 
               
		  	$cont++;
		     $spreadsheet->setActiveSheetIndex(0)
		      ->setCellValue('A'.$cont, $data['compra'][$i]['tipo'])
		      ->setCellValue('B'.$cont, $data['compra'][$i]['detalle'])
		      ->setCellValue('C'.$cont, $data['compra'][$i]['cantidad'])
		      ->setCellValue('D'.$cont, $data['compra'][$i]['proveedor'])
		      ->setCellValue('E'.$cont, $data['compra'][$i]['n_factura'])
		      ->setCellValue('F'.$cont, $data['compra'][$i]['fecha_compra'])
		      ->setCellValue('G'.$cont, $data['compra'][$i]['garantia'])
		      ->setCellValue('H'.$cont, $data['unidades'][$i])
		      ->setCellValue('I'.$cont, $data['compra'][$i]['total']);
		   }
           
		   Excel::borders__($spreadsheet, '686868', "A1:I".$cont);

         //AUTOTAMAÑO DE LAS COLUMNAS
		  Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
		 //AUTOTAMAÑO DE LAS COLUMNAS

		//SAVE
       Excel::save__($spreadsheet,$name);
        //SAVE*/

    } else{
           $this->error_message__();
      }
	}


	public function error_message__(){
		$mensaje = "No hay registros para el parametro enviado.";
		$this->load->view('Dashboard/Reporteria/success', compact('mensaje'));
	}


	public function data_set($year){
		

		$data = $this->General->like__('fecha_compra', $year, 'compras');
		
		for ($i=0; $i <count($data) ; $i++) { 
			$info[$i] = $this->General->join_where($data[$i]['id_compra']);
		}

       
		for ($i=0; $i <count($info) ; $i++) { 
			$aux = "";
			for ($w=0; $w <count($info[$i]) ; $w++) { 

				if($w == 0){
						$aux = $aux .  $info[$i][$w]['unidad']; 
				}else{
						$aux = $aux . ' , '.  $info[$i][$w]['unidad']; 
				}
			}
			$unidadesAll[$i] = $aux;
		}



		$dataFin = array(
			'compra' => $data,
			'unidades'=> $unidadesAll,
		);


		

		return $dataFin;

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
