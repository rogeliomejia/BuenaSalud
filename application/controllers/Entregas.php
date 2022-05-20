<?php
class Entregas extends CI_Controller{
	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['menuOptions'] = $this->Roles_model->accesos();
			$this->load->view('shared/header', $data);
			$this->load->view('Entregas/index');
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}
}

?>