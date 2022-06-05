<?php
class Carriers_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	 var $table = "carriers";  
      var $select_column = array("idCarrier", "carrier", "telefonoCarrier");  
      var $order_column = array("idCarrier", "carrier", "telefonoCarrier", null, null, null);

	function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("idCarrier", $_POST["search"]["value"]);
                $this->db->or_like("carrier", $_POST["search"]["value"]);
                $this->db->or_like("telefonoCarrier", $_POST["search"]["value"]); 
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idCarrier', 'ASC');  
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
  
	public function getCarrier($id){
		$this->db->where('idCarrier', $id);
		$query=$this->db->get('carriers');
		return $query->row_array();
	}

	public function createCarrier(){

		$data = array(
			'carrier' => $this->input->post('carrier'),
			'telefonoCarrier' => $this->input->post('telefonoCarrier')

		);

		return $this->db->insert('carriers', $data);
	}

	public function update(){
		
		$data = array(
			'carrier' => $this->input->post('carrier'),
			'telefonoCarrier' => $this->input->post('telefonoCarrier')
		);

		$this->db->where('idCarrier', $this->input->post('idCarrier'));
		return $this->db->update('carriers', $data);
	}

	public function delete($id){
		$this->db->where('idCarrier', $id);
		$this->db->delete('carriers');
		return true;
	}

}

?>