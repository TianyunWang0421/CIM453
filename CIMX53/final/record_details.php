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
    <h1>Records</h1>
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
    $sql = "SELECT * FROM `midtermrecord` WHERE id = ".$_GET['record_id'];
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
<h4>Record id: <?php echo $extracted['id'];?> </h4>
<h4>Record Name: <?php echo $extracted['recordname'];?> </h4>

<h2>Level of Concentration:<?php echo $extracted['score'];?> </h32>
<h2>Repeat or Not:<?php echo $extracted['repeatit'];?> </h2>
<h2>Notes: <?php echo $extracted['notes'];?> </h2>
<!-- <h3>Total: <?php echo $extracted['task_total'];?> </h3> -->

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
