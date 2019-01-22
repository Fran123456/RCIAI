<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * 
 */
class Reporte12_controller extends CI_Controller
{
	
	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('Reporte12_Model', 'R12');

		require 'application/plus/noty.php';
		require 'application/plus/Excel.php';
		
	}

	//función para realizar el reporte en excel
	public function reporte_12()
	{
		

		#capturamos los datos
		$consulta = $this->input->post('consulta12');
		$parametro = $this->input->post('parametro12');

		/*verificamos que tipo de consulta se hara
		1 ---- para consultar por unidad
		2 ---- para consultar por encargado
		3 ---- para consultar por codigo */

		switch ($consulta) {
			case '1':
				# consultamos por unidad
				#verificamos si es unidad administrativa o lab
				switch ($parametro) {
					case 'lab-01':
					case 'lab-02':
					case 'lab-03':
					case 'lab-04':
					case 'lab-05':
					case 'lab-HW':
					case 'lab-red':
						$result = $this->R12->consulta_lab($parametro);
						$name = 'Reporte-de-equipo-para-'.$parametro;

						$Arraycolumnas = array('A1','B1','C1','D1','E1');
						$ArrayColumnasLetra = array('A','B', 'C', 'D', 'E');

						//vamos a verificar si el result trae o no parametros
						if($result)
						{
							//titulos
							//print_r($result);
							$ArrayTitulo = array(' Identificador ', ' Disco Duro ', ' Memoria RAM ', ' Procesador ',' perifericos ' );
							//configuración iniciales con clase excel para reporte
							$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
							Excel::Header_format__(null,null,'A1:E1',$spreadsheet);//preparamos la cabecera de el excel
							Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

							$cont = 1; //contador que nos ayudara a llevar el control de los registros y que hace que imprima los datos en la segunda fila
							for($i=0;$i<count($result);$i++)
							{
								#vamos a obtener los perifericos de ese equipo
								#$perifericos = $this->R12->perifericos($result[$i]['identificador']);
								$periferico = '';
								$cont++;
								
								
								# si es un laboratorio
								$perifericos = $this->R12->perifericos($result[$i]['identificador_lab']);
								if($perifericos == true || $perifericos != '')
									{
										for($j=0;$j<count($perifericos);$j++)
										{
											$periferico .= $perifericos[$j]['tipo'].' ';
										}
									}
									else
									{
										$periferico .= 'Sin perifericos';
									}
								$spreadsheet->setActiveSheetIndex(0)
								 ->setCellValue('A'.$cont,$result[$i]['identificador_lab'])
								 ->setCellValue('B'.$cont,$result[$i]['capacidad'])
								 ->setCellValue('C'.$cont,$result[$i]['memoria_fisica'])
								 ->setCellValue('D'.$cont,$result[$i]['procesador'])
								 ->setCellValue('E'.$cont,$periferico);
							}
							Excel::borders__($spreadsheet, '686868', "A1:E".$cont);

							//Autotamaño de las columnas
							Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
							//SAVE
							Excel::save__($spreadsheet,$name);
						}
						else
						{
							redirect(base_url().'error-404-reporteria');
						}
						############################################################################################
					break;
					
					default:
						#vamos a obtener el nombre de la unidad a la que queremos consultar
						$unidad = $this->R12->nom_unidad($parametro);
						$result = $this->R12->consulta_adm($parametro);
						$name = 'Reporte-de-equipo-para-'.$unidad[0]['unidad'];

						$Arraycolumnas = array('A1','B1','C1','D1','E1');
						$ArrayColumnasLetra = array('A','B', 'C', 'D', 'E');
						//vamos a verificar si el result trae o no parametros
						if($result)
						{
							//titulos
							//print_r($result);
							$ArrayTitulo = array(' Identificador ', ' Disco Duro ', ' Memoria RAM ', ' Procesador ',' perifericos ' );
							//configuración iniciales con clase excel para reporte
							$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
							Excel::Header_format__(null,null,'A1:E1',$spreadsheet);//preparamos la cabecera de el excel
							Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

							$cont = 1; //contador que nos ayudara a llevar el control de los registros y que hace que imprima los datos en la segunda fila
							for($i=0;$i<count($result);$i++)
							{
								#vamos a obtener los perifericos de ese equipo
								#$perifericos = $this->R12->perifericos($result[$i]['identificador']);
								$periferico = '';
								$cont++;
								
								
								# si es un laboratorio
								$perifericos = $this->R12->perifericos($result[$i]['identificador']);
								if($perifericos == true || $perifericos != '')
									{
										for($j=0;$j<count($perifericos);$j++)
										{
											$periferico .= $perifericos[$j]['tipo'].' ';
										}
									}
									else
									{
										$periferico .= 'Sin perifericos';
									}
								$spreadsheet->setActiveSheetIndex(0)
								 ->setCellValue('A'.$cont,$result[$i]['identificador'])
								 ->setCellValue('B'.$cont,$result[$i]['capacidad'])
								 ->setCellValue('C'.$cont,$result[$i]['memoria_fisica'])
								 ->setCellValue('D'.$cont,$result[$i]['procesador'])
								 ->setCellValue('E'.$cont,$periferico);
							}
							Excel::borders__($spreadsheet, '686868', "A1:E".$cont);

							//Autotamaño de las columnas
							Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
							//SAVE
							Excel::save__($spreadsheet,$name);
						}
						else
						{
							redirect(base_url().'error-404-reporteria');
						}
					break;
				}
			break;
			
			case '2':
				# consultamos por encargado
				$result = $this->R12->consulta_encargado($parametro);
				$name = 'Reporte-de-equipo-por-encargado-'.$parametro;

				$Arraycolumnas = array('A1','B1','C1','D1','E1','F1');
				$ArrayColumnasLetra = array('A','B','C','D','E','F');
				if($result)
				{
					$ArrayTitulo = array(' Identificador ', ' Encargado ',' Disco Duro ', ' Memoria RAM ', ' Procesador ',' perifericos ' );
					//configuración iniciales con clase excel para reporte
					$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
					Excel::Header_format__(null,null,'A1:F1',$spreadsheet);//preparamos la cabecera de el excel
					Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

					$cont = 1;

					for($i=0;$i<count($result);$i++)
					{
						$periferico = '';
						$cont++;
						
						
						# si es administrativo
						$perifericos = $this->R12->perifericos($result[$i]['identificador']);
						if($perifericos == true || $perifericos != '')
							{
								for($j=0;$j<count($perifericos);$j++)
								{
									$periferico .= $perifericos[$j]['tipo'].' ';
								}
							}
							else
							{
								$periferico .= 'Sin perifericos';
							}
						$spreadsheet->setActiveSheetIndex(0)
						 ->setCellValue('A'.$cont,$result[$i]['identificador'])
						 ->setCellValue('B'.$cont,$result[$i]['encargado_puesto'])
						 ->setCellValue('C'.$cont,$result[$i]['capacidad'])
						 ->setCellValue('D'.$cont,$result[$i]['memoria_fisica'])
						 ->setCellValue('E'.$cont,$result[$i]['procesador'])
						 ->setCellValue('F'.$cont,$periferico);
					}
					Excel::borders__($spreadsheet, '686868', "A1:F".$cont);

					//Autotamaño de las columnas
					Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
					//SAVE
					Excel::save__($spreadsheet,$name);
				}
				else
				{
					redirect(base_url().'error-404-reporteria');
				}
				
			break;

			case '3':
				# verificamos si el codigo es administrativo o de lab con $parametro
				$codigo = strtoupper($parametro);
				$cod = substr($codigo, 0,2);
				
				switch ($cod) {
					case 'PC':
						# vamos a realizar la consulta y preparar los campos para hacer el reporte
						$result = $this->R12->consulta_codigoAdm($codigo);

						$name = 'Reporte-de-equipo-por-código-'.$codigo;

						$Arraycolumnas = array('A1','B1','C1','D1','E1','F1');
						$ArrayColumnasLetra = array('A','B','C','D','E','F');

						#evaluamos el resultado
						if($result)
						{
							$ArrayTitulo = array(' Identificador ', ' Encargado ',' Disco Duro ', ' Memoria RAM ', ' Procesador ',' perifericos ' );
							//configuración iniciales con clase excel para reporte
							$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
							Excel::Header_format__(null,null,'A1:F1',$spreadsheet);//preparamos la cabecera de el excel
							Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

							$periferico = '';
							
							# si es administrativo
							$perifericos = $this->R12->perifericos($result[0]['identificador']);
							if($perifericos == true || $perifericos != '')
							{
								for($j=0;$j<count($perifericos);$j++)
								{
									$periferico .= $perifericos[$j]['tipo'].' ';
								}
							}
							else
							{
								$periferico .= 'Sin perifericos';
							}
							$spreadsheet->setActiveSheetIndex(0)
							 ->setCellValue('A'.'2',$result[0]['identificador'])
							 ->setCellValue('B'.'2',$result[0]['encargado_puesto'])
							 ->setCellValue('C'.'2',$result[0]['capacidad'])
							 ->setCellValue('D'.'2',$result[0]['memoria_fisica'])
							 ->setCellValue('E'.'2',$result[0]['procesador'])
							 ->setCellValue('F'.'2',$periferico);

							Excel::borders__($spreadsheet, '686868', "A1:F".'2');

							//Autotamaño de las columnas
							Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
							//SAVE
							Excel::save__($spreadsheet,$name);
							
						}
						else
						{
							redirect(base_url().'error-404-reporteria');
						}					
					break;
					
					case 'LA':
						# vamos a realizar la consulta y preparar los campos para hacer el reporte
						$result = $this->R12->consulta_codigoLab($parametro);

						$name = 'Reporte-de-equipo-por-código-'.$parametro;

						$Arraycolumnas = array('A1','B1','C1','D1','E1');
						$ArrayColumnasLetra = array('A','B','C','D','E');

						#evaluamos el resultado
						if($result)
						{
							$ArrayTitulo = array(' Identificador ',' Disco Duro ', ' Memoria RAM ', ' Procesador ',' perifericos ' );
							//configuración iniciales con clase excel para reporte
							$spreadsheet = Excel::Create_Excel__(null,null);//creamos el objeto
							Excel::Header_format__(null,null,'A1:E1',$spreadsheet);//preparamos la cabecera de el excel
							Excel::Values_Header__($spreadsheet,0,$Arraycolumnas,$ArrayTitulo);

							$periferico = '';
							
							# si es administrativo
							$perifericos = $this->R12->perifericos($result[0]['identificador_lab']);
							if($perifericos == true || $perifericos != '')
							{
								for($j=0;$j<count($perifericos);$j++)
								{
									$periferico .= $perifericos[$j]['tipo'].' ';
								}
							}
							else
							{
								$periferico .= 'Sin perifericos';
							}
							$spreadsheet->setActiveSheetIndex(0)
							 ->setCellValue('A'.'2',$result[0]['identificador_lab'])
							 ->setCellValue('B'.'2',$result[0]['capacidad'])
							 ->setCellValue('C'.'2',$result[0]['memoria_fisica'])
							 ->setCellValue('D'.'2',$result[0]['procesador'])
							 ->setCellValue('E'.'2',$periferico);

							Excel::borders__($spreadsheet, '686868', "A1:E".'2');

							//Autotamaño de las columnas
							Excel::ColumnDimension_AutoSize__(true,$ArrayColumnasLetra, $spreadsheet);
							//SAVE
							Excel::save__($spreadsheet,$name);
							
						}
						else
						{
							redirect(base_url().'error-404-reporteria');
						}
					break;
				}
			break;
		}
	}
}
