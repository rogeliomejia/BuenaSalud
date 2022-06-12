<?php
class Shopping_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}
/*
public function listShopping(){
		$this->db->select("p.idProducto, p.idCategoria, c.categoria, p.producto, p.precio, p.descripcionProducto, p.existencias, p.imagenes");  
    $this->db->from('productos as p');
		$this->db->join('categorias as c', 'p.idCategoria = c.idCategoria'); 
		
		return $query=$this->db->get()->result_array();
	}

public function shoppingId($id){
		$this->db->select('idAcceso, idPadre, grupo, opcion, url, a.idIcono, i.icono, orden');
		$this->db->from('acceso as a');
		$this->db->join('icono as i', 'a.idIcono = i.idIcono');
		$this->db->where('idAcceso', $id);
		return $query=$this->db->get()->row_array();
	}
*/
public function createShopping(){
		
		$data = array(
			'idCliente' => $this->input->post('idCliente'),
			'idCarrier' => $this->input->post('idCarrier'),
			'idSucursal' => 1,
			'fechaPedido' => date("Y-m-d H:i:s"),
			'fechaEnvioVenta' => $this->input->post('fechaEnvioVenta'),
			'entregado' => 0,
			'costoEnvio' => $this->input->post('costoEnvio')
		);

$this->db->insert('pedido', $data);
   $insert_id =$this->db->insert_id();
   return $insert_id;
	}

public function createDetalle($idPedido, $codigoProducto, $cantidadPedido){
		$data = array(
			'idPedido' => $idPedido,
			'codigoProducto' => $codigoProducto,
			'cantidadPedido' => $cantidadPedido,
		);

$this->db->insert('detalleventa', $data);
   return $this->db->insert_id();
	}



public function updateShopping(){
		$data = array(
			'idPadre' => $this->input->post('idPadre'),
			'grupo' => $this->input->post('grupo'),
			'opcion' => $this->input->post('opcion'),
			'url' => $this->input->post('url'),
			'idIcono' => $this->input->post('idIcono'),
			'orden' => $this->input->post('orden')
		);

		$this->db->where('idAcceso', $this->input->post('idAcceso'));
		return $this->db->update('acceso', $data);
	}

public function deleteShopping($id){
		$deleted = true;
		try {
  
		$this->db->where('idAcceso', $id);
		$this->db->delete('acceso');
}
catch ( Exception $e ) {
  $deleted = false;
}
return $deleted;
	}


}

?>