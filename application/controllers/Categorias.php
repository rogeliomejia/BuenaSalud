<?php
class Categorias extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListCategorias'] = $this->Dropdowns->listCategorias();
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Categorias/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');
		}
}


public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['categoria'] = $this->Categorias_model->getCategoria($id);

			if(empty($data['categoria'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Categorias/details', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['categoria'] = $this->Categorias_model->getCategoria($id);
			if(empty($data['categoria'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Categorias/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('categoria', 'categoria', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Categorias/create');
				$this->load->view('shared/footer');
			}else{
				$this->Categorias_model->createCategoria();
				redirect('Categorias/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Categorias_model->update();

			redirect('Categorias/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Categorias_model->delete($id);
			redirect('Categorias/index');
		}else{
			redirect('welcome');
		}
	}
}

?>