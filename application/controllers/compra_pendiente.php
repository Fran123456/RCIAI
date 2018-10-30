<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	
	class Compra_pendiente extends CI_Controller
	{
		
		public function __construct(){
	      parent::__construct();

	      if (!$this->session->userdata('login')) {
				redirect(base_url());
			}
			$this->load->database();
			$this->load->model('compra_pendiente_Model', 'pendiente');
			//$this->load->model('Paginacion_model');
		     
		    // load URL helper
		    $this->load->helper('url');
			require 'application/plus/noty.php';

		}//fin del construct

		//función para mostrar la vista de las tablas de las compras pendientes
		public function mostrarPendiente(){
			$data['compras'] = $this->pendiente->registro();
			$this->load->view('Dashboard/shopping/compra_pendiente/registro_pendiente',$data);
		}
	}


 ?>