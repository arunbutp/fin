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
			
			// $id = array_keys($data['data']);
			
		//	$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL =  "INSERT INTO finance_master (finance_name, status) VALUES ('".$data['data'][0]['finance_name']."', '".$data['data'][0]['status']."')";
		
		
			
			$query = $this->db->query($SQL);

			return $query;
			
			
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
			
			$session = $this->session->userdata('MY_SESS2');
			//echo "<pre>";
			//print_r($data);
			
			// $id = array_keys($data['data']);
			
		//	$pure_id = $id[0];
			
			//print_r($data['data'][$pure_id]['finance_name']);
			
			$SQL =  "INSERT INTO finance_bc_master (name, description) VALUES ('".$data['data'][0]['name']."', '".$data['data'][0]['description']."')";
		
		
			
			$query = $this->db->query($SQL);

			return $query;
			
			
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
			
			$SQL = "SELECT SQL_CALC_FOUND_ROWS lp.*,CONCAT(lp.applicant_firstname,'',lp.applicant_lastname) AS applicant_name,
IF(lp.status != 'Disbursed','true','false') AS can_approve,IFNULL(lp.cas_id,'') AS cas_id,
 IF(lp.case_id IS NULL,'','') AS cas_id_empty,IFNULL(lp.discrepancy_comment,'') AS discrepancy_comment,
 IFNULL(lp.case_id,'') AS case_id,lp.id AS lead_id,fb.finance_name 
 AS bc_name FROM orderlead_info AS lp  
 LEFT JOIN finance_bc_branch_master AS jd ON jd.branch_code = lp.branch_code 
 LEFT JOIN finance_master AS fb ON fb.id = jd.bc_id
 WHERE (lp.lead_type = 1) AND (lp.username = 'bcarunbutp' OR lp.rso_username = 'bcarunbutp' OR 
 lp.branch_code = '01001,01002') AND (lp.status = 'Under Process') ORDER BY id DESC $limit_rows";
			
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
	}