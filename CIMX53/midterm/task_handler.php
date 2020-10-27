<?php
<?php include("include/login_check.php"); ?>
$user_id = $_SESSION['user_id'];

$hasErrors = false;

$errorMsg = "";

if ( isset($_POST['taskname']) && ($_POST['taskname'] != "") ) {
  $taskname = $_POST['taskname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Task Name is required</p>";
}

if( isset($_POST['starttime']) && ($_POST['starttime'] != "") ) {
  $endtime = $_POST['starttime'];
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
  include('tasks.php');
} else {
$comments = $_POST['comments'];
  include('include/db.php');
  $sql = "INSERT INTO `midtermtiming` (`id`,`user_id`, `taskname`, `starttime`, `endtime`, `question`) VALUES (NULL,'$user_id', '$taskname', '$starttime', '$endtime', '$question')";

mysqli_query($con, $sql);

mysqli_close($con);

  include('focus.php');
}

?>
