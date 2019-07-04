<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><div class="container"><form method="POST" action="">
  <div class="form-group">
  
  <?php
  //echo "<pre>ff";
 // print_r($rows);
  
  ?>
    <label for="email">Name::</label>
    <input type="text" class="form-control" value="<?php echo ($_POST['name'] == '' ? $rows[0]['name'] : $_POST['name'] );?>" name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
    <input type="text" class="form-control" value="<?php echo ($_POST['description'] == '' ? $rows[0]['description'] : $_POST['description'] );?>" name="description" id="description" required>
  </div>
   <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'];?>" id="id">
  <button type="submit" name="submit" class="btn btn-default">Update</button>
</form></div>

<?=$status?>