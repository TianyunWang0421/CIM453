<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>This Record</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/login_check.php"); ?>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <h1>This Record</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task / Goal Name</th>
      <th scope="col">Level of Concentration</th>
      <th scope="col">Repeat or Not</th>
      <th scope="col">Notes</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $notes = "";
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `midtermrecord` WHERE id = ".$_GET['recordrecord_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      $total_records = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
        $notes = $row['notes'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['recordname']."</td>";
        echo "<td>".$row['score']."</td>";
        echo "<td>".$row['repeatit']."</td>";
        echo "<td>".$row['notes']."</td>";
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
  <li class="list-group-item">Record id: <?php echo $extracted['id'];?> </li>
  <li class="list-group-item">Record Name: <?php echo $extracted['recordname'];?> </li>
  <li class="list-group-item">Level of Concentration: <?php echo $extracted['score'];?> </li>
  <li class="list-group-item">Repeat or Not: <?php echo $extracted['repeatit'];?> </li>
  <li class="list-group-item">Comments: <?php echo $notes;?> </li>
</ul>

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
