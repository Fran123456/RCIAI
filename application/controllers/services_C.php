<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services_C extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('services_Model', 'services');
		// load URL helper
		$this->load->helper('url');
		require 'application/plus/noty.php';

	}

	public function index(){
		/*$params = array();
			$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$total_records = $this->services->get_total();echo $total_records;

			$this->config->load('pagination', TRUE);#carga archivo de pagination en config
			$settings = $this->config->item('pagination');#buscamos el item de pagination
			$settings['total_rows'] = $this->services->get_total();
			$settings['base_url'] = base_url().'pagina/servicio';#La URL que será usada mientras construimos enlaces de paginado
			$settings['first_url'] = base_url().'pagina/servicio';

			if($total_records > 0){
				#recogemos los registros de la pagina actual
				$params["compras"] = $this->services->showCompras($settings['per_page'],$start_index);
				#inicializamos la libreria de pagination
				$this->pagination->initialize($settings);
				#creamos los enlaces del paginado
				$params["links"] = $this->pagination->create_links();
			}*/
			#cargamos en la vista con los parametros
			//var_dump($params);
			$params["compras"] = $this->services->showCompras();
			$this->load->view('Dashboard/shopping/shopping_services',$params);
	}

	

//////////////controladores de enrique ////////////////
	public function showServices(){
		$this->load->view('Dashboard/shopping/shopping_services');
	}

	//controlador para mostrar las compras en la vista
	public function showServicesAjax(){
		$result = $this->services->showCompras();
		echo json_encode($result);
	}

	public function editServicesAjax(){
		$id = $this->input->post('id');
		$result = $this->services->editcompra($id);
		echo json_encode($result);
	}

	public function mostrar($id){
		//llamamos al modelo para hacer la consulta
		$result1 = $this->services->getcompra($id);#obtenemos los datos de la compra
		$result2 = $this->services->getunidad_C($id);#obtenemos los datos de las unidades que estan esas compras
		
		if($result1 && $result2){
			$data['compras'] = $result1;
			$data['unidad'] = $result2;
		
			$this->load->view('Dashboard/shopping/show_services',$data);
		}else{
			echo "ERROR";
		}			
	}


	

}