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
  	public function actualizarPeriferico($origenP,$destinoP,$fecha_prestamo,$codigo,$estado,$serial_sustituido,$servidor_id)
  	{
  		$this->db->set('origen',$destinoP);
  		$this->db->set('destino',$origenP);
  		$this->db->set('pc_servidor_id',$servidor_id);
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


  	//función para obtener el detalle de los campos de la tabla establecida
  	//como parametros recibe el $pc_id, $tabla, $comparar
  	//para las tablas adaptador_red, adaptador_video, almacenamiento, descripcion_sistema, placa_base
  	public function get_detalles($tabla,$comparar,$pc_id)
  	{
  		$this->db->select('*');
  		$this->db->from($tabla);
  		$this->db->where($comparar,$pc_id);
  		$query = $this->db->get();
  		return $query->row();
  	}

  	//función para obtener los detalles de las compras
  	public function get_compra($id)
  	{
  		$this->db->select('b.compra_id');
  		$this->db->from('inventario_bodega as b');
  		$this->db->where('b.pc_servidor_id',$id);
  		$this->db->where('b.tipo','CPU');
  		$query = $this->db->get();
  		return $query->row();
  	}

    #función para actualizar a null los campos de las tablas inventarios adm o lab
    public function actualizar_null($tabla,$descripion,$identificador,$id)
    {
      $this->db->set($descripion,NULL);
      $this->db->set('placa_base_id',NULL);
      $this->db->set('adaptador_red_id',NULL);
      $this->db->set('adaptador_video_id',NULL);
      $this->db->set('almacenamiento_id',NULL);
      $this->db->where($identificador,$id);
      $this->db->update($tabla);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    #función para actualizar el id de cada tabla
    public function actualizar_tablas($tabla,$campo,$codigo,$nuevo_id)
    {
      $this->db->set($campo,$nuevo_id);
      $this->db->where($campo,$codigo);
      $this->db->update($tabla);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    #función para actualizar los inventarios
    public function actualizar_inv($tabla,$descripcion,$identificador,$id)
    {
      $this->db->set($descripcion,$id);
      $this->db->set('placa_base_id',$id);
      $this->db->set('adaptador_red_id',$id);
      $this->db->set('adaptador_video_id',$id);
      $this->db->set('almacenamiento_id',$id);
      $this->db->where($identificador,$id);
      $this->db->update($tabla);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    ######################################################################################################
    #funciones para insertar
    public function insertar_red($datos)
    {
      //arreglo para insertar los datos
      $data = array(
        'pc_id' => $datos->pc_id ,
        'adaptador_1' => $datos->adaptador_1,
        'tipo_adaptador' => $datos->tipo_adaptador,
        'direccion_ip' => $datos->direccion_ip,
        'subred_ip' => $datos->subred_ip,
        'gateway' => $datos->gateway,
        'servidor_primario' => $datos->servidor_primario,
        'servidor_dns' => $datos->servidor_dns,
        'servidor_dhcp' => $datos->servidor_dhcp,
        'direccion_mac' => $datos->direccion_mac,
        'tarjeta_extra' => $datos->tarjeta_extra );

      $this->db->insert('adaptador_red',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    //función para insertar en l tabla video
    public function insertar_video($datos)
    {
      $data = array(
        'pc_id' => $datos->pc_id,
        'monitor_marca' => $datos->monitor_marca,
        'tipo' => $datos->tipo,
        'modelo' => $datos->modelo,
        'serie' => $datos->serie,
        'adaptador1' => $datos->adaptador1,
        'adaptador_ram' => $datos->adaptador_ram,
        'tipo_dac' => $datos->tipo_dac,
        'monitor_pc1' => $datos->monitor_pc1,
        'resolucion_video' => $datos->resolucion_video,
        'velocidad' => $datos->velocidad );

      $this->db->insert('adaptador_video',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    //función para insertar en la tabla almacenamiento
    public function insertar_alma($datos)
    {
      $data = array(
        'pc_id' => $datos->pc_id,
        'disco_fisico1' => $datos->disco_fisico1,
        'capacidad' => $datos->capacidad,
        'marca_disco' => $datos->marca_disco,
        'dvd1' => $datos->dvd1,
        'disco_logico' => $datos->disco_logico,
        'sistema_archivos' => $datos->sistema_archivos,
        'tamaño' => $datos->tamaño,
        'espacio_libre' => $datos->espacio_libre,
        'letra_unidad' => $datos->letra_unidad );

      $this->db->insert('almacenamiento',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    //funcion para insertar la descripcion del sistema
    public function insertar_desc($datos)
    {
      $data = array(
        'pc_ids' => $datos->pc_ids,
        'nombre' => $datos->nombre,
        'fabricante' => $datos->fabricante,
        'sistema_operativo' => $datos->sistema_operativo,
        'nucleo' => $datos->nucleo,
        'paquete_servicio' => $datos->paquete_servicio,
        'version' => $datos->version,
        'usuario_registrado' => $datos->usuario_registrado,
        'memoria_fisica' => $datos->memoria_fisica,
        'dominio' => $datos->dominio,
        'modelo' => $datos->modelo,
        'serie_des' => $datos->serie_des,
        'organizacion' => $datos->organizacion,
        'idioma' => $datos->idioma,
        'zona_horaria' => $datos->zona_horaria,
        'usuario_sesion' => $datos->usuario_sesion,
        'version_DirectX' => $datos->version_DirectX,
        'caja_sistema' => $datos->caja_sistema);

      $this->db->insert('descripcion_sistema',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    //funcion insertar placa_base
    public function insertar_placa($datos)
    {
      $data = array(
        'pc_id' => $datos->pc_id,
        'procesador' => $datos->procesador,
        'velocidad_reloj' => $datos->velocidad_reloj,
        'fabricante_procesador' => $datos->fabricante_procesador,
        'etiqueta_BIOS' => $datos->etiqueta_BIOS,
        'fabricante_BIOS' => $datos->fabricante_BIOS,
        'version_BIOS' => $datos->version_BIOS,
        'num_serie_BIOS' => $datos->num_serie_BIOS,
        'fecha_instalacion_BIOS' => $datos->fecha_instalacion_BIOS,
        'fabricante_placa' => $datos->fabricante_placa,
        'modelo_placa' => $datos->modelo_placa,
        'version_placa' => $datos->version_placa,
        'marca_ram' => $datos->marca_ram,
        'ranura_memoria' => $datos->ranura_memoria,
        'ranura_sistema_0' => $datos->ranura_sistema_0,
        'ranura_sistema_1' => $datos->ranura_sistema_1,
        'ranura_sistema_2' => $datos->ranura_sistema_2,
        'ranura_sistema_3' => $datos->ranura_sistema_3,
        'ranura_sistema_4' => $datos->ranura_sistema_4 );

      $this->db->insert('placa_base',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    #función para obtener el sw de un equipo de lab
    public function sw_lab($id)
    {
    	$this->db->select('*');
    	$this->db->from('software AS s');
    	$this->db->where('s.PC_lab_id',$id);
    	$query = $this->db->get();

			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result_array();
			}else{
				//si no hay registros, devolvemos un false
				return false;
	    }
	  }

	  #funcion para obtener el sw de un equipo de adm
	  public function sw_adm($id)
	  {
	  	$this->db->select('*');
    	$this->db->from('software AS s');
    	$this->db->where('s.pc_id',$id);
    	$query = $this->db->get();

			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result_array();
			}else{
				//si no hay registros, devolvemos un false
				return false;
	    }
	  }

	  #función para actualizar el sw del equipo que recibe por un codigo generico
	  public function actualizar_sw($id,$codigo_aleatorio1)
	  {
	  	$this->db->set('pc_id',null);
	  	$this->db->set('bodega_id',$codigo_aleatorio1);
	  	$this->db->where('id',$id);
	  	$this->db->update('software');
	  }

	  //actualizamos el codigo del equipo que se presta, por el codigo del equipo a prestar
	  public function up_swLab($id,$codigo)
	  {
	  	$this->db->set('pc_id',$codigo);
	  	$this->db->set('PC_lab_id',NULL);
	  	$this->db->where('id',$id);
	  	$this->db->update('software');
	  }

	  #función para actualizar el sw del equipo que recibe el prestamo(si es de administrativo) con el sw del equipo que presta
	  public function update_swAdm($software,$pc_id)
	  {
	  	$this->db->set('nombre',$software[0]->nombre);
	  	$this->db->set('version',$software[0]->version);
	  	$this->db->where('pc_id',$pc_id);
	  	$this->db->update('software');
	  	if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
	  }

	  #funcion para actualizar el sw del equipo que recibe 
	  public function update_swLab($software,$PC_lab_id)
	  {
	  	$this->db->set('nombre',$software->nombre);
	  	$this->db->set('empresa',$software->empresa);
	  	$this->db->set('nom_carpeta',$software->nom_carpeta);
	  	$this->db->set('version',$software->version);
	  	$this->db->set('nom_archivo',$software->nom_archivo);
	  	$this->db->where('PC_lab_id',$PC_lab_id);
	  	$this->db->update('software');
	  	if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
	  }

	  #función para insertar sw nuevo para adm
	  public function add_swAdm($pc_id,$software)
	  {
	  	$datos = array(
	  		'pc_id' =>$pc_id,
	  		'nombre' =>$software->nombre ,
	  		'version' =>$software->version);

	  	$this->db->insert('software',$datos);
	  	if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
	  }

	   #función para insertar sw nuevo para lab
	  public function add_swLab($PC_lab_id,$software)
	  {
	  	$datos = array(
	  		'PC_lab_id' =>$PC_lab_id,
	  		'nombre' =>$software->nombre ,
	  		'empresa' =>$software->empresa,
	  		'nom_carpeta' =>$software->nom_carpeta,
	  		'version' =>$software->version,
	  		'nom_archivo' =>$software->nom_archivo);

	  	$this->db->insert('software',$datos);
	  	if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
	  }

}//fin de la clase
