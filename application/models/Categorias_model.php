<?php
class Categorias_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	  var $table = "categorias";  
      var $select_column = array("idCategoria", "categoria", "descripcion");  
      var $order_column = array("idCategoria", "categoria", "descripcion", null, null, null);

	function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("idCategoria", $_POST["search"]["value"]);
                $this->db->or_like("categoria", $_POST["search"]["value"]);
                $this->db->or_like("descripcion", $_POST["search"]["value"]); 
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idCategoria', 'ASC');  
           }
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