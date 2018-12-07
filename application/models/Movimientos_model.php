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


  	//////////////////////////////// función para el prestamo ////////////////////////
  	//listar los movimiento de prestamo
  	public function getPrestamos()
  	{
  		#hacemos la consulta
		$this->db->select('id_cambio,fecha_cambio,codigo_id,cambio');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Prestamo');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
  	}

  	//obtenemos el detalle del prestamo
  	public function getDetallePres($id)
  	{
  		#hacemos la consulta de los datos
		$this->db->select('*');
		$this->db->from('movimiento');
		$this->db->where('tipo_movimiento','Prestamo');
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

  	#esta función se encarga de verificar si el codigo existe en el inventario administrativo

  	public function verificarAdmin($codigo)
  	{
  		$this->db->select('a.identificador');
  		$this->db->from('inventario_adm a');
  		$this->db->where('identificador',$codigo);
  		$valor = $this->db->get();
  		return $valor->result();
  	}

  	//esta función se encarga de verificar si el codigo existe en el inventario de laboratorio
  	public function verificarLab($codigo)
  	{
  		$this->db->select('l.identificador_lab');
  		$this->db->from('inventario_lab l');
  		$this->db->where('identificador_lab',$codigo);
  		$valor = $this->db->get();
  		return $valor->result();
  	}

  	//función que obtiene los equipos de el laboratorio seleccionado
  	public function obtener_equipo($laboratorio)
  	{
  		$this->db->select('identificador_lab');
  		$this->db->from('inventario_lab');
  		$this->db->like('identificador_lab',$laboratorio);
  		$query = $this->db->get();
  		return $query->result();
  	}

  	//función para verificar si el periferico seleccionado es del equipo solicitado
  	public function verificar_periferico($equipo,$periferico)
  	{
  		$this->db->select('tipo');
  		$this->db->from('inventario_bodega');
  		$this->db->where('tipo',$periferico);
  		$this->db->where('pc_servidor_id',$equipo);
  		$query = $this->db->get();
  		return $query->result();
  	}

  	//vamos a obtener el origen del codigo
  	public function origen_Codigo($codigo)
  	{
  		$this->db->select('destino');
  		$this->db->from('inventario_adm');
  		$this->db->where('identificador',$codigo);
  		$query = $this->db->get();
  		return $query->row();
  	}

  	//función para insertar los datos y crear un nuevo registro en la tabla de movimiento
  	public function crear_prestamo($datos)
  	{
  		$this->db->insert('movimiento',$datos);
  		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
  	}

  	//función para actualizar los campos en la tabla: inventario_bodega
  	public function actualizar_bodega($codigo, $perifericos, $equipo, $unidad_pertenece_id, $origen_nuevoEquipo_id, $fecha_prestamo)
  	{
  		$this->db->set('estatus','Prestado');
  		$this->db->set('pc_servidor_antiguo_id',$equipo);
  		$this->db->set('pc_servidor_id',$codigo);
  		$this->db->set('origen',$origen_nuevoEquipo_id);
  		$this->db->set('destino',$unidad_pertenece_id);
  		$this->db->set('fecha_salida',$fecha_prestamo);
  		$this->db->where('pc_servidor_id',$equipo);
  		$this->db->where('tipo',$perifericos);
  		$this->db->update('inventario_bodega');
  		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
  	}

  	//función para obtener la serial del equipo a prestar
  	public function serial_periferico($equipo,$perifericos)
  	{
  		$this->db->select('serial');
  		$this->db->from('inventario_bodega');
  		$this->db->where('tipo',$perifericos);
  		$this->db->where('pc_servidor_id',$equipo);
  		$query = $this->db->get();
  		return $query->row();
  	}

  	//función para obtener el serial del equipo que será sustituido
  	public function serial_equipo_sustituido($codigo,$perifericos)
  	{
  		$this->db->select('serial');
  		$this->db->from('inventario_bodega');
  		$this->db->where('tipo',$perifericos);
  		$this->db->where('pc_servidor_id',$codigo);
  		$query = $this->db->get();
  		return $query->row();
  	}

  	//función para obtener el origen y destino del equipo que es sustituido
  	public function origen_destino($serial_sustituido,$O_D)
  	{
  		$this->db->select($O_D);
  		$this->db->from('inventario_bodega');
  		$this->db->where('serial',$serial_sustituido);
  		$query = $this->db->get();
  		return $query->row();
  	}

  	//función para actualizar periferico que es sustituido
  	public function actualizarPeriferico($origenP,$destinoP,$fecha_prestamo,$codigo,$estado,$serial_sustituido)
  	{
  		$this->db->set('origen',$destinoP);
  		$this->db->set('destino',$origenP);
  		$this->db->set('pc_servidor_id',null);
  		$this->db->set('pc_servidor_antiguo_id',$codigo);
  		$this->db->set('estatus',$estado);
  		$this->db->set('fecha_salida',$fecha_prestamo);
  		$this->db->where('serial',$serial_sustituido);
  		$this->db->update('inventario_bodega');
  		if($this->db->affected_rows() > 0){
			return true;
			}else{
				return false;
			}
  	}

  	//función para tener la descripción del equipo retirado
  	public function descripcionEquipoRetirado($serial_sustituido)
  	{
  		$this->db->select('serial,marca,tipo');
  		$this->db->from('inventario_bodega');
  		$this->db->where('serial',$serial_sustituido);
  		$query = $this->db->get();
  		return $query->row();
  	}

}//fin de la clase
