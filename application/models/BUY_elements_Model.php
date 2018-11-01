<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class BUY_elements_Model extends CI_Model
{
    public function __construct()
    {

    }


    function updatePeriferico($id , $data){
       $this->db->where('serial', $id)->update('inventario_bodega', $data);
    }

    function u($id){
      $data = $this->db->where('destino', $id )->get('inventario_adm')->result_array();
      return $data;
    }

 //FUNCIONES PARA VALIDACIONES
     function getSerial($id){
        $resultado = $this->db->where('serial' , $id)->where('serial !=' , null)->get('inventario_bodega')->result_array();
        return $resultado;
    }

    function pc_unidad($name){
       $re = $this->db->select('identificador')->where('destino' , $name)->get('inventario_adm')->result_array();
       return $re;
    }

    function getSerial_todo(){
        $resultado = $this->db->get('inventario_bodega')->result_array();
        return $resultado;
    }

    function get_unidad(){
      $res = $this->db->where('id_unidad !=' ,'4')->where('id_unidad !=' ,'27')->get('unidad')->result_array();
      return $res;
    }

    function get_unidad_unique($id){
      $res = $this->db->where('id_unidad' , $id)->get('unidad')->result_array();
      return $res;
    }

    function unidadxdata($compra, $id){
      $res = $this->db->where('compra_id' , $compra)->where('unidad_id', $id)->get('compra_unidad')->result_array(); 
      return $res;
    }

    function getCodigos($id)
    {
       $res = $this->db->where('identificador' ,$id)->get('inventario_adm')->result_array(); 
      return $res;
    }

    function getCodigoslab($id)
    {
       $res = $this->db->where('identificador_lab' ,$id)->get('inventario_lab')->result_array(); 
      return $res;
    }

 //FUNCIONES PARA VALIDACIONES


//AGREGAR UNIDAD X DATA

function add_unidad_data($data){
      $res = $this->db->insert('compra_unidad', $data);
    }
//END UNIDAD X DATA

//AGREGAR PERIFERICO NUEVO SIN ASIGNAR
function add_periferico_nuevo($data){
      $res = $this->db->insert('inventario_bodega', $data);
    }
//END PERIFERICO NUEVO AGREGADO SIN ASIGNAR

  //MODIFICAR COMPRA 
    function updateBUY($data, $id){
      $res = $this->db->where('id_compra', $id)->update('compras', $data);
    }
  //FIN MODIFICAR COMPRA

//MODIFICAR UNIDAD X DATA
 function updateUnidadxdata($data, $compra, $unidad){
      $res = $this->db->where('compra_id', $compra)->where('unidad_id' , $unidad)->update('compra_unidad', $data);
    }
//END UNIDAD X DATA


//agregar pc asignada
    public function admin_pc($data){
      $this->db->insert('inventario_adm', $data);
}


//agregar pc asignada
    public function labo_pc($data){
      $this->db->insert('inventario_lab', $data);
}

//agregar informacion de pc 
  public function add_data($data, $table){
     $this->db->insert($table, $data);
  }



    public function get_c($id){
    $data = $this->db->where('identificador_lab' ,$id)->get('inventario_lab')->result_array();
    return $data;
    }


    public function add_($data)
    {
        //pc
    	$tables = array('descripcion_sistema', 'placa_base','adaptador_red','adaptador_video','almacenamiento','inventario_lab','software');
    	   for ($i=0; $i <6 ; $i++) {
    		 $this->db->insert($tables[$i],  $data[$i]);
         }

         //sofware
         for ($re=0; $re <count($data[6]); $re++) {
           	$this->db->insert($tables[6],  $data[6][$re]);
         }
    }

    public function get_serialBydestino($serial){
      $serial = $this->db->select('serial, destino')->where('serial' , $serial)->get('inventario_bodega')->result_array();
      return $serial;
    }

    public function get_serialBydestino_todo($serial){
      $serial = $this->db->where('serial' , $serial)->get('inventario_bodega')->result_array();
      return $serial;
    }

    public function bodega($data){
       $this->db->insert('inventario_bodega',$data);
    }

    public function add_periferico_Adicional($data){
       $this->db->insert('perifericos_adicionales',$data);
    }

    public function update_periferico_($id, $data){
        $this->db->where('serie', $id);
        $this->db->update('perifericos_adicionales', $data);
    }

    public function update_bodega_($id, $data){
        $this->db->where('serial', $id);
        $this->db->update('inventario_bodega', $data);
    }

    public function validate_buy($factura){
        $data = $this->db->where('n_factura', $factura)->get('compras')->result_array();
        return $data;
       
    }

    public function get_buy($id){
      $data = $this->db->where('id_compra', $id)->get('compras')->result_array();
      return $data;
    }

    public function update_compra($id, $data){
      $this->db->where('id_compra', $id)->update('compras', $data);
    }



}
