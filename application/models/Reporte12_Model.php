<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reporte12_Model extends CI_Model
{
	
	#función para hacer la consulta por unidad
	public function consulta_adm($parametro)
	{
		$this->db->select("adm.identificador, alm.capacidad, descri.memoria_fisica,base.procesador");
		$this->db->from("inventario_adm AS adm");
		$this->db->join("almacenamiento AS alm","adm.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","adm.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'adm.des_sistema_id = descri.pc_ids');
		$this->db->like('adm.identificador','PC');
		$this->db->where("adm.destino",$parametro);
		$this->db->order_by('adm.identificador','ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	public function consulta_lab($parametro)
	{
		$this->db->select("lab.identificador_lab, alm.capacidad, descri.memoria_fisica,base.procesador");
		$this->db->from("inventario_lab AS lab");
		$this->db->join("almacenamiento AS alm","lab.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","lab.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'lab.descripcion_sistema_id = descri.pc_ids');
		$this->db->like('lab.identificador_lab','LAB');
		$this->db->where("lab.lab",$parametro);
		$this->db->order_by('lab.identificador_lab','ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	#función para obtener los perifericos
	public function perifericos($identificador)
	{
		$query = $this->db->select('bod.tipo')->from('inventario_bodega AS bod')->where('bod.pc_servidor_id',$identificador)->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	#función para obtener el nombre de la unidad a la que se le hace la consulta
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

	#función para hacer la consulta por encargado
	public function consulta_encargado($parametro)
	{
		$this->db->select("adm.identificador, alm.capacidad, descri.memoria_fisica,base.procesador");
		$this->db->from("inventario_adm AS adm");
		$this->db->join("almacenamiento AS alm","adm.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","adm.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'adm.des_sistema_id = descri.pc_ids');
		$this->db->like('adm.identificador','PC');
		$this->db->where("adm.encargado_puesto",$parametro);
		$this->db->order_by('adm.identificador','ASC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}
}
