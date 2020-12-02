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
      <th scope="col">Goal Name</th>
      <th scope="col">Plan to Finish</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total_goals = 0;
    include('include/db.php');
    $sql = "SELECT midtermgoals.id AS 'goalrecord_id',midtermgoals.goalname AS 'goalname',midtermgoals.whentime AS 'whentime',midtermgoals.description AS 'description' FROM `midtermgoals`";
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_goals = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['goalrecord_id']."</td>";
        echo "<td>".$row['goalname']."</td>";
        echo "<td>".$row['whentime']."</td>";
        echo "<td>".$row['description']."</td>";
        echo '<td><a href="goal_details.php?goalrecord_id='.$row['goalrecord_id'].'">View Goal</a></td>';
        echo '<td><a href="mygoal.php?goalrecord_id='.$row['goalrecord_id'].'">Update Goal</a></td>';
        echo '<td><a href="delete_goal.php?goalrecord_id='.$row['goalrecord_id'].'">Delete Goal</a></td>';
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
      <th scope="row">Total Goals</th>
    </tr>
    <tr>
      <th scope="row"><?php echo $total_goals;?></th>
    </tr>
  </tbody>
</table>

  </div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
