<?php
class Compras_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
  
	public function getCompra($id){
		$this->db->where('idCompra', $id);
		$query=$this->db->get('compras');
		return $query->row_array();
	}

	public function createCompra(){

		$data = array(
			'fechaCompra' => $this->input->post('fechaCompra'),
			'fechaEntrega' => $this->input->post('fechaEntrega'),
			'idProveedor' => $this->input->post('idProveedor'),
			'idProducto' => $this->input->post('idProducto'),
			'cantidadCompra' => $this->input->post('cantidadCompra'),
			'tipoCompra' => $this->input->post('tipoCompra')
		);

		return $this->db->insert('compras', $data);
	}

	public function update(){
		
		$data = array(
			'fechaCompra' => $this->input->post('fechaCompra'),
			'fechaEntrega' => $this->input->post('fechaEntrega'),
			'idProveedor' => $this->input->post('idProveedor'),
			'idProducto' => $this->input->post('idProducto'),
			'cantidadCompra' => $this->input->post('cantidadCompra'),
			'tipoCompra' => $this->input->post('tipoCompra')
		);

		$this->db->where('idCompra', $this->input->post('idCompra'));
		return $this->db->update('compras', $data);
	}

	public function delete($id){
		$this->db->where('idCompra', $id);
		$this->db->delete('compras');
		return true;
	}

}

?>


