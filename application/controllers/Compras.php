<?php
class Compras extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListCompras'] = $this->Dropdowns->listCompras();

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Compras/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}

public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['fechaCompra'] = $this->Compras_model->getCompra($id);

			if(empty($data['fechaCompra'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Compras/details', $data);
			$this->load->view('shared/footer');

		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['fechaCompra'] = $this->Compras_model->getCompra($id);
			if(empty($data['fechaCompra'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Compras/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('fechaCompra', 'fechaCompra', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Compras/create');
				$this->load->view('shared/footer');
			}else{
				$this->Compras_model->createCompra();
				redirect('Compras/index');
			}
		
		}else{
			redirect('welcome');

		}
	}

public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Compras_model->update();

			redirect('Compras/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Compras_model->delete($id);
			redirect('Compras/index');
		}else{
			redirect('welcome');
		}
	}
}

?>