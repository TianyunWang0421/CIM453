<?php
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;

$errorMsg = "";

if ( isset($_POST['recordname']) && ($_POST['recordname'] != "") ) {
  $recordname = $_POST['recordname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Task / Goal Name is required</p>";
}

if( isset($_POST['spenttime']) && ($_POST['spenttime'] != "") ) {
  $spenttime = $_POST['spenttime'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Spent Time is required</p>";
}

if( isset($_POST['score']) && ($_POST['score'] != "") ) {
  $score = $_POST['score'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Please choose an answer. </p>";
}

if( isset($_POST['repeatit']) && ($_POST['repeatit'] != "") ) {
  $repeatit = $_POST['repeatit'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Please check if you want to repeat. </p>";
}

$repeatits = "";
if( isset($_POST['repeatit']) ){
  foreach($_POST['repeatit'] as $repeatit){
    $repeatits .= $repeatit . ", ";
  }
}

if($hasErrors) {
  //die("You have errors.");
  include('record.php');
} else {
  $notes = $_POST['notes'];
    include('include/db.php');
    $sql = "INSERT INTO `midtermrecord` (`id`, `recordname`, `spenttime`, `score`, `repeatit`, `notes`) VALUES (NULL, '$recordname', '$spenttime', '$score', '$repeatit', '$notes')";

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
