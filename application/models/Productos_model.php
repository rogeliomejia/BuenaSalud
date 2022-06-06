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

	function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {
                $this->db->limit($_POST['length'], $_POST['start']);  
           }
           $query = $this->db->get();  
           return $query->result();  
      }  

      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }  

      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      } 

}

?>