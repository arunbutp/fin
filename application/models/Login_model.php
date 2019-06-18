<?php
	class Login_model extends CI_Model{
        public function check(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM users as u where u.userName = '".$postData['userName']."' AND u.passWord = '".MD5($postData['passWord'])."' ";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		
		 public function getUserDetails(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM users where userName = '".$postData['userName']."' ";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		
		
		public function check_assigned(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM assigned_menus where username = '".$postData['userName']."'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		public function get_menu_name($menu_id){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM menu_names where id = '".$menu_id."'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
		}
		public function checkmagentoAPI(){
			
			$postData = $this->input->post();			
						
			$jsonarray['data']['uname']=$postData['userName'];
			$jsonarray['data']['pwd']=$postData['passWord'];
			$jsonarray['API-KEY']="e806e3e96b7f50";
			$jsonarray['APP-ID']="androidapp";                                                                 
			$data_string = json_encode($jsonarray);  	
			$ch = curl_init('http://devcloud.in3access.in/bb_admin_user.php');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
			);     
			$result = curl_exec($ch);
			return $result_array=json_decode($result, true);	
		}
		
		public function register_check(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM users where userName = '".$postData['userName']."'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
			
		}
		public function insert_register(){
			
			$postData = $this->input->post();
			
			$insertData = array('userName' => $postData['userName'],
								'passWord' => MD5($postData['passWord']),
								'firstname'=> $postData['firstname'],
								'lastname' => $postData['lastname'],
								'dob' => $postData['dob'],
								'email' => $postData['email'],
								'mobile' => $postData['mobile'],
								'bc_id' => $postData['role'],
								'branch_id' => $postData['finance_bc'],
								'gender'=> $postData['gender']);
			
		return	$this->db->insert('users',$insertData);
			
		//	echo $str = $this->db->last_query();
		}
		public function role_master(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM role_master where status = '1'";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
			
		}
		public function finance_bc(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM finance_bc_master";
			
			$query = $this->db->query($SQL);

			return $query->result_array();
			
			
			
		}
	}