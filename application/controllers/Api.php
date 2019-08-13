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
					
					$branch[] = array(/* "id"  			=> $finance_bc_branch[$p]['bc_id'],
										"branch_code"	=> $finance_bc_branch[$p]['branch_code'],
										"branch_name"	=> $finance_bc_branch[$p]['branch_name'], */
										$finance_bc_branch[$p]['branch_code'] => $finance_bc_branch[$p]['branch_name'] ,
										"finance_branch" => $finance_bc_branch[$p]['bc_id']
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
			
			
			if(!empty($data[0]['id'])){
			$arr = array("userid"		=> $data[0]['id'],
						"firstname"		=>$data[0]['firstname'],
						"lastname"		=>$data[0]['firstname'],
						"email"			=>$data[0]['email'],
						"birthdate" 	=>$data[0]['dob'],
						"username" 	=> $uname,
						"password" 	=> $pwd,
						"store_id" 		=> 54,
						"group_id"		=> 0,
						"couponcode"	=> '',
						"order_mode"	=> 0,
						"website_id"	=> 0,
						"web"			=> "bc",
						"role"          => $data[0]['role'],
						"user_type"		=> "agent",
						"retailer_detail"=> null,
						"return_terms" => "As per the policy, the replacement is applicable only for Wrong \/ Faulty shipment of the product and which is informed us within 7 days from the date of receipt. Will not accept any other returns or replacements.",
						"rechargeno"	=> "",
						"mobile"		=> $data[0]['mobile'],
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
						"isfintech"		=> 1,
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
			}else{
				
				$arr = array(
				"userid"=> "",
				"firstname"=> "",
				"lastname"=> "",
				"birthdate"=> "",
				"email"=> "0",
				"store_id"=> "0",
				"group_id"=> "0",
				"username"=> "0",
				"password"=> "0",
				"couponcode"=> [],
				"branches"=> [],
				"fieldofficers"=> [],
				"order_mode"=> "",
				"rechrgeno"=> "0",
				"userrole"=> "0",
				"retminqty"=> "0"
				
				);
			}
		//}
		
	//	bc = 60
		
		
		echo json_encode($arr);
	}
	public function get_json(){
		
		$this->load->model('api_model');
		$data = $this->api_model->get_json();
		
		//print_r($data[0]);
		
		echo json_encode($data[0]);
		
		
		
	}
	
	public function new_lead(){
		
		$data=file_get_contents('php://input');
		
		$json = json_decode($data, true);

		$output  = array();
		$i=0;
		$json1 = $json['fintech'];
		
		//echo "<pre>";
		//print_r($json1);
		
		//echo "ki"; 
		
		
foreach($json1 as $item){
	$user_id = $item['user_id'];
	$storeid = $item['store_id'];
	//Mage::app()->setCurrentStore($storeid);
	//$connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');
    $id = $item['server_id'];
	$location_name = $item['location_name'];
	$disburse_to = "Boonbox";
	$disburse_code = "Boon";
	$bc_name = $item['bc_name'];
	$bc_code = $item['bc_code'];
	$tm_name = $item['tm_name'];
	$tm_code = $item['tm_code'];
	$couponcode = $item['coupen_code'];
	$rule_id = $item['rule_id'];
	$discount_amount = $item['discount_amount'];
	$program_name = "RCF";
    $scheme_name = "Vanilla";
	$item_code = $item['item_code'];
	$price = $item['price'];
	$qty = $item['qty'];
    $applicant_name = $item['applicant_name'];
	$applicant_fname = $item['applicant_name'];
	$applicant_lname = $item['applicant_Lname'];
	$applicant_middlename = $item['applicant_mname'];
	$mother_name = $item['mother_name'];
    $father_name = $item['father_name'];
	$id_proof = "Aadhar";
	$aadhaar_id = $item['aadhaar_id'];
	$proof_number = $item['proof_number'];
	$date_of_birth = date("Y-m-d",strtotime($item['date_of_birth']));
	$gender = $item['gender'];
	$marital_status = $item['marital_status'];
	$education = $item['education'];
	$residence = $item['residence'];
    $address_line1 = $item['address_line1'];
	$address_line2 = $item['address_line2'];
	$landmark = $item['landmark'];
	$pincode = $item['pincode'];
    $city = $item['city'];
    $district = $item['district'];
    $cust_state = $item['cust_state'];
	$mobile_number = $item['mobile_number'];
	$occupation = $item['occupation'];
	$monthly_income = $item['monthly_income'];
	
	$address_proof_front = $item['address_proof_front'];
	$address_proof_back = $item['address_proof_back'];
	$ship_proof_back = $item['ship_proof_back'];
	$ship_proof_front = $item['ship_proof_front'];
	$form60_proof = $item['form60_proof'];
	
	$nominee_title = $item['nominee_title'];
	$nominee_name = $item['nominee_name'];
	$nominee_mobile = $item['nominee_mobile'];
	$nominee_dob = $item['nominee_dob'];
	$nominee_gender = $item['nominee_gender'];
	$nominee_relation = $item['nominee_relation'];
	$nominee_add_type = $item['nominee_add_type'];
	$nominee_address = $item['nominee_address'];
	
	
	
	$id_proof_type = $item['id_proof_type'];
	$address_proof_type = $item['address_proof_type'];
	$shipping_proof_type = $item['shipping_proof_type'];
	
	
	$schdule_proof = $item['schdule_proof'];
	$dpn_proof = $item['dpn_proof'];
	
	$add_chkbox = $item['add_chkbox'];
	$mobile_type = $item['mobile_type'];
	
	
	
	
	
	
	//echo "sssss";
	$family_income = $item['income_exp'];
//	echo 'ssssssss';
	$foodly_income = $item['food_exp'];
	$username = $item['username'];
	

    //$branch_code = $customers['branchcode'];
	
    $email_id = $item['email_id'];
    $no_of_dependants = $item['no_of_dependants'];
    $year_at_currentaddress = $item['year_at_currentaddress'];
    $year_in_currentcity = $item['year_in_currentcity'];
    $perm_addressline1 = $item['perm_addressline1'];
    $perm_addressline2 = $item['perm_addressline2'];
    $perm_landmark = $item['perm_landmark'];
    $perm_district = $item['perm_district'];
    $perm_pincode = $item['perm_pincode'];
    $perm_city = $item['perm_city'];
    $perm_state = $item['perm_state'];
    $aadhar_front = $item['aadhar_front'];
    $aadhar_back = $item['aadhar_back'];
    $declaration_proof = $item['declaration_proof'];
	$alernate_id_type = $item['alternative_type'];
    $ownhouse_proof = $item['ownhouse_proof'];
	$Profile_img = $item['Profile_img'];
    $signature_img = $item['signature_img'];
	
	$monthly_expenditure = $item['monthly_expenditure'];
	$repaying_capacity = $item['repaying_capacity'];
	$emi_eligibility = $item['emi_eligibility'];
    $first_due_date = $item['first_due_date'];
	$last_due_date = $item['last_due_date'];
	$manufacturer_name = $item['manufacturer_name'];
	$asset_make = $item['asset_make'];
    $asset_model = $item['asset_model'];
	$rso_username = $item['rso_username'];

	$pd_assess = $item['pd_assess'];
    $pd_repaying =  $item['pd_repaying'];
    $pd_month_emi =  $item['pd_month_emi'];
    $pd_monthemi_eligibility =  $item['pd_monthemi_eligibility'];
    $pd_loan_amount =  $item['pd_loan_amount'];
    // $processing_fee = $item['processing_fee'];
	$ngo_officername = $item['ngo_officername'];
    $field_officername = $item['field_officername'];
    $branch_officername = $item['branch_officername'];
    $lead_type = $item['lead_type'];

 $month_income=json_decode($family_income,true);
 $food_income=json_decode($foodly_income,true);

$income_data = serialize($month_income);
$arr = unserialize($income_data);   

$incomes =array();
foreach($arr as $key=>$value)
{

	 $incomes[] =array("familyMem"=>$value['familyMem'],"amount"=>$value['amount'],"relationName"=>$value['relationName']);
}


$monthly_income_ser =serialize($incomes);
    
$exp_data = serialize($food_income);
$arr = unserialize($exp_data);    
$expendituress =array();
foreach($arr as $key=>$value)
{
     $expendituress[$value['foodExpedi']] =$value['amount'];

}
$monthly_exp_ser =serialize($expendituress);
  
	
	if($lead_type == '1'){
  //  Mage::app()->setCurrentStore($storeid);
   // $connectionRead = Mage::getSingleton('core/resource')->getConnection('core_read');
   
   $this->load->model('api_model');
	$config = $this->api_model->get_config($storeid);
    $processing_fee = $config->processingfee;
    $taxes = $config->taxes;
    $interestrate = $config->interestrate;
	$insurance_rate = $config->insurance;
    $gross_tenure = $config->grosstenure;
    $roi = $config->roi;
    $emi_amount = $item['emi_amount'];
	$advance_emi_amount = $item['advance_emi_amount'];
	$net_tenure = 12;
	$item_number = $item['item_number'];

    $order_id = $item['order_id'];

    $product_id = '';
    $_product = '';
    $finalprice = $item['price'];
	$insurance_amount = round($finalprice * $insurance_rate/1000);
	// $loan_amount = $item['loan_amount'];
	$loan_amount = round($insurance_amount + $finalprice);
    $cal_process_fee = ($processing_fee / 100) * $loan_amount;
    $total_process = round($taxes/100 *($cal_process_fee),0);	
	$total_process_amount = $cal_process_fee + $total_process;
    // $emi_amount =  loancalculateAction($finalprice);
	$emi_amount = ceil(($loan_amount+$loan_amount*12/100)/12);
    $advance_emi = 0;
   
    
    $location = '';
    $tm_code = '';
    $tm_name = '';
    $bc_code = '';
    $bc_name = '';
    $se_code = '';
    $se_name = '';
}else{
	
$location = "";
$tm_code = "";
$tm_name = "";
$bc_code = "";
$bc_name = "";
$se_code = "";
$se_name = "";

$manufacturer = "";
$make = "";
$model = "";
$emi_eligibility = "";
$cal_process_fee = 0.0;
$emi_amount = 0.0;
$advance_emi = 0.0;
$grosstenure = 0.0;
$net_tenure = 0.0;
$item_code = "";
$finalprice = 0.0;
$roi = "";
$qty = 0;
$order_id = 0;
$no_of_dependants = 0;
$repaying_capacity = 0.0;
$rule_id = 0;
$discount_amount = 0;
$storeid = 0;
}
	
	$this->load->model('api_model');
		$users = $this->api_model->get_users($username);
		//echo "<pre>";
		//print_r($users->userName);
		//exit;
		
		$location = $users->branch_name;
		$bc_name = $users->bc_name;
		$branch_code = $users->branch_id;
		$bc_code = $users->bc_id;
		$tm_name = $users->tm_name;
		$se_name = $users->se_name;
		$tm_code = $users->tm_code;
		$se_code = $users->se_code;
		
	if($user_id != null){
    if($id == '0'){
		
		
		

	 $sql ="INSERT INTO orderlead_info (location_name,disburse_to,disburse_code,bc_name,bc_code,tm_name,tm_code,se_name,se_code,program_name,scheme_name,item_code,price,qty,applicant_name,applicant_firstname,applicant_lastname, applicant_middlename, mother_name, father_name,id_proof,proof_number,date_of_birth,gender,marital_status,education,residence,address_line1,address_line2,landmark,pincode,city,district,cust_state,mobile_number,occupation,monthly_income, monthly_expenditure,repaying_capacity,emi_eligibility,manufacturer_name,asset_make,asset_model,processing_fee,emi_amount,
advance_emi_amount,gross_tenure,net_tenure,item_number,loan_amount,roi,email_id,no_of_dependants,year_at_currentaddress,year_in_currentcity,perm_addressline1,perm_addressline2,perm_landmark,
perm_district,perm_pincode,perm_city,perm_state,aadhar_front,aadhar_back,declaration_proof,alternateid_type,ownhouse_proof,Profile_img,signature_img,order_id,store_id,branch_code,username,is_approved,discrepancy,note,created_at,couponcode,rule_id,discount_amount,rso_username,pd_assessment,pd_repaying,pd_month_emi,pd_monthemi_eligibility,pd_loan_amount,ngo_officername,field_officername,branch_officername,lead_type,address_proof_front,address_proof_back,ship_proof_back,ship_proof_front,form60_proof,nominee_title,nominee_name,nominee_mobile,nominee_dob,nominee_gender,nominee_relation,nominee_add_type,nominee_address,id_proof_type,address_proof_type,shipping_proof_type,schdule_proof,dpn_proof,add_chkbox,mobile_type) VALUES 
('".$location."', '".$disburse_to."', '".$disburse_code."','".$bc_name."', '".$bc_code."', '".$tm_name."', 
'".$tm_code."','".$se_name."','".$se_code."','".$program_name."','".$scheme_name."','".$item_code."', '".$finalprice."', ".$qty.", '".$applicant_name."',  
'".$applicant_fname."','".$applicant_lname."','".$applicant_middlename."','".$mother_name."','".$father_name."','".$id_proof."', '".$aadhaar_id ."', '".$date_of_birth."','".$gender."', 
'".$marital_status."', '".$education."', '".$residence."', '".$address_line1."','".$address_line2."','".$landmark."', '".$pincode."', 
'".$city."', '".$district."', '".$cust_state."','".$mobile_number."','".$occupation."', '".$family_income."','".$foodly_income."',
'".$repaying_capacity."', '".$emi_eligibility."',
'".$manufacturer."','".$make."','".$model."','".$cal_process_fee."','".$emi_amount."', '".$advance_emi."',
'".$grosstenure."', '".$net_tenure."', '".$item_code."','".$finalprice."','".$roi."','".$email_id."', ".$no_of_dependants.",'".$year_at_currentaddress."', '".$year_in_currentcity."','".$perm_addressline1."',
'".$perm_addressline2."','".$perm_landmark."','".$perm_district."', '".$perm_pincode."','".$perm_city."','".$perm_state."',
'".$aadhar_front."','".$aadhar_back."','".$declaration_proof."','".$alernate_id_type."','".$ownhouse_proof."','".$Profile_img."','".$signature_img."', ".$order_id.",".$storeid.",'".$branch_code."','".$username."','0','0','','".date("Y-m-d H:i:s")."', '".$couponcode."', '".$rule_id."', '".$discount_amount."', '".$rso_username."','".$pd_assess."','".$pd_repaying."','".$pd_month_emi."','".$pd_monthemi_eligibility."','".$pd_loan_amount."','".$ngo_officername."','".$field_officername."','".$branch_officername."','".$lead_type."','".$address_proof_front."','".$address_proof_back."','".$ship_proof_back."','".$ship_proof_front."','".$form60_proof."','".$nominee_title."','".$nominee_name."','".$nominee_mobile."','".$nominee_dob."','".$nominee_gender."','".$nominee_relation."','".$nominee_add_type."','".$nominee_address."','".$id_proof_type."','".$address_proof_type."','".$shipping_proof_type."','".$schdule_proof."','".$dpn_proof."','".$add_chkbox."','".$mobile_type."')";



  	 $query = $this->db->query($sql); 

	 $this->db->query("INSERT INTO lead_api_log(request_json,result,username) values ('".$data."','insert','$username')"); 
	

  
    if($query){
    $output['res_msg']="order lead success";
	$output['res_code']=1;	
    }else{
	$output['res_msg']="order lead failed";
	$output['res_code']=0;
    }
}
else if($id != '0'){
 $updatesql = "UPDATE orderlead_info set 
location_name = '".$location."',
bc_name = '".$bc_name."',
bc_code = '".$bc_code."',
tm_name = '".$tm_name."',
tm_code = '".$tm_code."',
qty = ".$qty.",
applicant_name = '".$applicant_name."',
applicant_firstname = '".$applicant_fname."',
applicant_lastname ='".$applicant_lname."',
applicant_middlename ='".$applicant_middlename."',
mother_name ='".$mother_name."',
father_name = '".$father_name."',
id_proof = '".$id_proof."',
proof_number = '".$aadhaar_id."',
date_of_birth = '".$date_of_birth."',     
gender = '".$gender."',         
marital_status = '".$marital_status."',
education =  '".$education."',
residence = '".$residence."',
address_line1 ='".$address_line1."',
address_line2 ='".$address_line2."',
landmark ='".$landmark."',
pincode = '".$pincode."',
city ='".$city."',
district ='".$district."',
cust_state ='".$cust_state."',
mobile_number ='".$mobile_number."',
occupation ='".$occupation."',
monthly_income ='".$family_income."',
monthly_expenditure ='".$foodly_income."',
repaying_capacity ='".$repaying_capacity."',
emi_eligibility ='".$emi_eligibility."',

asset_make ='".$make."',
asset_model ='".$model."',

net_tenure ='".$net_tenure."',
item_number ='".$item_code."',
email_id ='".$email_id."',
no_of_dependants =".$no_of_dependants.",
year_at_currentaddress ='".$year_at_currentaddress."',
year_in_currentcity ='".$year_in_currentcity."',
perm_addressline1 ='".$perm_addressline1."',
perm_addressline2 ='".$perm_addressline2."',
perm_landmark = '".$perm_landmark."',
perm_district ='".$perm_district."',
perm_pincode ='".$perm_pincode."',
perm_city ='".$perm_city."',
perm_state ='".$perm_state."',
aadhar_front = IF('".$aadhar_front."' = '' ,aadhar_front,'".$aadhar_front."'),  
aadhar_back = IF('".$aadhar_back."' = '' ,aadhar_back,'".$aadhar_back."'), 
declaration_proof = IF('".$declaration_proof."' = '' ,declaration_proof,'".$declaration_proof."'),
alternateid_type ='".$alernate_id_type."',
ownhouse_proof = IF('".$ownhouse_proof."' = '' ,ownhouse_proof,'".$ownhouse_proof."'),
signature_img = IF('".$signature_img."' = '' ,signature_img,'".$signature_img."'), 
Profile_img = IF('".$Profile_img."' = '' ,Profile_img,'".$Profile_img."'),

	nominee_title = '".$nominee_title."',
	nominee_name = '".$nominee_name."',
	nominee_mobile = '".$nominee_mobile."',
	nominee_gender = '".$nominee_gender."',
	nominee_relation = '".$nominee_relation."',
	nominee_add_type = '".$nominee_add_type."',
	nominee_address = '".$nominee_address."',

	
	
	id_proof_type = '".$id_proof_type."',
	address_proof_type = '".$address_proof_type."',
	shipping_proof_type = '".$shipping_proof_type."',
	add_chkbox = '".$add_chkbox."',
	mobile_type = '".$mobile_type."',
	

	
	schdule_proof = IF('".$schdule_proof."' = '' ,schdule_proof,'".$schdule_proof."'),
	dpn_proof = IF('".$dpn_proof."' = '' ,dpn_proof,'".$dpn_proof."'),


address_proof_front = IF('".$address_proof_front."' = '' ,address_proof_front,'".$address_proof_front."'),  
address_proof_back = IF('".$address_proof_back."' = '' ,address_proof_back,'".$address_proof_back."'),  
ship_proof_back = IF('".$ship_proof_back."' = '' ,ship_proof_back,'".$ship_proof_back."'),  
ship_proof_front = IF('".$ship_proof_front."' = '' ,ship_proof_front,'".$ship_proof_front."'),  
form60_proof = IF('".$form60_proof."' = '' ,form60_proof,'".$form60_proof."'),  


order_id = ".$order_id.",
store_id = ".$storeid.",
branch_code = '".$branch_code."',
discrepancy = '2',
pd_assessment = '".$pd_assess."',
pd_repaying = '".$pd_repaying."',
pd_month_emi = '".$pd_month_emi."',
pd_monthemi_eligibility = '".$pd_monthemi_eligibility."',
pd_loan_amount = '".$pd_loan_amount."',
ngo_officername = '".$ngo_officername."',
field_officername = '".$field_officername."',
branch_officername = '".$branch_officername."',
lead_type = '".$lead_type."',
discrepancy_comment='',
status = 'Under Process',

updated_at = NOW() where username = '".$item["username"]."' AND id = '".$item["server_id"]."' ";


$update_execute = $this->db->query($updatesql);
	
 $this->db->query("INSERT INTO lead_api_log(request_json,result,username) values ('".$data."','update','$username')");
 $this->db->query("INSERT INTO orderlead_upload_history(parent_id,action,process,reason) values ('".$item["server_id"]."','-','RCF QDE','under process changed through mobile')");

 
	if($update_execute){
	
	$output['res_msg']="order lead success";
	$output['res_code']=3;
    }else{
	$output['res_msg']="order lead failed";
	$output['res_code']=4;
    } 
}
	$i++;
	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	}

} 
 echo json_encode($output);
		
		
		
		
	}
	public function fintech_count(){
		
		$data=file_get_contents('php://input');
$id="test";
$json = json_decode($data,true);

// file_put_contents($file, $current); 

$output  = array();
$i=0;

$user_id = $json["user_id"];
$username = $json["username"];
$user_type = $json["user_type"];
$store_id = $json["store_id"];
// $store_id = 54;
 if($user_id != null){
		$this->load->model('api_model');
		$data = $this->api_model->fintech_count($username);
    if($data)
	{
		/*$output['orderlead'][$i]['countDiscrepancy'] = $data->discrepancy;
		$output['orderlead'][$i]['total_lead'] = $data->total_lead;
		$output['orderlead'][$i]['countInprogress'] = $data->under_process;
		$output['orderlead'][$i]['countPendingOrder'] = $data->order_confim;
		$output['orderlead'][$i]['countApproved'] = $data->sanctioned;
		$output['orderlead'][$i]['countDisbursed'] = $data->disbursed;
		$output['orderlead'][$i]['countRejected'] = $data->canceled;
		$output['orderlead'][$i]['countDisburseProgress'] = $data->disbursement;
		$output['orderlead'][$i]['countLoanEligible'] = $data->loan_eligible;

		$output['res_msg']="order lead success";
		$output['res_code']=1;*/
		$output['orderlead'][$i]['Otherleads'] = $data->otherleads;
		$output['orderlead'][$i]['MyLeads'] = $data->my_leads;
		$output['orderlead'][$i]['NewLeads'] = $data->new_leads;
		$output['orderlead'][$i]['Partner'] = $data->partner;
		$output['orderlead'][$i]['LoanEligible'] = $data->loan_eligible;
		$output['orderlead'][$i]['PreApprovalDiscrepancy'] = $data->pre_discrepancy;
		$output['orderlead'][$i]['PostApprovalDiscrepancy'] = $data->post_discrepancy;
		$output['orderlead'][$i]['DPNSAUploaded'] = $data->dpn_sa_uploaded;
		$output['orderlead'][$i]['DPNSAReceived'] = $data->dpn_sa_received;
		$output['orderlead'][$i]['Sanctioned'] = $data->sanctioned;
		$output['orderlead'][$i]['PendingOrderConfirmation'] = $data->order_confim;
		$output['orderlead'][$i]['Confirmed'] = $data->confirmed;
		$output['orderlead'][$i]['DisbursementInProgress'] = $data->disbursement;
		$output['orderlead'][$i]['Disbursed'] = $data->disbursed;
		$output['orderlead'][$i]['Canceled'] = $data->rejected;
		$output['res_msg']="order lead success";
		$output['res_code']=1;
		
	}
	else {
	$output['res_msg']="order lead failed";
	$output['res_code']=0;
    }

	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	}
 echo json_encode($output);
		
	}
	public function download_fintech(){
		
		$data=file_get_contents('php://input');

  $id="test";

    $json = json_decode($data,true);
   // $file = 'orderxmls/logis_'.$id."_". (strtotime(date("Y/m/d h:i:sa"))*1000);

  //  $current = file_get_contents($file);
   // $current = $data;
    // file_put_contents($file, $current); 
	//echo 'd';
    $output  = array();
    $i=0;
// $json1 = $json['gramalaya'];
	$user_id = $json["user_id"];
    $username = $json["username"];
    $user_type = $json["user_type"];
	
	//echo "<pre>";
	//print_r($json);

//echo $user_type.'ss';
	 if($user_id != null){
		 
	//	 echo 'dd';
		 
		$this->load->model('api_model');
		$details = $this->api_model->download_fintech($user_type,$username);
		
	

    if($details){
    /* foreach($details as $key =>$value)
    {
        $monthly_inc = $value['monthly_income'];
        $monthly_exp = $value['monthly_expenditure'];
        if($monthly_inc != "")
        {
            $inc_arr = unserialize($monthly_inc);
            foreach($inc_arr as $inc_element)
			{
					$income_arr[] = $inc_element;
			}
			
            $details[$key]['monthly_income']= json_encode($income_arr);
        }
        if($monthly_exp != "")
        {
            $exp_arr = unserialize($monthly_exp);
            foreach($exp_arr as $ekeys=>$eval)
                $expenditure_arr[] = array('amount'=>$eval,'foodExpedi'=>$ekeys);
            $details[$key]['monthly_expenditure']= json_encode($expenditure_arr);
        }
        unset($income_arr);
        unset($expenditure_arr);
    } */
	$output['orderlead'] = $details;
    $output['res_msg']="order lead success";
	$output['res_code']=1;	
	
	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=0;
    }

	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	} 

 echo json_encode($output);
	}
	public function pending_confirmation(){
		
	$data=file_get_contents('php://input');



    $json = json_decode($data,true);
	
    $output  = array();
    $i=0;

	$user_id = $json["user_id"];
    $username = $json["username"];
	$user_type = $json["user_type"];

 
	 if($user_id != null){
	 

	$this->load->model('api_model');
	$details = $this->api_model->chk_pending($user_type,$username);
	

 
    if($details){
		$output['orderlead_pending'][$i] = $details[0];		
		$output['res_msg']="order lead success";
	    $output['res_code']=1;
		}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=0;
    }
	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	} 

 echo json_encode($output);
	}
	public function pending_orders_update(){
		
		$data=file_get_contents('php://input');
		$json = json_decode($data,true);
		$user_id = $json['user_id'];
		$id = $json['lead_id'];
		$username = $json['username'];
		$user_type = $json['user_type'];
		$status = $json['status'];
		$storeid = $json['store_id'];


		 if($user_id != null){
		  
		 if($id != '0'){
			 if($status == 'Approved'){
				 $setResp = $this->updatePendingOrder($id,$username,$storeid);

			 if($setResp != null){
				 $output['res_msg']="pending order success";
				 $output['res_code']=1;
			 }else{
				 $output['res_msg']="order lead failed";
				 $output['res_code']=0;
			} 
			 }else{
				 $disapp = 'Disapproved BY ' . $username;
				 $cur_date = date('Y-m-d H:i:s');
				// $updatesql = "UPDATE orderlead_info SET status='Canceled',is_approved=1,note='".$disapp."',updated_at='".$cur_date."' WHERE id = ".$id."";
				// $updatesql = "UPDATE orderlead_info set updated_at = NOW() where username = '".$username."' AND id = '".$id."' "; 
					$this->load->model('api_model');
					$details = $this->api_model->disapprove($disapp,$cur_date,$id);
	
				
				
				$output['res_msg']="pending order success";
				$output['res_code']=3;	
				
			 }

		}
		$i++;
		}else{
		$output['res_msg']="order lead failed";
		$output['res_code']=2;	
		}

		echo json_encode($output);
		
		
	}
	public function bb_uploadfintech_image(){
		 $file_path = "uploaded_documents/"; 
	$output = array();
	/* $file = 'samp/image_'.$id."_". (strtotime(date("Y/m/d h:i:sa"))*1000);
	$data = "data image".date("Y/m/d h:i:sa");
	$current = file_get_contents($file);
	$current = $data;
	file_put_contents($file, $current); */ 
	
	  $aadhar_front = $file_path . basename( $_FILES['aadhar_front']['name']);
    $aadhar_back = $file_path . basename( $_FILES['aadhar_back']['name']);
	$alernate_id = $file_path . basename( $_FILES['alernate_id']['name']);
	$ownhouse_proof = $file_path . basename( $_FILES['ownhouse_proof']['name']);
	$signature_img = $file_path . basename( $_FILES['signature_img']['name']);
	$Profile_img = $file_path . basename( $_FILES['Profile_img']['name']);
	
	$address_proof_front = $file_path . basename( $_FILES['address_proof_front']['name']);
	$address_proof_back = $file_path . basename( $_FILES['address_proof_back']['name']);
	$ship_proof_back = $file_path . basename( $_FILES['ship_proof_back']['name']);
	$ship_proof_front = $file_path . basename( $_FILES['ship_proof_front']['name']);
	$form60_proof = $file_path . basename( $_FILES['form60_proof']['name']);
	
	// file_put_contents($file, $deliveryProof_path); 
	//added by vasanth 
	
	try 
	{
		if($_FILES['alernate_id']['name'] != null){
			move_uploaded_file($_FILES['alernate_id']['tmp_name'], $alernate_id);
		}
		if($_FILES['aadhar_front']['name'] != null){
			move_uploaded_file($_FILES['aadhar_front']['tmp_name'], $aadhar_front);
		}
		if($_FILES['aadhar_back']['name'] != null){
			move_uploaded_file($_FILES['aadhar_back']['tmp_name'], $aadhar_back);
		}
		if($_FILES['ownhouse_proof']['name'] != null){
			move_uploaded_file($_FILES['ownhouse_proof']['tmp_name'], $ownhouse_proof);
		}
		if($_FILES['signature_img']['name'] != null){
			move_uploaded_file($_FILES['signature_img']['tmp_name'], $signature_img);
		}
		if($_FILES['Profile_img']['name'] != null){
			move_uploaded_file($_FILES['Profile_img']['tmp_name'], $Profile_img);
		}
		
		
		if($_FILES['address_proof_front']['name'] != null){
			move_uploaded_file($_FILES['address_proof_front']['tmp_name'], $address_proof_front);
		}
		if($_FILES['address_proof_back']['name'] != null){
			move_uploaded_file($_FILES['address_proof_back']['tmp_name'], $address_proof_back);
		}
		if($_FILES['ship_proof_back']['name'] != null){
			move_uploaded_file($_FILES['ship_proof_back']['tmp_name'], $ship_proof_back);
		}
		if($_FILES['ship_proof_front']['name'] != null){
			move_uploaded_file($_FILES['ship_proof_front']['tmp_name'], $ship_proof_front);
		}
		if($_FILES['form60_proof']['name'] != null){
			move_uploaded_file($_FILES['form60_proof']['tmp_name'], $form60_proof);
		}
		}
		catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
	  $output['res_msg'] = 'image failed';
		$output['res_code'] = 0;
		echo json_encode($output);
      }
	  $output['res_msg'] = 'image success';
			    $output['res_code'] = 2;
	echo json_encode($output);
	
	//vasanth
		
		
	}
	public function bb_search_fintech(){
		header("Access-Control-Allow-Origin: *");
		
		 $data=file_get_contents('php://input');

  $id="test";

    $json = json_decode($data,true);

    $file = 'orderxmls/logis_'.$id."_". (strtotime(date("Y/m/d h:i:sa"))*1000);

    $current = file_get_contents($file);
    $current = $data;
    // file_put_contents($file, $current); 
	
    $output  = array();
    $i=0;

	$user_id = $json["user_id"];
    $username = $json["username"];
	$user_type = $json["user_type"];
	$selecttype = $json["selecttype"];
	$searchParameter = $json["searchParameter"];
	$storeId = $json["store_id"];


	 if($user_id != null){
	 

	 
    $sql = "SELECT * from orderlead_info WHERE username = '".$username."' OR rso_username = '".$username."' "; 
	
	$result =mysqli_query ($connect,$sql);

   $num_rows = mysqli_num_rows($result);
 	
    if($num_rows > 0){
  
	
			 if($searchParameter != null || $searchParameter != ''){
			 if($selecttype == 'Mobile No'){
			 
			$inProgressQuery = "SELECT * from orderlead_info WHERE mobile_number LIKE '%$searchParameter%'   ";	 
			 }else if($selecttype == 'Case ID'){
		 
			$inProgressQuery = "SELECT * from orderlead_info WHERE case_id = '".$searchParameter."'    ";	 
			 }else if($selecttype == 'Lead ID'){
			 	 
			$inProgressQuery = "SELECT * from orderlead_info WHERE id = '".$searchParameter."'    ";	 	 
		 }
		 }
		
	
	    $inProgressResult = mysqli_query ($connect,$inProgressQuery);
		$countInProgress = mysqli_num_rows($inProgressResult);
		if($countInProgress > 0){
			while ($row = mysqli_fetch_assoc($inProgressResult)){
			$output['orderlead_pending'][$i] = $row;	
			$leadId = $row["id"];
			$orderId = $row["order_id"];
			if($orderId != 0){
			$order_data = Mage::getModel('sales/order')->load($orderId);
			// print_r($order_data);
			// die;
			
			$output['orderlead_pending'][$i]['bbstatus'] = $order_data['status']  . " - ". $inc_id ;
			$inc_id = $order_data['increment_id'];
			$output['orderlead_pending'][$i]['bbstatus'] = $order_data['bbstatus'] . " - ". $inc_id ;
			}else{
			$output['orderlead_pending'][$i]['complete_status'] = "NIL";
			$output['orderlead_pending'][$i]['bbstatus'] = "Order not genereated" ;	
			}
			
			$i++;
			}
			 $output['res_msg']="order lead success";
	$output['res_code']=1;
		}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=5;
    }

   	
	
	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=3;
    }

	}else{
	$output['res_msg']="order lead failed";
	$output['res_code']=2;	
	} 

	echo json_encode($output);
 
		
		
	}
	
	
	
}