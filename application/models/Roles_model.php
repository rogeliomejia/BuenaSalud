<?php
class Roles_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}


	public function getRol($id){
		$this->db->where('idRol', $id);
		$query=$this->db->get('roles');
		return $query->row_array();
	}

	public function createRol(){

		$data = array(
			'rol' => $this->input->post('rol'),
			'descripcion' => $this->input->post('descripcion')
		);

		return $this->db->insert('roles', $data);
	}

	public function update(){
		
		$data = array(
			'rol' => $this->input->post('rol'),
			'descripcion' => $this->input->post('descripcion')
		);

		$this->db->where('idRol', $this->input->post('idRol'));
		return $this->db->update('roles', $data);
	}

	public function delete($id){
		$deleted = true;
		try {
  
		$this->db->where('idRol', $id);
		$this->db->delete('roles');
}
catch ( Exception $e ) {
  $deleted = false;
}
return $deleted;
	}

public function availAccesos($id){
		
			$this->db->select('c.idRolAcceso, r.idRol, r.rol, a.idAcceso, a.opcion, a.url, i.icono, c.descripcion');
			$this->db->from('rol_acceso c');
			$this->db->join('roles as r', 'c.idRol = r.idRol');
			$this->db->join('acceso as a', 'c.idAcesso = a.idAcceso');
			$this->db->join('icono as i', 'a.idIcono = i.idIcono');
			$this->db->where('r.idRol', $id);
			$this->db->order_by('a.orden', 'ASC');
			$query=$this->db->get();
			return $query->result_array();
	}

	public function accesos(){
		$userData = $this->session->userdata('username');

		if($userData!= null){

			$idRol = $userData->id_rol;
			
			$this->db->select('c.idRolAcceso, r.idRol, r.rol, a.idAcceso, a.opcion, a.url, i.icono, c.descripcion');
			$this->db->from('rol_acceso c');
			$this->db->join('roles as r', 'c.idRol = r.idRol');
			$this->db->join('acceso as a', 'c.idAcesso = a.idAcceso');
			$this->db->join('icono as i', 'a.idIcono = i.idIcono');
			$this->db->where('r.idRol', $idRol);
			$this->db->order_by('a.orden', 'ASC');
			$query=$this->db->get();
			return $query->result_array();
		}
	}



	public function assign(){
		$idRol = $this->input->post('rol');
		$data = array(
			'idRol' => $idRol,
			'idAcesso' => $this->input->post('idAcceso'),
			'descripcion' => $this->input->post('descripcion')
		);
		$this->db->insert('rol_acceso', $data);
		return $idRol;
	}

	public function unassign($id){
		$this->db->where('idRolAcceso', $id);
		$this->db->delete('rol_acceso');
		return true;
	}

}
?>