<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tasks</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>Tasks</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task Name</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">End Alarm</th>
      <th scope="col">Comments</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total_tasks = 0;
    $total_time = 0;
    include('include/db.php');
    $sql = "SELECT * FROM `midtermtiming`";
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_tasks = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['taskname']."</td>";
        echo "<td>".$row['starttime']."</td>";
        echo "<td>".$row['endtime']."</td>";
        echo "<td>".$row['question']."</td>";
        echo "<td>".$row['comments']."</td>";
        echo '<td><a href="task_details.php?task_id='.$row['id'].'">View Task</a></td>';
        echo '<td><a href="task_update.php?record_id='.$row['id'].'">Update Task</a></td>';
        echo '<td><a href="delete_task.php?task_id='.$row['id'].'">Delete Task</a></td>';
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

<br><br><br><br>

<table class="table table-dark" width=auto>
  <thead>
    <tr>
      <th scope="col">Dashboard</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Total Tasks</th>
    </tr>
    <tr>
      <th scope="row"><?php echo $total_tasks;?></th>
    </tr>
  </tbody>
</table>

  </div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
