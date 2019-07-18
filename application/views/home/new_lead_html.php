<?php 
$this->load->view('header');
$this->load->view('left-menu');
$session = $this->session->userdata('MY_SESS2');
/* echo "<pre>";
print_r($session['data'][0]['role']);
echo "</pre>"; */
//echo "<pre>";
//print_r($fields);
?>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Lead Creation
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Lead Creation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
		<div class="box box-success" style="padding:10px 5px; height:100%;">
			<div class="box-header with-border" id="Container"
			 style=" position:relative; display:block; width: 100%">
			 
			 
			 
			 
	
  <div style="" id="register_show" class="register-box-body">
    <h4 class="login-box-msg"><?php echo $fields['product_name'] ?></h4>

    <form id="form2" action= "" method="post">
		  <input type="hidden" value="<?php echo $fields['itemcode'] ?>" name="itemcode" >
	  <input type="hidden" value="<?php echo $fields['amount'] ?>" name="amount" >
	  <input type="hidden" value="<?php echo $fields['product_name'] ?>" name="product_name" >
	  <input type="hidden" value="<?php echo $fields['storeid'] ?>" name="storeid" >
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
			
		$str .= "<option value='".$get_fin[$i]['id']."-".$get_fin[$i]['name']."'>".$get_fin[$i]['name']."</option>";	
			
			
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
		
		</select>
        <span class=""></span>
      </div>
      </div>
	  

	  <div class="col-md-4">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Field Officer:</label>
        <select id="field_officer" name="field_officer" class="form-control">
		
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
		<input type="text" class="form-control" name="app_fname" placeholder="" required>
	 </div>
	 </div>
	 
	 
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant M Name:</label>
        <input type="text" class="form-control" name="app_mname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant L Name:</label>
        <input type="text" class="form-control" name="app_lname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Father/Spou Name:</label>
        <input type="text" class="form-control" name="fname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mother Name:</label>
        <input type="text" class="form-control" name="mname" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">No. of dependants:</label>
        <input type="text" class="form-control" id="dependants" name="dependants" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Date of Birth:</label>
        <input type="text" class="form-control" id="datepicker" name="dob" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-2">
	  <div class="form-group has-feedback">
	  <label for="firstname">Martial Status:</label>
        
		<select name="m_status" id="m_status" class="form-control">
		<option value="">-- please select --</option>
		<option value="Married">Married</option>
		<option value="Un Married">Un Married</option>
		<option value="Divorced">Divorced</option>
		<option value="Widowed">Widowed</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Education:</label>
       <select name="education" id="education" class="form-control">
		<option value="">-- please select --</option>
		<option value="High School">High School</option>
		<option value="Gratuate">Gratuate</option>
		<option value="Post Gratuate">Post Gratuate</option>
		<option value="Other">Other</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">select Residence:</label>
        <select name="residence" id="residence" class="form-control">
		<option value="">-- please select --</option>
		<option value="Self Owned">Self owned</option>
		<option value="Rented">Rented</option>
	
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mobile:</label>
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">AAdhar Number:</label>
        <input type="text" class="form-control" name="aadhar_number" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Gender:</label>
          <select name="gender" id="gender" class="form-control">
		<option value="">-- please select --</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
	
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 1:</label>
        <input type="text" class="form-control" name="address_1" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" class="form-control" name="address_2" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" class="form-control" name="land_mark" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="text" class="form-control" name="city" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" class="form-control" name="district" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" class="form-control" name="state" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" class="form-control" name="pincode" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years at Current Address:</label>
        <input type="text" class="form-control" name="year_address" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  
	  <div class="row">
	  <div class="col-md-12">
	  <label class="checkbox-inline"><input type="checkbox" name="check_address" id="check_address" value="1">Please check if Shipping Address Different</label>
	  </div>
	  </div>
	  <div id="present_address" style="display:none">
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 1:</label>
        <input type="text" class="form-control" name="s_address_1" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" class="form-control" name="s_address_2" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" class="form-control" name="s_landmark" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="text" class="form-control" name="s_city" placeholder="" >
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" class="form-control" name="s_district" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" class="form-control" name="s_state" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" class="form-control" name="s_pincode" placeholder="" >
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years at Current Address:</label>
        <input type="text" class="form-control" name="s_year_address" placeholder="" >
        <span class=""></span>
      </div>
      </div>
      </div>
 
	 </div>
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Aadhar Front:</label>
        <input type="file" class="form-control" name="aadhar_front" accept="image/*" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Aadhar Front:</label>
        <input type="file" class="form-control" name="aadhar_back" accept="image/*" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Declaration:</label>
        <input type="file" class="form-control" name="declaration" accept="image/*" required>
        <span class=""></span>
      </div>
      </div>
	 <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Schdule A:</label>
        <input type="file" class="form-control" name="schdule" accept="image/*" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Demand & Promissary:</label>
        <input type="file" class="form-control" name="demand" accept="image/*" required>
        <span class=""></span>
      </div>
      </div>
	  </div>
	  <div class="row">
	  <div class="col-md-12">
	  <div class="form-group has-feedback">
	  <label for="firstname">Income & Expenses:</label>
        <select name="income_expense" id="income_expense" class="form-control">
		<option value="">-- please select --</option>
		<option value="UPPER">UPPER</option>
		<option value="MIDDLE">MIDDLE</option>
		
		</select>
        <span class=""></span>
      </div>
      </div>
      </div>
	
	 
	  
      <div class="row">
        <div class="col-xs-8">
          <div id="loader2"></div><div id="registererror" style="color:red;"></div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Create Lead</button>
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
<script>

   $(document).ready(function(){
	   
	   
	$("#form2").submit(function(evt){
		alert()
	$("#csv_status").html('<img style="margin:0px 35%;" src="<?=base_url();?>assets/dist/img/ajax-loader-csv.gif">');		
	//alert();
		  evt.preventDefault();
		  var formData = new FormData($(this)[0]);
		  
	   $.ajax({
		   url: "<?=base_url();?>home/lead_upload",
		   type: 'POST',
		   data: formData,
		   async: false,
		   cache: false,
		   contentType: false,
		   enctype: 'multipart/form-data',
		   processData: false,
		   success: function (response) {
			 $("#csv_status").html(response);
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
