<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reporte12_Model extends CI_Model
{
	
	#función para hacer la consulta por unidad el parametro es el nombre de la unidad o laboratorio
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
###########################################################################################################################################
	#función para obtener los perifericos
	public function perifericos($identificador)
	{
		$query = $this->db->select('bod.tipo')->from('inventario_bodega AS bod')->where('bod.pc_servidor_id',$identificador)->where('bod.tipo !=','LAPTOP')->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}
###########################################################################################################################################
	#función para obtener el nombre de la unidad a la que se le hace la consulta el parametro es el nombre del encargado
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
	/* consulta en sql 
			SELECT
			    adm.identificador, adm.encargado_puesto,alm.capacidad, descri.memoria_fisica,base.procesador
			FROM
			    inventario_adm AS adm
			INNER JOIN almacenamiento AS alm
			ON
			    adm.almacenamiento_id = alm.pc_id
			INNER JOIN placa_base AS base
			ON
			    adm.placa_base_id = base.pc_id
			INNER JOIN descripcion_sistema AS descri
			ON
			    adm.des_sistema_id = descri.pc_ids
			WHERE
			    `encargado_puesto` = $encargado AND (adm.identificador LIKE 'PC%' OR adm.identificador LIKE 'LAP%')
	*/
	public function consulta_encargado($parametro)
	{
		$this->db->select("adm.identificador, adm.encargado_puesto, alm.capacidad, descri.memoria_fisica, base.procesador");
		$this->db->from("inventario_adm AS adm");
		$this->db->join("almacenamiento AS alm","adm.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","adm.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'adm.des_sistema_id = descri.pc_ids');
		$this->db->where("adm.encargado_puesto",$parametro);
		$this->db->group_start();
			$this->db->like('adm.identificador','PC');
			$this->db->or_like('adm.identificador','LAP');
		$this->db->group_end();
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

###############################################################################################################
	#funciones para obtener el detalle por codigo de equipo, el parametro es el codigo de la pc

	//función para obtener detalle de inventario adm
	public function consulta_codigoAdm($codigo)
	{
		$this->db->select("adm.identificador, adm.encargado_puesto, alm.capacidad, descri.memoria_fisica, base.procesador");
		$this->db->from("inventario_adm AS adm");
		$this->db->join("almacenamiento AS alm","adm.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","adm.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'adm.des_sistema_id = descri.pc_ids');
		$this->db->where("adm.identificador",$codigo);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//función para obtener detalle de inventario lab
	public function consulta_codigoLab($codigo)
	{
		$this->db->select("lab.identificador_lab, alm.capacidad, descri.memoria_fisica,base.procesador");
		$this->db->from("inventario_lab AS lab");
		$this->db->join("almacenamiento AS alm","lab.almacenamiento_id = alm.pc_id");
		$this->db->join("placa_base AS base","lab.placa_base_id = base.pc_id");
		$this->db->join("descripcion_sistema AS descri",'lab.descripcion_sistema_id = descri.pc_ids');
		$this->db->where("lab.identificador_lab",$codigo);
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
