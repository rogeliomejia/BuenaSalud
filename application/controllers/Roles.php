<?php
class Roles extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListRoles'] = $this->Dropdowns->listRoles();

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Roles/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}


public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['rol'] = $this->Roles_model->getRol($id);

			if(empty($data['rol'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Roles/details', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['rol'] = $this->Roles_model->getRol($id);
			if(empty($data['rol'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Roles/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}


	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('rol', 'rol', 'required');

			if($this->form_validation->run()===FALSE){
				
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Roles/create');
				$this->load->view('shared/footer');
			}else{
				$this->Roles_model->createRol();
				redirect('Roles/index');
			}
		
		}else{
			redirect('welcome');

		}
	}


public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Roles_model->update();

			redirect('Roles/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		
		$userData = $this->session->userdata('username');

		if($userData != null){
			
			if ( !$this->Roles_model->delete($id)){
				show_error("Rol se encuentra en uso", "301", $heading="No se puede eliminar referencia");
				redirect('Roles/index');
			}

			redirect('Roles/index');
		}else{
			redirect('welcome');
		}
		

	}


	public function permissions($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['accesos'] = $this->Roles_model->availAccesos($id);
			$data['opciones'] = $this->Dropdowns->listAccesos($id);
			$data['idRol'] = $id;
			$data['menuOptions'] = $this->Roles_model->accesos();


			$this->load->view('shared/header', $data);
			$this->load->view('Roles/grantAccess', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function assign(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$id=$this->Roles_model->assign();
			$this->permissions($id);
		}else{
			redirect('welcome');
		}
	}


	public function unassign($id, $rol){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Roles_model->unassign($id);
			$this->permissions($rol);
		}else{
			redirect('welcome');
		}
	}

}
?>