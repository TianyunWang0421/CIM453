<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>This Goal</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>This Goal</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Goal Name</th>
      <th scope="col">Plan to Finish</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $comments = "";
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `midtermgoals` WHERE id = ".$_GET['goalrecord_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_goals = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
        $description = $row['description'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['goalname']."</td>";
        echo "<td>".$row['whentime']."</td>";
        echo "<td>".$row['description']."</td>";
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
  <li class="list-group-item">Goal id: <?php echo $extracted['id'];?> </li>
  <li class="list-group-item">Goal Name: <?php echo $extracted['goalname'];?> </li>
  <li class="list-group-item">Plan to Finish: <?php echo $extracted['whentime'];?> </li>
  <li class="list-group-item">Comments: <?php echo $description;?> </li>
</ul>

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
