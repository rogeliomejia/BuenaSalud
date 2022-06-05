<?php
class Proveedores extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListProveedores'] = $this->Dropdowns->listProveedores();

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Proveedores/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}

public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['proveedor'] = $this->Proveedores_model->getProveedor($id);

			if(empty($data['proveedor'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Proveedores/details', $data);
			$this->load->view('shared/footer');

		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['proveedor'] = $this->Proveedores_model->getProveedor($id);
			if(empty($data['proveedor'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Proveedores/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('proveedor', 'proveedor', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Proveedores/create');
				$this->load->view('shared/footer');
			}else{
				$this->Proveedores_model->createProveedor();
				redirect('Proveedores/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Proveedores_model->update();

			redirect('Proveedores/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Proveedores_model->delete($id);
			redirect('Proveedores/index');
		}else{
			redirect('welcome');
		}
	}
}

?>