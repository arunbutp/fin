<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fintech | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Fin</b>tech</a>
  </div>
  <!-- /.login-logo -->
  <div id="login_show" class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="form1" action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" id="userName" name="userName" value="appsadmin" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="passWord" name="passWord" value="admin@123" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div id="loader"></div><div id="error" style="color:red;"></div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->
 <a href="#" id="registerclick" class="text-center">Register a new membership</a>
   
  </div>
  <!-- /.login-box-body -->
  
  
  
  
  <!-- Register Form -->
  
  <div style="display:none;" id="register_show" class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form id="form2" action= "" method="post">
      <div class="form-group has-feedback">
	  <label for="firstname">First Name:</label>
        <input type="text" class="form-control" name="firstname" placeholder="John" required>
        <span class=""></span>
      </div>
	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Last Name:</label>
        <input type="text" class="form-control" name="lastname" placeholder="Smith" required>
        <span class=""></span>
      </div>
	  
	  
	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Date of Birth:</label>
        <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required>
        <span class=""></span>
      </div>
	  
	 
	 
	 
	 <div class="form-group">
	 <label for="firstname">gender:</label>
		<select class="form-control selcls" name="gender" id="gender" required>
 
		<option value="" selected disabled >--select--</option>
		
		<option value="male">Male</option>
		 
		<option value="female">Female</option>
		 
		</select>
	 </div>

	 

	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Mobile:</label>
        <input type="text" class="form-control" name="mobile" placeholder="99999 99999" required>
        <span class=""></span>
      </div>
	  
	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Email:</label>
        <input type="text" class="form-control" name="email" placeholder="abc@mail.com" required>
        <span class=""></span>
      </div>
	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Username:</label>
        <input type="text" class="form-control" name="userName" placeholder="Username" required>
        <span class=""></span>
      </div>
	  
	  <div class="form-group has-feedback">
	  <label for="firstname">Password:</label>
        <input type="password" class="form-control" name="passWord" placeholder="Password" required>
        <span class=""></span>
      </div>
	  
	  
	   <div class="form-group">
	 <label for="firstname">Role:</label>
		<select class="form-control selcls" name="role" id="role" required>
			
		 
		</select>
	 </div>
	 
	 <div id="finance_bc">
	 
	 
	 </div>
	  
      <div class="row">
        <div class="col-xs-8">
          <div id="loader2"></div><div id="registererror" style="color:red;"></div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <a href="#" id="loginclick" class="text-center">I already have a membership</a>
  </div>
  
  
  
  
  
  
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
	
	$("#registerclick").click(function(){
				
				$("#login_show").slideUp();
				$("#register_show").slideDown();
						
	});
	
	$("#loginclick").click(function(){
				
				$("#login_show").slideDown();
				$("#register_show").slideUp();
						
	});
	
	
		
		 $.ajax({
                    url:'<?=base_url();?>login/role_master',
                    type:'POST',
					dataType:'html',

                    success:function(result){
						$("#role").html(result);
                    }

            });	
			
			
			$("#role").change(function(){
				
				if($("#role").val()=='3'){
				
				 $.ajax({
                    url:'<?=base_url();?>login/finance_bc',
                    type:'POST',
					data: {"id": $("#role").val()},
					dataType:'html',

                    success:function(result){
						$("#finance_bc").append(result);
                    }

				});
				}else{
					$("#finance_bc").html('');
					
				}				
				
			})
	
	
	
	
  });
     $("#form1").submit(function(event){
            event.preventDefault();
			$("#loader").html('');
			$("#error").html('');
			$("#loader").html('<img src="<?=base_url();?>assets/dist/img/ajax-loader.gif"/> Processing...');
//alert();
            $.ajax({
                    url:'<?=base_url();?>login/authendication',
                    type:'POST',
					dataType:'json',
                    data:$(this).serialize(),
                    success:function(result){
						console.log(result.msg);
                       if(result.msg == 'success'){
						$("#loader").html('Redirecting...');   
					   location.href= '<?php echo base_url().'home'; ?>';
					}else{
						$("#loader").html('');
						$("#error").html("Please Use Correct Username Password");
					}
                    }

            });	
        });
		
		$("#form2").submit(function(event){
            event.preventDefault();
			$("#loader").html('');
			$("#error").html('');
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
						alert("Registraion completed");   
						$("#register_show").hide();
						$("#login_show").show();   
						("#loader2").html('');
					  // location.href= '<?=base_url();?>'+result.redirect_menu;
					}else{
						$("#loader2").html(result.status_msg);
						$("#registererror").html("Please Use Correct Username Password");
					}
                    }

            });	
        });
</script>
<style>
body{
//	margin: 0;
//	overflow: hidden;
}
</style>
</body>
</html>
