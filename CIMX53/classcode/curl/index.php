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
      <div class="row">
        <?php
        include('functions.php');
        $news = getData("https://news.miami.edu/feeds/all-news.xml","xml");
        ?>
        <?php foreach ($news->newsitem as $story):  ?>
        <!-- Begin card -->
        <div class="card col-sm-4">
        <img src="<?php echo $news->config->siteurl . $story->imageMedium;?>" class="card-img-top" alt="<?php echo $story->title;?> story image">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $story->title;?>
          </h5>
          <p class="card-text">
              <?php echo $story->abstract;?>
          </p>
          <a href="<?php echo $story->link;?>" class="btn btn-primary">Read more...</a>
        </div>
      </div>
        <!-- End card -->
      <?php endforeach; ?>
      </div>
    </div>


    <?php include("include/scripts.php"); ?>
  </body>
</html>
