<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class BUY_Model extends CI_Model
{
    public function __construct()
    {

    }

    public function add_buy($data)
    {
      $this->db->insert('compras', $data);
    }

   public function add_destiny($data2)
    {
      $this->db->insert('compra_unidad', $data2);
    }

    public function get_buy($id){
      $data = $this->db->where('id_compra', $id)->get('compras')->result_array();
      return $data;
    }

    


   


}
