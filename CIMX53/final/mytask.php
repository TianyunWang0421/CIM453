<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update My Most Recent Task</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>
  <?php include("include/login_check.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Update My Most Recent Task</h1>

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
  $task_id = $_GET['taskrecord_id'];
  $sql = "SELECT * FROM midtermtiming WHERE id = '$task_id'"; //LIMIT 1
  include('include/db.php');
  $result = mysqli_query($con,$sql);
  //mysqli_num_rows gives the number of items in the query
  $totalresults = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  ?>

  <form method="POST" action="task_update.php">

    <div class="form-group">
      <label for="taskname">Task Name</label>
      <input name="taskname" type="text" class="form-control" id="taskname" aria-describedby="tasknamehelp" value="<?php echo $row['taskname'];?>" required>
      <small id="tasknamehelp" class="form-text text-muted">Please enter ONLY your task name.</small>
    </div>

    <div class="form-group">
      <label for="starttime">Start Time (hr:min)</label>
      <input name="starttime" type="text" class="form-control" id="starttime" value="<?php echo $row['starttime'];?>">
    </div>

    <div class="form-group">
      <label for="endtime">End Time (hr:min)</label>
      <input name="endtime" type="text" class="form-control" id="endtime" value="<?php echo $row['endtime'];?>">
    </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
