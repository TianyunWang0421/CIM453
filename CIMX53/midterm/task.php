<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Start A Task</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
        <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>My Task</h1>
    <p>Add your task here. </p>
  </div>

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
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
include('include/db.php');
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

?>
  <form method="POST" action="task_handler.php">

  <div class="form-group">
    <label for="taskname">Task Name</label>
    <input name="taskname" type="text" class="form-control" id="taskname" aria-describedby="tasknamehelp" required>
    <small id="tasknamehelp" class="form-text text-muted">Please enter your task you want to focus now.</small>
  </div>

  <div class="form-group">
    <label for="starttime">Start Time</label>
    <input name="starttime" type="text" class="form-control" id="starttime">
  </div>

  <div class="form-group">
    <label for="endtime">End Time</label>
    <input name="endtime" type="text" class="form-control" id="endtime">
  </div>

  <div class="form-group">
     <label for="question">Do you want an alarm at the end of your task?</label>
     <select class="form-control" name="question">
       <option value="yes">Yes</option>
       <option value="no">No</option>
     </select>
   </div>

  <div class="form-group">
    <label for="comments">Comments</label>
    <textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
