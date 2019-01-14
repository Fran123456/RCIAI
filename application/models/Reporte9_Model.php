<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reporte9_Model extends CI_Model
{
	//función para hacer la consulta para el reporte anual
	public function reporte_anual($anio)
	{
		$this->db->select('com.n_factura,com.detalle,bod.destino,com.fecha_compra,com.total');
		$this->db->from('compras AS com');
		$this->db->join('inventario_bodega AS bod','bod.compra_id = com.id_compra');
		$this->db->where('bod.origen','4');
		$this->db->where('com.fecha_compra >=',"$anio-01-01");
		$this->db->where('com.fecha_compra <=',"$anio-12-31");
		$this->db->group_by('com.total');
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
