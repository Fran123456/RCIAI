<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reporte10_Model extends CI_Model
{
	public function reporte_10($unidad, $fecha_inicio, $fecha_fin)
	{
		$this->db->select('*');
		$this->db->from('movimiento AS mov');
		$this->db->where('mov.fecha_cambio >=',$fecha_inicio);
		$this->db->where('mov.fecha_cambio <=',$fecha_fin);
		$this->db->group_start();
			$this->db->where('mov.destino_nuevoEquipo_id',$unidad);
			$this->db->or_where('mov.unidad_pertenece_id',$unidad);
		$this->db->group_end();
				$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	public function nom_unidad($unidad)
	{
		$query = $this->db->select('u.unidad')->from('unidad as u')->where('u.id_unidad',$unidad)->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}
}
