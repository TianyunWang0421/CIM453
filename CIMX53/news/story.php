<?php header('Content-type: text/html; charset=utf-8'); ?>
<?php
  /* STEP 1: LOAD RECORDS - Copy this PHP code block near the TOP of your page */

  // load viewer library
  $libraryPath = 'cmsb/lib/viewer_functions.php';
  $dirsToCheck = ['','../','../../','../../../','../../../../']; // add if needed: '/home/www/txw438.us.tempcloudsite.com/'
  foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
  if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }

  // load record from 'news_stories'
  list($news_storiesRecords, $news_storiesMetaData) = getRecords(array(
    'tableName'   => 'news_stories',
    'where'       => whereRecordNumberInUrl(0),
    'loadUploads' => true,
    'allowSearch' => false,
    'limit'       => '1',
  ));
  $news_storiesRecord = @$news_storiesRecords[0]; // get first record
  if (!$news_storiesRecord) { dieWith404("Record not found!"); } // show error message if no record found

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>

</head>
<body>
  <php include('inc/nav.php');?>

      Record Number: <?php echo htmlencode($news_storiesRecord['num']) ?><br>
      Title: <?php echo htmlencode($news_storiesRecord['title']) ?><br>
      Story Date: <?php echo date("D, M jS, Y g:i:s a", strtotime($news_storiesRecord['story_date'])) ?><br><!-- For date formatting codes see: http://www.php.net/date -->
      Content: <?php echo $news_storiesRecord['content']; ?><br>
      Topics (values): <?php echo join(', ', $news_storiesRecord['topics:values']); ?><br>
      Topics (labels): <?php echo join(', ', $news_storiesRecord['topics:labels']); ?><br>
      Author (value): <?php echo $news_storiesRecord['author'] ?><br>
      Author (label): <?php echo $news_storiesRecord['author:label'] ?><br>
      _link : <a href="<?php echo $news_storiesRecord['_link'] ?>"><?php echo $news_storiesRecord['_link'] ?></a><br>

      <!-- STEP 2a: Display Uploads for field 'main_image' (Paste this anywhere inside STEP2 to display uploads) -->
        <!-- Upload Fields: extension, thumbFilePath, isImage, hasThumbnail, urlPath, width, height, thumbUrlPath, thumbWidth, thumbHeight, info1, info2, info3, info4, info5 -->

        <?php foreach ($news_storiesRecord['main_image'] as $index => $upload): ?>
          Upload Url: <?php echo htmlencode($upload['urlPath']) ?><br>


          <img src="<?php echo htmlencode($upload['urlPath']) ?>" width="<?php echo $upload['width'] ?>" alt="">



        <?php endforeach ?>

  <a href="<?php echo $news_storiesMetaData['_listPage'] ?>">&lt;&lt; Back to list page</a>

<?php include('inc/footer.php');?>

</body>
</html>
