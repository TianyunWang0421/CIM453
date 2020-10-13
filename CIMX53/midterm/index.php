<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <?php include("include/head.php"); ?>

  </head>
  <body>
    <?php include("include/navigation.php"); ?>
  <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>Welcome to Bootstrap</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla enim at dolorem omnis, excepturi alias doloribus, libero, voluptatibus suscipit accusamus dolore odit minus iusto. Harum natus quia rerum repellat dolorem.</p>
    </div>

    <div class="col-sm-6">
      <form class="form" action="login_handler.php" method="post">
  <div class="form-group">
  <label for="email">Email address</label>
  <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
