<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class shopping_Model extends CI_Model
{
    public function __construct()
    {

    }
    function getUnidad()
    {
      $resultado = $this->db->get('unidad')->result();

        if(count($resultado) > 0){
             return $resultado;
        }
        else{
          return false;
        }
    }

    function get_CodeAdmin(){
       $resultado = $this->db->select('identificador')->get('inventario_adm')->result_array();
       return $resultado;
   }

     function getUnidad_Where_id($data){
      $resultado = $this->db->select('unidad')->where('id_unidad', $data)->get('unidad')->result_array();

       if(count($resultado) > 0){
             return $resultado;
        }
        else{
          return false;
        }
    }

    function getUnidad_Where_Unidad($data){
      $resultado = $this->db->select('unidad')->where('unidad', $data)->get('unidad')->result_array();

       if(count($resultado) > 0){
             return $resultado;
        }
        else{
          return false;
        }
    }

    function getUnidad_name($data){
      $resultado = $this->db->select('id_unidad')->where('unidad', $data)->get('unidad')->result_array();

       if(count($resultado) > 0){
             return $resultado;
        }
        else{
          return false;
        }
    }

    function get_serial_v($serial){
      $resultado = $this->db->where('serial', $serial)->get('inventario_bodega')->result_array();
      return $resultado;
    }

    function get_codigos_v($codigo){
      $resultado = $this->db->where('identificador', $codigo)->get('inventario_adm')->result_array();
      return $resultado;
    }


  #FUNCIONES PARA OPCION 2

  #FUNCIONES PARA OPCION 2
  public function get_code($dato){
    return $this->db->where('lugar_name' , $dato)->get('inventario_adm')->result_array();

  }

  public function add_periferico_Adicional($data){
     $this->db->insert('perifericos_adicionales',$data);
  }

  public function add_periferico_Out($data){
    $this->db->insert('perifericos_entrada_salida',$data);
  }

  public function add_Disco_administrativo($data){
    $this->db->insert('inventario_adm', $data);
  }

  #agregamos una laptop
  public function _administrative($data){
    $this->db->insert('inventario_adm', $data);
  }

  public function _sistem($data){
    $this->db->insert('descripcion_sistema', $data);
  }

  public function _red($data){
    $this->db->insert('adaptador_red', $data);
  }

  public function _mod($data){
    $this->db->insert('placa_base', $data);
  }

  public function _video($data){
    $this->db->insert('adaptador_video', $data);
  }

  public function _disk($data){
    $this->db->insert('almacenamiento', $data);
  }

  public function _sofware($data){
    $this->db->insert('software', $data);
  }




    function getSerial(){
        $resultado = $this->db->get('inventario_bodega')->result_array();
        return $resultado;
    }

    function getUnidad_Where($data){
      $resultado = $this->db->select('unidad')->where('id_unidad', $data)->get('unidad')->result_array();

       if(count($resultado) > 0){
             return $resultado;
        }
        else{
          return false;
        }
    }

    public function add_Buy($data){
        $this->db->insert('compras',$data);
        if($this->db->affected_rows() > 0){
          return true;
        }else{
          return false;
        }
    }

    public function add_buyXUnity($data){
       $this->db->insert('compra_unidad',$data);
        if($this->db->affected_rows() > 0){
          return true;
        }else{
          return false;
        }
    }

    public function add_PC_Servidor($data){
        $this->db->insert('inventario_bodega',$data);
        if($this->db->affected_rows() > 0){
          return true;
        }else{
          return false;
        }
    }







      //---------------------------------------------------
    //función que muestra las compras de la tabla compras
  public function showCompras($inicio = FALSE, $cantidad = FALSE){
    $this->db->where('tipo_compra','fisica');
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

  //Realizaremos el método get_total el cual Es usado para contar el número de registros totales en la tabla de compras
  //que cumplan la condición que tipo_compra sea fisica

  public function get_total(){

    $this->db->from('compras')->where('tipo_compra','fisica');
    return $this->db->count_all_results();
  }


  //función para obtener los datos
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

  //función para obtener los datos de la tabla inventario_bodega
  public function getbodega($id){
   /* $this->db->where('compra_id',$id);
    $result=$this->db->get('inventario_bodega');*/
    $this->db->select('bo.*, u.unidad');
    $this->db->from('inventario_bodega bo');
    $this->db->join('unidad u','bo.origen=id_unidad');
    $this->db->where('compra_id',$id);
    $result=$this->db->get();

    if($result->num_rows() > 0){
      //return $result->result_array();
      return $result->result();
    }else{
      return false;
    }
  }#fin getbodega

  //obtenemos los origenes y destinos de la tabla bodega
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






}
