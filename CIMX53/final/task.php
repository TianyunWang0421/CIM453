<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create a Task</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <?php include("include/login_check.php"); ?>
    <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Create a Task</h1>

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

  <form method="POST" action="task_handler.php">

  <div class="form-group">
    <label for="taskname">Task Name</label>
      <?php if ( isset($_POST['taskname']) && ($_POST['taskname'] != "") ) {$taskname = $_POST['taskname'];} else {$taskname = "";}?>
    <input name="taskname" type="text" class="form-control" id="taskname" aria-describedby="tasknamehelp" value="<?php echo $taskname;?>" required>
    <small id="tasknamehelp" class="form-text text-muted">Please enter ONLY your task name.</small>
  </div>

  <div class="form-group">
    <label for="starttime">Start Time (hr:min)</label>
    <input name="starttime" type="text" class="form-control" id="starttime">
  </div>

  <div class="form-group">
    <label for="endtime">End Time (hr:min)</label>
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
