<?php
class Pedidos_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	 var $table = "pedido";  
      var $select_column = array("idPedido", "idCliente", "idCarrier", "idSucursal", "fechaPedido",
  "fechaEnvioVenta", "entregado", "costoEnvio");  
      var $order_column = array("idPedido", "idCliente", "idCarrier", "idSucursal", "fechaPedido",
  "fechaEnvioVenta", "entregado", "costoEnvio", null);

	function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("idPedido", $_POST["search"]["value"]);
                $this->db->or_like("idCliente", $_POST["search"]["value"]);
                $this->db->or_like("idCarrier", $_POST["search"]["value"]);
                $this->db->or_like("idSucursal", $_POST["search"]["value"]);
                $this->db->or_like("fechaPedido", $_POST["search"]["value"]); 
                $this->db->or_like("fechaEnvioVenta", $_POST["search"]["value"]); 
                $this->db->or_like("entregado", $_POST["search"]["value"]); 
                $this->db->or_like("costoEnvio", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idPedido', 'ASC');  
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
  
	public function getPedido($id){
		$this->db->select("p.idPedido, cl.nombreCliente, ca.carrier, su.sucursal, p.fechaPedido, p.fechaEnvioVenta, p.entregado, p.costoEnvio, d.numVenta,
               pr.producto, d.cantidadPedido");  
          $this->db->from('pedido as p');
          $this->db->join('detalleventa as d', 'p.idPedido = d.idPedido'); 
          $this->db->join('productos as pr', 'd.codigoProducto = pr.idProducto');
          $this->db->join('cliente as cl', 'cl.idCliente = p.idCliente'); 
          $this->db->join('carriers as ca', 'ca.idCarrier = p.idCarrier'); 
          $this->db->join('sucursales as su', 'su.idSucursal = p.idSucursal'); 
          $this->db->where('p.idPedido', $id);
		$query=$this->db->get('pedido');
		return $query->row_array();
	}

	public function createPedido(){

		$data = array(
			'idPedido' => $this->input->post('idPedido'),
			'idCliente' => $this->input->post('idCliente'),
			'idCarrier' => $this->input->post('idCarrier'),
			'idSucursal' => $this->input->post('idSucursal'),
			'fechaPedido' => $this->input->post('fechaPedido'),
			'fechaEnvioVenta' => $this->input->post('fechaEnvioVenta'),
			'entregado' => $this->input->post('entregado'),
			'costoEnvio' => $this->input->post('costoEnvio')
		);

		return $this->db->insert('pedido', $data);
	}
}

?>