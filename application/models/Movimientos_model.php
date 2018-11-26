<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Movimientos_model extends CI_Model
{

	/////////////// consulta para mostrar los listados en las tablas //////////////////////////////


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
	}//fin de getAsignacion

	public function getSustitucion()
	{
		#hacemos la consulta
		$this->db->select('id_cambio,fecha_cambio,codigo_id,cambio');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Sustitucion-bodega');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}

	//////////////////////////    detalles de los movimientos    //////////////////////////////////// 

	#función que nos trae la consulta de los campos asociados a un movimiento por medio de su id_Cambio
	public function getDetalleAsig($id)
	{
		#hacemos la consulta de los datos
		$this->db->select('*');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Asignacion-bodega');
		$this->db->where('id_cambio',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}// fin de getDetalleAsig($id)


	//obtenemos los origenes y destinos de la tabla 
	  public function getOrigen_destino($unidad){
	    $this->db->select('u. unidad');
	    $this->db->from('unidad u');
	    $this->db->where('id_unidad',$unidad);
	    $result=$this->db->get();

	    if($result->num_rows() > 0){
	      return $result->result_array();
	    }else{
	      return false;
	    }
  	}#fin de getOrigen

  	public function getDetalleSus($id)
  	{
  		#hacemos la consulta de los datos
		$this->db->select('*');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Sustitucion-bodega');
		$this->db->where('id_cambio',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
  	}

}//fin de la clase
