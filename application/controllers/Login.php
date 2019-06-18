<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('admin/report_model', 'report_model');
	}
	public function index()
	{
		$this->load->view('login/login');
	}
	public function authendication(){
		
		$this->load->model('login_model');
		$admin_data = $this->login_model->check();
	
		if($admin_data){

			$sess = array("id" => "34567",
				  "data" => $admin_data,
				  "l_method" => 'admin');
			
			$this->session->set_userdata('MY_SESS2', $sess);
			
			
			echo json_encode(array("msg"=> "success"));
		}else{
			
			echo json_encode(array("msg"=> "error"));
		}
		
	}
	public function logout(){
		
		$this->session->unset_userdata('MY_SESS2');
		     redirect('/login/index', 'refresh');


		
	}
	public function registration(){
		
		$this->load->model('login_model');
		$register_check = $this->login_model->register_check();
		
		if($register_check){
			
			echo json_encode(array("msg"=> "error","status_msg"=> 'User Name Already Exists'));
		}else{
			
			$insert_register = $this->login_model->insert_register();
			
			echo json_encode(array("msg"=> "success","status_msg"=> 'Registration completed'));
			
		}

		
	}
}
