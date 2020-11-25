<?php
// define globals
//global $APP, $SETTINGS, $CURRENT_USER, $TABLE_PREFIX;

addFilter('listHeader_displayLabel', 'media_cmsList_messageColumn', null, 3);
addFilter('listRow_displayValue',    'media_cmsList_messageColumn', null, 4);
addAction('record_preerase',         'media_preErase', null, 2);

//
if (empty($GLOBALS['SETTINGS']['advanced']['useMediaLibrary'])) { // disable if media library not enabled.
  die("Media library not enabled.");
}

// Let regular actionHandler run
$REDIRECT_FOR_CUSTOM_MENUS_DONT_EXIT = true;
return;

//
function media_cmsList_messageColumn($displayValue, $tableName, $fieldname, $record = []) {
  if ($tableName != '_media') { return $displayValue; } // skip all by our table

  //
  if ($fieldname == '_filename_') {
    if (!$record) { return t("File Name"); }               // header - we detect the header hook by checking if the 4th argument is set
    // row cell - we detect the row cell by checking if $record is set
    $filename = $record['media'][0]['filename'] ?? '';
    $displayValue = $filename;
  }

  if ($fieldname == '_filetype_') {
    if (!$record) { return t("File Type"); } // header - we detect the header hook by checking if the 4th argument is set
    // row cell - we detect the row cell by checking if $record is set
    $filename = $record['media'][0]['filename'] ?? '';
    $displayValue = pathinfo($filename, PATHINFO_EXTENSION);
  }

  if ($fieldname == '_filesize_') {
    if (!$record) { return t("File Size"); } // header - we detect the header hook by checking if the 4th argument is set
    // row cell - we detect the row cell by checking if $record is set
    $filesize = $record['media'][0]['filesize'] ?? '';
    $displayValue = $filesize ? formatBytes($filesize) : 'unknown';
  }

  return $displayValue;
}

//
function media_preErase($tableName, $recordNumsAsCSV) {
  if ($tableName != '_media') { return $displayValue; } // skip all by our table
  
  // get nums as array
  $nums = preg_split("/,/", $recordNumsAsCSV);
  $nums = array_map('intval', $nums);
  $nums = array_unique($nums);
  
  //
  $isInUse = false;
  foreach ($nums as $mediaNum) {
    if (media_getUploadsUsingMedia($mediaNum)) {
      $isInUse = true;
      break;
    }
  }
  
  
  //
  
  //
  if ($isInUse) { 
    alert("You can't erase media if it's currently in use.");
    showInterface('default/list.php');
    exit;
  }
}

// eof