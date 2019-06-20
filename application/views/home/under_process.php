<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Under Process
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Under Process</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		<div class="box box-danger" style="padding:10px 5px; height:100%;">
			<div class="box-header with-border" id="Container"
			 style=" position:relative; display:block; width: 100%">
			 
			 
			 
			 
	<table id="example" class="display" cellspacing="0" width="100%" height="100%">
        <thead>
            <tr>
        
                <th></th>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Location Name</th>
                <th>City</th>
                <th>District</th>
                <th>State</th>
                <th>Item Code</th>
                <th>Settings</th>
                
            </tr>
        </thead>
    </table>
			  
			  
			  
			  
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

function settings(){
	
	//alert()
	window.location.href='<?=base_url();?>home/settings';
	
	
}

	</script>
</body>
</html>
