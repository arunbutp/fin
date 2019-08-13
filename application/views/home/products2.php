<?php 
$this->load->view('header');
$this->load->view('left-menu');
$session = $this->session->userdata('MY_SESS2');
/* echo "<pre>";
print_r($session['data'][0]['role']);
echo "</pre>"; */
//echo file_get_contents('http://devcloud.in3access.in/sync/product_54_english');
$url = 'http://devcloud.in3access.in/sync/product_54_english';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$data = curl_exec($curl);
curl_close($curl);

$arr =  json_decode($data);

//echo "<pre>";
//print_r($arr);
?>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
      </ol>
    </section>

    <!-- Main content -->
  
   <section class="content">
      <!-- Info boxes -->
      <div class="row">
	  <?php
	  
	  for($i=0;$i<count($arr);$i++)
	  {
			//setlocale(LC_MONETARY, 'en_IN');
			//$amount = money_format('%!i', $arr[$i]->price);
			$amount = number_format($arr[$i]->price,2);
			
		echo '<form action="'.base_url().'home2/new_lead" method="post"><div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">'.$arr[$i]->pname.'</span>
              <span class="info-box-number">Rs.<small>'.$amount.'</small></span>
			  <input type="hidden" value="'.$arr[$i]->itemcode.'" name="itemcode" >
			  <input type="hidden" value="'.$amount.'" name="amount" >
			  <input type="hidden" value="'.$arr[$i]->pname.'" name="product_name" >
			   <input type="hidden" value="'.$arr[$i]->storeid.'" name="storeid" >
			  <button type="submit" class="btn btn-success pull-right">Add Cart</button>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></form>';
	  }		  
	  ?>
        
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

   $(document).ready(function(){
	   
	   $.ajax({
		   
		   url: "http://devcloud.in3access.in/sync/product_54_english",
		   dataType: "json",
		    crossDomain: true,
		   type:"POST",
		   success:function(result){
			   
			   console.log(result);
			   
		   },
		   error:function(){
			   
		   }
	   })
	  
   });
  </script>

</body>
</html>
