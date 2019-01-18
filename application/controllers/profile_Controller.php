<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile_Controller extends CI_Controller {

    public $id;

	public function __construct(){
      parent::__construct();
      if (!$this->session->userdata('login')) { //verificamos si hay sesiones y si no hay entonces redigirimos al login
			redirect(base_url());
		}
		$this->load->model('usuarios_Model'); //cargamos modelo
		$this->load->model('dashboard_Model');
		require 'application/plus/noty.php';

	}

	public function index($mensaje = null) //cargamos la vista del profile
	{
		if ($mensaje == null) {
			$this->load->view('Dashboard/users/profile_View');
		}
		else
		{
			$this->load->view('Dashboard/users/profile_View', compact('mensaje'));
		}

	}

	public function ViewProfileEdit() //cargamos vista de editar perfil
	{
		$this->load->view('Dashboard/users/profileEdit_View');
	}

	public function users()
	{
        $res = $this->usuarios_Model->showUsers();
        $this->load->view('Dashboard/users/users_View' , compact('res'));
	}

	


	public function UpdateProfile()
	{
		$res = $this->usuarios_Model->getUser($this->session->userdata('id')); //datos del usuario en sesion
		foreach ($res  as $key => $value) { //asignamos los datos en un array
			$datos = array(
		      'id' =>  $value->id_usuario,
          'usuario' => $value->usuario,
		      'nombre' =>  $this->input->post('nombre'),
		      'apellido' =>  $this->input->post('apellido'),
		      'cargo' =>  $value->cargo,
		      'correo' =>  $this->input->post('correo'),
		      'pass' =>  $value->password,
		      'rol' =>  $value->rol,
		    );
		}
		 $resultado =$this->usuarios_Model->update($datos); //actualiza datos
		 if($resultado == 1) //proceso si la actualizacion se realizo con exito
	     {
	        $mensaje  = array(
              0 =>"Perfil actualizado correctamente",
              1 =>TRUE,
	          );
             $res = $this->usuarios_Model->getUser($this->session->userdata('id')); //pedimos los datos del usuario loggeado de nuevo para actualizar las vistas
             $notis =$this->dashboard_Model->show_join($this->session->userdata('id')); //obtenemos las notificaciones
             $con = count($notis); //contamos cuantas notificaciones tenemos
	         foreach($res  as $key => $value){ //almacemanos los datos en el array
		         	 $data = array(
		            'id' => $value->id_usuario,
		            'nombre' => $value->nombre,
		            'apellido' => $value->apellido,
		            'correo' => $value->correo,
		            'rol' => $value->rol,
		            'cargo' => $value->cargo,
		            'login' => TRUE,
		            'contador' => $con,
                    'notificaciones' => $notis,
		         );
		       }
               $this->session->set_userdata($data); //asignamos los datos a la sesión de nuevo
	     }
	     else
	     {
	     	$mensaje  = array(
              0 =>"error el perfil no pudo ser actualizado",
              1 =>FALSE,
	          );
	     }
         $this->index($mensaje); //llamada de la vista
     }//fin

	

      /////////////////////////////////////      AJAX      /////////////////////////////////////////////////////	
	//función para agregar usuarios
	public function addUserAjax()
	{
		//capturo los datos del formulario
		$varNombre = filter_input(INPUT_POST,'nombre');
		$varApellido = filter_input(INPUT_POST,'apellido');
		$varCargo = filter_input(INPUT_POST,'cargo');
		$varCorreo = filter_input(INPUT_POST,'email');
		$varUsuario = filter_input(INPUT_POST, 'usuario');
		$varPassword = filter_input(INPUT_POST,'pass');
		$varRol = $this->input->post('rol');



		$result = $this->usuarios_Model->insertUser($varUsuario,$varNombre,$varApellido,$varCargo,$varCorreo,md5($varPassword),$varRol);
		$msg['success'] = false;

		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}//end add_user

	//función para editar el usuario
	public function editUserAjax()
	{
		//$id = filter_input(INPUT_GET,'id_usuario');
		$result = $this->usuarios_Model->editUser();
		echo json_encode($result);
	}//end editUserAjax
	
	//función para actualizar los datos del usuario
	public function updateUserAjax()
	{
		$editId = filter_input(INPUT_POST,'id');
		$editUsuario = filter_input(INPUT_POST, 'editusuario');
		$editNombre = filter_input(INPUT_POST,'editnombre');
		$editApellido = filter_input(INPUT_POST,'editapellido');
		$editCargo = filter_input(INPUT_POST,'editcargo');
		$editCorreo = filter_input(INPUT_POST,'editemail');
		$editRol = $this->input->post('editrol');

		
		$result = $this->usuarios_Model->updateUser($editId,$editUsuario,$editNombre,$editApellido,$editCargo,$editCorreo,$editRol);
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	//mostrar usuarios
	public function showUsersAjax()
	{
		$user = $this->session->userdata('user');

		$result = $this->usuarios_Model->showUsers2($user);
		echo json_encode($result);
	}//fin showUserAjax

	//eliminar usuarios
	public function deleteUserAjax(){
		$id = $this->input->post('id');
		$result = $this->usuarios_Model->deleteUser($id);
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}//finde deleteUserAjax

	//función para cambiar el password de un usuario
	public function cambiar_pass(){
		$id = $this->input->post('id');
		$pass = $this->input->post('pass');

		$msg = $this->usuarios_Model->cambiarPass($id,md5($pass));
		echo json_encode($msg);
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////


}
