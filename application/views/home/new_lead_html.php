<?php 
$this->load->view('header');
$this->load->view('left-menu');
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
    <p class="login-box-msg">New lead Creation</p>

    <form id="form2" action= "" method="post">
	<div class="row">
	<div class="col-md-3">
      <div class="form-group has-feedback">
	  <label for="firstname">Select Finance:</label>
        <!--<input type="text" class="form-control" name="firstname" placeholder="John" required>-->
		<select  class="form-control">
		
		</select>
        <span class=""></span>
      </div>
	  </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Branch:</label>
       <select  class="form-control">
		
		</select>
        <span class=""></span>
      </div>
      </div>
	  
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Field Officer:</label>
         <select  class="form-control">
		
		</select>
        <span class=""></span>
      </div>
      </div>
	  
	 
	 
	 <div class="col-md-3">
	 <div class="form-group">
	 <label for="firstname">Applicant First Name:</label>
		<input type="text" class="form-control" name="firstname" placeholder="" required>
	 </div>
	 </div>
	</div>
	 

	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant Middle Name:</label>
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Applicant Last Name:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Father/Spouse Name:</label>
        <input type="text" class="form-control" name="userName" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mother Name:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Date of Birth:</label>
        <input type="date" class="form-control" name="dob" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Martial Status:</label>
        
		<select name="m_status" id="m_status" class="form-control">
		<option value="">-- please select --</option>
		<option value="married">Married</option>
		<option value="un_married">Un Married</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Select Education:</label>
       <select name="m_status" id="m_status" class="form-control">
		<option value="">-- please select --</option>
		<option value="high school">High School</option>
		<option value="gratuate">Gratuate</option>
		<option value="post_gratuate">Post Gratuate</option>
		<option value="other">Other</option>
		</select>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">select Residence:</label>
        <select name="m_status" id="m_status" class="form-control">
		<option value="">-- please select --</option>
		<option value="self_owned">Self owned</option>
		<option value="rented">Rented</option>
	
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
        <input type="text" class="form-control" name="userName" placeholder="" required>
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
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" class="form-control" name="userName" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" class="form-control" name="userName" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years at Current Address:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	  
	  <div class="row">
	  <div class="col-md-12">
	  <label class="checkbox-inline"><input type="checkbox" id="check_address" value="">Please check if Shipping Address Different</label>
	  </div>
	  </div>
	  <div id="present_address" style="display:none">
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 1:</label>
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Address 2:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Nearest Landmark:</label>
        <input type="text" class="form-control" name="userName" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">City/Village:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	   <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">District:</label>
        <input type="text" class="form-control" name="mobile" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">State:</label>
        <input type="text" class="form-control" name="email" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Pincode:</label>
        <input type="text" class="form-control" name="userName" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Years at Current Address:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>
        <span class=""></span>
      </div>
      </div>
      </div>
 
	 </div>
	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Aadhar Front:</label>
        <input type="file" class="form-control" name="aadhar_front" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Aadhar Front:</label>
        <input type="file" class="form-control" name="aadhar_back" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Declaration:</label>
        <input type="file" class="form-control" name="declaration" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <!--<label for="firstname">Years at Current Address:</label>
        <input type="password" class="form-control" name="passWord" placeholder="" required>-->
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
<script>

   $(document).ready(function(){
	   
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
