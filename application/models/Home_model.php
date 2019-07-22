<?php
	class Home_model extends CI_Model{
		public function __construct(){
			
			
			
		}
		
         public function menu_names(){
			
				
			$SQL = "SELECT * FROM `menu_names`";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		} 
		
		public function get_names(){
			
			   $otherdb = $this->load->database('second', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
			   $SQL = "SELECT * FROM `admin_user` order by firstname,lastname asc";
			   
			   
			   $query = $otherdb->query($SQL);
			   
			   return $query->result_array();
			
		}
		public function assigning(){
			
			$name = 	$this->input->post('name', TRUE);
			$chk_value= $this->input->post('chk_value', TRUE);

			$SQL = "select * from assigned_menus where username = '$name'";
			
			$query = $this->db->query($SQL);
			
			$num = $query->result_array();
			
			// code for checking existing record.
			   if($num){
					$SQL = "UPDATE assigned_menus SET assigned_menus='$chk_value' WHERE username='$name';";
			
					$query = $this->db->query($SQL);
			   }
			   else{
				   
				   $SQL = "INSERT INTO assigned_menus (username,assigned_menus) VALUES ('".$name."','".$chk_value."')";

					$query = $this->db->query($SQL);
					
					
					
					
					$SQL = "select * from users where userName = '$name'";
			
					$query = $this->db->query($SQL);
					
					$chk = $query->result_array();
					
					if(!$chk){
						
						   $otherdb = $this->load->database('second', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
						   $SQL = "SELECT * FROM `admin_user` where username='$name'";
						   
						   
						   $query = $otherdb->query($SQL);
						   
						   $result = $query->result_array();
					//	   echo "<pre>";
					//	   print_r($result);
						   
						    $SQL = "INSERT INTO users (userName,email,name,emp_code,contact_no) VALUES ('".$name."','".$result[0]['email']."','".$result[0]['firstname'].' ' .$result[0]['lastname']."','".$result[0]['emp_code']."','".$result[0]['contact_no']."')";

							$query = $this->db->query($SQL);
						   
						
					}
					
					
			   }
	
			
		}
		public function get_pdf(){
			
			$id = 	$this->input->get('id', TRUE);
			
			$SQL = "SELECT * FROM `orderlead_info` where id = '$id'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function check_assigned(){
			
			$name = 	$this->input->post('username', TRUE);
			
			$SQL = "SELECT * FROM `assigned_menus` where username = '$name'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
		}
		public function dashboard(){
			
			$session = $this->session->userdata('MY_SESS2');
			
			//echo "<pre>";
			//print_r($session['data'][0]['rso_bc_ids']);
			
			
			
			if($session['data'][0]['role'] == 2){
				
				$str = "";
			}else if($session['data'][0]['role'] == 4){
				
				
				$str = "WHERE oi.branch_code = '".$session['data'][0]['branch_id']."' OR oi.branch_code = '01001,01002'";
			}else if($session['data'][0]['role'] == 3){
				
				
				$str = "WHERE oi.bc_code = '".$session['data'][0]['bc_id']."' OR oi.branch_code = '01001,01002'";
			}else if($session['data'][0]['role'] == 6){
				
				$bc_ids = $session['data'][0]['rso_bc_ids'];
				$str = "WHERE bc_code IN (".$bc_ids.")  OR oi.branch_code = '01001,01002'";
			}else if($session['data'][0]['role'] == 5){
				
				
				$str = "WHERE oi.username = '".$session['data'][0]['userName']."' OR oi.rso_username = '".$session['data'][0]['userName']."' OR oi.branch_code = '01001,01002'";
			}else{
				
				$str = "WHERE oi.username = '".$session['data'][0]['userName']."' OR oi.rso_username = '".$session['data'][0]['userName']."' OR oi.branch_code = '01001,01002'";
			}
			
			 $SQL = "SELECT COUNT(*) AS total_lead,IFNULL(SUM(IF(lead_type != 1,1,0)),0) AS otherleads,IFNULL(SUM(IF(oi.status='Under Process' AND lead_type = 1,1,0)),0) AS under_process, IFNULL(SUM(IF(oi.status='Loan Eligible' AND lead_type = 1,1,0)),0) AS loan_eligible, IFNULL(SUM(IF(oi.status='Discrepancy' AND lead_type = 1,1,0)),0) AS discrepancy, IFNULL(SUM(IF(oi.status='Sanctioned' AND lead_type = 1,1,0)),0) AS sanctioned, IFNULL(SUM(IF(oi.status='Pending Order Confirmation' AND lead_type = 1,1,0)),0) AS order_confim, IFNULL(SUM(IF(oi.status='Disbursement In Progress' AND lead_type = 1,1,0)),0) AS disbursement, IFNULL(SUM(IF(oi.status='Disbursed' AND lead_type = 1,1,0)),0) AS disbursed, IFNULL(SUM(IF(oi.status='Canceled' AND lead_type = 1,1,0)),0) AS rejected FROM orderlead_info AS oi $str";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		public function finance_master_show(){
			
			$session = $this->session->userdata('MY_SESS2');
			
			$SQL = "SELECT * from finance_master";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		public function finance_master_editpop($id){
			
			//$session = $this->session->userdata('MY_SESS2');
			
			$SQL = "SELECT * from finance_master where id='$id'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		public function get_finance_bc(){
			
			$SQL = "SELECT * from finance_bc_master";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
		}
		public function finance_bc_branch_create_popup($vals){
			$SQL2 = "SELECT * FROM finance_bc_branch_master where branch_name = '".$vals['branch_name']."' and branch_code = '".$vals['branch_code']."'";
			
			$query2 = $this->db->query($SQL2);
		   
			$chk =  $query2->result_array();
			
			if(!$chk){
			
			 $SQL =  "INSERT INTO finance_bc_branch_master (bc_id,branch_code,branch_name) VALUES ('".$vals['bc_id']."', '".$vals['branch_code']."', '".$vals['branch_name']."')";
		
		
			
			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'><strong>Success!</strong>Successfully Added.</div>";
			}else{
				
			return "<div class='alert alert-danger'>Given name already exist please use different name</div>";	
				
			}
		}
		public function finance_master_sub_edit_popup($data){
			
			
			 $SQL2 = "SELECT * FROM finance_master where finance_name = '".$data['finance_name']."'";
			
			$query2 = $this->db->query($SQL2);
		   
			$chk =  $query2->result_array();
			
			if(!$chk){
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL = "UPDATE finance_master SET finance_name='".$data['finance_name']."' WHERE id='".$data['id']."'";
			
			$query = $this->db->query($SQL);

			return "<div class='alert alert-success'>Successfully updated</div>";
			}else{
				
			return "<div class='alert alert-danger'>Given name already exist please use different name</div>";	
			}
			
			
		}
		public function finance_master_edit($data){
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			$id = array_keys($data['data']);
			
			$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL = "UPDATE finance_master SET finance_name='".$data['data'][$pure_id]['finance_name']."' WHERE id='".$id[0]."'";
			
			$query = $this->db->query($SQL);

			return $query;
			
			
		}
		public function finance_master_create($data){
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			 $SQL2 = "SELECT * FROM finance_master where finance_name = '".$data['finance_name']."'";
			
			$query2 = $this->db->query($SQL2);
		   
			$chk =  $query2->result_array();
			
			if(!$chk){
			
			 $SQL =  "INSERT INTO finance_master (finance_name, status) VALUES ('".$data['finance_name']."', '".$data['status']."')";
		
		
			
			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'>Successfully created</div>";
			}else{
				
			return "<div class='alert alert-danger'>Given name already exist please use different name</div>";	
				
			}
	
		}
		public function finance_bc_show(){
			
			$session = $this->session->userdata('MY_SESS2');
			
			$SQL = "SELECT * from finance_bc_master";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
			public function finance_bc_edit($data){
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			$id = array_keys($data['data']);
			
			$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL = "UPDATE finance_bc_master SET name='".$data['data'][$pure_id]['name']."' WHERE id='".$id[0]."'";
			
			$query = $this->db->query($SQL);

			return $query;
			
			
		}
		public function finance_bc_create($data){
			
			
			$SQL = "SELECT * from finance_bc_master where name='".$data['name']."'";
			
			$query = $this->db->query($SQL);

			$chk = $query->result_array();
			
			if(!$chk){
			
			
			$SQL =  "INSERT INTO finance_bc_master (name, description) VALUES ('".$data['name']."', '".$data['data']['description']."')";
		
		
			
			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'>Successfully added.</div>";
			
			}else{
				
				return "<div class='alert alert-danger'>Given name already exist. please use different one.</div>";
			}

			
			
			
		}
		public function finance_bc_edit_row($data){
			
			
			$SQL = "SELECT * from finance_bc_master where name='".$data['name']."'";
			
			$query = $this->db->query($SQL);

			$chk = $query->result_array();
			
			if(!$chk){
			
			
			$SQL =  "UPDATE finance_bc_master SET name= '".$data['name']."', description='".$data['description']."' where id= '".$data['id']."'";
		
		
			
			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'>Successfully added.</div>";
			
			}else{
				
				return "<div class='alert alert-danger'>Given name already exist. please use different one.</div>";
			}

			
			
			
		}
		public function finance_bc_branch_edit_row($data){
			
			
			$SQL = "SELECT * from finance_bc_branch_master where branch_code='".$data['branch_code']."' and branch_name='".$data['branch_name']."'";
			
			$query = $this->db->query($SQL);

			$chk = $query->result_array();
			
			if(!$chk){
			
			
			$SQL =  "UPDATE finance_bc_branch_master SET branch_code= '".$data['branch_code']."', branch_name='".$data['branch_name']."' where branch_auto_id= '".$data['id']."'";
		
		
			
			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'>Successfully added.</div>";
			
			}else{
				
				return "<div class='alert alert-danger'>Given name already exist. please use different one.</div>";
			}

			
			
			
		}
		public function finance_bc_get_row($id){
			
			$SQL = "SELECT * from finance_bc_master where id='".$id."'";
			
			$query = $this->db->query($SQL);

			$data = $query->result_array();
			
			return $data;
		}
		public function finance_bc_branch_get_row($id){
			
			$SQL = "SELECT * from finance_bc_branch_master where branch_auto_id='".$id."'";
			
			$query = $this->db->query($SQL);

			$data = $query->result_array();
			
			return $data;
		}
		public function finance_bc_branch_show(){
			
			$session = $this->session->userdata('MY_SESS2');
			
			$SQL = " SELECT t2.name as bc_name,t1.* FROM finance_bc_branch_master AS t1 LEFT JOIN finance_bc_master AS t2 ON t1.bc_id = t2.id";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
			public function finance_bc_branch_edit($data){
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			$id = array_keys($data['data']);
			
			$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL = "UPDATE finance_bc_branch_master SET bc_id='".$data['data'][$pure_id]['bc_id']."',branch_code='".$data['data'][$pure_id]['branch_code']."',branch_name='".$data['data'][$pure_id]['branch_name']."',  WHERE id='".$id[0]."'";
			
			$query = $this->db->query($SQL);

			return $query;
			
			
		}
		public function finance_bc_branch_create($data){
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			// $id = array_keys($data['data']);
			
		//	$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL =  "INSERT INTO finance_bc_branch_master (bc_id, branch_code, branch_name) VALUES ('".$data['data'][0]['bc_id']."', '".$data['data'][0]['branch_code']."', '".$data['data'][0]['branch_name']."')";
		
		
			
			$query = $this->db->query($SQL);

			return $query;
			
			
		}
		public function under_process(){
			
			$session = $this->session->userdata('MY_SESS2');
			
			$start = $this->input->post('start');
			$limit = $this->input->post('length');
			
			if($limit!='' && $start!=''){
				//$this->db->limit($limit, $start);
				
				$limit_rows = "LIMIT $start,$limit";
			}
			$task = $this->input->get('task');
			
			if($task == 'Other Leads'){
				
				$lead_type = '(lp.lead_type != 1) AND';
			}else{
				//echo $task;
				$lead_type = '(lp.lead_type = 1) AND';
				$status = "AND (lp.status = '$task')"; 
			}
			
			
			if($task == 'Total Lead'){
				$lead_type = '';
				$status = '';
			}
			

			if($session['data'][0]['role'] == 2){
				
				$str = "WHERE (lp.lead_type = 1)  $status";
			}else if($session['data'][0]['role'] == 4){
				
				
				$str = "WHERE $lead_type lp.branch_code = '".$session['data'][0]['branch_id']."' OR lp.branch_code = '01001,01002' $status";
			}else if($session['data'][0]['role'] == 3){
				
				
				$str = "WHERE $lead_type lp.bc_code = '".$session['data'][0]['bc_id']."' OR lp.branch_code = '01001,01002' $status";
			}else if($session['data'][0]['role'] == 6){
				
				$bc_ids = $session['data'][0]['rso_bc_ids'];
				$str = "WHERE $lead_type lp.bc_code IN (".$bc_ids.")  OR lp.branch_code = '01001,01002' $status";
			}else if($session['data'][0]['role'] == 5){
				
				$str = "WHERE $lead_type  (lp.username = '".$session['data'][0]['userName']."' OR lp.rso_username = '".$session['data'][0]['userName']."' OR 
 lp.branch_code = '01001,01002') $status";
 
			}else{
				$str = "WHERE $lead_type  (lp.username = '".$session['data'][0]['userName']."' OR lp.rso_username = '".$session['data'][0]['userName']."' OR 
 lp.branch_code = '01001,01002') $status";
			}			
			
			 $SQL = "SELECT SQL_CALC_FOUND_ROWS lp.*,CONCAT(lp.applicant_firstname,'',lp.applicant_lastname) AS applicant_name,
IF(lp.status != 'Disbursed','true','false') AS can_approve,IFNULL(lp.cas_id,'') AS cas_id,
 IF(lp.case_id IS NULL,'','') AS cas_id_empty,IFNULL(lp.discrepancy_comment,'') AS discrepancy_comment,
 IFNULL(lp.case_id,'') AS case_id,lp.id AS lead_id,fb.finance_name 
 AS bc_name FROM orderlead_info AS lp  
 LEFT JOIN finance_bc_branch_master AS jd ON jd.branch_code = lp.branch_code 
 LEFT JOIN finance_master AS fb ON fb.id = jd.bc_id
 $str ORDER BY id DESC $limit_rows";
			
			$query = $this->db->query($SQL);
			
			$data['main'] = $query->result_array();
			
				$total = 0;
				if(!empty($data['main'])) { 
				$sql2 = "SELECT FOUND_ROWS() as total"; 
				$query1 = $this->db->query($sql2); 
				$row = $query1->row(); 
				$data['total'] = $row->total; // suppose you get total as 150 
				}

			return $data;
		}
		public function chk_bc_branch($arr){
			
			
			$SQL = "SELECT * FROM `finance_bc_master` where name='".$arr[0]."'";
		   
		   
		   $query = $this->db->query($SQL);
		   
		   $result = $query->result_array();
		   
		   
		   if(!$result){

		   
			$SQL = "INSERT INTO finance_bc_master (name,description) VALUES ('".$arr[0]."','".$arr[1]."')";

			$query = $this->db->query($SQL);
			
		   }
		}
		public function orderLeadByID(){
			
			
		   $id = $this->input->get('id');
			
		   $SQL = "SELECT * FROM `orderlead_info` where id='".$id."'";
		   
		   $query = $this->db->query($SQL);
		   
		   return $query->result_array();
		   
		   
		}
		public function get_fin(){
		   
		   $session = $this->session->userdata('MY_SESS2');
		   
		   
		   $SQL = "SELECT * FROM `finance_bc_master` where id IN (".$session['data'][0]['rso_bc_ids'].")";
		
		   
		   $query = $this->db->query($SQL);
		   
		   return $query->result_array();
			
		}
		public function get_bra(){
		   
		   $finance = $this->input->get_post('finance');
		   
		   $arr_fin = explode('-',$finance);
		   $SQL = "SELECT * FROM `finance_bc_branch_master` where bc_id = '".$arr_fin[0]."'";

		   $query = $this->db->query($SQL);
		   
		   return $query->result_array();
			
		}
		public function get_field(){
		   
		   $branch = $this->input->get_post('branch');
		   
		   $SQL = "SELECT * FROM `users` where branch_id = '$branch'";

		   $query = $this->db->query($SQL);
		   
		   return $query->result_array();
			
		}
		public function case_id(){
			
			$id 	 = $this->input->get('id');
			$case_id = $this->input->get('case_id');
			
			$SQL = "SELECT * FROM orderlead_info where case_id='$case_id'";
			$query = $this->db->query($SQL);
		   
		    $chk = $query->result_array();
			
			if(!$chk){
			
			 $SQL = "UPDATE orderlead_info SET case_id='$case_id' WHERE id='$id'";

			$query = $this->db->query($SQL);
			
			$SQL = "INSERT INTO orderlead_upload_history (parent_id, action, reason,process,status)
VALUES ('$id', '-', 'Case ID Updated','','');";

			$query = $this->db->query($SQL);
			return "<div class='alert alert-success'>Case ID Updated</div>" ;
			}else{
				
			return "<div class='alert alert-danger'>Given Case ID already exists. Please use differently.</div>" ;	
			}
			
			
			
		}
		public function submit_discrepancy(){
			
			$id 	 = $this->input->get('id');
			$discrepency = $this->input->get('discrepency');
			
			$SQL = "UPDATE orderlead_info SET status='Discrepancy',discrepancy_comment='$discrepency' WHERE id='$id'";

			$query = $this->db->query($SQL);
			
			$SQL = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('$id', 'Discrepancy', '','','RCF Document Check','');";

			$query = $this->db->query($SQL);
			
			
			
		}
		public function loan_eligible($vars){
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['action'] == '-' && ($history_arr[0]['process']== 'RCF QDE' || $history_arr[0]['process']== '' )){
				
	
			$SQL = "UPDATE orderlead_info SET status='Loan Eligible',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', '', 'Cibil ok to Process','Cibil ok to Process','-','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Loan Eligible";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
			
			
			
			
		   }
			
			
			
		}
		public function discrepancy_first_changes($vars){
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			
			$SQL = "UPDATE orderlead_info SET status='Discrepancy' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Discrepancy', '','','RCF Document Check','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Discrepancy";
		   }
		}
		public function under_process_first_changes($vars){
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['action'] == 'Discrepancy' && ($history_arr[0]['process']== 'RCF Document Check' || $history_arr[0]['process']== 'RCF QDE')){
			
			
			$SQL = "UPDATE orderlead_info SET status='Under Process',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', '-', '','','RCF QDE','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Under Process";
			}else{
				
			return "Please do Previous step";	
			}
		   }
		}
		public function discrepancy_second_changes($vars){
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			
			$SQL = "UPDATE orderlead_info SET status='Discrepancy' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Discrepancy', '','','RCF QDE','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Discrepancy";
		   }
		}
		public function discrepancy_changes($vars){
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			
			$SQL = "UPDATE orderlead_info SET status='Discrepancy' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Discrepancy', '','','Post Approval','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Discrepancy";
		   }
		}
		public function sanctioned_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if(($history_arr[0]['action'] == 'Discrepancy' || $history_arr[0]['action'] == '') && ($history_arr[0]['process']== 'Post Approval' || $history_arr[0]['process']== '-' )){
				
	
			$SQL = "UPDATE orderlead_info SET status='Sanctioned',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'SS Completed', '','','Post Approval','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Sanctioned";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function pending_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['action'] == 'SS Completed' && $history_arr[0]['process']== 'Post Approval' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Pending Order Confirmation',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Processed', '','','Boonbox Upload','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Pending";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function disbursement_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['action'] == 'Processed' && $history_arr[0]['process']== 'Boonbox Upload' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Processed', '','','Boonbox Upload','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Disbursement";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function disbursement2_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['action'] == 'Processed' && $history_arr[0]['process']== 'Boonbox Upload' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Discrepancy', '','','','BB Discrepancy');";

			$query = $this->db->query($SQL2);
			return "Status Changed Disbursement";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function discrepancy2_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['status'] == 'BB Discrepancy' && $history_arr[0]['action']== 'Discrepancy' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Discrepancy' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Discrepancy', '','','','BC Discrepancy');";

			$query = $this->db->query($SQL2);
			return "Status Changed Discrepancy";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function disbursement3_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if($history_arr[0]['status'] == 'BC Discrepancy' && $history_arr[0]['action']== 'Discrepancy' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Processed', '','','Hero-Ops','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Disbursement";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function disbursed_changes($vars){
			
			
			//$id 	 = $this->input->get('id');
			//$sql = ''
			
			//echo "<pre>";
			//print_r($vars);
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$vars['case_id']."'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
		   
		   if(!$chk_arr){
			   return "Case ID Not Matching. Please enter correctly";
		   }
		   else{
			   
//			echo "<pre>";
//print_r($chk_arr);			
			   
			$SQL2 = "SELECT * FROM orderlead_upload_history where parent_id = '".$chk_arr[0]['id']."' order by id desc limit 1";
			
			$query2 = $this->db->query($SQL2);
		   
			$history_arr =  $query2->result_array();
			
			
			if(($history_arr[0]['status'] == '' || $history_arr[0]['status'] == 'BB Discrepancy' ) && ($history_arr[0]['action']== 'Processed' || $history_arr[0]['action']== 'Discrepancy') && ($history_arr[0]['process']== 'Hero-Ops' ||  $history_arr[0]['process']== 'Boonbox Upload' || $history_arr[0]['process']== '')){
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursed',discrepancy_comment='' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Processed', '','','BB Delivery Confirmation','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Disbursed";
				
			}else{
				
				return "Disbursement In Progress not Done.";
			}
			
		   }
		}
		public function disbursed_chk($row){
			
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$row['case_id']."' and status= 'Disbursed'";
			
			$query = $this->db->query($SQL);
		   
		    $chk_arr =  $query->result_array();
			return $chk_arr;
		}
		public function insert_lead(){
			
			
		$session = $this->session->userdata('MY_SESS2');
		
		
		echo "a<pre>";
		print_r($session);
		print_r($_POST);
		
		/* if($session['data'][0]['role']== 5){
			
		 echo   $SQL = "SELECT * FROM finance_bc_branch_master where branch_code = '".$session['data'][0]['branch_id']."'";
			
			$query = $this->db->query($SQL);
		   
		    $chk_arr =  $query->result_array();	
			
			$branch_name = $chk_arr[0]['branch_name'];
			
			$SQL2 = "SELECT * FROM finance_bc_master where id = '".$session['data'][0]['bc_id']."'";
			
			$query2 = $this->db->query($SQL2);
		   
		    $chk_arr2 =  $query2->result_array();	
			
			$bc_name = $chk_arr2[0]['name'];
			$bc_id = $session['data'][0]['bc_id'];
			
			
		}else{
			
		echo		$SQL2 = "SELECT * FROM users where userName = '".$_POST['field_officer']."'";
				
				$query2 = $this->db->query($SQL2);
			   
				$users =  $query2->result_array();
				
				
				echo "<pre>";
				print_r($chk_arr[0]['branch_name']);
			
				$branch_name = $chk_arr[0]['branch_name'];
				$branch_code = $_POST['branch'];
				
				$bc		 = $_POST['finance'];
				$bc = explode('-',$bc);
			
				$bc_id = $bc[0];
				$bc_name = $bc[1];
			
		} */
		
		
		if($session['data'][0]['role']== 6){
			
			
			
				$SQL = "SELECT * FROM finance_bc_branch_master where branch_code = '".$_POST['branch']."'";
				
				$query = $this->db->query($SQL);
			   
				$chk_arr =  $query->result_array();	
				
				
				
				
				$SQL2 = "SELECT * FROM users where userName = '".$_POST['field_officer']."'";
				
				$query2 = $this->db->query($SQL2);
			   
				$chk_arr2 =  $query2->result_array();	
				

				$bc		 = $_POST['finance'];
				$bc = explode('-',$bc);
				$bc_id = $bc[0];
				$bc_name = $bc[1];
				$rso_username = $session['data'][0]['userName'];
				$field_officer = $_POST['field_officer'];
				$field_officer_name = $chk_arr2[0]['firstname'];
				$branch_name = $chk_arr[0]['branch_name'];
				$field_officer = $_POST['field_officer']; 
				$branch_code = $_POST['branch'];
			
		}elseif($session['data'][0]['role']== 5){
			
			//echo $session['data'][0]['role'];
				$SQL = "SELECT * FROM finance_bc_branch_master where branch_code = '".$session['data'][0]['branch_id']."'";
				
				$query = $this->db->query($SQL);
			   
				$chk_arr =  $query->result_array();	
				
				$SQL2 = "SELECT * FROM finance_bc_master where id = '".$chk_arr[0]['bc_id']."'";
				
				$query2 = $this->db->query($SQL2);
			   
				$chk_arr2 =  $query2->result_array();	
				
				$bc_name 		= $chk_arr2[0]['name'];
				
				$bc_id 			= $chk_arr[0]['bc_id'];
			
				$branch_name 	= $chk_arr[0]['branch_name'];
				
				$field_officer = $session['data'][0]['userName'];
				$branch_code = $session['data'][0]['branch_id'];
			
		}else{
			
			
		}
		
		if($_POST['check_address'] == 1){
			
			$address_1 = $_POST['s_address_1'];
			$address_2 = $_POST['s_address_2'];
			$land_mark = $_POST['s_land_mark'];
			$pincode = $_POST['s_pincode'];
			$city = $_POST['s_city'];
			$district = $_POST['s_district'];
			$state = $_POST['s_state'];
			$year_at_currentaddress = $_POST['s_year_address'];
			
			$perm_address_1 = $_POST['address_1'];
			$perm_address_2 = $_POST['address_2'];
			$perm_land_mark = $_POST['land_mark'];
			$perm_pincode = $_POST['pincode'];
			$perm_city = $_POST['city'];
			$perm_district = $_POST['district'];
			$perm_state = $_POST['state'];
			
			
		}else{
			$address_1 = $_POST['address_1'];
			$address_2 = $_POST['address_2'];
			$land_mark = $_POST['land_mark'];
			$pincode = $_POST['pincode'];
			$city = $_POST['city'];
			$district = $_POST['district'];
			$state = $_POST['state'];
			$year_at_currentaddress = $_POST['year_address'];
			
			$perm_address1 = $_POST['address_1'];
			$perm_address2 = $_POST['address_2'];
			$perm_landmark = $_POST['land_mark'];
			$perm_pincode = $_POST['pincode'];
			$perm_city = $_POST['city'];
			$perm_district = $_POST['district'];
			$perm_state = $_POST['state'];
		}
			
			$temp = explode(".", $_FILES["aadhar_front"]["name"]);
			$aadhar_front = 'aadhar_front'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["aadhar_front"]["tmp_name"], "uploads/" . $aadhar_front);
			
			$temp = explode(".", $_FILES["aadhar_back"]["name"]);
			$aadhar_back = 'aadhar_back'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["aadhar_back"]["tmp_name"], "uploads/" . $aadhar_back);
			
			$temp = explode(".", $_FILES["declaration"]["name"]);
			$declaration = 'declaration'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["declaration"]["tmp_name"], "uploads/" . $declaration);
			
			$temp = explode(".", $_FILES["schdule"]["name"]);
			$schdule = 'schdule'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["schdule"]["tmp_name"], "uploads/" . $schdule);
			
			$temp = explode(".", $_FILES["demand"]["name"]);
			$demand = 'demand'.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["demand"]["tmp_name"], "uploads/" . $demand);

		
			$SQL = "SELECT * FROM finance_bc_branch_master where branch_code = '".$_POST['branch']."'";
			
			$query = $this->db->query($SQL);
		   
		    $chk_arr =  $query->result_array();
			
			
			
			
			
		
			
			$itemcode = $_POST['itemcode'];
			$price = str_replace( ',', '', $_POST['amount'] );
			$applicant_name = $_POST['app_fname'].' '.$_POST['app_lname'];
			$app_firstname = $_POST['app_fname'];
			$app_lastname = $_POST['app_lname'];
			$app_midname = $_POST['app_mname'];
			$mothername = $_POST['mname'];
			$fathername = $_POST['fname'];
			$aadhar_number = $_POST['aadhar_number'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$martial = $_POST['m_status'];
			$education = $_POST['education'];
			$residence = $_POST['residence'];
			$address_1 = $_POST['address_1'];
			$address_2 = $_POST['address_2'];
			$land_mark = $_POST['land_mark'];
			$pincode = $_POST['pincode'];
			$city = $_POST['city'];
			$district = $_POST['district'];
			$state = $_POST['state'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$dependants = $_POST['dependants'];
			$earning_members=$_POST['earning_members'];
			$member_amount=$_POST['member_amount'];
			$member_name=$_POST['member_name'];
			
			$food_expenditure = $_POST['food_expenditure'];
			$exp_amount = $_POST['exp_amount'];
			$tm_name = '';
			$se_name = '';
			$tm_code='';
			$tm_code='';
			$couponcode = '';
			$rule_id=0;
			$discount_amount = 0.00;			
					
			
			$year_in_currentcity = $_POST['year_city'];

			
			$storeid = $_POST['storeid'];
			
			$grosstenure = 0.0;
			$net_tenure = 12;	
		
			$aadhar_front = base_url().'/uploads/'.$aadhar_front;
			$aadhar_back = base_url().'/uploads/'.$aadhar_back;
			$alternate_id = base_url().'/uploads/'.$declaration;
			$schdule = base_url().'/uploads/'.$schdule;
			$demand = base_url().'/uploads/'.$demand;
			
			if($_POST['income_expense']=='UPPER'){
				
			$monthly_income = 'a:2:{i:0;a:3:{s:9:"familyMem";s:7:"Husband";s:6:"amount";s:5:"20000";s:12:"relationName";s:0:"";}i:1;a:3:{s:9:"familyMem";s:4:"Wife";s:6:"amount";s:5:"15000";s:12:"relationName";s:0:"";}}';
			$monthly_expenditure = 'a:12:{s:4:"Food";s:4:"5000";s:9:"Transport";s:4:"2000";s:7:"Medical";s:4:"1500";s:15:"Loans Repayment";s:4:"1500";s:9:"Education";s:4:"1000";s:2:"EB";s:3:"300";s:3:"Gas";s:3:"500";s:5:"Cable";s:3:"200";s:4:"Milk";s:3:"800";s:14:"Other Expenses";s:4:"2000";s:7:"Savings";s:5:"15000";s:12:"Cash In Hand";s:4:"5200";}';
				
			}else if($_POST['income_expense']=='UPPER'){
			$monthly_income = 'a:2:{i:0;a:3:{s:9:"familyMem";s:7:"Husband";s:6:"amount";s:5:"15000";s:12:"relationName";s:0:"";}i:1;a:3:{s:9:"familyMem";s:4:"Wife";s:6:"amount";s:5:"10000";s:12:"relationName";s:0:"";}}';
			$monthly_expenditure = 'a:12:{s:4:"Food";s:4:"3000";s:9:"Transport";s:4:"2000";s:7:"Medical";s:4:"1000";s:15:"Loans Repayment";s:4:"1500";s:9:"Education";s:4:"1000";s:2:"EB";s:3:"200";s:3:"Gas";s:3:"300";s:5:"Cable";s:3:"200";s:4:"Milk";s:3:"600";s:14:"Other Expenses";s:4:"1500";s:7:"Savings";s:5:"10000";s:12:"Cash In Hand";s:4:"3700";}';
			}else{
				$custom_expend_str = "";
				
				for($i=0;$i<count($earning_members);$i++){
					
				$mem_name =	explode('-',$earning_members[$i]);
					
				$custom_expend_str .= "i:".$i.";a:3:{s:9:'familyMem';s:8:'".$mem_name[1]." ';s:6:'amount';s:5:'".$member_amount[$i]."';s:12:'relationName';s:0:'".$member_name[$i]."';}";
					
				}
				
				$monthly_income = addslashes("a:2:{".$custom_expend_str."}");
				
				
				$food_expend_str = "";
				
				for($i=0;$i<count($food_expenditure);$i++){
					
				$exp_name =	explode('-',$food_expenditure[$i]);
					
				$food_expend_str .= "s:4:'".$exp_name[1]."';s:4:'".$exp_amount[$i]."';";
					
				}
				
				$monthly_expenditure = addslashes("a:12:{".$food_expend_str."}");
				
			}	
			//echo $monthly_income ."<BR/>";
			//echo $monthly_expenditure;
			
			
			$this->load->model('api_model');
			$config = $this->api_model->get_config($storeid);
			$processing_fee = $config->processingfee;
			$taxes = $config->taxes;
			$interestrate = $config->interestrate;
			$insurance_rate = $config->insurance;
			$gross_tenure = $config->grosstenure;
			$roi = $config->roi;
			
			//echo 'KKK'.$price;
			$finalprice = $price;
			$insurance_amount = round($finalprice * $insurance_rate/1000);
			// $loan_amount = $item['loan_amount'];
			$loan_amount = round($insurance_amount + $finalprice);
			$cal_process_fee = ($processing_fee / 100) * $loan_amount;
			$total_process = round($taxes/100 *($cal_process_fee),0);	
			$total_process_amount = $cal_process_fee + $total_process;
			// $emi_amount =  loancalculateAction($finalprice);
			$emi_amount = ceil(($loan_amount+$loan_amount*12/100)/12);
			$advance_emi = 0;
			
			
			
					
		//	echo "<pre>";
		//	print_r($_POST);
			
			$sql = "INSERT INTO `orderlead_info` ( location_name , disburse_to,disburse_code,bc_name,bc_code,program_name,scheme_name,item_code,price,qty,applicant_name,applicant_firstname,applicant_lastname,applicant_middlename,mother_name,father_name,id_proof,proof_number,date_of_birth,gender,marital_status,education,residence,address_line1,address_line2,landmark,pincode,city,district,cust_state,mobile_number,monthly_income,monthly_expenditure,loan_amount,email_id,no_of_dependants,year_at_currentaddress,year_in_currentcity,perm_addressline1,perm_addressline2,perm_landmark,perm_district,perm_city,perm_state,aadhar_front,aadhar_back,alernate_id,store_id,branch_code,mobile_order,username,status,rso_username,ngo_officername,field_officername,lead_type,processing_fee,emi_amount,advance_emi_amount,gross_tenure,net_tenure,created_at ,perm_pincode,branch_officername,tm_name,tm_code,se_name,se_code,schdule_link,demand_link) VALUES ( '$branch_name','Boonbox','Boon','$bc_name','$bc_id','RCF','Vanilla','$itemcode','$price','1','$applicant_name' , '$app_firstname', '$app_lastname', '$app_midname','$mothername','$fathername','Aadhar','$aadhar_number','$dob','$gender','$martial','$education','$residence','$address_1','$address_2','$land_mark','$pincode','$city','$district','$state','$mobile','$monthly_income','$monthly_expenditure','$price','$email','$dependants','$year_at_currentaddress','$year_in_currentcity','$perm_address1','$perm_address2','$perm_landmark','$perm_district','$perm_city','$perm_state','$aadhar_front','$aadhar_back','$alternate_id','$storeid','$branch_code','0','$field_officer','Under Process','$rso_username','$bc_name','$field_officer_name','1','$total_process_amount','$emi_amount','$advance_emi','$grosstenure','$net_tenure',NOW(),'$perm_pincode','$branch_name','$tm_name','$tm_code','$se_name','$se_code','$schdule','$demand' );";
			
			$query = $this->db->query($sql);
		}
	}