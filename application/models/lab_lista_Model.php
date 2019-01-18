<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class lab_lista_Model extends CI_Model{
	//función que nos traera TODOS los equipos de cierto Laboratorio
	public function getEquipos($lab){
		$this->db->select('lab.*');
		$this->db->from('inventario_lab lab');
		$this->db->where('lab',$lab);
		$query = $this->db->get();

		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros devolvemos false
			return false;
		}
		
	}//fin de getEquipos

	//función que nos trae los registros de un equipo en concreto
	public function detalleEquipo($id){
		//vamos a traer los datos de la tabla inventario_lab de un equipo especifico
		$this->db->select('lab.*, desc.*, placa.*, red.*, video.*, alm.*');
		$this->db->from('inventario_lab lab');
		$this->db->join('descripcion_sistema desc','desc.pc_ids=lab.descripcion_sistema_id');
		$this->db->join('placa_base placa','placa.pc_id=lab.placa_base_id');
		$this->db->join('adaptador_red red','red.pc_id=lab.adaptador_red_id');
		$this->db->join('adaptador_video video','video.pc_id=lab.adaptador_video_id');
		$this->db->join('almacenamiento alm','alm.pc_id=lab.almacenamiento_id');
		$this->db->where('identificador_lab',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros, devolvemos un false
			return false;
		}
	}// fin detalleEquipo


	  //obtenemos los origenes y destinos de la tabla 
	  public function getOrigen_destino($origen){
	    $this->db->select('u. unidad');
	    $this->db->from('unidad u');
	    $this->db->where('id_unidad',$origen);
	    $result=$this->db->get();

	    if($result->num_rows() > 0){
	      //return $result->result_array();
	      return $result->result_array();
	    }else{
	      return false;
	    }
	  }#fin de getOrigen

	  //función que nos hace la consulta para obtener los sw en el equipo
	  public function getSoftware($id){
	  	$this->db->select('s.*');
	  	$this->db->from('software s');
	  	$this->db->where('s.PC_lab_id',$id);
	  	$result=$this->db->get();

	    if($result->num_rows() > 0){
	      //return $result->result_array();
	      return $result->result_array();
	    }else{
	      return false;
	    }
	  }//fin de getSoftware

	  //función que hace la consulta para obtener los perifericos del equipo
	  public function getPerifericos($id){
	  	$this->db->select('b.*');
	  	$this->db->from('inventario_bodega b');
	  	$this->db->where('b.pc_servidor_id',$id);
	  	$result = $this->db->get();
	  	if($result->num_rows() > 0){
	      //return $result->result_array();
	      return $result->result_array();
	    }else{
	      return false;
	    }
	  }//fin de getPerifericos


	  //función para eliminar un registro de la tabla software
	  public function deleteSoftware($id){

	  	$this->db->where('id',$id);
	  	$this->db->delete('software');
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//fin de deleteSoftware

	  //función para obtener el PC_lab_id
	  public function lab_id($id){
	  	//primero obtenemos el PC_lab_id
	  	$this->db->select('PC_lab_id');
	  	$this->db->from('software');
	  	$this->db->where('id',$id);
	  	$lab = $this->db->get();

	  	if($lab->num_rows() > 0){
	      //return $result->result_array();
	      return $lab->result_array();
	    }else{
	      return false;
	    }
	  }// fin de lab_id

	  //función para guardar un software de una pc de un lab
	  public function guardar($valores){

	  	$this->db->insert('software',$valores);
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//función guardar

	  //función para obtener los datos de ese registro y poder editarlos
	  public function edit($id){
	  	$this->db->select('*');
	  	$this->db->from('software');
	  	$this->db->where('id',$id);
	  	$result = $this->db->get();

	  	if($result->num_rows() > 0){
			return $result->result_array();
		}else{
			return false;
		}
	  }//fin de edit


	  //función para eliminar todos los software de una pc
	  //recibe como parametro el identificador de la pc 
	  public function deleteAll($pc){
	  	$this->db->where('PC_lab_id',$pc);
	  	$this->db->delete('software');
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//fin de deleteAll

	  //esta función se encarga de actualizar los datos en la tabla software
	  public function updateSoftware($data,$id){
	  	$this->db->where('PC_lab_id',$id);
	  	$this->db->set('nombre', $data['nombre']);
	  	$this->db->set('empresa', $data['empresa']);
	  	$this->db->set('nom_carpeta', $data['nom_carpeta']);
	  	$this->db->set('version', $data['version']);
	  	$this->db->set('nom_archivo', $data['nom_archivo']);
	  	$this->db->update('software');
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//fin de updateSoftware


}// fin de la clase

?>