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

      $perifericos = array('WEBCAM','UPS','ACCES POINT RADIO U MASFERRER','IMPRESORES-MATRICIALES','IMPRESOR-DESJEKT','SCANNER');
       $estados = array('Disponible','nuevo');
       $this->db->select('bo.serial, bo.nombre, bo.fecha_ingreso, bo.tipo');
       $this->db->from('inventario_bodega bo');
        $this->db->where_in('tipo', $perifericos);
        $this->db->where_in('estatus', $estados);
       $query=$this->db->get()->result_array();
      return $query;
    }


   public function get_unidades(){
     $unidades =  $this->db->where('id_unidad !=' , 1 )->where('id_unidad !=' , 4 )->where('id_unidad !=' , 37 )->where('id_unidad !=' , 38 )->get('unidad')->result_array();
     return $unidades;
   }
    


}
