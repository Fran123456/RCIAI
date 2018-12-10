<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('dashboard_Model');
		require 'application/plus/noty.php';

	}

	public function index()
	{
		$hoy = getdate();

        $data = array(
          'n_bodega' =>$this->dashboard_Model->n_bodega(),
          'n_admin' => $this->dashboard_Model->n_admin(),
          'n_compra' => $this->dashboard_Model->n_compra(),
          'n_labo' => $this->dashboard_Model->n_labo(),
          'n_PC_admin' => $this->dashboard_Model->n_pc_Admin(),
          'n_DDE_admin' =>$this->dashboard_Model->n_disco_Admin(),
          'n_laptop_admin' =>$this->dashboard_Model->n_laptop_Admin(),
          'n_elements_bodega' =>$this->dashboard_Model->n_bodega_elements(),
        );
		$this->load->view('Dashboard/dashboard_View', compact('hoy', 'data'));
	}

	public function ob(){
		$res = $this->dashboard_Model->n_bodega_elements();
	}

	public function panel_report(){
		$this->load->view('Dashboard/Reporteria/Reporteria_View_General');
	}


}
