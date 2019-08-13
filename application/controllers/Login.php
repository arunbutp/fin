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

			if($admin_data[0]['role'] == '2'){
				$page = 'home';
			}
			if($admin_data[0]['role'] == '3' || $admin_data[0]['role'] == '4'){
				$page = 'home2';
			}

			$sess = array("id" => "34567",
				  "data" => $admin_data,
				  "l_method" => 'admin',
				  "page"=>$page );

			//echo "<pre>";
			//print_r($admin_data[0]['role']);	  
			
			$this->session->set_userdata('MY_SESS2', $sess);
			
			
			echo json_encode(array("msg"=> "success","link"=>$page));
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
	public function role_master(){
		
		$this->load->model('login_model');
		$role_master = $this->login_model->role_master();
	//	echo "<pre>";
	//	print_r($role_master);
		
		$str = "<option value=''>--select---</option>";
		for($i=0;$i<count($role_master);$i++){
			
			$str .= "<option value='".$role_master[$i]['role_id']."'>".$role_master[$i]['role_name']."</option>";
		}
		
		echo $str;
	}
	public function finance_bc(){
		
		$this->load->model('login_model');
		$finance_bc = $this->login_model->finance_bc();
	//	echo "<pre>";
	//	print_r($role_master);
		
		$str = " <div class='form-group'>
	 <label for='firstname'>Finance BC:</label><select onchange='bc_branch()' class='form-control selcls' name='finance_bc_b' id='finance_bc_b' required>
<option value=''>--select---</option>";
		for($i=0;$i<count($finance_bc);$i++){
			
			$str .= "<option value='".$finance_bc[$i]['id']."'>".$finance_bc[$i]['name']."</option>";
		}
		
		$str .="</select></div>";
		
		echo $str;
	}
	public function finance_bc_mul(){
		
		$this->load->model('login_model');
		$finance_bc = $this->login_model->finance_bc();
	//	echo "<pre>";
	//	print_r($role_master);
		
		$str = " <div class='form-group'>
	 <label for='firstname'>Finance BC:</label><select multiple  class='form-control selcls' name='rso_bc_ids[]' id='rso_bc_ids' required>
<option value=''>--select---</option>";
		for($i=0;$i<count($finance_bc);$i++){
			
			$str .= "<option value='".$finance_bc[$i]['id']."'>".$finance_bc[$i]['name']."</option>";
		}
		
		$str .="</select></div>";
		
		echo $str;
	}
		public function bc_branch_master(){
		
		$this->load->model('login_model');
		$bc_branch_master = $this->login_model->bc_branch_master();
	//	echo "<pre>";
	//	print_r($role_master);
		
		$str = " <div class='form-group'>
	 <label for='firstname'>Finance BC Branch:</label><select  class='form-control selcls' name='finance_bc_branch' id='finance_bc_branch' required>
<option value=''>--select---</option>";
		for($i=0;$i<count($bc_branch_master);$i++){
			
			$str .= "<option value='".$bc_branch_master[$i]['branch_code']."'>".$bc_branch_master[$i]['branch_name']."</option>";
		}
		
		$str .="</select></div>";
		
		echo $str;
	}

}
