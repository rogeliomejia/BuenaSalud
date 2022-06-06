<?php
class Proveedores_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
  
	public function getProveedor($id){
		$this->db->where('idProveedor', $id);
		$query=$this->db->get('proveedores');
		return $query->row_array();
	}

	public function createProveedor(){

		$data = array(
			'proveedor' => $this->input->post('proveedor'),
			'telefonoProveedor' => $this->input->post('telefonoProveedor'),
		);

		return $this->db->insert('proveedores', $data);
	}

	public function update(){
		
		$data = array(
			'proveedor' => $this->input->post('proveedor'),
			'telefonoProveedor' => $this->input->post('telefonoProveedor')
		);

		$this->db->where('idProveedor', $this->input->post('idProveedor'));
		return $this->db->update('proveedores', $data);
	}

	public function delete($id){
		$this->db->where('idProveedor', $id);
		$this->db->delete('proveedores');
		return true;
	}

}

?>