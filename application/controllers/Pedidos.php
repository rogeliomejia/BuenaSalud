<?php
class Pedidos extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListPedidos'] = $this->Dropdowns->listPedidos();
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Pedidos/index', $data);
			$this->load->view('shared/footer');
		}
		else
		{
			redirect('welcome');
		}
}

function fetch_user(){  
           $this->load->model("Pedidos_model");  
           $fetch_data = $this->Pedidos_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $row->idPedido;  
                $sub_array[] = $row->idCliente;  
                $sub_array[] = $row->idCarrier;
                $sub_array[] = $row->idSucursal; 
                $sub_array[] = $row->fechaPedido; 
                $sub_array[] = $row->fechaEnvioVenta; 
                $sub_array[] = $row->entregado; 
                $sub_array[] = $row->costoEnvio;   
              	 $sub_array[] = '<a class="btn btn-primary" href="'.base_url().'Pedidos/details/'.$row->idPedido.'">Detalles</a>';
                $sub_array[] = '<a class="btn btn-info" href="'.base_url().'Pedidos/edit/'.$row->idPedido.'">Modificar</a>'; 
                $sub_array[] = '<a class="btn btn-danger" onclick="modal('.$row->idPedido.', '.$row->idPedido.')">Eliminar</a>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Pedidos_model->get_all_data(),  
                "recordsFiltered" => $this->Pedidos_model->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
     	}

public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['idPedido'] = $this->Pedidos_model->getPedido($id);

			if(empty($data['idPedido'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Pedidos/details', $data);
			$this->load->view('shared/footer');

		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['idCliente'] = $this->Pedidos_model->getPedido($id);
			if(empty($data['idCliente'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Pedidos/edit', $data);
			$this->load->view('shared/footer');

		}else{
			redirect('welcome');
		}
	}

	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('idPedido', 'idPedido', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Pedidos/create');
				$this->load->view('shared/footer');
			}else{
				$this->Pedidos_model->createPedido();
				redirect('Pedidos/index');
			}
		
		}else{
			redirect('welcome');
		}
	}

public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Pedidos_model->update();

			redirect('Pedidos/index');

		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Pedidos_model->delete($id);
			redirect('Pedidos/index');
		}else{
			redirect('welcome');
		}
	}
}

?>