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

	//función para obtener el sw
	public function adm_software($id)
	{
		$this->db->select('nombre,version');
		$this->db->from('software');
		$this->db->where('pc_id',$id);
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

	//funcion para obtener el sw del lab
	public function lab_software($id)
	{
		$this->db->select('*');
		$this->db->from('software');
		$this->db->where('PC_lab_id',$id);
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

	//función que obtiene la consulta del inventario administrativo
	public function get_detalle_administrativo($unidad)
	{
		$this->db->select('adm.identificador, alm.capacidad, descri.memoria_fisica, base.velocidad_reloj, base.fabricante_placa, base.modelo_placa, base.version_placa, bod.nombre, adm.encargado_puesto');
		$this->db->from('inventario_adm AS adm');
		$this->db->join('almacenamiento AS alm','adm.almacenamiento_id = alm.pc_id');
		$this->db->join('descripcion_sistema AS descri','adm.des_sistema_id = descri.pc_ids');
		$this->db->join('placa_base AS base','adm.placa_base_id = base.pc_id');
		$this->db->join('inventario_bodega AS bod','adm.identificador = bod.pc_servidor_id');
		$this->db->where('adm.destino',$unidad);
		$this->db->where('bod.tipo','MONITOR');
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

	//función que obtiene la consulta del inventario laboratorio
	public function get_detalle_lab($unidad)
	{
		$this->db->select('lab.identificador_lab, alm.capacidad, descri.memoria_fisica, base.velocidad_reloj, base.fabricante_placa, base.modelo_placa, base.version_placa, bod.nombre');
		$this->db->from('inventario_lab AS lab');
		$this->db->join('almacenamiento AS alm','lab.almacenamiento_id = alm.pc_id');
		$this->db->join('descripcion_sistema AS descri','lab.descripcion_sistema_id = descri.pc_ids');
		$this->db->join('placa_base AS base','lab.placa_base_id = base.pc_id');
		$this->db->join('inventario_bodega AS bod','lab.identificador_lab = bod.pc_servidor_id');
		$this->db->where('lab.lab',$unidad);
		$this->db->where('bod.tipo','MONITOR');
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

	//función para obtener el registro de una sola factura
	public function get_factura($factura)
	{
		#vamos a obtener la fecha de compra, numero de factura, costo, detalle de la factura
		$this->db->select('fecha_compra, n_factura, total, detalle');
		$this->db->from('compras');
		$this->db->where('n_factura',$factura);
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
