<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
	public function view($page = 'Login'){
		if(!file_exists(APPPATH.'views/'.$page.'.php')){
			show_404();
		}

		$data['title']= ucfirst($page);

		$this->load->view('shared/header');
		$this->load->view($page, $data);
		$this->load->view('shared/footer');
	}

	public function index(){
		

		$userData = $this->session->userdata('username');
		$this->load->library('encryption');
		$data['title']= ucfirst('home');

		$this->load->model('Login_model'); 
		
		if($userData == null){
			
		
		$this->session->set_userdata('username', null);
		
		$result2 = $this->Login_model->check_login($this->input->post('username'), $this->input->post('pass'));


		if($result2 !=='Contraseña incorrecta'){
			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('home', $data);
			$this->load->view('shared/footer');
			
		}else{
			redirect('welcome');

		}
		}else{

			$data['menuOptions'] = $this->Roles_model->accesos();

			$this->load->view('shared/header', $data);
			$this->load->view('home', $data);
			$this->load->view('shared/footer');

		}

		
	}


	function logout(){
		$this->session->set_userdata('username', null);
		redirect('welcome');
	}
}

?>