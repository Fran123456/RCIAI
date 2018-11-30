<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class administrativo_Model extends CI_Model
{
	
	function __construct()
	{
		
	}

	#vamos a crear una funcion para obtener el destino segun el identificador
	public function getDestino($id){
		$this->db->select('destino');
		$this->db->from('inventario_adm');
		$this->db->where('identificador',$id);
		$query=$this->db->get();
		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}#fin de getDestino

	#función para realizar la consulta de los registros de la tabla inventario_adm
	public function showregistro($unidad,$tipo){
		//vamos a realizar la función para obtener los datos
		if($unidad == 37){
			$this->db->select('*');
			$this->db->from('inventario_adm');
			$this->db->like('identificador',$tipo);
			$query=$this->db->get();
			//comprobamos
			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result();
			}else{
				//si no hay registros devolvemos false
				return false;
			}
		}else{
			$this->db->select('*');
			$this->db->from('inventario_adm');
			$this->db->where('destino',$unidad);
			$this->db->like('identificador',$tipo);
			$query=$this->db->get();
			//comprobamos
			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result();
			}else{
				//si no hay registros devolvemos false
				return false;
			}
		}		

		
	}//fin de showregistro

	public function getCompra($id){
		$this->db->select('compra_id');
		$this->db->from('inventario_adm');
		$this->db->where('identificador',$id);
		$query=$this->db->get();

		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}

	public function getRegistro($id){
		$compra = $this->getCompra($id);

		if($compra[0]->compra_id != null){
			//vamos a traer los datos de la tabla inventario_id
			$this->db->select('adm.*, sis.*, base.*, red.*, video.*, alm.*, c.fecha_compra, c.n_factura');
			$this->db->from('inventario_adm adm');
			$this->db->join('descripcion_sistema sis','sis.pc_ids=adm.des_sistema_id');
			$this->db->join('placa_base base','base.pc_id=adm.placa_base_id');
			$this->db->join('adaptador_red red','red.pc_id=adm.adaptador_red_id');
			$this->db->join('adaptador_video video','video.pc_id=adm.adaptador_video_id');
			$this->db->join('almacenamiento alm','alm.pc_id=adm.almacenamiento_id');
			$this->db->join('compras c','c.id_compra=adm.compra_id');
			$this->db->where('identificador',$id);
			$query=$this->db->get();

			//comprobamos
			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result();
			}else{
				//si no hay registros devolvemos false
				return false;
			}
		}else{
			//vamos a traer los datos de la tabla inventario_id
			$this->db->select('adm.*, sis.*, base.*, red.*, video.*, alm.*');
			$this->db->from('inventario_adm adm');
			$this->db->join('descripcion_sistema sis','sis.pc_ids=adm.des_sistema_id');
			$this->db->join('placa_base base','base.pc_id=adm.placa_base_id');
			$this->db->join('adaptador_red red','red.pc_id=adm.adaptador_red_id');
			$this->db->join('adaptador_video video','video.pc_id=adm.adaptador_video_id');
			$this->db->join('almacenamiento alm','alm.pc_id=adm.almacenamiento_id');
			$this->db->where('identificador',$id);
			$query=$this->db->get();

			//comprobamos
			if($query->num_rows() > 0){
				//si hay registros los devolvemos
				return $query->result();
			}else{
				//si no hay registros devolvemos false
				return false;
			}
		}


		
	}//fin de getRegistro

	//esta función nos permitira obtener el teclado y el mouse de una pc o servidor
	public function getperifericos_ad($id){
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
	}//FIN DE getperifericos_es

	//vamos a obtener los mouse
	public function getMouse($id){
		$this->db->select('bod.*');
		$this->db->from('inventario_bodega bod');
		$this->db->where('bod.tipo','MOUSE');
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
	}//fin de getMouse


	//vamos a obtener los teclados
	public function getTeclado($id){
		$this->db->select('bod.*');
		$this->db->from('inventario_bodega bod');
		$this->db->where('bod.tipo','TECLADO');
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
	}//fin de getMouse

	

  //obtenemos los origenes y destinos de la tabla 
  public function getOrigen_destino($origen){
    $this->db->select('u. unidad');
    $this->db->from('unidad u');
    $this->db->where('id_unidad',$origen);
    $result=$this->db->get();

    if($result->num_rows() > 0){
      return $result->result_array();
    }else{
      return false;
    }
  }#fin de getOrigen

  public function getSoftware($id){
  	$this->db->select('s.*');
  	$this->db->from('software s');
  	$this->db->where('s.pc_id',$id);
  	$result=$this->db->get();

    if($result->num_rows() > 0){
      //return $result->result_array();
      return $result->result_array();
    }else{
      return false;
    }
  }//fin de getSoftware

  //vamos a obtener los datos del disco duro externo
  public function getDetallePeriferico($id){
  	/*por medio del identificador haremos una consulta para obtener el serial
  	de la tabla inventario_adm para luego hacer la consulta a la tabla bodega
  	y obtener los datos de ese registro con ese serial*/

  	$this->db->select('bo.*,adm.identificador,adm.encargado_puesto');
  	$this->db->from('inventario_bodega bo');
  	$this->db->join('inventario_adm adm','adm.serial=bo.serial');
  	$this->db->where('adm.identificador',$id);
  	$result=$this->db->get();



    if($result->num_rows() > 0){
      
      return $result->result();
    }else{
      return false;
    }
  }//fin de getDetalleDDE


  //metodo para obtener las pc, lapto y servidores del inventario administrativo
  public function getEquipos(){
  	$this->db->select('identificador, fecha_ingreso');
  	$this->db->from('inventario_adm');
  	$this->db->like('identificador','PC');
  	$this->db->or_like('identificador','LAP');
  	$this->db->or_like('identificador','SVR');
  	$result=$this->db->get();

    if($result->num_rows() > 0){
      return $result->result();
    }else{
      return false;
    }
  }#fin de getEquipos

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
	  public function equipo_id($id){
	  	//primero obtenemos el PC_lab_id
	  	$this->db->select('pc_id');
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

	  //función para obtener los datos de ese registro
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
	  	$this->db->where('pc_id',$pc);
	  	$this->db->delete('software');
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//fin de delteAll

	  //esta función se encarga de actualizar los datos en la tabla software
	  public function updateSoftware($data,$id){
	  	$this->db->where('id',$id);
	  	$this->db->set('nombre', $data['nombre']);
	  	$this->db->set('version', $data['version']);
	  	$this->db->update('software');
	  	if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	  }//fin de updateSoftware

}//fin de la clase modelo


 ?>
