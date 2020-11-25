<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php
  /* STEP 1: LOAD RECORDS - Copy this PHP code block near the TOP of your page */

  // load viewer library
  $libraryPath = 'cmsb/lib/viewer_functions.php';
  $dirsToCheck = ['','../','../../','../../../','../../../../']; // add if needed: '/home/www/txw438.us.tempcloudsite.com/'
  foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
  if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }

  // load record from 'slide_show'
  list($slide_showRecords, $slide_showMetaData) = getRecords(array(
    'tableName'   => 'slide_show',
    'where'       => '', // load first record
    'loadUploads' => true,
    'allowSearch' => false,
    'limit'       => '1',
  ));
  $slide_showRecord = @$slide_showRecords[0]; // get first record
  if (!$slide_showRecord) { dieWith404("Record not found!"); } // show error message if no record found

?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($slide_showRecord['slides'] as $index => $upload): ?>
          <?php
          $activeClass = "";
          if($index == 0) {$activeClass = "active"; }
          ?>

           <div class="carousel-item <?php echo $activeClass;?>">
             <img src="<?php echo htmlencode($upload['urlPath']) ?>" class="d-block w-100" alt="">
             <div class="carousel-caption d-none d-md-block">
               <h5><?php echo htmlencode($upload['info1']) ?></h5>
               <p><?php echo htmlencode($upload['info2']) ?></p>
             </div>
           </div>

        <?php endforeach ?>

    </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
