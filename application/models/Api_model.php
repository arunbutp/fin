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
	}