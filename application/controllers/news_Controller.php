<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_Controller extends CI_Controller {

	public function __construct(){
      parent::__construct();

      if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
		$this->load->model('news_Model');
		require 'application/plus/noty.php';
	}

	public function index()
	{
		$this->load->view('Dashboard/news/news_View');
	}

	private function ShowDashboard($mensaje = null)
	{
		if ($mensaje == null) {
			$this->load->view('Dashboard/dashboard_View');
		}
		else
		{
			$this->load->view('Dashboard/dashboard_View', compact('mensaje'));
		}
	}

	public function sendMessage()
	{
		$idGenerado = $this->generateID();
		$data = array( //data para ingresar en la tabla notificacion
			'id' => $idGenerado,
			'titulo' => $this->input->post('titulo'),
			'mensaje' => $this->input->post('mensaje'),
			'usuario_id' => $this->session->userdata('id'),
		);

		$data2 = array( //data para ingresar en la tabla notificacion_usuario
			'notificacion_id' => $idGenerado,
			'estado'=> 'sin leer',
			'usuario_id' =>$this->session->userdata('id'),
		);


        $res = $this->news_Model->add($data); //agrega a notificacion
        $res_ = $this->news_Model->add_($data2); //agrega a notificacion_usuario

        if($res==true && $res == true){
        	/*$mensaje  = array(
              0 =>"Anuncio publicado con exito",
              1 =>TRUE,
	         );*/
             $this->session->set_flashdata('success', 'Anuncio ha sido enviado');
	         redirect(base_url().'dashboard','refresh');
        }
        else{
        	/*$mensaje  = array(
              0 =>"Anuncio no ha podido ser publicada",
              1 =>FALSE,
	         );*/
	          $this->session->set_flashdata('mistake', 'Anuncio no ha podido ser publicado');
	         redirect(base_url().'dashboard','refresh');
        }

       // $this->ShowDashboard($mensaje);
	 }


	  

      public function showNotification(){
        $id = $this->uri->segment(2);
        $dataUpdate = array(
        	'id' => $id,
        	'estado' => 'leido',
        );
        $this->news_Model->update_($dataUpdate);
        
		$res = $this->news_Model->Message($id );
		$datos = array();
		foreach ($res as $key => $value) {
			$datos['titulo']= $value->titulo;
			$datos['mensaje']= $value->mensaje;
			$datos['fecha']= $value->fecha;
			$datos['nombre']= $value->nombre;
			$datos['apellido']= $value->apellido;
		}
        require 'application/plus/noty.php';
		$this->load->view('Dashboard/news/notification_View', compact('datos'));
	  }


	  private	function generateID() {
        $uno = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$number = rand(100000, 999999). "-" . rand(1000, 9999);
		$variable = $uno . "-" . $number;
		return $variable;
     }

     public function showMessageAjax(){
		$result = $this->news_Model->show_Message_Read();
		echo json_encode($result);
	 }

	 public function allNotificationsRead()
	 {
	 	$this->load->view('Dashboard/news/notifications_read_View');
	 }

}
