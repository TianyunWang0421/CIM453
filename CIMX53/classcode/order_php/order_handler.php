<?php

// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

//var_dump($_POST);

//Set default values up here
$hasErrors = false;
$priceList = array();
$priceList["small"] = 10;
$priceList["medium"] = 15;
$priceList["large"] = 20;

$errorMsg = "";

$toppingPrice = 1.50;

$totalToppings = 0;

$orderTotal = 0;

$priceList = array(
  'small' => 10,
  'medium' => 15,
  'large' => 20
);

// Test if the user submited a first name
if ( isset($_POST['firstname']) && ($_POST['firstname'] != "") ) {
  $firstName = $_POST['firstname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>First name is required</p>";
}

if( isset($_POST['lastname']) && ($_POST['lastname'] != "") ) {
  $lastName = $_POST['lastname'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Last name is required</p>";

}

if( isset($_POST['address']) && ($_POST['address'] != "") ) {
  $address = $_POST['address'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Address is required</p>";

}

//echo "Initial ".$orderTotal."<br>";

if( isset($_POST['size']) && ($_POST['size'] != "") ) {
  $size = $_POST['size'];
  $orderTotal += $priceList[$size];
} else {
  $hasErrors = true;
}

// echo "After size ".$orderTotal."<br>";

if( isset($_POST['topping']) ){
  //$toppingPrice
  // Counting items in array count($array)
  $totalToppings = $toppingPrice * count($_POST['topping']);
}
$orderTotal += $totalToppings;
// echo "This is after toppings ".$orderTotal."<br>";

// Final step
if($hasErrors) {
  //die("You have errors.");
  include('order.php');
} else {
  //echo "No errors<br>";
  $comments = $_POST['comments'];
  include('thankyou.php');
}



?>
