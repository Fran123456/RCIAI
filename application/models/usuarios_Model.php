
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class usuarios_Model extends CI_Model
{
    public function __construct()
    {

    }

	public function login($usuario, $password)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('password' , $password);


		$resultados = $this->db->get('usuarios');
		if ($resultados->num_rows()>0) {
			return $resultados->row();
		}
		else
		{
			return false;
		}
	}


	function getUser($id)
	{
	    $this->db->where('id_usuario', $id);
	    $resultado = $this->db->get('usuarios')->result();

        if(count($resultado) > 0){
             return $resultado;
        }
        else{
        	return false;
        }
	}

	function getUserByEmail($correo)
	{
		$this->db->where('correo', $correo);
	    $resultado = $this->db->get('usuarios')->result();

        if(count($resultado) > 0){
             return $resultado;
        }
        else{
        	return false;
        }
	}



	function update($datos){
		 $this->db->where('id_usuario', $datos['id']);
         $this->db->set('usuario', $datos['usuario']);
         $this->db->set('nombre', $datos['nombre']);
         $this->db->set('apellido', $datos['apellido']);
         $this->db->set('cargo', $datos['cargo']);
         $this->db->set('correo', $datos['correo']);
         $this->db->set('password', $datos['pass']);
         $this->db->set('rol', $datos['rol']);
         return $this->db->update('usuarios'); //si es con exito el update retornara 1
	}



   public function update_Password($password, $correo) //actualizamos contraseña
   {
     return $this->db->where('correo', $correo)->set('password', $password)->update('usuarios');
   }






//función para mostrar usuarios
	public function showUsers()
	{
		#$usuario=$this->session->userdata('usuario');#echo $usuario;
		//vamos a realizar la consulta para seleccionar todos los campos de la tabla usuario
		//$consulta=$this->db->where('usuario !=','root')->get('usuarios');
		$this->db->select('*');
		$this->db->from('usuarios');
		//$this->db->where('usuario !=',$usuario);
		$this->db->where('usuario !=','root');
		//$this->db->where('usuario !=',);
		$consulta = $this->db->get();
		if($consulta->num_rows() > 0){
			//si hay registro devolverlo
			return $consulta->result();
		}else{
			//si no hay registro devolver false
			return false;
		}
	}//end showUsers()

	//función para mostrar todos los usuarios excepto el root y el usuario con sesión abierta
	public function showUsers2($usuario)
	{
		#$usuario=$this->session->userdata('usuario');#echo $usuario;
		//vamos a realizar la consulta para seleccionar todos los campos de la tabla usuario
		//$consulta=$this->db->where('usuario !=','root')->get('usuarios');
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('usuario !=',$usuario);
		$this->db->where('usuario !=','root');
		//$this->db->where('usuario !=',);
		$consulta = $this->db->get();
		if($consulta->num_rows() > 0){
			//si hay registro devolverlo
			return $consulta->result();
		}else{
			//si no hay registro devolver false
			return false;
		}
	}//end showUsers()

	//función para insertar usuarios
	public function insertUser($varUsuario,$varNombre,$varApellido,$varCargo,$varCorreo,$varPassword,$varRol)
	{
		$data = array(
			'usuario' => $varUsuario,
			'nombre' => $varNombre,
			'apellido' => $varApellido,
			'cargo' => $varCargo,
			'correo' => $varCorreo,
			'password' => $varPassword,
			'rol' => $varRol

		);
			
		
		$this->db->where('usuario', $varUsuario);
		$resultados = $this->db->get('usuarios');
		if ($resultados->num_rows()>0) {
			return false;
		}
		else
		{
			$this->db->insert('usuarios',$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}	
	}//end insertUser()

	//editar los usuarios
	public function editUser()
	{
		$id = $this->input->post('id');
		//$id=1;
		//obtenemos los datos del usuario con el id
		$this->db->where('id_usuario',$id);
		$result = $this->db->get('usuarios');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}//end editUser	

	//actualizar usuarios
	public function updateUser($editId,$editUsuario,$editNombre,$editApellido,$editCargo,$editCorreo,$editRol){
		//$id = $this->input->post('id');

		$datos = array(
			'usuario' => $editUsuario,
			'nombre' => $editNombre,
			'apellido' => $editApellido,
			'cargo' => $editCargo,
			'correo' => $editCorreo,
			'rol' => $editRol
		);

		$this->db->where('id_usuario',$editId);
		$this->db->where('usuario',$editUsuario);
		$result = $this->db->get('usuarios');

		//verificamos si el correo pertenece al mismo id
		if($result->num_rows() > 0){
			$this->db->where('id_usuario',$editId);
			$this->db->update('usuarios',$datos);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}else{
			$this->db->where('usuario',$editUsuario);
			$query = $this->db->get('usuarios');
			if($query->num_rows()>0){
				return false;
			}else{
				$this->db->where('id_usuario',$editId);
				$this->db->update('usuarios',$datos);
				if($this->db->affected_rows() > 0){
					return true;
				}else{
					return false;
				}
			}
		}
		
	}//fin de updateUser

	//función para eliminar un usuario
	public function deleteUser($id){
		$this->db->where('id_usuario',$id);
		$this->db->delete('usuarios');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}// fin función deleteUser

	//esta función cambiar la contraseña de un usuario
	public function cambiarPass($id,$pass){
		$this->db->set('password',$pass);
		$this->db->where('id_usuario',$id);
		$this->db->update('usuarios');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}//fin de cambiarPass






}


