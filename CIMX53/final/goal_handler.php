<?php
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;

$errorMsg = "";

if ( isset($_POST['goalname']) && ($_POST['goalname'] != "") ) {
  $goalname = $_POST['goalname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Goal Name is required</p>";
}

if( isset($_POST['whentime']) && ($_POST['whentime'] != "") ) {
  $whentime = $_POST['whentime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Please choose an answer. </p>";
}

if($hasErrors) {
  //die("You have errors.");
  include('task.php');
} else {
  $description = $_POST['description'];
    include('include/db.php');
    $sql = "INSERT INTO `midtermgoals` (`id`, `goalname`, `whentime`, `description`) VALUES (NULL, '$goalname', '$whentime', '$description')";

// Perform the query
mysqli_query($con, $sql);
//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

  //echo "No errors<br>";

  include('thanku.php');
}



?>
