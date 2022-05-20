<?php
class Usuarios extends CI_Controller{
	public function index(){

		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListUsuarios'] = $this->Usuarios_model->retieveUsuarios();

		$data['menuOptions'] = $this->Roles_model->accesos();

		$this->load->view('shared/header', $data);
		$this->load->view('Usuarios/index', $data);
		$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('username', 'username', 'required');

			if($this->form_validation->run()===FALSE){
				$data['ListRoles'] = $this->Dropdowns->listRoles();

				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Usuarios/create', $data);
				$this->load->view('shared/footer');
			}else{
				$this->Usuarios_model->createUser();
				redirect('Usuarios/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$msg = $this->Usuarios_model->delete($id);
			redirect('Usuarios/index');
			//echo($msg);
		}else{
			redirect('welcome');
		}
	}

	public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['usuario'] = $this->Usuarios_model->getUsuario($id);

			if(empty($data['usuario'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Usuarios/details', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['usuario'] = $this->Usuarios_model->getUsuario($id);
			$data['ListRoles'] = $this->Dropdowns->listRoles();
			if(empty($data['usuario'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Usuarios/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Usuarios_model->update();

			redirect('Usuarios/index');


		}else{
			redirect('welcome');
		}
	}


}


?>