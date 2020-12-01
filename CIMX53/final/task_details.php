<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>This Task</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>This Task</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task Name</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">End Alarm</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $comments = "";
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `midtermtiming` WHERE id = ".$_GET['taskrecord_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_tasks = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
        $comments = $row['comments'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['taskname']."</td>";
        echo "<td>".$row['starttime']."</td>";
        echo "<td>".$row['endtime']."</td>";
        echo "<td>".$row['question']."</td>";
        echo "</tr>";
      }
      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No results";
    }

    mysqli_close($con);

    ?>
  </tbody>
</table>

<hr>
<ul class="list-group">
  <li class="list-group-item">Task id: <?php echo $extracted['task_id'];?> </li>
  <li class="list-group-item">Task Name: <?php echo $extracted['taskname'];?> </li>
  <li class="list-group-item">Start Time: <?php echo $extracted['starttime'];?> </li>
  <li class="list-group-item">End Time: <?php echo $extracted['endtime'];?> </li>
  <li class="list-group-item">Comments: <?php echo $comments;?> </li>
</ul>

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
