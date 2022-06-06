<?php
class Productos_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
  
	public function getProducto($id){
		$this->db->where('idProducto', $id);
		$query=$this->db->get('productos');
		return $query->row_array();
	}

	public function createProducto(){

		$data = array(
			'producto' => $this->input->post('producto'),
			'idCategoria' => $this->input->post('idCategoria'),
			'descripcionProducto' => $this->input->post('descripcionProducto'),
			'precio' => $this->input->post('precio'),
			'existencias' => $this->input->post('existencias')
		);

		return $this->db->insert('productos', $data);
	}


	public function update(){
		
		$data = array(
			'producto' => $this->input->post('producto'),
			'idCategoria' => $this->input->post('idCategoria'),
			'descripcionProducto' => $this->input->post('descripcionProducto'),
			'precio' => $this->input->post('precio'),
			'existencias' => $this->input->post('existencias')
		);

		$this->db->where('idProducto', $this->input->post('idProducto'));
		return $this->db->update('productos', $data);
	}

	public function delete($id){
		$this->db->where('idProducto', $id);
		$this->db->delete('productos');
		return true;
	}

}

?>