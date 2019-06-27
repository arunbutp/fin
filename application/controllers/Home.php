<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		//error_reporting(0);
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
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] ,'bc_name'=> $data[$i]['bc_name'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			 
		}
	    if($postData['action'] == 'create'){
			
			 $this->home_model->finance_bc_branch_create($postData);
			 $data = $this->home_model->finance_bc_branch_show();
		for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] , 'bc_name'=> $data[$i]['bc_name'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		}
		
		echo '{"data":'.json_encode($arr).'}';
			
		}
		if($postData['action'] == ''){
		$data = $this->home_model->finance_bc_branch_show();
		 for($i=0;$i<count($data);$i++){
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] ,'bc_name'=> $data[$i]['bc_name'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']);
			
		} 
		
		/* for($i=0;$i<count($data);$i++){
			$arr[] = array('DT_RowId'=> "row_".$data[$i]['branch_auto_id'] ,'id'=> $data[$i]['branch_auto_id'] ,'data'=> array('bc_name'=> $data[$i]['bc_name'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name']),'opt'=> array('name'=> $data[$i]['bc_name']));
			
		} */
		
		echo '{"data":'.json_encode($arr).'}';
		}
		
		
	}
	public function details()
	{
		$this->load->view('home/details');
	}
	public function settings()
	{
		$this->load->model('home_model');
		$data['data'] = $this->home_model->orderLeadByID();		
		
		
		$this->load->view('home/settings',$data);
	}
	public function under_process_json(){
		
		
		$this->load->model('home_model');
		$data = $this->home_model->under_process();
		
		for($i=0;$i<count($data['main']);$i++){
			$arr[] = array('lead_id'=> $data['main'][$i]['id'] , 'location_name'=>  $data['main'][$i]['location_name'], 'item_code'=>  $data['main'][$i]['item_code'], 'price'=>  $data['main'][$i]['price'], 'bc_name'=>  $data['main'][$i]['bc_name'], 'city'=>  $data['main'][$i]['city'], 'district'=>  $data['main'][$i]['district'], 'state'=>  $data['main'][$i]['cust_state'], 'applicant_name'=>  $data['main'][$i]['applicant_name'], 'status'=>  $data['main'][$i]['status'], 'mobile_number'=>  $data['main'][$i]['mobile_number'], 'branch_code'=>  $data['main'][$i]['branch_code'], 'created_at'=>  $data['main'][$i]['created_at'],'status'=>  $data['main'][$i]['status'], 'settings'=>  '<button type="button" class="btn btn-default" onclick="settings('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Settings</button>');
			
		}
		
				echo '{
			    "draw": '.$_POST['draw'].',
			    "recordsFiltered": "'.$data['total'].'",
			    "recordsTotal": "'.$data['total'].'",
				"data":'.json_encode( $arr, JSON_NUMERIC_CHECK ).'}';
		
	}
	public function register(){
		
	
		$this->load->view('home/register');	
		
	}
	public function finance_bc_upload(){
		
		$csv = $_FILES['myFile']['name'];
	//	echo $csv;
		
		$file = $_FILES['myFile']['tmp_name'];
		$handle = fopen($file, "r");
			
			
		//echo "<pre>";
		//print_r($_FILES);
		
		$this->load->model('home_model');

			$i=0;
			while (($row = fgetcsv($handle, 10000, ",")) != FALSE) 
			{
				if($i == 0){
					
					
					//echo "<pre>";
					//print_r($row);
					
					if($row[0] != 'name' || $row[1] != 'description'){
						
						//echo 'dss';
						
						echo "Template Error";
						exit;
					}
				}
				else{
				
				 $this->home_model->chk_bc_branch($row);
				}
				

			  $i++;


			}
			echo "File Uploaded";
	}
	public function case_id(){
		
		$this->load->model('home_model');
		
		$this->home_model->case_id();
		
		echo "Case ID Updated";
		
	}
	public function submit_discrepancy(){
		
		$this->load->model('home_model');
		
		$this->home_model->submit_discrepancy();
		
		echo "Case ID Updated";
		
	}
	public function lead_csv_upload(){
		
		$csv = $_FILES['myFile']['name'];
	
		$file = $_FILES['myFile']['tmp_name'];
		$handle = fopen($file, "r");
	
		$this->load->model('home_model');

			
			while (($row = fgetcsv($handle, 10000, ",")) != FALSE) 
			{
				
			$arr[]   = $row;

			}
			
			for($i=0;$i<count($arr);$i++){
				
			$case_id 			=	array_search('Sr#',$arr[0]);
			$process 			=	array_search('Process',$arr[0]);
			$action 			=	array_search('Action',$arr[0]);
			$status 			=	array_search('Status',$arr[0]);
			$remarks 			=	array_search('Remarks',$arr[0]);
			$lead_status 		=	array_search('Boonbox Lead Status',$arr[0]);
			$order_status	 	=	array_search('Boonbox Order Status',$arr[0]);
			
				
			$original_array[] = array(    'case_id'		=> $arr[$i][$case_id],
										'process'		=> $arr[$i][$process],
										'action'		=> $arr[$i][$action],
										'status'		=> $arr[$i][$status],
										'remarks'		=> $arr[$i][$remarks],
										'lead_status'	=> $arr[$i][$lead_status],
										'order_status'	=> $arr[$i][$order_status]
			
			);	
			}
			//echo "<pre>";
			//print_r($original_array);
			$str = "<div style='overflow-x:auto; height:300px;'><table  class='table table-bordered'><tr><td>ROW</td><td>Status</td></tr>";
			for($m=0;$m<count($original_array);$m++){
				
				if($m != 0){
				
				if($original_array[$m]['case_id'] == ''){
					
					//echo $m . '<br/>';
				$str .= "<tr><td>".$m."</td><td>Case ID Not Available</td></tr>";	
					
				}else{
					
				if(strlen($original_array[$m]['process']) == 0 ){
					$cell_err[] = 'Process NA';
					
				} 
				else if(strlen($original_array[$m]['action']) == 0){
					$cell_err[] = 'Action NA';
				
				} 
				else{
					
					//$cell_err[] = 'go';
					
					if(str_replace('"', '', $original_array[$m]['remarks']) == 'Cibil ok to Process'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->loan_eligible($original_array[$m]);
						
						
					}
					
					if($original_array[$m]['process'] == 'Post Approval' && $original_array[$m]['action'] == 'Discrepancy'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy_changes($original_array[$m]);
					}
					
					if($original_array[$m]['process'] == 'Post Approval' && $original_array[$m]['action'] == 'SS Completed'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->sanctioned_changes($original_array[$m]);
					}
					if($original_array[$m]['process'] == 'Boonbox Upload' && $original_array[$m]['action'] == 'Processed'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->pending_changes($original_array[$m]);
					}
					if($original_array[$m]['process'] == 'Boonbox Upload' && $original_array[$m]['action'] == 'Processed'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement_changes($original_array[$m]);
					}
					if($original_array[$m]['process'] == '' && $original_array[$m]['action'] == 'Discrepancy' && $original_array[$m]['status'] == 'BB Discrepancy'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement2_changes($original_array[$m]);
					}
					if($original_array[$m]['process'] == '' && $original_array[$m]['action'] == 'Discrepancy' && $original_array[$m]['status'] == 'BC Discrepancy'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy2_changes($original_array[$m]);
					}
					if($original_array[$m]['process'] == 'Hero-Ops' && $original_array[$m]['action'] == 'Processed' && $original_array[$m]['status'] == 'BC Discrepancy'){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement3_changes($original_array[$m]);
					}
					
					if($original_array[$m]['process'] == 'BB Delivery Confirmation' && $original_array[$m]['action'] == 'Processed' && $original_array[$m]['status'] == ''){
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursed_changes($original_array[$m]);
					}
					
					//echo 'd';
					
					
					
					
				}
					
					
					
				
					
				
				$str .= "<tr><td>".$m."</td><td>".implode(" ",$cell_err)."</td></tr>";	
					
				}
				}
				
				unset($cell_err);
				
			}
			$str .= "</div></table>";
			echo $str;
	}
	
}
