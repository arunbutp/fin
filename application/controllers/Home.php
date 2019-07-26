<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function create_finance_master(){
		
		
		echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><div class="container"><form method="POST" action="">
  <div class="form-group">
    <label for="email">Finance Name::</label>
    <input type="text" class="form-control" value="'.$_POST['finance_name'].'" name="finance_name" id="finance_name" required>
  </div>
  <div class="form-group">
    <label for="pwd">Status:</label>
    <input type="text" class="form-control" value="'.$_POST['status'].'" name="status" id="status" required>
  </div>
   <input type="hidden" class="form-control" name="action" id="action">
  <button type="submit" name="submit" class="btn btn-default">Create</button>
</form></div>';


if(isset($_POST['submit'])){
	
		$this->load->model('home_model');
		$data = $this->home_model->finance_master_create($_POST);
		echo $data;
	
}
	
		
	}
	
	public function finance_master_editpop(){
		
		
		$this->load->model('home_model');
		$details = $this->home_model->finance_master_editpop($_GET['id']);
		//echo $details[0]['finance_name'];
		
		echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><div class="container" style="width:350px"><form method="POST" action="">
  <div class="form-group row">
  <div class="">
    <label for="email">Finance Name::</label>
    <input type="text" class="form-control" value="'.($_POST['finance_name'] == '' ? $details[0]['finance_name'] : $_POST['finance_name']).'" name="finance_name" id="finance_name" required>
  </div>
  </div>
  <div class="form-group row">
  <div class="">
    <label for="pwd">Status:</label>
    <input type="text" class="form-control" value="'.($_POST['status'] == '' ? $details[0]['status'] : $_POST['status']).'" name="status" id="status" required>
	<input type="hidden" class="form-control" value="'.$_GET['id'].'" name="id" id="id" >
  </div>
  </div>
   <input type="hidden" class="form-control" name="action" id="action">
  <button type="submit" name="submit" class="btn btn-default">Update</button>
</form></div>';



		if(isset($_POST['submit'])){
			
				$this->load->model('home_model');
				$data = $this->home_model->finance_master_sub_edit_popup($_POST);
				echo $data;
			
		}


		
		
		
	}
	public function create_finance_bc_master(){
		
		    
			if(isset($_POST['submit'])){
				
				
				$this->load->model('home_model');
				$data['status'] = $this->home_model->finance_bc_create($_POST);
				$this->load->view('create_finance_bc_master',$data);
				
			}else{
				$this->load->view('create_finance_bc_master');
			}
			
	}
	public function create_finance_bc_branch(){
		
		    
			if(isset($_POST['submit'])){
				
				
				$this->load->model('home_model');
				$data['status'] = $this->home_model->finance_bc_branch_create_popup($_POST);
				$data['bc_details'] = $this->home_model->get_finance_bc();
				$this->load->view('home/create_finance_bc_branch',$data);
				
			}else{
				$this->load->model('home_model');
				$data['bc_details'] = $this->home_model->get_finance_bc();
				$this->load->view('home/create_finance_bc_branch',$data);
			}
			
	}
	public function finance_bc_editpop(){
		
		
		
		if(isset($_POST['submit'])){
		$this->load->model('home_model');
		$data['status'] = $this->home_model->finance_bc_edit_row($_POST);	
		$data['rows'] = $this->home_model->finance_bc_get_row($_POST['id']);
		$this->load->view('home/edit_finance_bc_master',$data);
		}else{
		$this->load->model('home_model');
		$data['rows'] = $this->home_model->finance_bc_get_row($_GET['id']);
		$this->load->view('home/edit_finance_bc_master',$data);
			
		}
		
	}
	public function finance_bc_branch_editpop(){
		
		
		
		if(isset($_POST['submit'])){
		$this->load->model('home_model');
		$data['status'] = $this->home_model->finance_bc_branch_edit_row($_POST);	
		$data['rows'] = $this->home_model->finance_bc_branch_get_row($_POST['id']);
		$data['bc_details'] = $this->home_model->get_finance_bc();
		$this->load->view('home/edit_finance_bc_branch_master',$data);
		}else{
		$this->load->model('home_model');
		$data['rows'] = $this->home_model->finance_bc_branch_get_row($_GET['id']);
		$data['bc_details'] = $this->home_model->get_finance_bc();
		$this->load->view('home/edit_finance_bc_branch_master',$data);
			
		}
		
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
			$arr[] = array('id'=> $data[$i]['id'] , 'name'=>  $data[$i]['name'], 'description'=>  $data[$i]['description'],'edit'=>  '<button id="edit" onclick="edit('.$data[$i]['id'].')"value="'.$data[$i]['id'].'" class="btn btn-default">Edit</button>');
			
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
			$arr[] = array('id'=> $data[$i]['branch_auto_id'] ,'bc_name'=> $data[$i]['bc_name'] , 'bc_id'=>  $data[$i]['bc_id'], 'branch_code'=>  $data[$i]['branch_code'], 'branch_name'=>  $data[$i]['branch_name'],'edit'=> '<button id="edit" onclick="edit('.$data[$i]['branch_auto_id'].')" value="'.$data[$i]['branch_auto_id'].'" class="btn btn-default">Edit</button>');
			
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
		$arr = array();
		for($i=0;$i<count($data['main']);$i++){
			$arr[] = array('lead_id'=> $data['main'][$i]['id'] , 'location_name'=>  $data['main'][$i]['location_name'], 'item_code'=>  $data['main'][$i]['item_code'], 'price'=>  $data['main'][$i]['price'], 'bc_name'=>  $data['main'][$i]['bc_name'], 'city'=>  $data['main'][$i]['city'], 'district'=>  $data['main'][$i]['district'], 'state'=>  $data['main'][$i]['cust_state'], 'applicant_name'=>  $data['main'][$i]['applicant_name'], 'status'=>  $data['main'][$i]['status'], 'mobile_number'=>  $data['main'][$i]['mobile_number'], 'branch_code'=>  $data['main'][$i]['branch_code'], 'created_at'=>  $data['main'][$i]['created_at'],'status'=>  $data['main'][$i]['status'], 'settings'=>  '<button type="button" class="btn btn-default" onclick="settings('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Scrutiny</button>', 'edit'=>  '<button type="button" class="btn btn-default" onclick="edit('.$data['main'][$i]['id'].')"> <span class="glyphicon glyphicon-cog"></span>  Edit</button>');
			
		}
		
				echo '{
			    "draw": '.$_POST['draw'].',
			    "recordsFiltered": "'.($data['total'] == null ? '0' : $data['total']).'",
			    "recordsTotal": "'.($data['total'] == null ? '0' : $data['total']).'",
				"data":'.json_encode( $arr, JSON_NUMERIC_CHECK ).'}';
		
	}
	public function edit_lead(){
		
		$this->load->model('home_model');
		$data['data'] = $this->home_model->orderLeadByID();
		
		$this->load->view('home/edit_lead',$data);	
		
	}
	public function lead_update(){
		$this->load->model('home_model');
		$data['data'] = $this->home_model->update_lead();
		
		
		
	}
	public function register(){
		
		
		$this->load->view('home/register');	
		
	}
	public function before_approval(){
		
		$this->load->model('home_model');
		$data['data'] = $this->home_model->get_pdf();
		
		
		$this->load->view('home/before_approval',$data);	
	}
	
	public function after_approval(){
		
		$this->load->model('home_model');
		$data['data'] = $this->home_model->get_pdf();
		
		$this->load->view('home/after_approval',$data);	
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
		
		$data = $this->home_model->case_id();
		
		echo $data;
		
	}
	public function submit_discrepancy(){
		
		$this->load->model('home_model');
		
		$this->home_model->submit_discrepancy();
		
		echo "<div class='alert alert-success'>Discrepancy Updated</div>";
		
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
			$str = "<div style='overflow-x:auto; height:300px;'><table  class='table table-bordered'><tr><td>Case ID</td><td>Status</td></tr>";
			for($m=0;$m<count($original_array);$m++){
				
				if($m != 0){
				
				if($original_array[$m]['case_id'] == ''){
					
					//echo $m . '<br/>';
				$str .= "<tr><td>NA</td><td>Case ID Not Available</td></tr>";	
					
				}else{
					
				/*  if(strlen($original_array[$m]['process']) == 0 ){
					$cell_err[] = 'Process NA';
					
				} 
				else if(strlen($original_array[$m]['action']) == 0){
					$cell_err[] = 'Action NA';
				
				} 
				else{  */
					
					//$cell_err[] = 'go';
					
					
					if($original_array[$m]['process'] == 'RCF Document Check' && $original_array[$m]['action'] == 'Discrepancy'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy_first_changes($original_array[$m]);
						}
					}
					
					if($original_array[$m]['process'] == 'RCF QDE' && $original_array[$m]['action'] == '-'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->under_process_first_changes($original_array[$m]);
						}
					}
					
					if($original_array[$m]['process'] == 'RCF QDE' && $original_array[$m]['action'] == 'Discrepancy'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy_second_changes($original_array[$m]);
						}
					}
					if(str_replace('"', '', $original_array[$m]['remarks']) == 'Cibil ok to Process'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->loan_eligible($original_array[$m]);
						}
						
						
					}
					
					if($original_array[$m]['process'] == 'Post Approval' && $original_array[$m]['action'] == 'Discrepancy'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy_changes($original_array[$m]);
						}
					}
					
					if($original_array[$m]['process'] == 'Post Approval' && $original_array[$m]['action'] == 'SS Completed'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->sanctioned_changes($original_array[$m]);
						}
					}
					if($original_array[$m]['process'] == 'Boonbox Upload' && $original_array[$m]['action'] == 'Processed' && $original_array[$m]['lead_status'] == 'Pending Order Confirmation'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->pending_changes($original_array[$m]);
						}
					}
					if($original_array[$m]['process'] == 'Boonbox Upload' && $original_array[$m]['action'] == 'Processed' && $original_array[$m]['lead_status'] == 'Disbursement In Progress'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement_changes($original_array[$m]);
						}
					}
					if($original_array[$m]['process'] == '' && $original_array[$m]['action'] == 'Discrepancy' && $original_array[$m]['status'] == 'BB Discrepancy'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement2_changes($original_array[$m]);
						}
					}
					if($original_array[$m]['process'] == '' && $original_array[$m]['action'] == 'Discrepancy' && $original_array[$m]['status'] == 'BC Discrepancy'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->discrepancy2_changes($original_array[$m]);
						}
					}
					if($original_array[$m]['process'] == 'Hero-Ops' && $original_array[$m]['action'] == 'Processed'){
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursement3_changes($original_array[$m]);
						}
					}
					
					if($original_array[$m]['process'] == 'BB Delivery Confirmation' && $original_array[$m]['action'] == 'Processed'){
						
						$disbursed_chk = $this->disbursed_chk($original_array[$m]);
						if($disbursed_chk){
							$cell_err[] ='Case Disbursed Already';
						}else{
						
						$this->load->model('home_model');
						$cell_err[] = $this->home_model->disbursed_changes($original_array[$m]);
						}
					}
					
					//echo 'd';
					
					
					
					
				/* } */
					
					
					
				
					
				
				$str .= "<tr><td>".$original_array[$m]['case_id']."</td><td>".implode(" ",$cell_err)."</td></tr>";	
					
				}
				}
				
				unset($cell_err);
				
			}
			$str .= "</div></table>";
			echo $str;
	}
	public function disbursed_chk($row){
		
		$this->load->model('home_model');
		$chk = $this->home_model->disbursed_chk($row);
		
		return $chk;
						
						
	}
	public function new_lead(){
		
		
		
		$data = array();
		$session = $this->session->userdata('MY_SESS2');
		if( $session['data'][0]['role'] == '6'){
		$this->load->model('home_model');
		$data['get_fin'] = $this->home_model->get_fin();
		}
		$data['fields'] = $_POST; 
		
		$this->load->view('home/new_lead_html',$data);	
		
		
	}
	public function get_bra(){
		
		$this->load->model('home_model');
		$data['get_bra'] = $this->home_model->get_bra();
		
		
		$str = '<option value="">-- please select --</option>';
		for($i=0;$i<count($data['get_bra']);$i++){
		$str .= '<option value="'.$data['get_bra'][$i]['branch_code'].'">'.$data['get_bra'][$i]['branch_name'].'</option>';	
		}
		echo $str;
	}
	public function get_field(){
		
		$this->load->model('home_model');
		$data['get_bra'] = $this->home_model->get_field();
		
		
		$str = '<option value="">-- please select --</option>';
		for($i=0;$i<count($data['get_bra']);$i++){
		$str .= '<option value="'.$data['get_bra'][$i]['userName'].'">'.$data['get_bra'][$i]['firstname'].'</option>';	
		}
		echo $str;
	}
	public function products(){
		
		$this->load->view('home/products');
	}
	public function lead_upload(){
		
		$this->load->model('home_model');
		$data['get_bra'] = $this->home_model->insert_lead();

		//echo "<pre>";
		//print_r($_FILES);
	}
	
}
