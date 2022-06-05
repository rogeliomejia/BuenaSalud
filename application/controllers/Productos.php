<?php
class Productos extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListProductos'] = $this->Dropdowns->listProductos();

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Productos/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}


public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['producto'] = $this->Productos_model->getProducto($id);

			if(empty($data['producto'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Productos/details', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['producto'] = $this->Productos_model->getProducto($id);
			if(empty($data['producto'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Productos/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('producto', 'producto', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Productos/create');
				$this->load->view('shared/footer');
			}else{
				$this->Productos_model->createProducto();
				redirect('Productos/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Productos_model->update();

			redirect('Productos/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Productos_model->delete($id);
			redirect('Productos/index');
		}else{
			redirect('welcome');
		}
	}
}

?>