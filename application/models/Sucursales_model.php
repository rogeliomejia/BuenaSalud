<?php
class Sucursales_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
  
	public function getSucursal($id){
		$this->db->where('idSucursal', $id);
		$query=$this->db->get('sucursales');
		return $query->row_array();
	}

	public function createSucursal(){

		$data = array(
			'sucursal' => $this->input->post('sucursal'),
			'direccionSucursal' => $this->input->post('direccionSucursal'),
			'telefonoSucursal' => $this->input->post('telefonoSucursal')
		);

		return $this->db->insert('sucursales', $data);
	}


	public function update(){
		
		$data = array(
			'sucursal' => $this->input->post('sucursal'),
			'direccionSucursal' => $this->input->post('direccionSucursal'),
			'telefonoSucursal' => $this->input->post('telefonoSucursal')
		);

		$this->db->where('idSucursal', $this->input->post('idSucursal'));
		return $this->db->update('sucursales', $data);
	}

	public function delete($id){
		$this->db->where('idSucursal', $id);
		$this->db->delete('sucursales');
		return true;
	}

}

?>