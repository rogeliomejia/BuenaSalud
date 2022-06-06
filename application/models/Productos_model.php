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


 	  var $table = "productos";  
      var $select_column = array("p.idProducto, p.idCategoria, c.categoria, p.producto, p.precio, p.descripcionProducto, p.existencias");  
      var $order_column = array("p.idProducto, p.idCategoria, c.categoria, p.producto, p.precio, p.descripcionProducto, p.existencias");


	function make_query()  
      {  
           $this->db->select("p.idProducto, p.idCategoria, c.categoria, p.producto, p.precio, p.descripcionProducto, p.existencias");  
           $this->db->from('productos as p');
			$this->db->join('categorias as c', 'p.idCategoria = c.idCategoria'); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("p.idProducto", $_POST["search"]["value"]);
                $this->db->or_like("p.producto", $_POST["search"]["value"]);
                $this->db->or_like("c.categoria", $_POST["search"]["value"]); 
                $this->db->or_like("p.descripcionProducto", $_POST["search"]["value"]); 
                $this->db->or_like("p.precio", $_POST["search"]["value"]); 
                $this->db->or_like("p.existencias", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idProducto', 'ASC');  
           }
      } 

}

?>