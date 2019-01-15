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
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//función para obtener el destino de las ventas
	/*public function obtener_destino($factura)
	{
		echo $factura;
		$c="SELECT u.unidad FROM unidad AS u INNER JOIN compra_unidad AS cu ON cu.unidad_id = u.id_unidad WHERE cu.compra_id = (SELECT c.id_compra FROM compras AS c WHERE c.n_factura = $factura)";
		$query = $this->db->query($c);
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}*/
}
