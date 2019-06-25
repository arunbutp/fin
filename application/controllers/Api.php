<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		error_reporting(0);
		parent::__construct();
	
	}
	public function index()
	{
		
		//$this->load->model('home_model');
		//$data['dashboard'] = $this->home_model->dashboard();
		//$this->load->view('home/home',$data);
	}
	public function chk_login()
	{
		
		$this->load->model('api_model');
		$data = $this->api_model->chk_login();
		$uname = $this->input->get_post('uname');
		$pwd = $this->input->get_post('pwd');
		//$this->load->view('home/home',$data);
		
		//for($i=0;$i<count($data);$i++){
			
			$rso_names = array();
			$branch = array();
			$branch_ids=array();
			
			if($data[0]['role']== 6){
				
				$rso_ids = $this->api_model->rso_bc_ids($data[0]['rso_bc_ids']);
				
			//	echo "<pre>";
			//	print_r($rso_ids);
				
				for($m=0;$m<count($rso_ids);$m++){
					
					
					$rso_names[] = array(/* "id"  			=> $rso_ids[$m]['id'], */
										
										$m +1			=> $rso_ids[$m]['name']/* ,
										"description"	=> $rso_ids[$m]['description'] */
					);
					
					$rso_individual_id[] =  $rso_ids[$m]['id']; 
				}
				
				
				$finance_bc_branch = $this->api_model->check_finance_bc_branch($rso_individual_id);
				
				
			//	echo "ss<pre>";
			//	print_r($finance_bc_branch);
				
				
			 	for($p=0;$p<count($finance_bc_branch);$p++){
					
					$branch[] = array("id"  			=> $finance_bc_branch[$p]['bc_id'],
										"branch_code"	=> $finance_bc_branch[$p]['branch_code'],
										"branch_name"	=> $finance_bc_branch[$p]['branch_name']
					);
					
					$branch_ids[] = $finance_bc_branch[$p]['branch_code'];
					
					
				}
				$get_field_officers = $this->api_model->get_field_officers($branch_ids);

				for($q=0;$q<count($get_field_officers);$q++){	
				
						$fieldofficers[]= array("branch"=> $get_field_officers[$q]['branch_id'],
											"store_id"=> 27,
											"username"=> $get_field_officers[$q]['userName'],
											"customer_name"=> $get_field_officers[$q]['firstname']
											);

				}				
				
				
				
			}
			
			
			
			$arr = array("userid"		=> $data[0]['id'],
						"firstname"		=>$data[0]['firstname'],
						"lastname"		=>$data[0]['firstname'],
						"email"			=>$data[0]['email'],
						"birthdate" 	=> '',
						"username" 	=> $uname,
						"password" 	=> $pwd,
						"store_id" 		=> 60,
						"group_id"		=> 0,
						"couponcode"	=> '',
						"order_mode"	=> 0,
						"website_id"	=> 0,
						"web"			=> "bc",
						"user_type"		=> "agent",
						"retailer_detail"=> null,
						"return_terms" => "As per the policy, the replacement is applicable only for Wrong \/ Faulty shipment of the product and which is informed us within 7 days from the date of receipt. Will not accept any other returns or replacements.",
						"rechargeno"	=> "",
						"mobile"		=> null,
						"finance_branches"=> $rso_names,
						"branches"		=> $branch,
						"fieldofficers"	=> $fieldofficers,
						"boonboxlite"	=>"No",
						"scheme"		=>"No",
						"location"		=>"No",
						"language"		=>"english",
						"catalog"		=>"all",
						"recharge_accno"=>null,
						"payment"		=>"cashondelivery,custompayment,",
						"toll_free"		=>"1800-102-1271",
						"smsgateway" 	=> "",
						"smsec"			=> "",
						"first_alarm"	=> 0,
						"second_alarm" 	=> 0,
						"first_minimum_order_value"=> 0,
						"second_minimum_order_value"=> 0,
						"offline_duration"=>0,
						"userrole"		=> "Purchase",
						"retminqty"		=> 5,
						"brandfilter"	=> 0,
						"margin"		=> 0,
						"retailerprice"	=> 0,
						"searchall"		=> 0,
						"isfintech"		=> 0,
						"emidetail"		=> 0,
						"handstore"		=> 0,
						"fullertonstore"=> 0,
						"ifmrstore"		=> 0,
						"samasthastore"	=> 0,
						"annapurnastore"=> 0,
						"arohanstore"	=> 0,
						"mitratastore"	=> 0,
						"ismidland"		=> 0,
						"issvcl"		=> 0
						
						
						
						
			);
		//}
		
	//	bc = 60
		
		
		echo json_encode($arr);
	}
	
	
}
