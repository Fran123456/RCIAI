<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class GeneralReporte_Model extends CI_Model
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

    public function where_x2($table, $id ,$campoCoparacion, $id2, $campoCoparacion2){
      $data = $this->db->where( $campoCoparacion, $id)->where($campoCoparacion2, $id2)->get($table)->result_array();
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

    public function like__($campo, $valor, $table){
      $data = $this->db->like($campo, $valor)->get($table)->result_array();
      return $data;
    }


     public function like_where($table , $idWhere  ,$campoWhere, $campoLike, $idLike){
     $data = $this->db->where($campoWhere , $idWhere )->like($campoLike, $idLike)->get($table)->result_array();
      return $data;
     }



  
}
