<?php
session_start();
//Now we have access to session variables
if(isset($_SESSION['user'])) {
  //This person is in
  echo "you can see this page<br>";
  echo "You are logged in as ".$_SESSION['user']."<br>";
  echo "Your user id is ".$_SESSION['user_id'];
} else {
  // this person is out
  header("location: index.php");
  die();
}
?>
