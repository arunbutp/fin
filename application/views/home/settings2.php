<?php 
$this->load->view('header');
$this->load->view('left-menu');
$session = $this->session->userdata('MY_SESS2');
$page = $session['page'];
/* echo "<pre>";
print_r($data);
echo "</pre>"; */
?>
<style>
.custom {
   // width: 78px !important;
   margin:0px 5px;
   width:23%;
}
img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 150px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=base_url();?>assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {


		$(".fancybox").fancybox({'width':400,
                         'height':250,
                         'autoSize' : false,
						 'openEffect': 'elastic',
						 'closeEffect': 'elastic',
						 afterClose  : function() {
							var table = $('#example').DataTable();
							table.clear().draw();
							table.ajax.reload();
							}
		});

		});
	</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Loan Details
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>home2/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url();?>home2/details/?task=Under Process">Under Process</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	
	
	

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Personal Details</h3>

          <div class="box-tools pull-right">
          <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
			
			<button type="button" onclick="window.history.back();" class="btn btn-info"><span class="glyphicon glyphicon-hand-left"></span> Back</button>
			<button type="button" onclick="location.href='<?=base_url();?>home2/';" class="btn btn-info"><span class="glyphicon glyphicon-home"></span>   Home</button>
			
			
			
			<button type="button" id="history" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-scale"></span>   History of Status</button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['applicant_firstname'];?>" readonly>
              </div>
              </div>
			  <div class="col-md-3">
              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['applicant_middlename'];?>" readonly>
              </div>
              </div>
              <!-- /.form-group -->
			  <div class="col-md-3">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['applicant_lastname'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Number of Dependants</label>
               <input type="text"  class="form-control" value="<?php echo $data[0]['no_of_dependants'];?>"  readonly>
              </div>
              </div>
			   <div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Father's/ Husband's Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['father_name'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
			
			<div class="col-md-3">
              <div class="form-group">
                <label>Date of Birth</label>
               <input type="text" class="form-control" value="<?php echo $data[0]['date_of_birth'];?>" readonly>
              </div>
              </div>
              <!-- /.form-group -->
			  <div class="col-md-3">
              <div class="form-group">
                <label>Gender</label>
               <input type="text" class="form-control" value="<?php echo $data[0]['gender'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
			
			<div class="col-md-3">
              <div class="form-group">
                <label>Mobile</label>
               <input type="text" class="form-control" value="<?php echo $data[0]['mobile_number'];?>" readonly>
              </div>
              </div>
			<div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['email_id'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
			
			<div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Education</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['education'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
			
			<div class="col-md-3">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Residence</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['residence'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
			
			
            <!-- /.col -->
          </div>
		  
		   <div class="row">
		  <div class="col-md-4">
              <div class="form-group">
			  <label for="comment">Permanent Address:</label>
			  <textarea class="form-control" readonly rows="1" id="comment"><?php echo $data[0]['perm_addressline1'];?></textarea>
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment"> Permanent City:</label>
			  <input type="text" class="form-control" value="<?php echo $data[0]['perm_city'];?>" readonly>
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Permanent District:</label>
			  <input type="text" class="form-control" value="<?php echo $data[0]['perm_district'];?>" readonly>
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Permanent State:</label>
			  <input type="text" class="form-control" value="<?php echo $data[0]['perm_state'];?>" readonly>
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Permanent Pincode:</label>
			  <input type="text" class="form-control" value="<?php echo $data[0]['perm_pincode'];?>" readonly>
			</div>
            </div>
			
		  </div>
		  
		 <!--  <div class="row">
		  <div class="col-md-4">
              <div class="form-group">
			  <label for="comment">Shipping Address:</label>
			  <textarea class="form-control" rows="1" id="comment"></textarea>
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment"> Shipping City:</label>
			  <input type="text" class="form-control">
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Shipping District:</label>
			  <input type="text" class="form-control">
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Shipping State:</label>
			  <input type="text" class="form-control">
			</div>
            </div>
			
			<div class="col-md-2">
              <div class="form-group">
			  <label for="comment">Shipping Pincode:</label>
			  <input type="text" class="form-control">
			</div>
            </div>
			
		  </div>-->
		  
	<!--	  <div class="row">
		  <div class="col-md-6">
		  <div class="form-group">
		  <label for="comment">Source of Income:</label>
					<label class="checkbox-inline">
					<input type="checkbox" id="Check1" value="PHP"> Agriculture
					</label>
					<label class="checkbox-inline">
					<input type="checkbox" id="Check2" value="CSS"> Business
					</label>
					<label class="checkbox-inline">
					<input type="checkbox" id="Check3" value="Java"> Rent
					</label>
					<label class="checkbox-inline">
					<input type="checkbox" id="Check4" value="HTML"> Salary
					</label>
					
		  </div>
		  </div>
		  </div>-->
		 <hr style="border-top: 1px dotted red;">
		<div class="row">
		<div class="col-md-12">
		<div class="box-header ">
          <h3 class="box-title">Uploaded Images</h3>
        </div> 
		
		
		
	
		
		<?php
		if(!empty($data[0]['aadhar_front'])){
		?>
		<a style="margin:0px 5px;" title="Address Proof Front" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['aadhar_front'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['aadhar_front'];?>" alt="Address Proof Front">
		</a>
		<?php
		}
		?>
		<?php
		if(!empty($data[0]['aadhar_back'])){
		?>
		<a style="margin:0px 5px;" title="Address Proof Back" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['aadhar_back'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['aadhar_back'];?>" alt="Address Proof Back">
		</a>
		<?php
		}
		?>
		<?php
		if(!empty($data[0]['declaration_proof'])){
		?>
		<a style="margin:0px 5px;" title="Declaration Proof" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['declaration_proof'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['declaration_proof'];?>" alt="Declaration Proof">
		</a>
		<?php
		}
		?>
		<?php
		//echo "sdddddddddddd".$data[0]['address_proof_front'];
		if(!empty($data[0]['address_proof_front'])){
		?>
		<a style="margin:0px 5px;" title="Ship Proof Front" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['address_proof_front'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['address_proof_front'];?>" alt="Ship Proof Front">
		</a>
		<?php
		}
		?>
		<?php
		if(!empty($data[0]['address_proof_back'])){
			?>
		<a style="margin:0px 5px;" title="Ship Proof Back" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['address_proof_back'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['address_proof_back'];?>" alt="Ship Proof Back">
		</a>
		<?php
		}
		?>
		
		<?php
		if(!empty($data[0]['form60_proof'])){
			?>
		<a style="margin:0px 5px;" title="Form 60 Proof" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['form60_proof'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['form60_proof'];?>" alt="Form 60 Proof">
		</a>
		<?php
		}
		?>
		<?php
		if(!empty($data[0]['dpn_proof'])){
			?>
		<a style="margin:0px 5px;" title="DPN Proof" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['dpn_proof'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['dpn_proof'];?>" alt="DPN Proof">
		</a>
		<?php
		}
		?>
		<?php
		if(!empty($data[0]['schdule_proof'])){
			?>
		<a style="margin:0px 5px;" title="Schdule Proof" target="_blank" class="fancybox" rel="gallery1" href="<?php echo $data[0]['schdule_proof'];?>">
			  <img width="100px" height="100px" src="<?php echo $data[0]['schdule_proof'];?>" alt="Schdule Proof">
		</a>
		<?php
		}
		?>
		

		
		</div>
		</div>
		<hr style="border-top: 1px dotted red;">
		<div class="row">
		<div class="col-md-12">
		<div class="box-header ">
          <h3 class="box-title">Documents to Download</h3>
        </div> 
		<a  target="_blank" href='<?=base_url();?>home/before_approval?id=<?php echo $_GET['id']; ?>'  style="border-radius: 27px;" class="btn btn-danger col-md-2 center-block custom"><span class="fa fa-fw fa-file-pdf-o"></span>   Before Approval</a>
		<a    target="_blank" href='<?=base_url();?>home/after_approval?id=<?php echo $_GET['id']; ?>'  style="border-radius: 27px;" class="btn btn-danger col-md-2 center-block custom"><span class="fa fa-fw fa-file-pdf-o"></span>   After Approval</a>
		<a  target="_blank" href='<?=base_url();?>home/pdf_inv?id=<?php echo $_GET['id']; ?>'  style="border-radius: 27px;" class="btn btn-danger col-md-2 center-block custom"><span class="fa fa-fw fa-file-pdf-o"></span>   PDF INV</a>  
		</div>
		</div>
		<hr style="border-top: 1px dotted red;">

		<div class="box-header with-border">
          <h3 class="box-title">Case Details</h3>
        </div>

		<div class="row">
		  <div class="col-md-4">
		  <div class="form-group">
			  <label for="comment">Case ID:</label>
			  <input type="text" <?php echo ($data[0]['case_id'] == '' ? '' : 'readonly'); ?> value="<?php echo $data[0]['case_id'];?>" name="case_id" id="case_id" class="form-control">
			</div>
		  </div>
		  <div class="col-md-8">
		  <div class="form-group">
			  <label for="comment">Discrepancy Comment:</label>
			   <input type="text"  <?php echo ($_GET['task']!='Partner' ? '' : 'readonly'); ?> value="<?php echo $data[0]['discrepancy_comment'];?>" name="discrepancy_comment" id="discrepancy_comment" class="form-control">
			</div>
		  </div>
		  </div>
		
		  
		  <div class="row">
		  <div class="col-md-12">
		  <div class="form-group">
			<div class=" ">
			
			<?php
			if($_GET['task']=='Partner' || $_GET['task']=='My Leads'){
				
				if($data[0]['case_id'] == ''){
			?>
			  <button  type="button" id="update"  class="col-md-3 center-block btn btn-success custom"><span class="glyphicon glyphicon-edit"></span> Update</button>
			  
			<?php
			}
			}
			?>		
			
			  <?php
			  if($_GET['task']=='Sanction/Confirm'){
				 echo ' <button type="button" id="confirm" class="col-md-3 center-block btn btn-primary custom"><span class="glyphicon glyphicon-pushpin"></span> Confirm ?? </button>'; 
				 echo ' <button type="button" id="reject" class="col-md-3 center-block btn btn-primary custom"><span class="glyphicon glyphicon-pushpin"></span> Reject ?? </button>'; 
			  }
			  
			 
			  ?>
			 
			  
			  
			 <!-- <button disabled type="button" id="reject"  class="col-md-3 center-block btn btn-danger custom"><span class="glyphicon glyphicon-share-alt"></span> Reject</button>
			  <button disabled type="button" id="un_assign"  class="col-md-3 center-block btn btn-info custom"><span class="glyphicon glyphicon-remove"></span> Un Assign</button>-->
			</div>		
		  </div>
		  </div>
		  </div>
		  <div class="row">
		  <div class="col-md-12">
		  <div id="status">
		  </div>
		  </div>
		  </div>
		  
		  
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

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


<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->

<!-- Modal -->
<div id="myModal" style="width:100%" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lead History</h4>
      </div>
      <div class="modal-body">
        <div id="history_status"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/resources/syntax/shCore.css">

	<style type="text/css" class="init">
	
	</style>

	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/demo.js"></script>
	
<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	
	
	$("#confirm").on("click",function(){
		
		var r = confirm("Are you sure to confirm order ?");
		if (r == true) {
		  $.ajax({
		  url: "<?=base_url();?>home/order_confirm",
		  dataType:'html',
		  type:'GET',
		  data:{id:<?php echo $_GET['id']; ?>, status: 1},
		  success: function(result){
			window.location.href="<?=base_url();?>home2";
		  }
		});
		} else {
		 alert("You are canceling!!!");
		}
		
	});	
	
		
	
		$("#move_partner").on("click",function(){
		
		$.ajax({
		"url":'<?=base_url();?>home/move_to_partner',
		"data": {id: <?php echo $_GET['id']; ?>},
		"type":"post",
		"dataType":"HTML",
		"success":function(){
		
			alert("Successfully Moved");
			window.location.href='<?=base_url().$page?>';
			
		}
	});
		
	});	
	$("#reject").on("click",function(){
		
		var r = confirm("Are you sure to Reject order ?");
		if (r == true) {
		 $.ajax({
		  url: "<?=base_url();?>home/order_confirm",
		  dataType:'html',
		  type:'GET',
		  data:{id:<?php echo $_GET['id']; ?>, status: 0},
		  success: function(result){

			$("#status").html(result);
			window.location.href="<?=base_url().$page?>";
		  }
		});	
		} else {
		 alert("You are canceling!!!");
		}
		
	});	
	$("#history").on("click",function(){
		
		$.ajax({
		  url: "<?=base_url();?>home/lead_history",
		  dataType:'html',
		  type:'GET',
		  data:{id:<?php echo $_GET['id']; ?>},
		  success: function(result){
			//  alert(result);
			$("#history_status").html(result);
			

		  }
		});
		
	});
		
	
	$("#update").on("click",function(){
	//alert()	
		
		
		if($("#case_id").val() == ''){
			
			alert("Please Enter Case ID");
			return false;
		}else{
	
		$.ajax({
		  url: "<?=base_url();?>home/case_id",
		  dataType:'html',
		  type:'GET',
		  data:{id:<?php echo $_GET['id']; ?>, case_id: $("#case_id").val()},
		  success: function(result){
			//  alert(result);
			$("#status").html(result);
			
			window.location.href="<?=base_url().$page?>";
		  }
		});
		}
		
	});
	
	$("#discrepency").on("click",function(){
	//alert()	
		
		
		if($("#discrepancy_comment").val() == ''){
			
			alert("Please Enter Discrepancy");
			return false;
		}else{
	
		$.ajax({
		  url: "<?=base_url();?>home/submit_discrepancy",
		  dataType:'html',
		  type:'GET',
		  data:{id:<?php echo $_GET['id']; ?>, discrepency: $("#discrepancy_comment").val()},
		  success: function(result){

			$("#status").html(result);
			window.location.href="<?=base_url().$page?>";
		  }
		});
		}
		
	});
	
	editor = new $.fn.dataTable.Editor( {
		ajax: "<?=base_url();?>home/under_process_json",
		table: "#example",
		idSrc:  'id',
		fields: [ 
			{
				label: "Location Name:",
				name: "location_name"
			},
			{
				label: "Lead ID:",
				name: "lead_id"
			}
		]
	} );

	// Activate an inline edit on click of a table cell
	/* $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
		editor.inline( this, {
			buttons: { label: '&gt;', fn: function () { this.submit(); } }
		} );
	} ); */

	$('#example').DataTable( {
		dom: "Bfrtip",
		
		 "processing": true,
        "serverSide": true,
		"searching": false,
        "ajax": {
			'type': 'POST',
			'url': "<?=base_url();?>home/under_process_json"
				},
		columns: [
			{
				data: null,
				defaultContent: '',
				className: 'select-checkbox',
				orderable: false
			},
			{ data: "lead_id" },
			{ data: "applicant_name" },
			{ data: "location_name" },
			{ data: "city" },
			{ data: "district" },
			{ data: "state" },
			{ data: "item_code" },
			{ data: "settings" }
		],
		order: [ 1, 'asc' ],
		select: {
			style:    'os',
			selector: 'td:first-child'
		},
		buttons: [
			/*{ extend: "create", editor: editor },
			{ extend: "edit",   editor: editor } ,
			{ extend: "remove", editor: editor } */
		]
	} );
	
	
	$(document).on("click","button",function() {
       
		if($(this).text() == 'Create'){
			
			
			var table = $('#example').DataTable();

			table.clear().draw();
			table.ajax.reload();
		}
    });

} );



	</script>
</body>
</html>
