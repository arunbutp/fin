<?php
	class Api_model extends CI_Model{
		
         public function menu_names(){
			
				
			$SQL = "SELECT * FROM `menu_names`";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		} 
		public function chk_login(){
			
			
			$uname = $this->input->get_post('uname');
			$pwd = $this->input->get_post('pwd');
			
			$SQL = "SELECT * FROM users WHERE userName='$uname' AND PASSWORD=MD5('$pwd') ";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function rso_bc_ids($rso_ids){
			

			$SQL = "SELECT * FROM finance_bc_master WHERE id IN ($rso_ids) ";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function check_finance_bc_branch($branch_ids){
			
			$branch_id = implode(',',$branch_ids);
			
		

			$SQL = "SELECT DISTINCT bc_id,branch_code,branch_name FROM finance_bc_branch_master WHERE bc_id IN ($branch_id)";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function get_field_officers($branch_ids){
			
			$branch_id = implode(',',$branch_ids);
			
		

			$SQL = "SELECT DISTINCT dob,email,mobile,userName,firstname,lastname,branch_id FROM users WHERE branch_id IN ($branch_id)";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function get_json(){
			
			$id = $this->input->get_post('id');

			$SQL = "SELECT * FROM orderlead_info WHERE id = '$id'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
		}
		public function get_users($username){
			
			

			$SQL = "SELECT u.*,t2.branch_name,t2.bc_id,t3.name AS bc_name,t2.tm_code,t2.tm_name,t2.se_name,t2.se_code FROM users AS u
LEFT JOIN finance_bc_branch_master AS t2 ON u.branch_id=t2.branch_code 
LEFT JOIN finance_bc_master AS t3 ON t3.id=t2.bc_id
WHERE u.username= '$username'";
			
			$query = $this->db->query($SQL);

			return $query->row();
			
		}
		public function get_config($store_id){
			
			$SQL = "SELECT * from config_data where store_id= '$store_id' ";
			
			$query = $this->db->query($SQL);

			return $query->row();
			
		}
		public function fintech_count($username){
			
			
			$SQL2 = "SELECT * FROM users where userName='$username' and role='4'";
			
			$query2 = $this->db->query($SQL2);
			$check_bc = $query2->row();
			
		//	echo "<pre>";
			//print_r($check_bc);
			
			if($check_bc->role == '4'){
				
				$str = "oi.bc_code = '".$check_bc->bc_id."'"; 
			}else{
				
				$str ="oi.username = '".$username."' OR oi.rso_username = '".$username."' OR oi.branch_code = '01001,01002'";
			}
			
			
			$SQL = "SELECT COUNT(*) AS total_lead,IFNULL(SUM(IF(lead_type != 1,1,0)),0) AS otherleads,IFNULL(SUM(IF(oi.status='Under Process' AND lead_type = 1,1,0)),0) AS under_process, IFNULL(SUM(IF(oi.status='Loan Eligible' AND lead_type = 1,1,0)),0) AS loan_eligible, IFNULL(SUM(IF(oi.status='Discrepancy' AND lead_type = 1,1,0)),0) AS discrepancy, IFNULL(SUM(IF(oi.status='Sanctioned' AND lead_type = 1,1,0)),0) AS sanctioned, IFNULL(SUM(IF(oi.status='Pending Order Confirmation' AND lead_type = 1,1,0)),0) AS order_confim, IFNULL(SUM(IF(oi.status='Disbursement In Progress' AND lead_type = 1,1,0)),0) AS disbursement, IFNULL(SUM(IF(oi.status='Disbursed' AND lead_type = 1,1,0)),0) AS disbursed, IFNULL(SUM(IF(oi.status='Canceled' AND lead_type = 1,1,0)),0) AS rejected FROM orderlead_info AS oi WHERE $str";
			
			$query = $this->db->query($SQL);

			return $query->row();
			
		}
		public function download_fintech($user_type,$username){
			
		if($user_type == '1'){
			
			$sql = "SELECT * from orderlead_info WHERE rso_username = '".$username."' AND status = 'Discrepancy' "; 
		}else{
			 
			$sql = "SELECT * from orderlead_info WHERE username = '".$username."' AND status = 'Discrepancy' "; 
		}
		 
		$query = $this->db->query($sql);

		return $query->result_array();
			
		}
		public function chk_pending($user_type,$username){
			
		if($user_type == '1'){
			
			$sql = "SELECT * from orderlead_info WHERE rso_username = '".$username."'  AND (status = 'Pending Order Confirmation' )  "; 
		}else{
			 
			$sql = "SELECT * from orderlead_info WHERE username = '".$username."'  AND (status = 'Pending Order Confirmation' ) "; 
		}
		 
		$query = $this->db->query($sql);

		return $query->result_array();
			
		}
		public function disapprove($disapp,$cur_date,$id){
			
			
			 $updatesql = "UPDATE orderlead_info SET status='Canceled',is_approved=1,note='".$disapp."',updated_at='".$cur_date."' WHERE id = ".$id."";
			 
			 $query = $this->db->query($updatesql);
		}
	}