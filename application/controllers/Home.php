<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		error_reporting(0);
		parent::__construct();
		//$this->load->model('admin/report_model', 'report_model');
		$session = $this->session->userdata('MY_SESS2');
		
		if($session['id']!= '34567'){
		redirect('/login/index', 'refresh');
		}
	}
	public function index()
	{
		
		$this->load->model('home_model');
		$data['dashboard'] = $this->home_model->dashboard();
		$this->load->view('home/home',$data);
	}
	public function sales()
	{
		$this->load->view('home/sales');
	}
	public function catalog()
	{
		$this->load->view('home/catalog');
	}
	public function alc()
	{
		
		$this->load->model('home_model');
		$data['menu_names'] = $this->home_model->menu_names();
		$data['get_names'] = $this->home_model->get_names();
		
		
		$this->load->view('home/alc',$data);
	}
	public function assign()
	{
		
		$this->load->model('home_model');
		$data['menu_names'] = $this->home_model->assigning();
	}
	public function check_assigned(){
		
		$this->load->model('home_model');
		$data = $this->home_model->check_assigned();
		
		//echo "<pre>";
		//print_r($data[0]['assigned_menus']);
		$chked = explode(',',$data[0]['assigned_menus']);
		
		echo json_encode($chked);
		
	}
	
	public function finance_master(){
		
		$this->load->view('home/finance_master');
	}
	public function finance_master_show(){
		
		$this->load->model('home_model');
		
		
		
		$postData = $this->input->post();
		
	//	echo $postData['action'];
		
		if($postData['action'] == 'edit'){

			 $this->home_model->finance_master_edit($postData);
			 $data = $this->home_model->finance_master_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'finance_name'=>  $data[$i]['finance_name'], 'status'=>  $data[$i]['status']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			 
		}
	    if($postData['action'] == 'create'){
			
			 $this->home_model->finance_master_create($postData);
			 $data = $this->home_model->finance_master_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'finance_name'=>  $data[$i]['finance_name'], 'status'=>  $data[$i]['status']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			
		}
		if($postData['action'] == ''){
		$data = $this->home_model->finance_master_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'finance_name'=>  $data[$i]['finance_name'], 'status'=>  $data[$i]['status']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
		}
		
		
	}
	public function finance_bc(){
		
		$this->load->view('home/finance_bc_master');
	}
	public function finance_bc_show(){
		
		$this->load->model('home_model');
		
		
		
		$postData = $this->input->post();
		
	//	echo $postData['action'];
		
		if($postData['action'] == 'edit'){

			 $this->home_model->finance_bc_edit($postData);
			 $data = $this->home_model->finance_bc_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'name'=>  $data[$i]['name'], 'description'=>  $data[$i]['description']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			 
		}
	    if($postData['action'] == 'create'){
			
			 $this->home_model->finance_bc_create($postData);
			 $data = $this->home_model->finance_bc_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'name'=>  $data[$i]['name'], 'description'=>  $data[$i]['description']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			
		}
		if($postData['action'] == ''){
		$data = $this->home_model->finance_bc_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['id'] , 'name'=>  $data[$i]['name'], 'description'=>  $data[$i]['description']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
		}
		
		
	}
	public function finance_bc_branch(){
		
		$this->load->view('home/finance_bc_branch');
	}
	public function finance_bc_branch_show(){
		
		$this->load->model('home_model');
		
		
		
		$postData = $this->input->post();
		
	//	echo $postData['action'];
		
		if($postData['action'] == 'edit'){

			 $this->home_model->finance_bc_branch_edit($postData);
			 $data = $this->home_model->finance_bc_branch_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			 
		}
	    if($postData['action'] == 'create'){
			
			 $this->home_model->finance_bc_branch_create($postData);
			 $data = $this->home_model->finance_bc_branch_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			
		}
		if($postData['action'] == ''){
		$data = $this->home_model->finance_bc_branch_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
		}
		
		
	}
	public function under_process()
	{
		$this->load->view('home/under_process');
	}
	public function settings()
	{
		$this->load->view('home/settings');
	}
	public function under_process_json(){
		
		
		$this->load->model('home_model');
		$data = $this->home_model->under_process();
		
		for($i=0;$i<count($data);$i++){
			$arr[] = array('lead_id'=> $data[$i]['id'] , 'location_name'=>  $data[$i]['location_name'], 'item_code'=>  $data[$i]['item_code'], 'price'=>  $data[$i]['price'], 'bc_name'=>  $data[$i]['bc_name'], 'city'=>  $data[$i]['city'], 'district'=>  $data[$i]['district'], 'state'=>  $data[$i]['cust_state'], 'applicant_name'=>  $data[$i]['applicant_name'], 'status'=>  $data[$i]['status'], 'mobile_number'=>  $data[$i]['mobile_number'], 'branch_code'=>  $data[$i]['branch_code'], 'created_at'=>  $data[$i]['created_at'], 'settings'=>  '<button type="button" class="btn btn-default" onclick="settings()"> <span class="glyphicon glyphicon-cog"></span>  Settings</button>');
			
		}
		
				echo '{
			    "draw": '.$_POST['draw'].',
			    "recordsFiltered": "10",
			    "recordsTotal": "10",
				"data":'.json_encode( $arr, JSON_NUMERIC_CHECK ).'}';
		
	}
	
}
