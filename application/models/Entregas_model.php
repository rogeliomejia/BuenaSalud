<?php 
class Entregas_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}

public function listEntregas(){
		$this->db->select('idPedido as id, c.direccionCliente as title, fechaEnvioVenta as start');
		$this->db->from('pedido as p');
		$this->db->join('cliente as c', 'p.idCliente = c.idCliente');
		$this->db->where('entregado', 0);
		return $query=$this->db->get()->result_array();
	}

public function update($id){
		$data = array(
			'entregado' => 1
		);
		$this->db->where('idPedido', $id);
		return $this->db->update('pedido', $data);
	}

}

?>