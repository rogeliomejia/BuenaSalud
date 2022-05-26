<?php
class Entregas extends CI_Controller{
	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['menuOptions'] = $this->Roles_model->accesos();
			$fechas['listEntregas'] = $this->Entregas_model->listEntregas();

			$this->load->view('shared/header', $data);
			$this->load->view('Entregas/index', $fechas);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}


public function updYaEntregado($id){
	$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Entregas_model->update($id);

			redirect('Entregas/index');

		}else{
			redirect('welcome');
		}
}


}

?>