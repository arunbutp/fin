<?php 
$this->load->view('header');
$this->load->view('left-menu');

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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Personal Details</h3>

          <div class="box-tools pull-right">
          <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['first_name'];?>" readonly>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['last_name'];?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Number of Dependants</label>
               <input type="text"  class="form-control" readonly>
              </div>
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
              <!-- /.form-group -->
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
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php echo $data[0]['email_id'];?>" readonly>
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
		  
		  <div class="row">
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
		  </div>
		  
		  

		<hr style="border-top: 1px dotted red;">

		<div class="box-header with-border">
          <h3 class="box-title">Case Details</h3>
        </div>

		<div class="row">
		  <div class="col-md-4">
		  <div class="form-group">
			  <label for="comment">Case ID:</label>
			  <input type="text" value="<?php echo $data[0]['case_id'];?>" name="case_id" id="case_id" class="form-control">
			</div>
		  </div>
		  <div class="col-md-8">
		  <div class="form-group">
			  <label for="comment">Discrepancy Comment:</label>
			   <input type="text" value="<?php echo $data[0]['discrepancy_comment'];?>" name="discrepancy_comment" id="discrepancy_comment" class="form-control">
			</div>
		  </div>
		  </div>
		
		  
		  <div class="row">
		  <div class="col-md-12">
		  <div class="form-group">
			<div class=" ">
			  <button type="button" id="update"  class="col-md-3 center-block btn btn-success custom"><span class="glyphicon glyphicon-edit"></span> Update</button>
			  <button type="button" id="discrepency" class="col-md-3 center-block btn btn-primary custom"><span class="glyphicon glyphicon-transfer"></span> Discrepency</button>
			  <button disabled type="button" id="reject"  class="col-md-3 center-block btn btn-danger custom"><span class="glyphicon glyphicon-share-alt"></span> Reject</button>
			  <button disabled type="button" id="un_assign"  class="col-md-3 center-block btn btn-info custom"><span class="glyphicon glyphicon-remove"></span> Un Assign</button>
			</div>		
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
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/js/dataTables.editor.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/editor-demo.js"></script>
<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	
	$("#update").on("click",function(){
	//alert()	
		
		
		if($("#case_id").val() == ''){
			
			alert("Please Enter Case ID");
			return false;
		}else{
	
		$.ajax({
		  url: "<?=base_url();?>home/case_id",
		  dataType:'POST',
		  data:{id:<?php echo $_GET['id']; ?>, case_id: $("#case_id").val()},
		  success: function(html){
			  alert(html);
			//$("#results").append(html);
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
		  dataType:'POST',
		  data:{id:<?php echo $_GET['id']; ?>, discrepency: $("#discrepancy_comment").val()},
		  success: function(html){
			  alert(html);
			//$("#results").append(html);
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