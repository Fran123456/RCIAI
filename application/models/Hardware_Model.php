<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hardware_Model extends CI_Model
{
    public function __construct()
    {
      /*SELECT notificacion.titulo, notificacion.mensaje, notificacion_usuario.estado, usuarios.nombre
      FROM (notificacion INNER JOIN notificacion_usuario ON notificacion.id=notificacion_usuario.noticia_id)
      INNER JOIN usuarios on notificacion.usuario_id = usuarios.id_usuario WHERE notificacion_usuario.estado = 'sin leer'
      and NOT usuarios.id_usuario = 1 */
    }

    public function get_($table){
      $data = $this->db->get($table)->result_array();
      return $data;
      
    }





}
