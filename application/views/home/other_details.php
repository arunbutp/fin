<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>
<?php
$pages = array("Confirmed", "DPN SA Received", "Loan Eligible");



?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $_GET['task']; ?>
        <small><!--Preview sample---></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $_GET['task']; ?></li>
      </ol>
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
            <!--  <h3 class="box-title">Hover Data Table</h3>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body"><!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-success pull-right" style="margin:0px 0px 5px 0px" data-toggle="modal" data-target="#myModal">CSV UPLOAD</button>-->
              <table id="example" class="table table-bordered table-hover">

				<thead>
					<tr>
				
						<!--<th></th>-->
				
						<th>Customer Name</th>
						<th>Location Name</th>
						<th>Address</th>
						<th>mobile</th>
						
						<th>Status</th>
						
					</tr>
				</thead>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
				   <input type="file" id="file" accept=".csv"  name="myFile">
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



<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/dataTables/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/dataTables/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/dataTables/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/resources/syntax/shCore.css">

	<style type="text/css" class="init">
	
	</style>

	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/dataTables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/dataTables/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/dataTables/js/dataTables.select.min.js"></script>

	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="<?=base_url();?>assets/resources/demo.js"></script>
	
	


<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples


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
	
	
/* 	editor = new $.fn.dataTable.Editor( {
		ajax: "<?=base_url();?>home/under_process_json/?task=<?php echo $_GET['task']?>",
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
	} ); */

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
			'url': "<?=base_url();?>home/other_details_json"
				},
		columns: [
			/* {
				data: null,
				defaultContent: '',
				className: 'select-checkbox',
				orderable: false
			}, */
			
			{ data: "applicant_name" },
			{ data: "location_name" },
			{ data: "address" },
			{ data: "mobile_number" },
			{ data: "status" }
						

		
			
		
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

function settings(id){
	
	//alert()
	window.location.href='<?=base_url();?>home/settings?id='+id;
	
	
}

function edit(id){
	
	//alert()
	window.location.href='<?=base_url();?>home/edit_lead?id='+id;
	
	
}
function assign(id){
	
	//alert()
	//window.location.href='<?=base_url();?>home/edit_lead?id='+id;
	
	$.ajax({
		"url":'<?=base_url();?>home/assigning_orderlead',
		"data": {id: id},
		"type":"post",
		"dataType":"HTML",
		"success":function(){
			var table = $('#example').DataTable();

			table.clear().draw();
			table.ajax.reload();
			alert("Successfully Assigned");
			window.location.href='<?=base_url();?>home';
			
		}
	});
	
	
}
function mov_part(id){
	
	//alert(id)
	//window.location.href='<?=base_url();?>home/edit_lead?id='+id;
	
	$.ajax({
		"url":'<?=base_url();?>home/move_to_partner',
		"data": {id: id},
		"type":"post",
		"dataType":"HTML",
		"success":function(){
			var table = $('#example').DataTable();

			table.clear().draw();
			table.ajax.reload();
			alert("Successfully Assigned");
			window.location.href='<?=base_url();?>home';
			
		}
	});
	
	
}

	</script>
</body>
</html>
