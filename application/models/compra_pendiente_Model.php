<?php 


/**
	esta modelo es para manipular las compras pendientes
 */
class compra_pendiente_Model extends CI_Model
{
	/*#esta función nos traera los registros de aquellas compras pendientes
	  # o sea en donde el campo cantidad sea mayor a el campo rest de la tabla compras
	#*/ 
	public function registro(){
		$this->db->select('id_compra,cantidad,rest,n_factura,fecha_autorizacion,fecha_compra');
		$this->db->from('compras');
		$this->db->where('rest < cantidad');
		$query= $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}




 ?>