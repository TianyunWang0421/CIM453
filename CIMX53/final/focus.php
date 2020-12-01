<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Focus on This Task Now</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Please focus on <?php echo $taskname; ?> </h1>

  </div>

  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>

  <ul class="list-group">
    <li class="list-group-item"><h3>Task Summary</h3></li>
    <li class="list-group-item">Your task is:<br> <?php echo $taskname; ?> </li>
    <li class="list-group-item">Your start time is: <?php echo $starttime; ?></li>
    <li class="list-group-item">Your end time is: <?php echo $endtime; ?></li>
    <li class="list-group-item">End Alarm: <?php echo $question; ?></li>
    <li class="list-group-item">Comments: <?php echo $comments; ?></li>
  </ul>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
