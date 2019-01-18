<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AudioVisualesController extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('GeneralReporte_Model','general');
		require 'application/plus/noty.php';

	}

  public function teclados()
  {
      $data = $this->general->select_('audiovisuales');
       $this->load->view('Dashboard/audiovisuales/teclados', compact('data'));
  }

}
