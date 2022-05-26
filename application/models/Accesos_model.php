<?php
class Accesos_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}

public function listAccesos(){
		$this->db->select('idAcceso, idPadre, grupo, opcion, url, a.idIcono, i.icono, orden');
		$this->db->from('acceso as a');
		$this->db->join('icono as i', 'a.idIcono = i.idIcono');
		$this->db->order_by('a.grupo', 'ASC');
		$this->db->order_by('a.idPadre', 'ASC');
		$this->db->order_by('a.orden', 'ASC');
		return $query=$this->db->get()->result_array();
	}

public function accesoId($id){
		$this->db->select('idAcceso, idPadre, grupo, opcion, url, a.idIcono, i.icono, orden');
		$this->db->from('acceso as a');
		$this->db->join('icono as i', 'a.idIcono = i.idIcono');
		$this->db->where('idAcceso', $id);
		return $query=$this->db->get()->row_array();
	}

public function createAcceso(){
		//(`idAcceso`, `idPadre`, `grupo`, `opcion`, `url`, `idIcono`, `orden`)
		$data = array(
			'idPadre' => $this->input->post('idPadre'),
			'grupo' => $this->input->post('grupo'),
			'opcion' => $this->input->post('opcion'),
			'url' => $this->input->post('url'),
			'idIcono' => $this->input->post('idIcono'),
			'orden' => $this->input->post('orden')
		);

		return $this->db->insert('acceso', $data);
	}


public function updateAcceso(){
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

public function deleteAcceso($id){
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