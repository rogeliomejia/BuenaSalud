<?php //namespace application\models\Login_model;
class Login_model extends CI_Model{

public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

	public function check_login($user, $password){

		//$this->load->library('encryption');
		$this->db->where('username', $user);
		//$this->db->or_where('email', $user);

		$query = $this->db->get('users');

		if($query->num_rows()>0){
			foreach($query->result() as $row){
				$storedPass = $this->encryption->decrypt($row->pass);
				
				if($storedPass == $password){
					
					return $this->session->set_userdata('username', $row);
				}else{
					return 'Contraseña incorrecta';
				}
			}
		}else{
			return 'Contraseña incorrecta';
		}

	}



	
}

?>