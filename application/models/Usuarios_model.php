<?php
class Usuarios_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}


	public function getUsuario($id){
		$this->db->where('id', $id);
		$query=$this->db->get('users');
		return $query->row_array();
	}


	public function retieveUsuarios($slug = FALSE){
		if($slug === FALSE){
			$this->db->select('u.id, u.nombre, u.apellido, u.username, u.pass, u.email');
			$this->db->select('u.direccion, u.id_rol, r.rol, u.telefono, u.isBlocked');
			$this->db->from('users as u');
			$this->db->join('roles as r', 'u.id_rol = r.idRol');
			$query=$this->db->get();
			return $query->result_array(); //toda la lista
		}
	}


	public function createUser(){

		$pass = $this->encryption->encrypt($this->input->post('pass'));

		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'username' => $this->input->post('username'),
			'pass' => $pass,
			'email' => $this->input->post('email'),
			'direccion' => $this->input->post('direccion'),
			'id_rol' => $this->input->post('idrol'),
			'telefono' => $this->input->post('telefono'),
			'isBlocked' => 0
		);

		return $this->db->insert('users', $data);
	}


	public function update(){
		$pass = $this->encryption->encrypt($this->input->post('pass'));

		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'username' => $this->input->post('username'),
			'pass' => $pass,
			'email' => $this->input->post('email'),
			'direccion' => $this->input->post('direccion'),
			'id_rol' => $this->input->post('idrol'),
			'telefono' => $this->input->post('telefono'),
			'isBlocked' => $this->input->post('isBlocked')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('users', $data);
	}


	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}

}
?>