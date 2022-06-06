<?php
class Categorias_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

// 	public function csvTest(){
// 	return $query = $this->db->get('categorias');
    
//     Here you should note i am returning 
//     the query object instead of 
//     $query->result() or $query->result_array()
    
// }  
	public function getCategoria($id){
		$this->db->where('idCategoria', $id);
		$query=$this->db->get('categorias');
		return $query->row_array();
	}


	public function createCategoria(){

		$data = array(
			'categoria' => $this->input->post('categoria'),
			'descripcion' => $this->input->post('descripcion')
		);

		return $this->db->insert('categorias', $data);
	}


	public function update(){
		
		$data = array(
			'categoria' => $this->input->post('categoria'),
			'descripcion' => $this->input->post('descripcion')
		);

		$this->db->where('idCategoria', $this->input->post('idCategoria'));
		return $this->db->update('categorias', $data);
	}

	public function delete($id){
		$this->db->where('idCategoria', $id);
		$this->db->delete('categorias');
		return true;
	}

}

?>