<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class MovimientosModel extends CI_Model
{

	#funcion para trae la consulta de la tabla movimiento
	#donde tipo_movimiento es Asignacion-bodega
	public function getAsignacion()
	{
		#hacemos la consulta
		$this->db->select('id_cambio,fecha_cambio,codigo_id,cambio');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Asignacion-bodega');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}
}
