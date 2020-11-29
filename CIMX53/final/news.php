<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php
  /* STEP 1: LOAD RECORDS - Copy this PHP code block near the TOP of your page */

  // load viewer library
  $libraryPath = 'cmsb/lib/viewer_functions.php';
  $dirsToCheck = ['','../','../../','../../../','../../../../']; // add if needed: '/home/www/txw438.us.tempcloudsite.com/'
  foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
  if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }

  // load records from 'news_stories'
  list($news_storiesRecords, $news_storiesMetaData) = getRecords(array(
    'tableName'   => 'news_stories',
    'loadUploads' => true,
    'allowSearch' => true,
  ));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>News Story</title>
  <?php include('include/head.php');?>
</head>
<body>
  <?php include('include/navigation.php'); ?>

  <?php include('include/slideshow.php'); ?>
  <div class="container">
    <div class="row">
    <?php foreach ($news_storiesRecords as $record): ?>
      <div class="card col-sm-6">

        <?php foreach ($record['main_image'] as $index => $upload): ?>
          <img src="<?php echo htmlencode($upload['thumbUrlPath']) ?>"   class="card-img-top" alt="">
        <?php endforeach ?>


        <div class="card-body">
          <h5 class="card-title"><?php echo htmlencode($record['title']) ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $record['author'] ?>
          <br>
          <?php echo date("m/d/Y", strtotime($record['story_date'])) ?>
        </h6>
          <p class="card-text">
            <?php echo substr($record['abstract'],0,200); ?>...
          </p>
          <a href="<?php echo $record['_link'] ?>" class="btn btn-primary">View Story</a>
        </div>
      </div>
    <?php endforeach ?>

    <?php if (!$news_storiesRecords): ?>
      No records were found!<br><br>
    <?php endif ?>

  <!-- /STEP2: Display Records -->
</div>
</div>
<?php include('include/footer.php');?>

</body>
</html>
