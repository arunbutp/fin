<?php
	class Login_model extends CI_Model{
        public function check(){
			
			$postData = $this->input->post();
			
			$SQL = "SELECT * FROM users where userName = '".$postData['userName']."' AND passWord = '".MD5($postData['passWord'])."' ";
			
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
	}