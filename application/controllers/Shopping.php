<?php
class Shopping extends CI_Controller{


public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			//$data['ListProductos'] = $this->Shopping_model->listShopping();
			$data['ListProductos'] = $this->Dropdowns->listProductos();
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Shopping/index', $data);
			$this->load->view('shared/footer');
		}else{
			redirect('welcome');

		}
}

public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){
$data['ListProductos'] = $this->Dropdowns->listProductos();
			$data['menuOptions'] = $this->Roles_model->accesos();

		$idPedido=$this->Shopping_model->createShopping();
			//$idPedido=1;

			$arrProductos = json_decode($this->input->post('iterar'));

			foreach($arrProductos as $prod){
		$this->Shopping_model->createDetalle($idPedido, $prod->idProducto, $prod->cantidad);
			}

		redirect('Shopping/index');
		
		}else{
			redirect('welcome');

		}
	}


	public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Accesos_model->updateAcceso();

			redirect('Shopping/index');


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
			$this->load->view('Shopping/edit', $data);
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
				redirect('Shopping/index');
			}

			redirect('Shopping/index');
		}else{
			redirect('welcome');
		}

}

}

?>