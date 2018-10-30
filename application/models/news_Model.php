<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class news_Model extends CI_Model
{
    public function __construct()
    {


    }


	function add($data){ //agrega un anuncio
			$this->db->insert('notificacion',$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}
    
    function add_($data){ //agrega la relacion entre el anuncio y el usuario que lo realizo
			$this->db->insert('notificacion_usuario',$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}


	public function show_Message(){
        $this->db->select('notificacion.titulo, notificacion.mensaje, notificacion_usuario.estado, usuarios.nombre', 'notificacion.fecha');
		$this->db->from('notificacion');
		$this->db->join('notificacion_usuario', 'notificacion.id = notificacion_usuario.notificacion_id');
		$this->db->join('usuarios','notificacion.usuario_id = usuarios.id_usuario' );
		$this->db->where('notificacion_usuario.estado', 'sin leer');
        $this->db->where('usuarios.id_usuario !=', $this->session->userdata('id'));
        $this->db->order_by('notificacion_usuario.id', 'DESC');
		$query = $this->db->get()->result();
		return $query;
		/* SELECT notificacion.titulo, notificacion.mensaje, notificacion_usuario.estado, usuarios.nombre
		FROM (notificacion INNER JOIN notificacion_usuario ON notificacion.id=notificacion_usuario.noticia_id)
		INNER JOIN usuarios on notificacion.usuario_id = usuarios.id_usuario WHERE notificacion_usuario.estado = 'sin leer'
		and NOT usuarios.id_usuario = 1 */
	}

	public function show_Message_Read()
	{
		$this->db->select('notificacion.id , notificacion.titulo, notificacion.fecha , usuarios.nombre, usuarios.apellido');
		$this->db->from('notificacion');
		$this->db->join('notificacion_usuario', 'notificacion.id = notificacion_usuario.notificacion_id');
		$this->db->join('usuarios','notificacion.usuario_id = usuarios.id_usuario' );
		$this->db->where('notificacion_usuario.estado', 'leido');
        $this->db->where('usuarios.id_usuario !=', $this->session->userdata('id'));
        $this->db->order_by('notificacion_usuario.id', 'DESC');
		$query = $this->db->get()->result();
		return $query;
	}

	public function Message($id)
	{
		 $query = "SELECT notificacion.*, usuarios.nombre, usuarios.apellido FROM notificacion, usuarios WHERE notificacion.id = '".$id."' AND notificacion.usuario_id = usuarios.id_usuario";
		  $resultado = $this->db->query($query)->result();
		 return $resultado;
	}

	function update_($datos){ //actualizamos la tabla notificacion_usuarios
		 $this->db->where('notificacion_id', $datos['id']);
         $this->db->set('estado', $datos['estado']);
          $this->db->update('notificacion_usuario'); //si es con exito el update retornara 1
         
	}

}
