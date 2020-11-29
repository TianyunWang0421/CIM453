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
    </tr>
  </thead>
  <tbody>
    <?php
    $comments = "";
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `midtermtiming` WHERE id = ".$_GET['task_id'];
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
<h4>Task id: <?php echo $extracted['id'];?> </h4>
<h4>Task Name: <?php echo $extracted['taskname'];?> </h4>

<h2>Start Time:<?php echo $extracted['starttime'];?> </h32>
<h2>End Time:<?php echo $extracted['endtime'];?> </h2>
<h2>Comments: <?php echo $extracted['comments'];?> </h2>
<!-- <h3>Total: <?php echo $extracted['task_total'];?> </h3> -->

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
