<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Shopping extends CI_Controller
	{
		
		public function __construct(){
	      parent::__construct();

	      if (!$this->session->userdata('login')) {
				redirect(base_url());
			}
			$this->load->database();
			$this->load->model('shopping_Model', 'shopping');
			//$this->load->model('Paginacion_model');
			
			
		     
		    // load URL helper
		    $this->load->helper('url');
			require 'application/plus/noty.php';

		}
		

		public function index(){

			/*$params = array();
			$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$total_records = $this->shopping->get_total();

			$this->config->load('pagination', TRUE);#carga archivo de pagination en config
			$settings = $this->config->item('pagination');#buscamos el item de pagination
			$settings['total_rows'] = $this->shopping->get_total();
			$settings['base_url'] = base_url().'pagina/compra';#La URL que será usada mientras construimos enlaces de paginado
			$settings['first_url'] = base_url().'pagina/compra';

			if($total_records > 0){
				#recogemos los registros de la pagina actual
				$params["compras"] = $this->shopping->showCompras($settings['per_page'],$start_index);
				#inicializamos la libreria de pagination
				$this->pagination->initialize($settings);
				#creamos los enlaces del paginado
				$params["links"] = $this->pagination->create_links();
			}
			#cargamos en la vista con los parametros
			//var_dump($params);*/
			$params["compras"] = $this->shopping->showCompras();
			$this->load->view('Dashboard/shopping/shopping_mantenimiento',$params);
		}


		public function mostrar($id){
			//llamamos al modelo para hacer la consulta
			$result1 = $this->shopping->getcompra($id);#obtenemos los datos de la compra
			$result2 = $this->shopping->getunidad_C($id);#obtenemos los datos de las unidades que estan esas compras
			
			if($result1 && $result2){				

				$data['compras'] = $result1;
				$data['unidad'] = $result2;
			
				$this->load->view('Dashboard/shopping/show_shopping',$data);
			}else{
				echo "ERROR";
			}
			
		}#fin de mostrar

		
	}//fin de la clase


 ?>