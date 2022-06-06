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

function fetch_user(){  
           $this->load->model("Compras_model");  
           $fetch_data = $this->Compras_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $row->idCompra;  
                $sub_array[] = $row->fechaCompra;  
                $sub_array[] = $row->fechaEntrega;  
                $sub_array[] = $row->idProveedor;  
                $sub_array[] = $row->idProducto;  
                $sub_array[] = $row->cantidadCompra;  
                $sub_array[] = $row->tipoCompra;
              	 $sub_array[] = '<a class="btn btn-primary" href="'.base_url().'Compras/details/'.$row->idCompra.'">Detalles</a>';
                $sub_array[] = '<a class="btn btn-info" href="'.base_url().'Compras/edit/'.$row->idCompra.'">Modificar</a>'; 
                $sub_array[] = '<a class="btn btn-danger" onclick="modal('.$row->idCompra.', '.$row->idCompra.')">Eliminar</a>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Compras_model->get_all_data(),  
                "recordsFiltered" => $this->Compras_model->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
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