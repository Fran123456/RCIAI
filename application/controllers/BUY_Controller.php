<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BUY_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('BUY_Model','BUY');
		require 'application/plus/noty.php';

	}

  public function index()
  {
       $code = $this->generateID();
       $this->load->view('Dashboard/shopping/buy/buy_View', compact('code'));
  }

  public function indexComplement(){
       $code = $this->generateID();
       $this->load->view('Dashboard/shopping/buy/buyComplement_View', compact('code'));
  }

  public function addbuy(){
   $html = "";
   $cantidadE = $this->input->post('softwareCONT');
   for ($i=0; $i <$cantidadE ; $i++) { 
     $html = $html . " , ".$this->input->post('name-'.$i) ;
   }
    $html =  substr($html,2, strlen($html));
   

    $data = array(
     'id_compra' =>  $this->input->post('code'),
     'tipo_compra' => 'fisica',
     'tipo' =>  $html,
     'detalle' => $this->input->post('detalle'),
     'cantidad' => $this->input->post('cantidadproducto'),
     'proveedor' => $this->input->post('proveedor'),
     'n_factura' => $this->input->post('factura'),
     'fecha_autorizacion' => $this->input->post('fechautorizacion'),
     'fecha_compra' => $this->input->post('fechacompra'),
     'garantia' => $this->input->post('garantia'),
     'total' => $this->input->post('total'),
     'observaciones' => $this->input->post('observaciones'),
     'usuario_id' => $this->session->userdata('id'),
    );
    print_r($data);
 
    $this->BUY->add_buy($data);
    $this->session->set_flashdata('item','COMPRA CREADA CORRECTAMENTE'); 
    redirect(base_url().'show-pc-buy/'.$this->input->post('code')); 
  }


public function addbuy2(){
   $html = "";
   $cantidadE = $this->input->post('softwareCONT');
   for ($i=0; $i <$cantidadE ; $i++) { 
     $html = $html . " , ".$this->input->post('name-'.$i) ;
   }
    $html =  substr($html,2, strlen($html));
   

    $data = array(
     'id_compra' =>  $this->input->post('code'),
     'tipo_compra' => 'fisica',
     'tipo' =>  $html,
     'detalle' => $this->input->post('detalle'),
     'cantidad' => $this->input->post('cantidadproducto'),
     'rest' => $this->input->post('cantidadproducto'),
     'proveedor' => $this->input->post('proveedor'),
     'n_factura' => $this->input->post('factura'),
     'fecha_autorizacion' => $this->input->post('fechautorizacion'),
     'fecha_compra' => $this->input->post('fechacompra'),
     'garantia' => $this->input->post('garantia'),
     'total' => $this->input->post('total'),
     'observaciones' => $this->input->post('observaciones'),
     'usuario_id' => $this->session->userdata('id'),
    );
    print_r($data);
 
    $this->BUY->add_buy($data);
    $this->session->set_flashdata('item','COMPRA CREADA CORRECTAMENTE'); 
    redirect(base_url().'show-pc-buy/'.$this->input->post('code')); 
  }










  public function  show_pc(){
    $ida = $this->uri->segment(2);
    $data = $this->BUY->get_buy($ida);
   $this->load->view('Dashboard/shopping/buy/SHowbuy_View', compact('ida','data'));
  }











  function generateID() { //generamos ID para la compra FISICA
    $uno = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
    $number = rand(1000000, 9999999). "-" . rand(1000, 9999);
    $variable = "COMPRA-". $uno . "-" . $number;
    return $variable;

  }

}
