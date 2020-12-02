<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update My Goal</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Update My Goal</h1>

  </div>

  <div class="container">
  <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> <?php echo $_GET['error']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php endif; ?>

  <?php if(isset($_GET['message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Yeaaaah!</strong> <?php echo $_GET['message']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php endif; ?>

  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">
  <?php
  if(isset($errorMsg)){
  echo $errorMsg;
}
  ?>

  <?php
  $goal_id = $_GET['goalrecord_id'];
  $sql = "SELECT * FROM midtermgoals WHERE id = '$goal_id'"; //LIMIT 1
  include('include/db.php');
  $result = mysqli_query($con,$sql);
  //mysqli_num_rows gives the number of items in the query
  $totalresults = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  ?>

  <form method="POST" action="goal_update.php">

    <input type="hidden" name="goalrecord_id" value="<?php echo $_GET['goalrecord_id']?>">

    <div class="form-group">
      <label for="goalname">Goal Name</label>
      <input name="goalname" type="text" class="form-control" id="goalname" aria-describedby="goalnamehelp" value="<?php echo $row['goalname'];?>" required>
      <small id="goalnamehelp" class="form-text text-muted">Please enter ONLY your goal name.</small>
    </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
