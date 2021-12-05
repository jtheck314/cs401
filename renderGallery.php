<?php
//Blah
require_once('Dao.php');
require_once('KLogger.php');

function renderGallery($id){
	$dao = new Dao();
	$logger = new KLogger('log.txt', KLogger::DEBUG);
	$gallery = $dao->getGalleryByID($id);
	$directory = $gallery[0]['path'];
	$logger->LogDebug("ID = {$id}, Trying to load pictures from " . $directory);

	 
	$scannedDirectory = array_diff(scandir($directory), array('..','.'));
	
	//I should add the feature to put a title on the database so I can pull it and use it here
		
	foreach($scannedDirectory as $pic){
		$path = $directory . '/' . $pic;
		echo '<img class="galleryPic" src="' . $path . '"/>';
	}
}
?>
