<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Access Control
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Access Control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Select</label>

                  <div class="col-sm-10">
                      
                  <select id="user" name="user" class="form-control">
                   
					
					
					<?php
					$str2 ='';
					for($i=0;$i<count($get_names);$i++){
					$str2 .= "<option value='".$get_names[$i]['username']."'>".$get_names[$i]['firstname']. '   ' .$get_names[$i]['lastname']."</option>";	
						
						
					}
					echo $str2;
					?>
                  </select>
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="button" id="assign" class="btn btn-info pull-right">Assign</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
			<div class="box box-danger" style="padding:10px 5px;">
			<div class="box-header with-border" id="Container"
			 style="padding-bottom:56.25%; position:relative; display:block; width: 100%;">
			<?php 
				$str  =  "<table width='60%' class='table table-striped'><thead>
				  <tr>
				  <th><input type='checkbox' name='select-all' id='select-all' /> Toggle All<br/></th>
				  <th>Menu Names</th>
				  </tr></thead>";

					for($i=0;$i<count($menu_names);$i++){
					$str .= "<tr><td><input name='checkbox[]' value='".$menu_names[$i]['id']."' type='checkbox'/></td><td>".$menu_names[$i]['menu_name']."</td></tr>";	
						
						
					}

			 
			  
			  $str .= "</table>";
			  
			  echo $str;
			   ?>
			  
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

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>assets/bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script language="JavaScript">
$(function(){
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});

$("#assign").on('click',function (){
	
	
			var name = $('#user').val();
			//alert(name);
			
			var chk_value = [];
			$.each($("input[name='checkbox[]']:checked"), function(){            
                chk_value.push($(this).val());
            });
			
			//alert("My chked sports are: " + chk_value.join(", "));
			
			$.ajax({
				  type: 'POST',
				  url: "<?=base_url();?>home/assign",
				  data: {
					 name 		: name,
					 chk_value	: chk_value.join(",")
				  },
				  dataType: "text",
				  success: function(resultData) { alert("Save Complete") }
			});
			
	
})

$('select').on('change', function() {
	
			$.each($("input[name='checkbox[]']:checked"), function(){            
                 $('input[type=checkbox]').prop('checked', false);
            });
  
			$.ajax({
					type: 'POST',
					url: "<?=base_url();?>home/check_assigned",
					dataType:'json',
					data: {
					username :  this.value
					},
					dataType: "text",
					success: function(resultData) {
						//alert(resultData) 
						
						$.each( JSON.parse(resultData), function(i, val){
							   $("input[value='" + val + "']").prop('checked', true);

							});
						} 
				});
});


});
</script>
</body>
</html>
