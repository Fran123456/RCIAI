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
		$this->load->model('GeneralReporte_Model', 'General');

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
				echo "semestre 1";
				break;
			
			case '2':
				echo "semestre 2";
				break;

			case 'anual':
				//vamos hacer la consulta de datos para el año que se a elegido
				$result = $this->
			break;
		}


	}
}
