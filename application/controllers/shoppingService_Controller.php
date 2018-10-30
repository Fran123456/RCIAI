<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class shoppingService_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('shopping_Model', 'shopping');
		require 'application/plus/noty.php';

	}

  	public function index()
  	{
  		$unidades = $this->unidades();
  		$this->load->view('Dashboard/shopping/shoppingService_View', compact('unidades'));
  	}

  	public function unidades() //obtenemos las unidades de la base de datos
  	{
        return  $this->shopping->getUnidad();
  	}

    public function add__(){
       $idCompra =  $this->catch_Buy();
         $mensaje  = array(
              0 =>"Compra realizada correctamente",
              1 =>TRUE,
              2 => $idCompra,
            );
          //$this->load->view('Dashboard/dashboard_View', compact('mensaje'));
         redirect(base_url().'services_C/mostrar/'.$mensaje[2]);
    }

  

   //capturamos los datos para agregar la compra
   private function catch_Buy(){
      $id = $this->generateID();
      $data = array(  //data referente a la compra
         'id_compra' => $id,
         'tipo_compra' => 'servicio',
         'tipo' => $this->input->post('tipoq'), //servira para otro dato
         'detalle' => $this->input->post('detalle'),
         'proveedor' =>$this->input->post('proveedor'),
         'n_factura'=>$this->input->post('factura'),
         'fecha_autorizacion' => $this->input->post('fechautorizacion'),
         'fecha_compra' => $this->input->post('fechacompra'),
         'total'=> $this->input->post('totalcompra'),
         'observaciones' => $this->input->post('observaciones'),
         'usuario_id'=>$this->session->userdata('id'),
      );

      $data2 = array(
        'compra_id' => $id,
        'unidad_id' =>$this->input->post('destino'),
        'cantidad' => 1,
      );

      $u = $this->shopping->add_Buy($data);
      $f = $this->shopping->add_buyXUnity($data2);
      return $id;
      
   }


 //CAPTURAMOS LAS UNIDADES X COMPRA
  private function catch_UnityXdata(){
     $cantidadDestino = $this->input->post('destinosCreados');
     $data = array();

    for ($i=1; $i <=$cantidadDestino ; $i++) { //agregamos las unidades y sus compras
         $aux = 'cantidadUnidad'.$i;
         $auxb = 'unidaddestino'.$i;
         $cantidad = $this->input->post($aux);
         $unidad = $this->input->post($auxb);

         $unidadString = $this->shopping->getUnidad_Where($unidad);


         $data['cantidad'][$i-1] = $cantidad;
         $data['unidad_id'][$i-1] = $unidad;
         $data['unidad'][$i-1] = $unidadString;
         $data['n'][$i-1] = $cantidadDestino;

      }

      return $data;
  }


	function generateID() { //generamos ID para la compra DE SERVICIO
    $inicio = "SERVICIO-";
    $uno = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$number = rand(1000000, 9999999). "-" . rand(1000, 9999);
		$variable = $inicio. $uno . "-" . $number;
		return $variable;
  }

}
