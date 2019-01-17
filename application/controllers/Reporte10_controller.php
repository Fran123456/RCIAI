<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * 
 */
class Reporte10_controller extends CI_Controller
{
	
	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Reporte10_Model', 'R10');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}

	public function reporte_10()
	{
		#obtenemos los valores del formulario
		$unidad = $this->input->post('unidad10');
		$mes = $this->input->post('mes_10');
		$anio = $this->input->post('anio_10');

		$fecha_inicio = "$anio-$mes-01";
		$fecha_fin = "$anio-$mes-31";

		$nom_mes = $this->nom_mes($mes);

		$name = "Reporte_movimiento-para-$unidad-del-mes-$nom_mes";

		#hacemos la consulta para obtener los datos
		$result = $this->R10->reporte_10($unidad, $fecha_inicio, $fecha_fin);

		
		$Arraycolumnas = array('A1','B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1','I1', 'J1', 'K1', 'L1');
		$ArrayColumnasLetra = array('A','B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J','K', 'L');

		if($result)
		{
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

			$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
			Excel::Header_format__(null,null,'A1:L1',$spreadsheet);//preparamos la cabecera de el excel
			Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

		    //impresión de Datos
			$cont = 1; //contador que nos ayudara a llevar el control de los registros y que hace que imprima los datos en la segunda fila
			for($i=0;$i<count($result);$i++)
			{
				
				//agregar las unidades a una variable
				$u_pertenece = $this->R10->nom_unidad($result[$i]['unidad_pertenece_id']);
				$unidad_pertenece = $u_pertenece[0]['unidad'];
				$u_traslado = $this->R10->nom_unidad($result[$i]['unidad_traslado_id']);
				$unidad_traslado = $u_traslado[0]['unidad'];
				$u_origen = $this->R10->nom_unidad($result[$i]['origen_nuevoEquipo_id']);
				$unidad_origen = $u_origen[0]['unidad'];

				$cont++;
				$spreadsheet->setActiveSheetIndex(0)
				 ->setCellValue('A'.$cont,$result[$i]['fecha_retiro'])
				 ->setCellValue('B'.$cont,$result[$i]['fecha_cambio'])
				 ->setCellValue('C'.$cont,$result[$i]['codigo_id'])
				 ->setCellValue('D'.$cont,$unidad_pertenece)
				 ->setCellValue('E'.$cont,$unidad_traslado)
				 ->setCellValue('F'.$cont,$result[$i]['cambio'])
				 ->setCellValue('G'.$cont,$result[$i]['descripcion_cambio'])
				 ->setCellValue('H'.$cont,$unidad_origen)
				 ->setCellValue('I'.$cont,$result[$i]['descripcion_equipoRetirado'])
				 ->setCellValue('J'.$cont,$result[$i]['descripcion_equipoNuevo'])
				 ->setCellValue('K'.$cont,$result[$i]['encargado'])
				 ->setCellValue('L'.$cont,$result[$i]['tecnico']);

			}
			
			Excel::borders__($spreadsheet, '686868', "A1:L".$cont);

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

	public function nom_mes($mes)
	{
		switch ($mes) {
			case '1':
				$nom = "Enero";
			break;
			
			case '2':
				$nom = "Febrero";
			break;
			case '3':
				$nom = "Marzo";
			break;
			case '4':
				$nom = "Abril";
			break;
			case '5':
				$nom = "Mayo";
			break;
			case '6':
				$nom = "Junio";
			break;
			case '7':
				$nom = "Julio";
			break;
			case '8':
				$nom = "Agosto";
			break;
			case '9':
				$nom = "Septiembre";
			break;
			case '10':
				$nom = "Octubre";
			break;
			case '11':
				$nom = "Noviembre";
			break;
			case '12':
				$nom = "Diciembre";
			break;
		}
		return $nom;
	}
}
