<?php 
$this->load->view('header');
$this->load->view('left-menu');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales Target
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales Target</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		<div class="box box-danger" style="padding:10px 5px;">
			<div class="box-header with-border" id="Container"
			 style="padding-bottom:56.25%; position:relative; display:block; width: 100%">
			 <iframe id="ViostreamIframe" 
			  width="100%" height="100%" 
			  src="https://app.powerbi.com/view?r=eyJrIjoiNzhmYjg3N2EtYzg3MC00OWVjLTk1M2YtZDdjNTUzZTAyZDg2IiwidCI6ImM0OWFjY2U4LTE0MTUtNDFiMy04NTkzLTM1ZmZjOTdhNWYxNiJ9"
			  frameborder="0" allowfullscreen="true"
			  style="position:absolute; top:0; left: 0"></iframe>
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
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<!-- page script -->

</body>
</html>
