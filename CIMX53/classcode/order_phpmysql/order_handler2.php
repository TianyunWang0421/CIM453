<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Here we will handle the pizza order form
// GET server variable in PHP $_GET
// POST server variable in PHP $_POST

var_dump($_POST);
die();
//Set default values up here
$hasErrors = false;
$priceList = [];
$priceList["small"] = 10;
$priceList["medium"] = 15;
$priceList["large"] = 20;

$toppingPrice = 1.50;

$totalToppings = 0;

$orderTotal = 0;

die($orderTotal);

// $priceList[
//   "small" => 10,
//   "medium" => 15,
//   "large" => 20
// ];


// Test if the user submited a first name
if ( isset($_POST['firstname']) && ($_POST['firstname'] != "") ) {
  $firstName = $_POST['firstname'];
} else {
  $hasErrors = true;
}

if( isset($_POST['lastname']) && ($_POST['lastname'] != "") ) {
  $lastName = $_POST['lastname'];
} else {
  $hasErrors = true;
}

if( isset($_POST['address']) && ($_POST['address'] != "") ) {
  $address = $_POST['address'];
} else {
  $hasErrors = true;
}

echo $orderTotal."<br>";

die();

if( isset($_POST['size']) && ($_POST['size'] != "") ) {
  $size = $_POST['size'];
  //$orderTotal += $priceList[$size];
} else {
  $hasErrors = true;
}
echo $orderTotal."<br>";

if($hasErrors) {
  die("You have errors");
} else {
  echo "No errors<br>";
}


$comments = $_POST['comments'];


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ordder Process</title>
  </head>
  <body>
  <h1>Welcome
    <?php
    echo $firstName;
    ?>
    <?php
    echo $lastName;
    ?>
  </h1>
  <p>You address is: <?php echo $address; ?>
  </p>
  <p>Toppings: </p>
  <?php
  if( isset($_POST['topping']) ){
    $toppings = $_POST['topping'];
    foreach($toppings as $topping){
      echo $topping." - ";
    }
  }
  ?>


  </body>
</html>
