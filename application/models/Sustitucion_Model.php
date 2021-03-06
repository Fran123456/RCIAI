<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sustitucion_Model extends CI_Model
{
    public function __construct()
    {
      
    }

	  public function add_($table, $data){
       $this->db->insert($table, $data);
    }

    public function update_($table, $id, $campoCoparacion ,$data){
      $this->db->where($campoCoparacion,  $id)->update($table, $data);
    }

    public function select_($table){
      $data = $this->db->get($table)->result_array();
      return $data;
    }

    public function where_($table, $id ,$campoCoparacion){
      $data = $this->db->where( $campoCoparacion, $id)->get($table)->result_array();
      return $data;
    }

    public function where_not($table, $id ,$campoCoparacion, $campoNot , $arrayValoresNot){
      $data = $this->db->where($campoCoparacion, $id)->where_not_in($campoNot, $arrayValoresNot)->get($table)->result_array();
      return $data;
    }

     public function likex2_where($table , $id  ,$campo,  $campoCoparacion, $comparacion1, $comparacion2){
     $data = $this->db->where($campo , $id )->like($campoCoparacion, $comparacion1)->or_like($campoCoparacion,$comparacion2)->get($table)->result_array();
      return $data;
    }

    public function a($code){
      $data = $this->db->where('identificador', $code)->get('inventario_adm')->result_array();
      return $data;
    }

    public function lab($code){
      $data = $this->db->where('identificador_lab', $code)->get('inventario_lab')->result_array();
      return $data;
    }

    public function ecuacion_serial_matricial($id){
       $data = $this->db->where('pc_servidor_id', $id)->where('tipo' , 'CPU')->get('inventario_bodega')->result_array();
       return $data;
    }

    public function where_Falso($serial){
          $data = $this->db->where('serial', $serial )->get('inventario_adm')->result_array();
          $data['centinela'] = "admin";

          if(count($data) == 0){
            $data =  $this->db->where('serial', $serial )->get('inventario_lab')->result_array();
            $data['centinela'] = "Lab";
          }
          return $data;
    }



     public function perifericos_disponible(){

      $perifericos = array('MONITOR','MOUSE','TECLADO','USB','MEMORIA SD','LECTOR DVD/CD','PARLANTES','LECTOR PARA MEMORIA SD','AUDIFONOS','PROYECTOR','FAX','MICROFONO');
      $estados = array('Disponible','nuevo');
       $this->db->select('bo.serial, bo.nombre, bo.fecha_ingreso, bo.tipo');
       $this->db->from('inventario_bodega bo');
        $this->db->where_in('tipo', $perifericos);
        $this->db->where_in('estatus', $estados);
       // $this->db->where('estatus !=','En uso');
       // $this->db->where('estatus !=','Desechado');
       //$this->db->where('destino', 1);
       $query=$this->db->get()->result_array();
      return $query;
    }

       public function perifericos_disponible_code(){

      $perifericos = array('DISCO DURO EXTERNO','WEBCAM','UPS','ACCES POINT RADIO U MASFERRER','IMPRESORES-MATRICIALES','IMPRESOR-DESJEKT','SCANNER','IMPRESORES-MULTIFUNCIONALES');
       $estados = array('Disponible','nuevo');
       $this->db->select('bo.serial, bo.nombre, bo.fecha_ingreso, bo.tipo');
       $this->db->from('inventario_bodega bo');
        $this->db->where_in('tipo', $perifericos);
        $this->db->where_in('estatus', $estados);
       $query=$this->db->get()->result_array();
      return $query;

    }


   public function get_unidades(){
     $unidades =  $this->db->where('id_unidad !=' , 1 )->where('id_unidad !=' , 4 )->where('id_unidad !=' , 38 )->get('unidad')->result_array();
     return $unidades;
   }

   public function join_admin($id){

       $this->db->select('*');
    $this->db->from('inventario_adm');
    $this->db->join('inventario_bodega', 'inventario_bodega.serial = inventario_adm.serial');
    $this->db->where('inventario_adm.identificador', $id);
    $query = $this->db->get()->result_array();
   // $query = $this->db->query('select * from inventario_adm join inventario_bodega on inventario_bodega.serial = inventario_adm.serial where inventario_adm.identificador = "WEBCAM001USAM"')->result_array();
    return $query;
   }


    public function join_lanb($id){
    $this->db->select('*');
    $this->db->from('inventario_lab');
    $this->db->join('inventario_bodega', 'inventario_bodega.serial = inventario_lab.serial');
    $this->db->where('inventario_lab.identificado_lab', $id);
    $query = $this->db->get()->result();
    return $query;
   }
    
    


}
