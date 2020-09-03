<?php
// Here we will handle the pizza order form
// GET server varible in PHP $_GET
// POST server varible in PHP $_POST

//var_dump($_GET);

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$address = $_POST['address'];
$comments = $_POST['comments'];

$toppings = $_POST['topping'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Order Process</title>
  </head>
  <body>
    <h1>Welcome
      <?php
      echo $firstName;
      ?>
      <?php
      echo $lastName;
      ?>
      <!-- print($firstName) OR echo $firstName -->
    </h1>
    <p>Your address is: <?php echo $address; ?>
    </p>
    <p>Toppings</p>
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
