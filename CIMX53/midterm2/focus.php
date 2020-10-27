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
  <div class="col-md-6">
    <h3>Task Summary</h3>
    <h2>Your task is:<br> <?php echo $taskname; ?> </h2>
    <p>Your start time is: <?php echo $starttime; ?></p>
    <p>Your end time is: <?php echo $endtime; ?></p>
    <p>End Alarm: <?php echo $question; ?></p>
    <p>Comments: <?php echo $comments; ?></p>
  </div>

  </div>
</div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
