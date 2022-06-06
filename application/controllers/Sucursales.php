<?php
class Sucursales extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListSucursales'] = $this->Dropdowns->listSucursales();

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Sucursales/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}


public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['sucursal'] = $this->Sucursales_model->getSucursal($id);

			if(empty($data['sucursal'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Sucursales/details', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['sucursal'] = $this->Sucursales_model->getSucursal($id);
			if(empty($data['sucursal'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Sucursales/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('sucursal', 'sucursal', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Sucursales/create');
				$this->load->view('shared/footer');
			}else{
				$this->Sucursales_model->createSucursal();
				redirect('Sucursales/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Sucursales_model->update();

			redirect('Sucursales/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Sucursales_model->delete($id);
			redirect('Sucursales/index');
		}else{
			redirect('welcome');
		}
	}
}

?>