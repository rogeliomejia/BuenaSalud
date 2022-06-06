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

function fetch_user(){  
           $this->load->model("Categorias_model");  
           $fetch_data = $this->Categorias_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $row->idCategoria;  
                $sub_array[] = $row->categoria;  
                $sub_array[] = $row->descripcion;  
              	$sub_array[] = '<a class="btn btn-primary" href="'.base_url().'Categorias/details/'.$row->idCategoria.'">Detalles</a>';
                $sub_array[] = '<a class="btn btn-info" href="'.base_url().'Categorias/edit/'.$row->idCategoria.'">Modificar</a>'; 
                $sub_array[] = '<a class="btn btn-danger" onclick="modal('.$row->idCategoria.', '.$row->idCategoria.')">Eliminar</a>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Categorias_model->get_all_data(),  
                "recordsFiltered" => $this->Categorias_model->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
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