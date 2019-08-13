<?php 
$this->load->view('header');
$this->load->view('left-menu');
$session = $this->session->userdata('MY_SESS2');
$page = $session['page'];
/* echo "<pre>";
print_r($session['data'][0]['role']);
echo "</pre>"; */
//echo "<pre>";
//print_r($data);
//echo "</pre>";

$vals = $data[0];
?>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Lead
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url().$page;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Lead </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
		<div class="box box-success" style="padding:10px 5px; height:100%;">
			<div class="box-header with-border" id="Container"
			 style=" position:relative; display:block; width: 100%">
			 
			 
			   <div class="box-tools pull-right">
          <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
			
			<button type="button" onclick="window.history.back();" class="btn btn-info"><span class="glyphicon glyphicon-hand-left"></span> Back</button>
			<button type="button" onclick="location.href='<?=base_url().$page;?>';" class="btn btn-info"><span class="glyphicon glyphicon-home"></span>   Home</button>
          </div>
			 
	
  <div style="" id="register_show" class="register-box-body">
    <h4 class="login-box-msg"><?php echo $fields['product_name'] ?></h4>

    <form id="form2" action= "" method="post">
	 <!--  <input type="hidden" value="<?php echo $fields['itemcode'] ?>" name="itemcode" >
	  <input type="hidden" value="<?php echo $fields['amount'] ?>" name="amount" >
	  <input type="hidden" value="<?php echo $fields['product_name'] ?>" name="product_name" >
	  <input type="hidden" value="<?php echo $fields['storeid'] ?>" name="storeid" > -->
	<div class="row">
	<?php
	if($session['data'][0]['role'] == '6'){
	?>
	<div class="col-md-4">
      <div class="form-group has-feedback">
	  <label for="firstname">Select Finance:</label>
        <!--<input type="text" class="form-control" name="firstname" placeholder="John" required>-->
		<select  id="finance" name="finance" class="form-control">
		
		<?php
		
		$str = '<option value="">-- please select --</option>';
		for($i=0;$i<count($get_fin);$i++){
		$arr_id = explode('-',$get_fin[$i]['id']);	
		$str .= "<option   ".($vals['bc_code'] == $arr_id[0] ? 'selected' : '' )." value='".$get_fin[$i]['id']."-".$get_fin[$i]['name']."'>".$get_fin[$i]['name']."</option>";	
			
			
		}
		
		echo $str;
		
		
		?>
		
		
		
		</select>
        <span class=""></span>
      </div>
	  </div>
	  <div class="col-md-4">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Branch:</label>
	  <select id="branch" name="branch"  class="form-control">
	  <?php
	 // echo $vals['branch_code'];
	 
	 
	 $SQL2 = "SELECT * FROM finance_bc_branch_master where bc_id = '".$vals['bc_code']."'";
			
	$query2 = $this->db->query($SQL2);
		   
	$bc_branch =  $query2->result_array();
	  
		$str = '<option value="">-- please select --</option>';
		for($i=0;$i<count($bc_branch);$i++){
		
		$str .= "<option  ".($vals['branch_code'] == $bc_branch[$i]['branch_code'] ? 'selected' : '' )."  value='".$bc_branch[$i]['branch_code']."'>".$bc_branch[$i]['branch_name']."</option>";	
			
			
		}
		
		echo $str;
	  
	  
	  ?>
       
		
		</select>
        <span class=""></span>
      </div>
      </div>
	  

	  <div class="col-md-4">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Field Officer:</label>
        <select id="field_officer" name="field_officer" class="form-control">
		<?php
	 // echo $vals['branch_code'];
	 
	 
	 $SQL3 = "SELECT * FROM users where branch_id = '".$vals['branch_code']."'";
			
	$query3 = $this->db->query($SQL3);
		   
	$field =  $query3->result_array();
	  
		$str = '<option value="">-- please select --</option>';
		for($i=0;$i<count($field);$i++){
		
		$str .= "<option  ".($vals['field_officername'] == $field[$i]['firstname'] ? 'selected' : '' )."  value='".$field[$i]['firstname']."'>".$field[$i]['firstname']."</option>";	
			
			
		}
		
		echo $str;
	  
	  
	  ?>
		</select>
        <span class=""></span>
      </div>
      </div>
	  
	 <?php
	}
	 ?>
	 
	 
	</div>
	 

	  <div class="row">
	 <div class="col-md-2">
	 <div class="form-group">
	 <label for="firstname">Applicant F Name:</label>
		<input type="text" class="form-control" value="<?php echo $vals['applicant_firstname'];?>" name="app_fname" placeholder="" required>
	 </div>
	 </div>
	 
	 
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant M Name:</label>
        <input type="text" class="form-control" value="<?php echo $vals['applicant_middlename'];?>" name="app_mname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant L Name:</label>
        <input type="text" class="form-control" value="<?php echo $vals['applicant_lastname'];?>" name="app_lname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Father/Spou Name:</label>
        <input type="text" class="form-control" value="<?php echo $vals['father_name'];?>" name="fname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mother Name:</label>
        <input type="text" class="form-control" value="<?php echo $vals['mother_name'];?>" name="mname" placeholder="" >
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">No. of dependants:</label>
        <input type="text" class="form-control" id="dependants" value="<?php echo $vals['no_of_dependants'];?>" name="dependants" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Date of Birth:</label>
        <input type="text" class="form-control" id="datepicker" value="<?php echo $vals['date_of_birth'];?>" name="dob" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Martial Status:</label>
        
		<select name="m_status" id="m_status" class="form-control">
		<option value="">-- please select --</option>
		<option <?php echo ($vals['marital_status'] == 'Married' ? 'selected' : '');?> value="Married">Married</option>
		<option <?php echo (trim($vals['marital_status']) == 'Unmarried' ? 'selected' : '');?> value="Unmarried">Un Married</option>
		<option <?php echo ($vals['marital_status'] == 'Divorced' ? 'selected' : '');?> value="Divorced">Divorced</option>
		<option <?php echo ($vals['marital_status'] == 'Widowed' ? 'selected' : '');?> value="Widowed">Widowed</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Education:</label>
       <select name="education" id="education" class="form-control">
		<option value="">-- please select --</option>
		<option <?php echo ($vals['education'] == 'High School' ? 'selected' : '');?> value="High School">High School</option>
		<option <?php echo ($vals['education'] == 'Gratuate' ? 'selected' : '');?> value="Gratuate">Gratuate</option>
		<option <?php echo ($vals['education'] == 'Post Gratuate' ? 'selected' : '');?> value="Post Gratuate">Post Gratuate</option>
		<option <?php echo ($vals['education'] == 'Other' ? 'selected' : '');?> value="Other">Other</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">select Residence:</label>
        <select name="residence" id="residence" class="form-control">
		<option value="">-- please select --</option>
		<option <?php echo ($vals['residence'] == 'Self Owned' ? 'selected' : '');?> value="Self Owned">Self owned</option>
		<option <?php echo ($vals['residence'] == 'Rented' ? 'selected' : '');?> value="Rented">Rented</option>
	
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mobile:</label>
        <input type="text" value="<?php echo $vals['mobile_number'];?>" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Email:</label>
        <input type="text" value="<?php echo $vals['email_id'];?>" class="form-control" name="email" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">AAdhar Number:</label>
        <input type="text" value="<?php echo $vals['proof_number'];?>" class="form-control" name="aadhar_number" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Gender:</label>
          <select name="gender" id="gender" class="form-control">
		<option value="">-- please select --</option>
		<option <?php echo ($vals['gender'] == 'male' ? 'selected' : '');?> value="male">Male</option>
		<option <?php echo ($vals['gender'] == 'female' ? 'selected' : '');?> value="female">Female</option>
	
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 1:</label>
        <input type="text" value="<?php echo $vals['perm_addressline1'];?>" class="form-control" name="address_1" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" value="<?php echo $vals['perm_addressline2'];?>" class="form-control" name="address_2" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" value="<?php echo $vals['perm_landmark'];?>" class="form-control" name="land_mark" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="text" value="<?php echo $vals['perm_city'];?>" class="form-control" name="city" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" value="<?php echo $vals['perm_district'];?>" class="form-control" name="district" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" value="<?php echo $vals['perm_state'];?>"  class="form-control" name="state" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" value="<?php echo $vals['perm_pincode'];?>"  class="form-control" name="pincode" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years at Current Address:</label>
        <input type="text" value="<?php echo $vals['year_at_currentaddress'];?>"  class="form-control" name="year_address" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years in City:</label>
        <input type="text" value="<?php echo $vals['year_in_currentcity'];?>"  class="form-control" name="year_city" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  
	  
	  </div>
	  
	  <div class="row">
	  <div class="col-md-12">
	  <label class="checkbox-inline"><input type="checkbox" name="check_address" <?php  echo ($vals['address_line1'] != $vals['perm_addressline1'] ? 'checked' : ''); ?> id="check_address" value="1">Please check if Shipping Address Different</label>
	  </div>
	  </div>
	 <!-- <div id="present_address"  style="display:<?php  echo ($vals['address_line1'] == $vals['perm_addressline1'] ? 'none' : 'block'); ?>">-->
	  <div id="present_address"  style="">
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 1:</label>
        <input type="text" value="<?php echo $vals['address_line1'];?>" class="form-control" name="s_address_1" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" value="<?php echo $vals['address_line2'];?>" class="form-control" name="s_address_2" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" value="<?php echo $vals['landmark'];?>" class="form-control" name="s_landmark" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="text" value="<?php echo $vals['city'];?>" class="form-control" name="s_city" placeholder="" >
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" value="<?php echo $vals['district'];?>" class="form-control" name="s_district" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" value="<?php echo $vals['cust_state'];?>" class="form-control" name="s_state" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" value="<?php echo $vals['pincode'];?>" class="form-control" name="s_pincode" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	 
      </div>
 
	 </div>
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">ID proof Front:</label>
		<?php
		if($vals['aadhar_front']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['aadhar_front'];?>">
	  <img width="50px" height="50px" src="<?php echo $vals['aadhar_front'];?>">
	  </a>
	  <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="aadhar_front" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">ID Proof Back:</label>
	  <?php
		if($vals['aadhar_back']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['aadhar_back'];?>">
	  <img width="50px" height="50px" src="<?php echo $vals['aadhar_back'];?>">
	  </a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="aadhar_back" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  
	   <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address Proof Front:</label>
	   <?php
		if($vals['address_proof_front']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['address_proof_front'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['address_proof_front'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="address_proof_front" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address Proof Back:</label>
	   <?php
		if($vals['address_proof_back']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['address_proof_back'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['address_proof_back'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="address_proof_back" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Declaration:</label>
	   <?php
		if($vals['declaration_proof']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['declaration_proof'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['declaration_proof'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="declaration_proof" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	   <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Form 60 Proof:</label>
	   <?php
		if($vals['form60_proof']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['form60_proof'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['form60_proof'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="form60_proof" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">DPN Proof:</label>
	   <?php
		if($vals['dpn_proof']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['dpn_proof'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['dpn_proof'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="dpn_proof" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
	  
	 <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Schdule A:</label>
	   <?php
		if($vals['schdule_proof']){
		?>
		<a style="margin:0px 5px;"  class="fancybox"  href="<?php echo $vals['schdule_proof'];?>">
		<img width="50px" height="50px" src="<?php echo $vals['schdule_proof'];?>">
		</a>
	   <?php
		}else{
			echo "Image NA";
		}
	  ?>
        <input type="file" class="form-control" name="schdule_proof" accept="image/*" >
        <span class=""></span>
      </div>
      </div>
      </div>
	 
	  <div class="row" style="display:none">
	  <div class="col-md-12">
	  <div class="form-group has-feedback">
	  <label for="firstname">Income & Expenses:</label>
        <select name="income_expense" id="income_expense" class="form-control">
		<option value="">-- please select --</option>
		<option value="UPPER">UPPER</option>
		<option value="MIDDLE">MIDDLE</option>
		<option value="CUSTOM">CUSTOM</option>
		
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
		<div class="row" style="display:none;" id="members">
		<div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Earning Members:</label>
			<select name="earning_members[]" id="earning_members" class="form-control">
			<option value="">-- please select --</option>
			<option value="1-Husband">Husband</option>
			<option value="2-Wife">Wife</option>
			<option value="3-Son">Son</option>
			<option value="4-Daughter">Daughter</option>
			<option value="5-Others">Others</option>
			
			
			</select>
			<span class=""></span>
		  </div>
		  </div>
		  
		  <div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Amount:</label>
			<input type="text" class="form-control" id="member_amount" name="member_amount[]" value="">
			
			<span class=""></span>
		  </div>
		  </div>
		  
		  <div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Member Name:</label>
			<input type="text" class="form-control" id="member_name" name="member_name[]" value="">
			
			<span class=""></span>
		  </div>
		  </div>
		  
		  
		  <div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Action:</label>
			<button type="button" id="add_member" class="form-control btn btn-default">ADD</button>
			
			<span class=""></span>
		  </div>
		  </div>
		</div>
		
		<div id="append_member"></div>
		
		
		
		
		
		<div class="row" style="display:none;" id="food">
		<div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Eexpenditure:</label>
			<select name="food_expenditure[]" id="food_expenditure" class="form-control">
			<option value="">-- please select --</option>
			<option value="1-Food">Food</option>
			<option value="2-Transport">Transport</option>
			<option value="3-Loans Repayment">Loans Repayment</option>
			<option value="4-Education">Education</option>
			<option value="5-EB">EB</option>
			<option value="6-Gas">Gas</option>
			<option value="7-Cable">Cable</option>
			<option value="8-Milk">Milk</option>
			<option value="9-Other Expenses">Other Expenses</option>
			<option value="10-Savings">Savings</option>
			<option value="11-Cash In Hand">Cash In Hand</option>
			<option value="12-Medical">Medical</option>
			
			
			</select>
			<span class=""></span>
		  </div>
		  </div>
		  
		  <div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Amount:</label>
			<input type="text" class="form-control" id="exp_amount" name="exp_amount[]" value="">
			
			<span class=""></span>
		  </div>
		  </div>

		  
		  <div class="col-md-3">
		  <div class="form-group has-feedback">
		  <label for="firstname">Action:</label>
			<button type="button" id="add_food" class="form-control btn btn-default">ADD</button>
			
			<span class=""></span>
		  </div>
		  </div>
		</div>
		
		<div id="append_food"></div>
	  
      <div class="row">
        <div class="col-xs-8">
          <div id="loader2"></div><div id="registererror" style="color:red;"></div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Update Lead</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    
  </div>
			  
			  
			  
			  
			</div>
			</div>
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
$this->load->view('footer');

?>


 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=base_url();?>assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {


		$(".fancybox").fancybox({'width':400,
                         'height':250,
                         'autoSize' : false,
						 'openEffect': 'elastic',
						 'closeEffect': 'elastic'
		});

		});
	</script>
<script>
  function delete_mem(){
		   
		   alert();
		   $(this).parent().parent().fadeOut(300);

	   }

   $(document).ready(function(){
	   
	   $("#add_member").on("click",function(){
		   
		   $("#append_member").append('<div class="row"><div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Earning Members:</label><select name="earning_members[]" id="earning_members" class="form-control"><option value="">-- please select --</option><option value="1-Husband">Husband</option><option value="2-Wife">Wife</option><option value="3-Son">Son</option><option value="4-Daughter">Daughter</option><option value="5-Others">Others</option></select><span class=""></span> </div> </div> <div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Amount:</label><input type="text" class="form-control" id="member_amount" name="member_amount[]" value=""><span class=""></span> </div> </div> <div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Member Name:</label><input type="text" class="form-control" id="member_name" name="member_name[]" value=""><span class=""></span> </div> </div> <div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Action:</label><button type="button"  class="form-control btn btn-default delete_member" onclick="return this.parentNode.parentNode.parentNode.remove();">DELETE</button><span class=""></span> </div> </div></div>');
	   });
	   
	   
	   $("#add_food").on("click",function(){
		   
		//   alert();
		   
		   $("#append_food").append('<div class="row" id="food"><div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Eexpenditure:</label><select name="food_expenditure[]" id="food_expenditure" class="form-control"><option value="">-- please select --</option><option value="1-Food">Food</option><option value="2-Transport">Transport</option><option value="3-Loans Repayment">Loans Repayment</option><option value="Education">Education</option><option value="4-EB">EB</option><option value="5-Gas">Gas</option><option value="6-Cable">Cable</option><option value="7-Milk">Milk</option><option value="8-Other Expenses">Other Expenses</option><option value="9-Savings">Savings</option><option value="10-Cash In Hand">Cash In Hand</option><option value="11-Medical">Medical</option></select><span class=""></span> </div> </div> <div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Amount:</label><input type="text" class="form-control" id="exp_amount" name="exp_amount[]" value=""><span class=""></span> </div> </div> <div class="col-md-3"> <div class="form-group has-feedback"> <label for="firstname">Action:</label><button type="button" class="form-control btn btn-default delete_food" onclick="return this.parentNode.parentNode.parentNode.remove();">DELETE</button><span class=""></span> </div> </div></div>');
	   });
	   
	  
	 
	   
	 
		$("#income_expense").change(function () {   
		   
		  // alert($(this).val());
		   
		   if($(this).val() == 'CUSTOM'){
			   
			   
			   $("#members").show();
			   $("#food").show();
			   
		   }else{
			   
			  $("#members").hide(); 
			  $("#food").hide(); 
		   }
		   
		   
	   });
	   
	   
	$("#form2").submit(function(evt){
		//alert()
	$("#csv_status").html('<img style="margin:0px 35%;" src="<?=base_url();?>assets/dist/img/ajax-loader-csv.gif">');		
	//alert();
		  evt.preventDefault();
		  var formData = new FormData($(this)[0]);
		  
	   $.ajax({
		   url: "<?=base_url();?>home/lead_update?id=<?php echo $_GET['id']; ?>",
		   type: 'POST',
		   data: formData,
		   async: false,
		   cache: false,
		   contentType: false,
		   enctype: 'multipart/form-data',
		   processData: false,
		   success: function (response) {
			 $("#csv_status").html(response);
			 alert("Edited Successfully");
			 window.location.href='<?=base_url().$page;?>';
			// $("#csv_status").html('<img style="margin:0px auto;" src="<?=base_url();?>assets/dist/img/ajax-loader-csv.gif">');		

		   }
	   });
	   return false;
	 });
 
 
	   
	$("#finance").on('change',function(){
		//alert();
		$("#field_officer").html('');
		$.ajax({
			url: '<?=base_url();?>home/get_bra',
			dataType:'html',
			type:'POST',
			data:{'finance':$("#finance").val()},
			success:function(result){
				
				$("#branch").html(result);
			}
			
		});
	})  

	$("#branch").on('change',function(){
		//alert();
		$.ajax({
			url: '<?=base_url();?>home/get_field',
			dataType:'html',
			type:'POST',
			data:{'branch':$("#branch").val()},
			success:function(result){
				
				$("#field_officer").html(result);
			}
			
		});
	}) 	
	   
	   
	   
   $( "#datepicker" ).datepicker({
    dateFormat: 'yy-mm-dd',
	changeMonth: true,
     changeYear: true,
	minDate: new Date(1900,1-1,1), maxDate: '-18Y',
    startDate: '-3d'
});
   
	 $('#check_address').click(function() {
			//$("#present_address").toggle(this.checked);
			
			
			if(this.checked){
				
				$("#present_address").slideDown(500);
			}else{
				$("#present_address").slideUp(500);
				
			}
			
			
		})

   });
  </script>

</body>
</html>
