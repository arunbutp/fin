<?php
	class Home_model extends CI_Model{
		
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
			
			$SQL = "SELECT COUNT(*) AS total_lead,IFNULL(SUM(IF(lead_type != 1,1,0)),0) AS otherleads,IFNULL(SUM(IF(oi.status='Under Process' AND lead_type = 1,1,0)),0) AS under_process, IFNULL(SUM(IF(oi.status='Loan Eligible' AND lead_type = 1,1,0)),0) AS loan_eligible, IFNULL(SUM(IF(oi.status='Discrepancy' AND lead_type = 1,1,0)),0) AS discrepancy, IFNULL(SUM(IF(oi.status='Sanctioned' AND lead_type = 1,1,0)),0) AS sanctioned, IFNULL(SUM(IF(oi.status='Pending Order Confirmation' AND lead_type = 1,1,0)),0) AS order_confim, IFNULL(SUM(IF(oi.status='Disbursement In Progress' AND lead_type = 1,1,0)),0) AS disbursement, IFNULL(SUM(IF(oi.status='Disbursed' AND lead_type = 1,1,0)),0) AS disbursed, IFNULL(SUM(IF(oi.status='Canceled' AND lead_type = 1,1,0)),0) AS rejected FROM orderlead_info AS oi WHERE oi.username = '".$session['data'][0]['userName']."' OR oi.rso_username = '".$session['data'][0]['userName']."' OR oi.branch_code = '01001,01002'";
			
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
				$lead_type = '(lp.lead_type = 1) AND';
				$status = "AND (lp.status = '$task')"; 
			}
			
			
			if($task == 'Total Lead'){
				$lead_type = '';
				$status = '';
			}	
			
			$SQL = "SELECT SQL_CALC_FOUND_ROWS lp.*,CONCAT(lp.applicant_firstname,'',lp.applicant_lastname) AS applicant_name,
IF(lp.status != 'Disbursed','true','false') AS can_approve,IFNULL(lp.cas_id,'') AS cas_id,
 IF(lp.case_id IS NULL,'','') AS cas_id_empty,IFNULL(lp.discrepancy_comment,'') AS discrepancy_comment,
 IFNULL(lp.case_id,'') AS case_id,lp.id AS lead_id,fb.finance_name 
 AS bc_name FROM orderlead_info AS lp  
 LEFT JOIN finance_bc_branch_master AS jd ON jd.branch_code = lp.branch_code 
 LEFT JOIN finance_master AS fb ON fb.id = jd.bc_id
 WHERE $lead_type  (lp.username = '".$session['data'][0]['userName']."' OR lp.rso_username = '".$session['data'][0]['userName']."' OR 
 lp.branch_code = '01001,01002') $status ORDER BY id DESC $limit_rows";
			
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Loan Eligible' WHERE case_id = '".$vars['case_id']."'";
			
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
			
			
			$SQL = "UPDATE orderlead_info SET status='Under Process' WHERE case_id = '".$vars['case_id']."'";
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Sanctioned' WHERE case_id = '".$vars['case_id']."'";
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Pending Order Confirmation' WHERE case_id = '".$vars['case_id']."'";
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress' WHERE case_id = '".$vars['case_id']."'";
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress' WHERE case_id = '".$vars['case_id']."'";
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
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursement In Progress' WHERE case_id = '".$vars['case_id']."'";
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
			
			
			if($history_arr[0]['status'] == '' && $history_arr[0]['action']== 'Processed' && $history_arr[0]['process']== 'Hero-Ops' ){
				
	
			$SQL = "UPDATE orderlead_info SET status='Disbursed' WHERE case_id = '".$vars['case_id']."'";
			$query = $this->db->query($SQL);
			
			$SQL2 = "INSERT INTO orderlead_upload_history (parent_id, action, reason,remarks,process,status)
VALUES ('".$chk_arr[0]['id']."', 'Processed', '','','BB Delivery Confirmation','');";

			$query = $this->db->query($SQL2);
			return "Status Changed Disbursed";
				
			}else{
				
				return "Please Do Previous Step";
			}
			
		   }
		}
		public function disbursed_chk($row){
			
			
			$SQL = "SELECT * FROM orderlead_info where case_id = '".$row['case_id']."' and status= 'Disbursed'";
			
			$query = $this->db->query($SQL);
		   
		   $chk_arr =  $query->result_array();
			
			
			
			
			return $chk_arr;
		}
	}