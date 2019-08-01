<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	 <div class="box box-success">
         <!--   <div class="box-header with-border">
              <h3 class="box-title">Modal Examples</h3>
            </div>-->
            <div class="box-body">
             
              <button  onclick="location.href = '<?=base_url();?>home/products';" type="button" class="btn btn-success " style="margin:0px 5px;"  >
               <span class="glyphicon glyphicon-user"></span> New Lead
              </button>
              <button type="button" class="btn btn-success " style="margin:0px 5px;" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-menu-hamburger"></span> CSV UPLOAD</button>
			  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CSV Upload</h4>
      </div>
      <div class="modal-body">
				<form id="csvupload" method="post" enctype="multipart/form-data">
				<div class="form-group">
				  <label for="email">File:</label>
				   <input  type="file" id="file" accept=".csv"  name="myFile">
				</div>
				
				
				<button type="submit" class="btn btn-success">Submit</button>
			  </form>
			  
			  
			  <div id="csv_status" >
			  
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            </div>
          </div>
      
	   <?php
	 // echo "<pre>";
	 // print_r($dashboard);
	//  echo "</pre>";
	  
	  
	  
	
	?>	
        <!--<div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $dashboard[0]['total_lead']; ?></h3>

              <p>Total Lead</p>
            </div>
            <div class="icon">
              <i class="ion ion-medkit"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Total Lead" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
		
		<div class="row">
		
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-pink">
            <div class="inner">
              <h3><?php echo $dashboard[0]['new_leads']; ?><sup style="font-size: 20px"></sup></h3>

              <p>New Leads</p>
            </div>
            <div class="icon">
              <i class="ion ion-male"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Other Leads" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $dashboard[0]['my_leads']; ?></h3>

              <p>My Leads</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye-disabled"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Under Process" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $dashboard[0]['loan_eligible']; ?></h3>

              <p>Loan Eligible</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Loan Eligible" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
     
      <!-- /.row -->
     
      <!-- Small boxes (Stat box) -->
      
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3><?php echo $dashboard[0]['discrepancy']; ?></h3>

              <p>Discrepancy</p>
            </div>
            <div class="icon">
              <i class="ion ion-shuffle"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Discrepancy" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $dashboard[0]['sanctioned']; ?><sup style="font-size: 20px"></sup></h3>

              <p>Sanctioned</p>
            </div>
            <div class="icon">
              <i class="ion ion-paper-airplane"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Sanctioned" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo $dashboard[0]['order_confim']; ?></h3>

              <p>Pending Order Confirmation</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-checkmark-outline"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Pending Order Confirmation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $dashboard[0]['disbursement']; ?></h3>

              <p>Disbursement In Progress</p>
            </div>
            <div class="icon">
              <i class="ion ion-loop"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Disbursement In Progress" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    
      <!-- /.row -->
	  
	  
	  
	   <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $dashboard[0]['disbursed']; ?></h3>

              <p>Dispursed</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Disbursed" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $dashboard[0]['rejected']; ?></h3>

              <p>Rejected</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cancel"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Rejected" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $dashboard[0]['rejected']; ?></h3>

              <p>Partner</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cancel"></i>
            </div>
            <a href="<?=base_url();?>home/details/?task=Rejected" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	  </div>

    </section>
    <!-- /.content -->
  </div>

<?php 
$this->load->view('footer');

?>


 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
	$("#csvupload").submit(function(evt){
$("#csv_status").html('<img style="margin:0px 35%;" src="<?=base_url();?>assets/dist/img/ajax-loader-csv.gif">');		
//alert();
      evt.preventDefault();
      var formData = new FormData($(this)[0]);
	  
   $.ajax({
       url: "<?=base_url();?>home/lead_csv_upload",
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
 });
 
</script>
</body>
</html>
