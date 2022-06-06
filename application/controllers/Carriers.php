<?php
class Carriers extends CI_Controller{

	public function index(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['ListCarriers'] = $this->Dropdowns->listCarriers();
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Carriers/index', $data);
			$this->load->view('shared/footer');
		}
		else
		{
			redirect('welcome');
		}
}

function fetch_user(){  
           $this->load->model("Carriers_model");  
           $fetch_data = $this->Carriers_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $row->idCarrier;  
                $sub_array[] = $row->carrier;  
                $sub_array[] = $row->telefonoCarrier;  
              	 $sub_array[] = '<a class="btn btn-primary" href="'.base_url().'Carriers/details/'.$row->idCarrier.'">Detalles</a>';
                $sub_array[] = '<a class="btn btn-info" href="'.base_url().'Carriers/edit/'.$row->idCarrier.'">Modificar</a>'; 
                $sub_array[] = '<a class="btn btn-danger" onclick="modal('.$row->idCarrier.', '.$row->idCarrier.')">Eliminar</a>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Carriers_model->get_all_data(),  
                "recordsFiltered" => $this->Carriers_model->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
     	}

public function details($id = NULL){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['carrier'] = $this->Carriers_model->getCarrier($id);

			if(empty($data['carrier'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Carriers/details', $data);
			$this->load->view('shared/footer');

		}else{
			redirect('welcome');
		}
	}

	public function edit($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$data['carrier'] = $this->Carriers_model->getCarrier($id);
			if(empty($data['carrier'])){
				show_404();
			}

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('Carriers/edit', $data);
			$this->load->view('shared/footer');


		}else{
			redirect('welcome');
		}
	}

	public function create(){
		$userData = $this->session->userdata('username');

		if($userData != null){

			$this->form_validation->set_rules('carrier', 'carrier', 'required');

			if($this->form_validation->run()===FALSE){
				$data['menuOptions'] = $this->Roles_model->accesos();

				$this->load->view('shared/header', $data);
				$this->load->view('Carriers/create');
				$this->load->view('shared/footer');
			}else{
				$this->Carriers_model->createCarrier();
				redirect('Carriers/index');
			}
		
		}else{
			redirect('welcome');

		}
	}

public function update(){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Carriers_model->update();

			redirect('Carriers/index');


		}else{
			redirect('welcome');
		}
	}

	public function delete($id){
		$userData = $this->session->userdata('username');

		if($userData != null){
			$this->Carriers_model->delete($id);
			redirect('Carriers/index');
		}else{
			redirect('welcome');
		}
	}
}

?>