<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class dashboard_Model extends CI_Model
{
    public function __construct()
    {
      /*SELECT notificacion.titulo, notificacion.mensaje, notificacion_usuario.estado, usuarios.nombre
      FROM (notificacion INNER JOIN notificacion_usuario ON notificacion.id=notificacion_usuario.noticia_id)
      INNER JOIN usuarios on notificacion.usuario_id = usuarios.id_usuario WHERE notificacion_usuario.estado = 'sin leer'
      and NOT usuarios.id_usuario = 1 */
    }

	  public function show_join($id){
      $this->db->select('notificacion.id ,notificacion.titulo, notificacion.mensaje, notificacion_usuario.estado, usuarios.nombre, notificacion.fecha');
  		$this->db->from('notificacion');
  		$this->db->join('notificacion_usuario', 'notificacion.id = notificacion_usuario.notificacion_id');
  		$this->db->join('usuarios','notificacion.usuario_id = usuarios.id_usuario' );
  		$this->db->where('notificacion_usuario.estado', 'sin leer');
      $this->db->where('usuarios.id_usuario !=', $id);
      $this->db->where('notificacion_usuario.estado', 'sin leer');
      $this->db->order_by('notificacion_usuario.id', 'DESC');
  		$query = $this->db->get()->result();
  		return $query;
   	}

    #numero de elementos en bodega
    public function n_bodega(){

        $this->db->select('serial')->from('inventario_bodega');
        return $this->db->count_all_results();
    }

    #numero de elementos en administrativo
    public function n_admin(){

        $this->db->select('id_admin')->from('inventario_adm');
        return $this->db->count_all_results();
    }

     #numero de elementos en compra
    public function n_compra(){
        $this->db->select('id_compra')->from('compras');
        return $this->db->count_all_results();
    }

     #numero de elementos en laboratorio
    public function n_labo(){
        $this->db->select('id_lab')->from('inventario_lab');
        return $this->db->count_all_results();
    }

     #numero de elementos en laboratorio
     #UTLIZAR LIKE PARA OBTENER LOS VALORES
    public function n_pc_Admin(){
      $res = $this->db->query("SELECT * FROM inventario_adm WHERE identificador LIKE 'PC%';")->result_array();
      $res = count($res);
      return $res;
    }

    public function n_disco_Admin(){
      $res = $this->db->query("SELECT * FROM inventario_adm WHERE identificador LIKE 'DDE%';")->result_array();
      $res = count($res);
      return $res;
    }

    public function n_laptop_Admin(){
      $res = $this->db->query("SELECT * FROM inventario_adm WHERE identificador LIKE 'LAP%';")->result_array();
      $res = count($res);
      return $res;
    }

   
    public function n_bodega_elements(){
      $elements = array(
       0 => 'MONITOR',
       1 => 'TECLADO',
       2 => 'MOUSE',
       3 => 'CPU',
       4 => 'AUDIFONOS',
       5 => 'IMPRESORES-MULTIFUNCIONALES',
       6 => 'IMPRESOR-DESJEKT',
       7 => 'SCANNER',
       8 => 'LECTOR-PARA-MEMORIA-SD',
       9 => 'PARLANTES',
       10 => 'UPS',
       11 => 'LECTOR-PARA-MEMORIA-SD',
       12 => 'MEMORIA-SD',
       13 => 'PROYECTOR',
       14 => 'FAX',
       15 => 'PARLANTES',
       16 => 'MICROFONO',
      );

      $total = array();

      for ($i=0; $i <count($elements) ; $i++) { 
        $this->db->select('serial')->where('tipo', $elements[$i])->from('inventario_bodega');
        $total[$i] =  $this->db->count_all_results();
      }

      $res = array(
        'elementos' => $elements,
        'total' => $total,
      );
      return $res;
    }


}
