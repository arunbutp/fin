<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=base_url();?>assets/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {


		$(".fancybox").fancybox({'width':400,
                         'height':250,
                         'autoSize' : false,
						  afterClose  : function() {
							location.href = "";
						 },
						    'openEffect': 'elastic',
							'closeEffect': 'elastic'
						 });

		});
	</script>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Finance Master
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Config</li>
        <li class="active">Finance Master</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
		<div class="box box-success" style="padding:10px 5px; height:100%;">
			<div class="box-header with-border" id="Container"
			 style=" position:relative; display:block; width: 100%">
			 
			 
	<a style="margin:5px;" class="btn btn-success fancybox fancybox.iframe" href="<?=base_url();?>home/create_finance_master">ADD</a>
	<button style="margin:5px;" type="button" id="edit" class="btn btn-success">Edit</button>		 
	<table id="example" class="display" cellspacing="0" width="100%" height="100%">
        <thead>
            <tr>
        
                <th></th>
                <th>ID</th>
                <th>Finance Name</th>
                <th>Status</th>
              
                
            </tr>
        </thead>
    </table>
			  
			  
			  
			  
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
	

$('#edit').on('click', function(){
	
	var Table = $('#example').DataTable();
 var oData = Table.rows('.selected').data();

  // console.log( oData[0]['id'] );
  
  if(oData[0] == undefined){
	  
	  alert("Please select row");
	  return false;
  }else{
	
    $.fancybox({
        width: 400,
        height: 250,
        autoSize: false,
        href: "<?=base_url();?>home/finance_master_editpop?id="+oData[0]['id'],
        type: 'iframe',
		'openEffect': 'elastic',
		'closeEffect': 'elastic',
		afterClose  : function() {
        location.href = "";
		}
    });
  }
});
	
	
	/* editor = new $.fn.dataTable.Editor( {
		ajax: "<?=base_url();?>home/finance_master_show",
		table: "#example",
		idSrc:  'id',
		fields: [ 
			{
				label: "Finance Name:",
				name: "finance_name"
			},
			{
				label: "Status:",
				name: "status"
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
	
		ajax: "<?=base_url();?>home/finance_master_show",
		columns: [
			{
				data: null,
				defaultContent: '',
				className: 'select-checkbox',
				orderable: false
			},
			{ data: "id" },
			{ data: "finance_name" },
			{ data: "status" }
		],
		order: [ 1, 'asc' ],
		
		select: {
			style:    'os',
			selector: 'td:first-child'
		}/* ,
		buttons: [
			{ extend: "create", editor: editor },
			{ extend: "edit",   editor: editor } ,
			{ extend: "remove", editor: editor } 
		] */
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
