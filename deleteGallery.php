<?php

session_start();
require_once 'Dao.php';
require_once 'KLogger.php';

//This function deletes a diretory and it's contents
function delTree($dir) {
   $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

$logger = new KLogger("log.txt", KLogger::DEBUG);
$dao = new Dao();
$logger->LogDebug("Deleting gallery with id: " . $_GET['id']);
$dir = $dao->getGalleryByID($_GET['id']);
delTree($dir[0]['path']);
$dao->deleteGallery($_GET['id']);

header("Location: galleries.php");
exit();
