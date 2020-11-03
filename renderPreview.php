<?php
session_start();
require_once "KLogger.php";
require_once "Dao.php";

function renderPreviews(){
	$dao = new Dao();
	$logger = new KLogger("log.txt", KLogger::DEBUG);
	$directory = "img";
	$scannedDirectory = array_diff(scandir($directory), array('..','.'));

	foreach($scannedDirectory as $dir){
		$path = "./img/" . $dir;
		if(is_dir($path)){
			//Add code to pull from database and use it
			$dirInfo = $dao->getGallery($path);
			echo "<div class='galleryPreview'>";
			echo "<h2><a href=gallery.php?id={$dirInfo[0]['id']}>{$dir}</a></h2>";
			echo '<img class="preview" src="' . $dirInfo[0]['highlightOne'] .'"/>';
			echo '<img class="preview" src="' . $dirInfo[0]['highlightTwo'] .'"/>';
			echo '<img class="preview" src="' . $dirInfo[0]['highlightThree'] .'"/>';
			echo '<img class="preview" src="' . $dirInfo[0]['highlightFour'] .'"/>';
			echo '<div class="clear">';
			if($_SESSION['permissions']){
				echo '<a href="deleteGallery.php?id=' . $dirInfo[0]['id'] . '">Delete Gallery</a>';
			}
			echo '</div>';

			echo "</div>";
		}
	}
}
?>
