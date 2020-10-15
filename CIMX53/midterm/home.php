<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <?php include("include/head.php"); ?>

  </head>
  <body>
    <?php include("include/navigation.php"); ?>
  <div class="jumbotron">
  <h1 class="display-4"><strong>Timing</strong></h1>
  <p class="lead">Hello, my friend! Stay focused at work and get more done with Timing.</p>
  <p>If you’re trying to pick a time-tracking app to help you stay organized, focused, and on task, Timing is the best choice for you.</p>
  <hr class="my-4">
  <li>
    Do your most valuable and important work
  </li>
  <li>
    Eliminate as many unimportant tasks as possible
  </li>
  <li>
    Get an accurate representation of whether you’re spending your time on things that matter
  </li>
  <br>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>Welcome to Timing</h1>
      <p>Before you can make a significant change in your life, you have to know where you stand. Before you can reduce the amount of time you spend on your phone, you have to know how you spend your time right now.</p>
    </div>

    <div class="col-sm-6">
      <form class="form" action="login_handler.php" method="post">
  <div class="form-group">
  <label for="email">Email address</label>
  <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
  <small id="emailHelp" class="form-text text-muted">Please enter your email here. We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <label for="password">Password</label>
  <input name="password" type="password" class="form-control" id="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>

  </div>
  <!-- Content here -->

  </div>

</div>

  <?php include("include/scripts.php"); ?>

  </body>
</html>
