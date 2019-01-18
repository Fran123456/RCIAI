<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reporte9_Model extends CI_Model
{
	//función para hacer la consulta para el reporte anual
	public function reporte($fecha_inicio,$fecha_fin)
	{
		$this->db->select('com.id_compra,com.n_factura,com.tipo,com.fecha_compra,com.total');
		$this->db->from('compras AS com');
		$this->db->where('com.fecha_compra >=',$fecha_inicio);
		$this->db->where('com.fecha_compra <=',$fecha_fin);
		$this->db->group_by('com.n_factura');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//función para obtener el destino de las ventas
	public function obtener_destino($id_factura)
	{
		$query=$this->db->select('u.unidad')
		->from('unidad AS u')
		->join('compra_unidad AS cu','cu.unidad_id = u.id_unidad')
		->where('cu.compra_id',$id_factura)
		->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}
}
