<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>News Stories</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <?php include("include/navigation.php"); ?>
    <div class="container-fluid">
    <form>
    <div class="form-group">
    <label for="search">Search</label>
    <input class="form-control" name="search" value="">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="button">Search</button>
    </div>
</form>
      <div class="row">
        <?php
        include('functions.php');
        if(isset($_GET['search']) && ($_GET['search'] != "")) {
          $url = "https://superheroapi.com/api.php/10158816812095789/search/".$_GET['search'];
        } else {
          $url = "https://superheroapi.com/api.php/10158816812095789/search/super";
        }
        $data = getData($url,"json");

        ?>
        <?php foreach ($data->results as $hero):  ?>
        <!-- Begin card -->
        <div class="card col-sm-4">
        <img src="<?php echo $hero->image->url; ?>" class="card-img-top" alt="<?php echo $hero->name;?> story image">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $hero->name;?>
          </h5>
          <p class="card-text">
              <?php echo $hero->biography->publisher;?>
          </p>
        </div>
      </div>
        <!-- End card -->
      <?php endforeach; ?>
      </div>
    </div>


    <?php include("include/scripts.php"); ?>
  </body>
</html>
