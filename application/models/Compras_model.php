<?php
class Compras_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
  
	 var $table = "compras";  
     var $select_column = array("idCompra", "fechaCompra", "fechaEntrega", "idProveedor", "idProducto", "cantidadCompra", "tipoCompra");  
     var $order_column = array("idCompra", "fechaCompra", "fechaEntrega",  "idProveedor", "idProducto", "cantidadCompra", "tipoCompra", null, null, null);

	function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("idCompra", $_POST["search"]["value"]);
                $this->db->or_like("fechaCompra", $_POST["search"]["value"]);
                $this->db->or_like("fechaEntrega", $_POST["search"]["value"]);
                $this->db->or_like("idProveedor", $_POST["search"]["value"]); 
                $this->db->or_like("idProducto", $_POST["search"]["value"]); 
                $this->db->or_like("cantidadCompra", $_POST["search"]["value"]);
                $this->db->or_like("tipoCompra", $_POST["search"]["value"]);   
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idCompra', 'ASC');  
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


