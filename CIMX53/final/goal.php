<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create a Goal</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Create a Goal</h1>

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

  <form method="POST" action="goal_handler.php">

  <div class="form-group">
    <label for="goalname">Goal Name</label>
    <input name="goalname" type="text" class="form-control" id="goalname" aria-describedby="goalnamehelp" required>
    <small id="goalnamehelp" class="form-text text-muted">Please enter ONLY your goal name.</small>
  </div>

  <div class="form-group">
     <label for="whentime">When do you want to complete the goal?</label>
     <select class="form-control" name="whentime">
       <option value="week">In a week</option>
       <option value="month">In a month</option>
       <option value="year">In a year</option>
       <option value="other">Other</option>
     </select>
   </div>

  <div class="form-group">
    <label for="description">Goal Description</label>
    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
