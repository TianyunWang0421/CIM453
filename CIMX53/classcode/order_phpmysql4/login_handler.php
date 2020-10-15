<?php
session_start();
//var_dump($_SESSION);
if(isset($_POST['email']) && isset($_POST['password'])) {
//
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; //LIMIT 1
include('include/db.php');
$result = mysqli_query($con,$sql);
//mysqli_num_rows gives the number of items in the query
$totalresults = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
//echo "Total results: " ;
//var_dump($totalresults);
//echo "<br>";

//var_dump($row);
//echo "<br>";
if($totalresults){
  $_SESSION['user'] = $row['email'];
  $_SESSION['user_id'] = $row['id'];
//echo "Session: ...... ";
//  var_dump($_SESSION);
header("location:order.php");
} else {
  //if the user is not found
  header("location:index.php?error=user+not+found");

}

} else {
  sleep(60000);
}
?>
