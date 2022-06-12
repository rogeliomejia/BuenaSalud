<?php
class Dropdowns extends CI_Model{
	
	public function _construct(){
		$this->load->database();
	}

public function listRoles(){
		$query=$this->db->get('roles');
		return $query->result_array();
	}

public function listAccesos($id){
		//select idAcesso from rol_acceso where idRol = $id

		$this->db->select('idAcesso');
		$this->db->from('rol_acceso');
		$this->db->where('idRol', $id);
		$subquery=$this->db->get()->result_array();

		$ignore = array();
		foreach($subquery as $ig){
			$ignore[] = $ig['idAcesso']; 
		}

		if($ignore == null){
			$ignore = ' ';
		}

		$this->db->select('idAcceso, opcion');
		$this->db->from('acceso');
		$this->db->where_not_in('idAcceso', $ignore);
		$query=$this->db->get();
		return $query->result_array();
	}


public function listIconos(){
		$this->db->select('idIcono, nombre, icono');
		$this->db->from('icono');
		return $this->db->get()->result_array();
	}

public function listIdPadre(){
		$this->db->select('idAcceso, opcion, grupo');
		$this->db->from('acceso');
		$this->db->where('idPadre', 0);
		return $this->db->get()->result_array();
	}

public function listGrupoAcceso(){
		$this->db->select('grupo, opcion');
		$this->db->from('acceso');
		$this->db->where('idPadre', 0);
		return $query=$this->db->get()->result_array();
	}

public function listCategorias(){
		$query=$this->db->get('categorias');
		return $query->result_array();
	}

public function listProductos(){
			$this->db->select('p.idProducto, p.idCategoria, c.categoria, p.producto, p.precio, p.descripcionProducto, p.existencias, p.imagenes');
			$this->db->from('productos as p');
			$this->db->join('categorias as c', 'p.idCategoria = c.idCategoria');
			$query=$this->db->get();
			return $query->result_array();

		//$query=$this->db->get('productos');
		//return $query->result_array();
	}

public function listSucursales(){
		$query=$this->db->get('sucursales');
		return $query->result_array();
	}

public function listProveedores(){
		$query=$this->db->get('proveedores');
		return $query->result_array();
	}

public function listCarriers(){
		$query=$this->db->get('carriers');
		return $query->result_array();
	}

public function listCompras(){
		$query=$this->db->get('compras');
		return $query->result_array();
	}



}
?>