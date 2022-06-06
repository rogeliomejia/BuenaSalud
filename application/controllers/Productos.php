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


	public function fetch_user(){  
           $this->load->model("Productos_model");  
           $fetch_data = $this->Productos_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $row->idProducto;  
                $sub_array[] = $row->producto;  
                $sub_array[] = $row->idCategoria; 
                $sub_array[] = $row->descripcionProducto; 
                $sub_array[] = $row->precio; 
                $sub_array[] = $row->existencias; 
              	$sub_array[] = '<a class="btn btn-primary" href="'.base_url().'Productos/details/'.$row->idProducto.'">Detalles</a>';
                $sub_array[] = '<a class="btn btn-info" href="'.base_url().'Productos/edit/'.$row->idProducto.'">Modificar</a>'; 
                $sub_array[] = '<a class="btn btn-danger" onclick="modal('.$row->idProducto.', '.$row->idProducto.')">Eliminar</a>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Productos_model->get_all_data(),  
                "recordsFiltered" => $this->Productos_model->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
     	}

}

?>