<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reporte8_Model extends CI_Model
{
    public function __construct()
    {
      
    }

    public function join_like(){
        $this->db->select('*');
		$this->db->from('movimiento');
		$this->db->join('unidad', 'unidad.id_unidad = movimiento.unidad_pertenece_id');
		$query = $this->db->get()->result_array();
		return $query;

    }

}
