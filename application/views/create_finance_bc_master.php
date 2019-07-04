<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><div class="container"><form method="POST" action="">
  <div class="form-group">
    <label for="email">Name::</label>
    <input type="text" class="form-control" value="" name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
    <input type="text" class="form-control" value="" name="description" id="description" required>
  </div>
   <input type="hidden" class="form-control" name="action" id="action">
  <button type="submit" name="submit" class="btn btn-default">Create</button>
</form></div>

<?=$status?>