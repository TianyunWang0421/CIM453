<?php
  global $tableName, $errors, $schema, $isUploadLimit, $uploadsRemaining, $maxUploads, $menu;
  require_once "lib/menus/default/uploadForm_functions.php";

  $errors .= alert();
?>
<!DOCTYPE html
          PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="<?php echo CMS_ASSETS_URL ?>/3rdParty/clipone/plugins/bootstrap/css/bootstrap.min.css">

  <base target="_self">
  <style type="text/css">
    .photobox{
      height: 200px;
    }
    .photobox .thumbnail{
      min-height: 150px;
    }

.nav-tabs > li {
    float:none;
    display:inline-block;
    zoom:1;
}

.nav-tabs {
    text-align:center;
}
    
  </style>
 </head>

<body>

<?php
  // baselink for tabs - add &action=wysiwygUploads or &action=wysiwygMedia
  $baselink  = "?menu="          . htmlencode($menu);
  $baselink .= "&fieldName="     . htmlencode(@$_REQUEST['fieldName']);
  $baselink .= "&num="           . htmlencode(@$_REQUEST['num']);
  $baselink .= "&preSaveTempId=" . htmlencode(@$_REQUEST['preSaveTempId']);
?>

<div style="padding-top: 12px">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="<?php echo "$baselink&action=wysiwygUploads" ?>" aria-controls="home" role="tab" data-toggle="tab">Upload Files</a></li>
    <li role="presentation" class="active"><a href="<?php echo "$baselink&action=wysiwygMedia" ?>" aria-controls="profile" role="tab" data-toggle="tab">Add from Media Library</a></li>
  </ul>

</div>


<form method="post" action="?" enctype="multipart/form-data" autocomplete="off" class="form-inline">
<?php echo security_getHiddenCsrfTokenField(); ?>

<div class="container">
 <?php media_showMediaList(); ?>
</div>

<script src="<?php echo CMS_ASSETS_URL ?>/3rdParty/jquery.js"></script>
<script><!--


function addMedia(mediaNum) {
 
  // ajax call to add media record
  $.ajax({
    url: '?',
    type: "POST",
    data: {
      menu:       "<?php echo htmlencode($tableName); ?>",
      action:     'mediaAdd',
      mediaNum:   mediaNum,
      tableName:  "<?php echo htmlencode($tableName); ?>",
      fieldName:  "<?php echo htmlencode(@$_REQUEST['fieldName']); ?>",
      recordNum:  "<?php echo htmlencode(@$_REQUEST['num']) ?>",
      _CSRFToken: $('[name=_CSRFToken]').val()
    },
    
    error:  function(msg){ alert("There was an error adding media!"); },
    success: function(msg){
      if (msg) { return alert("Error: " + msg); };
            
      // refresh upload iframe in parent window
      self.parent.document.getElementById(fieldName + '_iframe').contentDocument.location.reload(true);
      
      // close this modal
      self.parent.hideModal()
      
      //
      return true;
    }
  });

  // The setTimeout function is used to prevent requests from being blocked.
  var uploadFilesLink = "<?php echo $baselink; ?>&action=wysiwygUploads";
  setTimeout(function() {document.location.href = uploadFilesLink}, 100);
  return false;
}

//--></script>


</form>
</body>
</html>
