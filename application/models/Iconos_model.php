<?php
class Iconos_model extends CI_Model{
	
	public function _construct(){
		$this->load->database();
	}

	public function getIcono($id){
		$this->db->where('idIcono', $id);
		$query=$this->db->get('icono');
		return $query->row_array();
	}

	public function createIcono(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'icono' => $this->input->post('icono')
		);

		return $this->db->insert('icono', $data);
	}

	public function update(){
		
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'icono' => $this->input->post('icono')
		);

		$this->db->where('idIcono', $this->input->post('idIcono'));
		return $this->db->update('icono', $data);
	}


	public function delete($id){
		$this->db->where('idIcono', $id);
		$this->db->delete('icono');
		return true;
	}

}
?>