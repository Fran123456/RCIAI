<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte9_controller extends CI_Controller {

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Reporte9_Model', 'R9');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}

	//función para realizar el reporte
	public function reporte_9()
	{
		$Arraycolumnas = array('A1','B1','C1','D1','E1','G1');
		$ArrayColumnasLetra = array('A','B', 'C', 'D', 'E', 'G');

		//capturamos los datos del formulario para hacer la consulta
		$anio = $this->input->post('anio_9'); 
		$fecha = $this->input->post('fecha_9'); // 1(semestre 1), 2(semestre 2), anual
		

		switch ($fecha) {
			case '1':
				//vamos hacer la consulta de datos para el año que se a elegido
				$fecha_inicio = "$anio-01-01";
				$fecha_fin = "$anio-06-30";
				$result = $this->R9->reporte($anio,$fecha_inicio,$fecha_fin);
				$msj = ' Costo Anual ';
				//nombre con el que se guardara el reporte
				$name = 'Reporte-primer-semestre-de-equipos-nuevos-'.$anio;
			break;
			
			case '2':
				//vamos hacer la consulta de datos para el año que se a elegido
				$fecha_inicio = "$anio-07-01";
				$fecha_fin = "$anio-12-31";
				$result = $this->R9->reporte($anio,$fecha_inicio,$fecha_fin);
				$msj = ' Costo Anual ';
				//nombre con el que se guardara el reporte
				$name = 'Reporte-segundo-semestre-de-equipos-nuevos-'.$anio;
			break;

			case 'anual':
				//vamos hacer la consulta de datos para el año que se a elegido
				$fecha_inicio = "$anio-01-01";
				$fecha_fin = "$anio-12-31";
				$result = $this->R9->reporte($anio,$fecha_inicio,$fecha_fin);
				$msj = ' Costo Anual ';
				//nombre con el que se guardara el reporte
				$name = 'Reporte-anual-de-equipos-nuevos-'.$anio;
			break;
		}

		//comparamos
				if($result)
				{
					//print_r($result);
					
					//titulos
					$ArrayTitulo = array(' N° Factura ', ' Detalle ', ' unidad ', ' fecha ',' costo por factura ', $msj );
					//configuración iniciales con clase excel para reporte
					$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
					Excel::Header_format__(null,null,'A1:G1',$spreadsheet);//preparamos la cabecera de el excel
					Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

					//impresión de Datos
					$cont = 1; //contador que nos ayudara a llevar el control de los registros y que hace que imprima los datos en la segunda fila
					for($i=0;$i<count($result);$i++)
					{
						$unidad = $this->R9->obtener_destino($result[$i]['id_compra']);
						$unidades ='';
						//agregar las unidades a una variable
						for($j=0;$j<count($unidad);$j++)
						{
							$unidades .= $unidad[$j]['unidad'].' ' ;
						}

						$cont++;
						$spreadsheet->setActiveSheetIndex(0)
						 ->setCellValue('A'.$cont,$result[$i]['n_factura'])
						 ->setCellValue('B'.$cont,$result[$i]['detalle'])
						 ->setCellValue('C'.$cont,$unidades)
						 ->setCellValue('D'.$cont,$result[$i]['fecha_compra'])
						 ->setCellValue('E'.$cont,$result[$i]['total']);

					}
					$spreadsheet->setActiveSheetIndex(0)->setCellValue('G2',"=SUM(E2:E$cont)");
					Excel::borders__($spreadsheet, '686868', "A1:G".$cont);

					//Autotamaño de las columnas
					Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
					//SAVE
					Excel::save__($spreadsheet,$name);
				}
				else
				{
					redirect(base_url().'error-404-reporteria');
				}
	}
}
