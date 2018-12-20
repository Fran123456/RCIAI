<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Consultas_Model extends CI_Model
{
	//función para verificar si el codigo pertenece a un equipo en bodega
	public function verificar($codigo,$campo,$tabla)
	{
		$this->db->select($campo);
		$this->db->from($tabla);
		$this->db->where($campo,$codigo);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//función que realiza la consulta para obtener el detalle de los equipos de laboratorio o de administrativo
	public function detalle_equipo($codigo,$id_campo,$tabla,$descripcion)
	{
		$this->db->select("inv.*, desc.*, placa.*, red.*, video.*, alm.*");
		$this->db->from("$tabla inv");
		$this->db->join("descripcion_sistema desc","desc.pc_ids=inv.$descripcion");
		$this->db->join('placa_base placa','placa.pc_id=inv.placa_base_id');
		$this->db->join('adaptador_red red','red.pc_id=inv.adaptador_red_id');
		$this->db->join('adaptador_video video','video.pc_id=inv.adaptador_video_id');
		$this->db->join('almacenamiento alm','alm.pc_id=inv.almacenamiento_id');
		$this->db->where($id_campo,$codigo);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//función para obtener los perifericos de un equipo
	public function get_perifericos($id)
	{
		$this->db->select('bod.*');
		$this->db->from('inventario_bodega bod');
		$this->db->where('bod.pc_servidor_id',$id);
		$query=$this->db->get();

		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}
}
