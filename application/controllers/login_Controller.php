<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_Controller extends CI_Controller {

	public function __construct(){
       parent::__construct();
       $this->load->model('usuarios_Model');
       $this->load->model('dashboard_Model');
	}

	public function index() //funcion para mostrar la vista de loggeo
	{
		if ($this->session->userdata('login')) { //Aqui validamos que si hay una sesion entonces se redirija directo al dashboard aunque el usuario quiera ver la vista del login
			redirect(base_url().'dashboard');
		}
		else
		{
		 $this->load->view('AuthViews/login_View');
		}
	}

	public function login() //funcion para loggeo
	{
	  $usuario = $this->input->post('user'); //capturamos los datos (correo y password)
	  $password = $this->input->post('password'); //capturamos los datos (correo y password)
		$res = $this->usuarios_Model->login($usuario , md5($password));  //utilizamos el metodo login del modelo para verificar si el usuario existe
	    if (!$res) { //si el usuario no existe redirigimos al login de nuevo con mensaje de error
            $error = "su usuario o contraseña no son correctos";
	    	$this->load->view('AuthViews/login_View' , compact('error'));
	    }
	    else //si hay exito entonces creamos la sesión
	    {
        $notis =$this->dashboard_Model->show_join($res->id_usuario);
        $con = count($notis);
	     //preparamos los datos de la sesión
         $data = array(
            'id' => $res->id_usuario,
						'user' => $res->usuario,
            'nombre' => $res->nombre,
            'apellido' => $res->apellido,
            'correo' => $res->correo,
            'rol' => $res->rol,
            'cargo' => $res->cargo,
            'id' => $res->id_usuario,
            'login' => TRUE,
            'contador' => $con,
            'notificaciones' => $notis,
         );
         $this->session->set_userdata($data); //asignamos los datos a la sesión
         redirect(base_url().'dashboard'); //redirigimos al dashboard
	    }
	}


	public function logout()
	{
		$this->session->sess_destroy(); //destruimos la sesion
		redirect(base_url()); //redirigimos al login
	}

	public function showPasswordRecovery()
	{
		$this->load->view('AuthViews/recovery-password_View');
	}



 }
