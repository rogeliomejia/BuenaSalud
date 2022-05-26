<?php
class Accesos extends CI_Controller{


public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListAccesos'] = $this->Accesos_model->listAccesos();
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Accesos/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}

public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('opcion', 'opcion', 'required');

			if($this->form_validation->run()===FALSE){
				
				$data['menuOptions'] = $this->Roles_model->accesos();
				$data['ListIdPadre'] = $this->Dropdowns->listIdPadre();
				$data['ListIcono'] = $this->Dropdowns->listIconos();

				$this->load->view('shared/header', $data);
				$this->load->view('Accesos/create');
				$this->load->view('shared/footer');
			}else{
				$this->Accesos_model->createAcceso();
				redirect('Accesos/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


	public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Accesos_model->updateAcceso();

			redirect('Accesos/index');


		}else{
			redirect('welcome');
		}
	}


	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['acceso'] = $this->Accesos_model->accesoId($id);
			$data['ListIdPadre'] = $this->Dropdowns->listIdPadre();
			$data['ListIcono'] = $this->Dropdowns->listIconos();
			
			if(empty($data['acceso'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Accesos/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

public function delete($id){
		
		$userData = $this->session->userdata('username');

		if($userData != null){
			
			if ( !$this->Accesos_model->deleteAcceso($id)){
				show_error("Rol se encuentra en uso", "301", $heading="No se puede eliminar referencia");
				redirect('Accesos/index');
			}

			redirect('Accesos/index');
		}else{
			redirect('welcome');
		}

}

}

?>