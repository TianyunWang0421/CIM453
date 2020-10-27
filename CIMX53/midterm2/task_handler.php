<?php
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;

$errorMsg = "";

if ( isset($_POST['taskname']) && ($_POST['taskname'] != "") ) {
  $taskname = $_POST['taskname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Task Name is required</p>";
}

if( isset($_POST['starttime']) && ($_POST['starttime'] != "") ) {
  $starttime = $_POST['starttime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Start Time is required</p>";
}

if( isset($_POST['endtime']) && ($_POST['endtime'] != "") ) {
  $endtime = $_POST['endtime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>End Time is required</p>";
}

if( isset($_POST['question']) && ($_POST['question'] != "") ) {
  $question = $_POST['question'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Please choose an answer. </p>";
}

if($hasErrors) {
  //die("You have errors.");
  include('task.php');
} else {
  $comments = $_POST['comments'];
    include('include/db.php');
    $sql = "INSERT INTO `midtermtiming` (`id`, `taskname`, `starttime`, `endtime`, `question`, `comments`) VALUES (NULL, '$taskname', '$starttime', '$endtime', '$question', '$comments')";

// Perform the query
mysqli_query($con, $sql);
//echo("Error description: " . mysqli_error($con));

// Print auto-generated id
//echo "New record has id: " . mysqli_insert_id($con);

mysqli_close($con);

  //echo "No errors<br>";

  include('focus.php');
}



?>
