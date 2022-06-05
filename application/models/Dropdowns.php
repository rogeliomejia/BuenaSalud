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


}
?>