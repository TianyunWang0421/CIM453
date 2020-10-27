<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Records</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Completion Records</h1>

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

  <form method="POST" action="record_handler.php">

  <div class="form-group">
    <label for="recordname">Task / Goal Name</label>
    <input name="recordname" type="text" class="form-control" id="recordname" aria-describedby="recordnamehelp" required>
    <small id="recordnamehelp" class="form-text text-muted">Please enter your Task Name OR Goal Name.</small>
  </div>

  <div class="form-group">
    <label for="spenttime">Time You Spent (in minutes)</label>
    <input name="spenttime" type="text" class="form-control" id="spenttime">
  </div>

  <div class="form-group">
     <label for="score">Please score your level of concentration. </label>
     <select class="form-control" name="score">
       <option value="perfect">Perfect</option>
       <option value="good">Good</option>
       <option value="notbad">Not Bad</option>
       <option value="bad">Bad</option>
     </select>
   </div>

   <div class="form-group form-check">
     <input type="checkbox" class="form-check-input" id="repeatyes" name="repeatit[]" value="Yes">
     <label class="form-check-label" for="repeatyes">Yes, I want to repeat this task/goal. </label>
   </div>

   <div class="form-group form-check">
     <input type="checkbox" class="form-check-input" id="repeatno" name="repeatit[]" value="No">
     <label class="form-check-label" for="repeatno">No, I do not want to repeat this task/goal. </label>
   </div>

  <div class="form-group">
    <label for="notes">Notess for Myself</label>
    <textarea name="notes" class="form-control" id="notes" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
