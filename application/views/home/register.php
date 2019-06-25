<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Config</a></li>
        <li class="active">User Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		<div class="box box-danger" style="padding:10px 5px; height:100%;">
			<div class="box-header with-border" id="Container"
			 style=" position:relative; display:block; width: 100%">
			 
			 
			 
			 
	
  <div style="" id="register_show" class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form id="form2" action= "" method="post">
	<div class="row">
	<div class="col-md-3">
      <div class="form-group has-feedback">
	  <label for="firstname">First Name:</label>
        <input type="text" class="form-control" name="firstname" placeholder="John" required>
        <span class=""></span>
      </div>
	  </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" placeholder="Smith" required>
        <span class=""></span>
      </div>
      </div>
	  
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Date of Birth:</label>
        <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>
        <span class=""></span>
      </div>
      </div>
	  
	 
	 
	 <div class="col-md-3">
	 <div class="form-group">
	 <label for="firstname">gender:</label>
		<select class="form-control selcls" name="gender" id="gender" required>
 
		<option value="" selected disabled >--select--</option>
		
		<option value="male">Male</option>
		 
		<option value="female">Female</option>
		 
		</select>
	 </div>
	 </div>
	</div>
	 

	  <div class="row">
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Mobile:</label>
        <input type="text" class="form-control" name="mobile" placeholder="99999 99999" required>
        <span class=""></span>
      </div>
      </div>
	  
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="abc@mail.com" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Username:</label>
        <input type="text" class="form-control" name="userName" placeholder="Username" required>
        <span class=""></span>
      </div>
      </div>
	  <div class="col-md-3">
	  <div class="form-group has-feedback">
	  <label for="firstname">Password:</label>
        <input type="password" class="form-control" name="passWord" placeholder="Password" required>
        <span class=""></span>
      </div>
      </div>
      </div>
	  
	  
	  
	   <div class="form-group">
	 <label for="firstname">Role:</label>
		<select class="form-control selcls" name="role" id="role" required>
			
		 
		</select>
	 </div>
	 
	 <div id="finance_bc">
	 
	 
	 </div>
	 
	  <div id="finance_bc_branch">
	 
	 
	 </div>
	  
      <div class="row">
        <div class="col-xs-8">
          <div id="loader2"></div><div id="registererror" style="color:red;"></div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    
  </div>
			  
			  
			  
			  
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
function bc_branch(){
	  
	//alert($("#finance_bc_b").val())

	if($("#role").val() == 4 || $("#role").val() == 5){
	$.ajax({
		url:'<?=base_url();?>login/bc_branch_master',
		type:'POST',
		data: {"id": $("#finance_bc_b").val()},
		dataType:'html',

		success:function(result){
			$("#finance_bc_branch").empty().append(result);
		}

	});
	}			
				
  }
   $(document).ready(function(){
	   
	    $.ajax({
                    url:'<?=base_url();?>login/role_master',
                    type:'POST',
					dataType:'html',

                    success:function(result){
						$("#role").html(result);
                    }

            });	
	


	$("#role").change(function(){
				
				$("#finance_bc_branch").empty();
				
				if($("#role").val()=='3'){
				
				 $.ajax({
                    url:'<?=base_url();?>login/finance_bc',
                    type:'POST',
					data: {"id": $("#role").val()},
					dataType:'html',

                    success:function(result){
						$("#finance_bc").empty().append(result);
                    }

				});
				}
				if($("#role").val()=='4'){
				
				 $.ajax({
                    url:'<?=base_url();?>login/finance_bc',
                    type:'POST',
					data: {"id": $("#role").val()},
					dataType:'html',

                    success:function(result){
						$("#finance_bc").empty().append(result);
                    }

				});
				}
				if($("#role").val()=='5'){
				
				 $.ajax({
                    url:'<?=base_url();?>login/finance_bc',
                    type:'POST',
					data: {"id": $("#role").val()},
					dataType:'html',

                    success:function(result){
						$("#finance_bc").empty().append(result);
                    }

				});
				}
				if($("#role").val()=='6'){
					
					$("#finance_bc_branch").empty();	
				
				 $.ajax({
                    url:'<?=base_url();?>login/finance_bc_mul',
                    type:'POST',
					data: {"id": $("#role").val()},
					dataType:'html',

                    success:function(result){
						$("#finance_bc").empty().append(result);
                    }

				});
				}
				else{
					
					$("#finance_bc").empty();	

				}				
			})	
			
			$("#form2").submit(function(event){
            event.preventDefault();
			$("#loader2").html('');
			$("#registererror").html('');
			$("#loader2").html('<img src="<?=base_url();?>assets/dist/img/ajax-loader.gif"/> Processing...');
//alert();
            $.ajax({
                    url:'<?=base_url();?>login/registration',
                    type:'POST',
					dataType:'json',
                    data:$(this).serialize(),
                    success:function(result){
						console.log(result.msg);
                       if(result.msg == 'success'){
						//alert("Registraion completed");   
					//	$("#register_show").hide();
						$("#login_show").show();   
						$("#loader2").html('');
						$("#registererror").html('Registration completed');
						 $("#form2").trigger("reset");
					  // location.href= '<?=base_url();?>'+result.redirect_menu;
					}else{
						$("#loader2").html(result.status_msg);
						$("#registererror").html("");
					}
                    }

            });	
        });
   });
  </script>

</body>
</html>
