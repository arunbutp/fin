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
	}