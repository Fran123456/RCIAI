<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class services_Model extends CI_Model
{
	
	function __construct()
	{
		
	}


	  // modelos Enrique
  
  //función que muestra las compras de la tabla compras
  public function showCompras($inicio = FALSE, $cantidad = FALSE){
  	$this->db->where('tipo_compra','servicio');
    if($inicio!==FALSE && $cantidad!==FALSE){
      $this->db->limit($inicio,$cantidad);
    }  
    $consulta = $this->db->get('compras');

    if($consulta->num_rows() > 0){
      //si hay registro devolverlo
      return $consulta->result();
    }else{
      //si no hay registro devolver false
      return false;
    }
  }//fin de showCompras

  //función para obtener los datos y poder editarlos
  public function getcompra($id){
    $this->db->select('c.*,u.usuario');
    $this->db->from('compras c');
    $this->db->join('usuarios u','c.usuario_id=u.id_usuario','inner');
    $this->db->where('c.id_compra',$id);
    $result = $this->db->get();

    if($result->num_rows() > 0){
      //return $result->result_array();
      return $result->result();
    }else{
      return false;
    }
    
  }//fin de getcompra

  //función para poder obtener las unidades donde estan almacenadas, los registros de compra
  public function getunidad_C($id){

    $this->db->select('u.unidad, cu.cantidad');
    $this->db->from('unidad u');
    $this->db->join('compra_unidad cu','cu.unidad_id=u.id_unidad');
    $this->db->where('cu.compra_id',$id);
    $result=$this->db->get();

    if($result->num_rows() > 0){
      //return $result->result_array();
      return $result->result();
    }else{
      return false;
    }
  }//fin de getunidad

  //Realizaremos el método get_total el cual Es usado para contar el número de registros totales en la tabla de compras 
  //que cumplan la condición que tipo_compra sea servicio
  public function get_total(){

    $this->db->from('compras')->where('tipo_compra','servicio');
    return $this->db->count_all_results();
  }

  

}//fin de la clase


 ?>