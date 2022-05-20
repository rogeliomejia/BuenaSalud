<?php
class Iconos extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListIconos'] = $this->Dropdowns->listIconos();

		$data['menuOptions'] = $this->Roles_model->accesos();

		$this->load->view('shared/header', $data);
		$this->load->view('Iconos/index', $data);
		$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}

public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('nombre', 'nombre', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Iconos/create');
				$this->load->view('shared/footer');
			}else{
				$this->Iconos_model->createIcono();
				redirect('Iconos/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['icono'] = $this->Iconos_model->getIcono($id);
			if(empty($data['icono'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Iconos/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Iconos_model->update();

			redirect('Iconos/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Iconos_model->delete($id);
			redirect('Iconos/index');
		}else{
			redirect('welcome');
		}
	}

}
?>