<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><div class="container"><form method="POST" action="">
  <div class="form-group">
  
  <?php
  //echo "<pre>ff";
 // print_r($rows);
  
  ?>
    <label for="email">BC name::</label>
   
	
	<select id="bc_id" name="bc_id" class="form-control" required>
	
	<option value=""> --- Please Select --- </option>
	<?php
	for($i=0;$i<count($bc_details);$i++)
	echo "<option ".($_POST['bc_id'] == $bc_details[$i]['id'] ? 'selected' : '')." value='".$bc_details[$i]['id']."'>".$bc_details[$i]['name']."</option>";
	?>
	
	</select>
	
	
  </div>
  <div class="form-group">
    <label for="pwd">Branch Code:</label>
    <input type="text" class="form-control" value="<?php echo $_POST['branch_code'];?>" name="branch_code" id="branch_code" required>
  </div>
   <div class="form-group">
    <label for="pwd">Branch Name:</label>
    <input type="text" class="form-control" value="<?php echo $_POST['branch_name'];?>" name="branch_name" id="branch_name" required>
  </div>
   <input type="hidden" class="form-control" name="id" value="" id="id">
  <button type="submit" name="submit" class="btn btn-default">Create</button>
</form></div>

<?=$status?>