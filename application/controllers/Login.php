<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('login');
	}

	
}

?>