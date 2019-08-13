<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {

	public function __construct(){
		error_reporting(0);
		//$this->load->helper(array('form', 'url'));
		parent::__construct();
		//$this->load->model('admin/report_model', 'report_model');
		$session = $this->session->userdata('MY_SESS2');
		
		if($session['id']!= '34567'){
		redirect('/login/index', 'refresh');
		}
	}
	public function index()
	{
		//echo 's';
		$this->load->model('home2_model');
		$data['dashboard'] = $this->home2_model->dashboard();
		//print_r($data['dashboard']);
		$this->load->view('home/home2',$data);
	}
	public function details()
	{
		$this->load->view('home/details2');
	}
	public function under_process_json(){
		
		
		$this->load->model('home2_model');
		$data = $this->home2_model->under_process();
		$arr = array();
		for($i=0;$i<count($data['main']);$i++){
			$arr[] = array('lead_id'=> $data['main'][$i]['id'] ,'order_id'=> $data['main'][$i]['order_id'] ,'case_id'=> ($data['main'][$i]['case_id']=='' ? 'NA' : $data['main'][$i]['case_id']) , 'location_name'=>  $data['main'][$i]['location_name'], 'item_code'=>  $data['main'][$i]['item_code'], 'price'=>  $data['main'][$i]['price'], 'bc_name'=>  $data['main'][$i]['bc_name'], 'city'=>  $data['main'][$i]['city'], 'district'=>  $data['main'][$i]['district'], 'state'=>  $data['main'][$i]['cust_state'], 'applicant_name'=>  $data['main'][$i]['applicant_firstname'] .' '.$data['main'][$i]['applicant_middlename'].' '.$data['main'][$i]['applicant_lastname'], 'status'=>  $data['main'][$i]['status'], 'mobile_number'=>  $data['main'][$i]['mobile_number'], 'branch_code'=>  $data['main'][$i]['branch_code'], 'created_at'=>  $data['main'][$i]['created_at'],'status'=>  $data['main'][$i]['status'], 'settings'=>  '<button type="button" class="btn btn-default" onclick="settings('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Scrutiny</button>', 'edit'=>  '<button type="button" class="btn btn-default" onclick="edit('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Edit</button>', 'assign'=>  '<button type="button" class="btn btn-default" onclick="assign('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Assign to me</button>', 'mov_part'=>  '<button type="button" class="btn btn-default" onclick="mov_part('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Move to Partner </button>');
			
		}
		
				echo '{
			    "draw": '.$_POST['draw'].',
			    "recordsFiltered": "'.($data['total'] == null ? '0' : $data['total']).'",
			    "recordsTotal": "'.($data['total'] == null ? '0' : $data['total']).'",
				"data":'.json_encode( $arr, JSON_NUMERIC_CHECK ).'}';
		
	}
	public function other_leads()
	{
		$this->load->view('home/other_details2');
	}
	public function other_details_json()
	{
		$this->load->model('home_model2');
		$data = $this->home_model2->other_leads();
		$arr = array();
		for($i=0;$i<count($data['main']);$i++){
			$arr[] = array('lead_id'=> $data['main'][$i]['id'] , 'location_name'=>  $data['main'][$i]['location_name'], 'item_code'=>  $data['main'][$i]['item_code'], 'price'=>  $data['main'][$i]['price'], 'bc_name'=>  $data['main'][$i]['bc_name'], 'city'=>  $data['main'][$i]['city'], 'district'=>  $data['main'][$i]['district'], 'state'=>  $data['main'][$i]['cust_state'], 'applicant_name'=>  $data['main'][$i]['applicant_firstname'] .' '.$data['main'][$i]['applicant_middlename'].' '. $data['main'][$i]['applicant_lastname'], 'status'=>  $data['main'][$i]['status'], 'address'=>  $data['main'][$i]['address_line1'] .' '. $data['main'][$i]['address_line2'],'mobile_number'=>  $data['main'][$i]['mobile_number'], 'branch_code'=>  $data['main'][$i]['branch_code'], 'created_at'=>  $data['main'][$i]['created_at'], 'settings'=>  '<button type="button" class="btn btn-default" onclick="settings('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Scrutiny</button>', 'edit'=>  '<button type="button" class="btn btn-default" onclick="edit('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Edit</button>', 'assign'=>  '<button type="button" class="btn btn-default" onclick="assign('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Assign to me</button>', 'mov_part'=>  '<button type="button" class="btn btn-default" onclick="mov_part('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Move to Partner </button>');
			
		}
		
				echo '{
			    "draw": '.$_POST['draw'].',
			    "recordsFiltered": "'.($data['total'] == null ? '0' : $data['total']).'",
			    "recordsTotal": "'.($data['total'] == null ? '0' : $data['total']).'",
				"data":'.json_encode( $arr, JSON_NUMERIC_CHECK ).'}';
		
	}
	public function products(){
		
		$this->load->view('home/products2');
	}
	public function new_lead(){
		
		
		
		$data = array();
		$session = $this->session->userdata('MY_SESS2');
		if( $session['data'][0]['role'] == '6'){
		$this->load->model('home_model');
		$data['get_fin'] = $this->home_model->get_fin();
		}
		$data['fields'] = $_POST; 
		
		$this->load->view('home/new_lead_html2',$data);	
		
		
	}
	public function edit_lead(){
		
		$this->load->model('home_model');
		$data['data'] = $this->home_model->orderLeadByID();
		//$data['get_fin'] = $this->home_model->get_fin();
		$data['bc_details'] = $this->home_model->get_finance_bc();
		
		$this->load->view('home/edit_lead2',$data);	
		
	}
	public function settings()
	{
		$this->load->model('home_model');
		$data['data'] = $this->home_model->orderLeadByID();		
		
		
		$this->load->view('home/settings2',$data);
	}
	
}
