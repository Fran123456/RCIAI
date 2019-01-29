<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bodega_Model extends CI_Model{

	//con esta función hacemos la consulta para obtener TODOS los registros de la tabla inventario_bodega
	public function DetalleBodega(){
		$this->db->select('bo.*');
		$this->db->from('inventario_bodega bo');
		/*$this->db->where('estatus','nuevo');
		$this->db->or_where('estatus','Disponible');
		$this->db->or_where('estatus','En uso');
		$this->db->or_where('estatus','Desechado');*/
		$this->db->order_by('bo.fecha_ingreso', 'DESC');;
		$query=$this->db->get();

		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}//fin de DetalleBodega

	public function get_u_letra($ele)
	{
      $data  = $this->db->where('id_unidad' , $ele)->get('unidad')->result_array();
      return $data;
	}

	//esta función obtiene los datos de un articulo especifico por medio de la serial
	public function getDetalle($serial){
		$this->db->select('bo.*');
		$this->db->from('inventario_bodega bo');
		$this->db->where('bo.serial',$serial);
		$query=$this->db->get();
		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result_array();
			//return false;
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}// fin de getDetalle

	//esta función obtiene los datos de un articulo especifico por medio de la serial
	public function getDetalle2($serial){
		$this->db->select('bo.*,c.n_factura');
		$this->db->from('inventario_bodega bo');
		$this->db->join('compras as c','bo.compra_id=c.id_compra');
		$this->db->where('bo.serial',$serial);
		$query=$this->db->get();
		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
			//return false;
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}// fin de getDetalle


	//función que realizara la consulta para obtener los elementos en bodega que su destino sea 1
	/*public function disponible(){
		#$sql = "SELECT * FROM inventario_bodega WHERE destino = 1 and pc_servidor_id is NULL";
		$sql = "SELECT * FROM inventario_bodega WHERE destino = 1 and tipo !='DISCO DURO EXTERNO' and tipo != 'LAPTOP'";
		$query=$this->db->query($sql);

		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
			//return false;
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}#fin de disponible */



	#función que obtiene las unidades de la base de datos
	public function getUnidades(){
		$sql="SELECT * FROM unidad ";
		$query=$this->db->query($sql);
		//comprobamos
		if($query->num_rows() > 0){
			//si hay registros los devolvemos
			return $query->result();
			//return false;
		}else{
			//si no hay registros devolvemos false
			return false;
		}
	}// fin getUnidades

	#función que obtiene las unidades de la base de datos para un registro en especifico
	public function getUnidades2($origen){
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
	}

	public function movimiento_add($data){
       $this->db->insert('movimiento', $data);
	}

	public function get_code($dato){
	    if($dato == 37){
	     return  $this->db->where('destino' , $dato)->like('identificador_lab', 'PC')->get('inventario_lab')->result_array();
	    }else
	    {
	       return $this->db->where('destino' , $dato)->like('identificador', 'PC')->or_like('identificador', 'SRV')->get('inventario_adm')->result_array();
	    }
    }

	public function get_u(){
		$data = $this->db->where('id_unidad !=' ,'1')->where('id_unidad !=', '38')->where('id_unidad !=' ,'4')->get('unidad')->result_array();
		return $data;
	}
	public function get_c($id){
		$data = $this->db->where('identificador' ,$id)->get('inventario_adm')->result_array();
		return $data;
	}



	public function get_all($id){
		$data = $this->db->where('identificador' ,$id)->get('inventario_adm')->result_array();

		if(count($data) == 0){
			$data = $this->db->where('identificador_lab' ,$id)->get('inventario_lab')->result_array();
		}
		return $data;
	}


	public function get_lab($id){
		$data = $this->db->where('identificador_lab' ,$id)->get('inventario_lab')->result_array();
		return $data;
	}

	function add_bodega_periferico($data){ //agrega la relacion entre el anuncio y el usuario que lo realizo
			$this->db->insert('inventario_bodega',$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}

	public function get_element_bodega($serial){
		$data = $this->db->where('serial', $serial)->get('inventario_bodega')->result_array();
		return $data;
	}
	public function get_pc($pc){
		 $data = $this->db->where('identificador', $pc)->get('inventario_adm')->result_array();
		 if($data == null){
           $data = $this->db->where('identificador_lab', $pc)->get('inventario_lab')->result_array();
		 }
		return $data;
	}

	 public function add_periferico_Adicional($data){
     $this->db->insert('perifericos_adicionales',$data);
    }

     public function add_periferico_Out($data){
    $this->db->insert('perifericos_entrada_salida',$data);
    }


     public function update_bodega__($serial, $data){
            $this->db->where('serial', $serial)->update('inventario_bodega',$data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
    }


		//NUEVO AGREGADO A ULTIMA HORA*********************************************************************
		/*public function disponible(){
			 $this->db->select('bo.serial, bo.nombre, bo.fecha_ingreso');
			 $this->db->from('inventario_bodega bo');
			 $this->db->where('destino', 1);
			 $this->db->where('pc_servidor_id',NULL);
			 $query=$this->db->get();
			 //comprobamos
			 if($query->num_rows() > 0){
					 //si hay registros los devolvemos
					 return $query->result();
					 //return false;
			 }else{
					 //si no hay registros devolvemos false
					 return false;
			 }
	 }#fin de disponible*/
	 public function disponible(){
			 $this->db->select('bo.serial, bo.nombre, bo.fecha_ingreso, bo.tipo');
			 $this->db->from('inventario_bodega bo');
			 $this->db->where('destino', 1);
			 $this->db->where('estatus !=','arruinado');
			 $this->db->where('tipo', 'MONITOR');
		//	 $this->db->where('tipo !=', 'DISCO DURO EXTERNO');
		//	 $this->db->where('tipo !=', 'ACCES POINT RADIO U MASFERRER');
		//	 $this->db->where('tipo !=', 'IMPRESORES MATRICIALES');
		//	 $this->db->where('tipo !=', 'IMPRESORES MULTIFUNCIONALES');
		//	  $this->db->where('tipo !=', 'IMPRESOR DESJEKT');
 //$this->db->where('tipo !=', 'SCANNER');

			 //$this->db->where('pc_servidor_id',NULL);
			 $query=$this->db->get();
			 //comprobamos
			 if($query->num_rows() > 0){
					 //si hay registros los devolvemos
					 return $query->result();
					 //return false;
			 }else{
					 //si no hay registros devolvemos false
					 return false;
			 }
	 }#fin de disponible


		//metodo que me traera todas las PC de bodega que estan disponibles
		    public function disponiblePC(){
		        $this->db->select('bo.pc_servidor_id, bo.fecha_ingreso, bo.serial,c.n_factura');
		        $this->db->from('inventario_bodega bo')->join('compras c' , 'c.id_compra=bo.compra_id');
		        $this->db->where('destino',1);
		        $this->db->where('pc_servidor_id !=',NULL);
		        $this->db->where('pc_servidor_id !=',"");
		        $this->db->where('bo.tipo !=',"LAPTOP");
		        $this->db->where('bo.estatus !=',"Desechado");
		        $this->db->group_by("pc_servidor_id");
		        $query=$this->db->get();
		        //comprobamos
		        if($query->num_rows() > 0){
		            //si hay registros los devolvemos
		            return $query->result();
		            //return false;
		        }else{
		            //si no hay registros devolvemos false
		            return false;
		        }
		    }//fin de disponiblePC
//fin de disponiblePC
		//NUEVO AGREGADO A ULTIMA HORA*********************************************************************

  //metodo que trae todas las laptops de bodega que estan disponibles
		    public function disponibleLaptop(){
		    	$this->db->select('bo.serial, bo.fecha_ingreso, bo.tipo');
		        $this->db->from('inventario_bodega bo');
		        $this->db->where('destino',1);
		        $this->db->where('bo.tipo','LAPTOP');
		        $query=$this->db->get();
		        //comprobamos
		        if($query->num_rows() > 0){
		            //si hay registros los devolvemos
		            return $query->result();
		            //return false;
		        }else{
		            //si no hay registros devolvemos false
		            return false;
		        }
		    }// fin de disponibleLaptop()

		    //metodo para traer todos los DDE de bodega que estan disponibles
		    public function disponibleDDE(){
		    	$this->db->select('bo.serial, bo.fecha_ingreso');
		        $this->db->from('inventario_bodega bo');
		        $this->db->where('destino',1);
		        $this->db->where('bo.tipo','DISCO DURO EXTERNO');
		        $query=$this->db->get();
		        //comprobamos
		        if($query->num_rows() > 0){
		            //si hay registros los devolvemos
		            return $query->result();
		            //return false;
		        }else{
		            //si no hay registros devolvemos false
		            return false;
		        }
		    }

		    public function todo(){
		    	$data = $this->db->where('id_unidad !=', 4)->where('id_unidad !=', 38)->where('id_unidad !=', 1)->get('unidad')->result_array();
		    	return $data;
		    }


		    public function disponibleotros(){
		    	$this->db->select('bo.serial, bo.fecha_ingreso, bo.tipo');
		        $this->db->from('inventario_bodega bo');
		        $this->db->where('destino',1);
		        $this->db->where('bo.tipo','ACCES POINT RADIO U MASFERRER');
		        $this->db->or_where('bo.tipo','IMPRESORES MATRICIALES');
		        $query=$this->db->get();
		        //comprobamos
		        if($query->num_rows() > 0){
		            //si hay registros los devolvemos
		            return $query->result();
		            //return false;
		        }else{
		            //si no hay registros devolvemos false
		            return false;
		        }
		    }


		    public function get_perifericos_pc($id){
		    	$elementos = $this->db->where('pc_servidor_id' , $id)->get('inventario_bodega')->result_array();
		    	return $elementos;
		    }

		    public function get_bodega($serial)
		    {
               $data = $this->db->where('serial' , $serial)->get('inventario_bodega')->result_array();
               return $data;
		    }

		    //PC*****************************************************
		   public function add_( $table,$data){
               $this->db->insert($table, $data);
		   }

		   public function update_($table, $campo ,$id, $data){
		    	$this->db->where($campo, $id)->update($table,$data);

		   }

		   public function get_dde($id)
		   {
              $data = $this->db->where('serial' , $id)->get('inventario_bodega')->result_array();
              return $data;
		   }



        public function obtener_laptop($id){
          $data = $this->db->where('serial' , $id)->get('inventario_bodega')->result_array();
          return $data;
        }

        //METODOS FRANCISCO 28/11/2018
        //PARA OBTENER INFO DE ASIGNACION DE PC COMPLETA ALV 

        public function descripcion_Sistema($id){
           $data = $this->db->where('pc_ids' , $id)->get('descripcion_sistema')->result_array();
           return $data;
        }

        public function placa($id){
           $data = $this->db->where('pc_id' , $id)->get('placa_base')->result_array();
           return $data;
        }

        public function almacenamiento($id){
           $data = $this->db->where('pc_id' , $id)->get('almacenamiento')->result_array();
           return $data;
        }

        public function update_pc($campoComparacion, $datoComparacion, $table, $data){
            $this->db->where($campoComparacion, $datoComparacion)->update($table, $data);
        }




}// fin de la clase de bodega_Model



 ?>
