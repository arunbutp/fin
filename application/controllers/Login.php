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
		$magento_data = $this->login_model->checkmagentoAPI();
		if($admin_data){
			
			$data2 = $this->login_model->check_assigned();
			$forSess = $this->login_model->getUserDetails();
			
			//echo "<pre>";
			//print_r($data2);
			
			$ass_menus = explode(',',$data2[0]['assigned_menus']);
			
			$first_menu = min($ass_menus);
			
			$menu_name = $this->login_model->get_menu_name($first_menu);
			
		//	echo "<pre>";
		//	print_r($menu_name);
			
			
			$sess = array("id" => "3456",
				  "data" => $forSess,
				  "menus" => $ass_menus,
				  "l_method" => 'admin');
			
			$this->session->set_userdata('MY_SESS', $sess);
			
			
			echo json_encode(array("msg"=> "success","redirect_menu"=>$menu_name[0]['menu_url']));
		}else if(!empty($magento_data[0])){
			
			
			
			$data2 = $this->login_model->check_assigned();
			if($data2)
			{	
			$forSess = $this->login_model->getUserDetails();
			
			$ass_menus = explode(',',$data2[0]['assigned_menus']);
			
			$first_menu = min($ass_menus);
			
			$menu_name = $this->login_model->get_menu_name($first_menu);
			
			
			$sess = array("id" => "3456",
				  "data" => $forSess,
				  "menus" => $ass_menus,
				  "l_method" => 'magento');
			
			$this->session->set_userdata('MY_SESS', $sess);
			
			
			echo json_encode(array("msg"=> "success","redirect_menu"=>$menu_name[0]['menu_url']));
			}else{
				
			echo json_encode(array("msg"=> "error"));	
			}
		}else{
			
			echo json_encode(array("msg"=> "error"));
		}
		
	}
	public function logout(){
		
		$this->session->unset_userdata('MY_SESS');
		     redirect('/login/index', 'refresh');


		
	}
}
