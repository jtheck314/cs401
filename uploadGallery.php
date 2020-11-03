<?php
session_start();
require_once "KLogger.php";
require_once "Dao.php";

$logger = new KLogger("log.txt", KLogger::DEBUG);
$dao = new Dao();
if(!empty($_FILES) && $_POST['name'] && $_POST['name1'] && $_POST['name2'] && $_POST['name3'] && $_POST['name4']){
	$path = "./img/" . $_POST['name'];
	$logger->LogDebug("Attempting to make {$path}");	
	if(!mkdir($path)){
		$logger->LogDebug("failed to make directory {$path}");	
	}
	$zip = new ZipArchive;
	$res = $zip->open($_FILES['ufile']['tmp_name']);
	$logger->LogDebug("Result of unzip: " . $res);	
	if($res === true) {
		$zip->extractTo($path);
		$zip->close();
		$logger->LogDebug("scucessfully unziped the upload");
		$directory = scandir($path, 1);
		
		//Path to directory created by unzip
		$pathToDir = $path . "/" . $directory[0];

		//Contents of pathToDir
		$scannedDirectory = array_diff(scandir($pathToDir), array("..","."));
		
		foreach($scannedDirectory as $pic){

			$logger->logDebug("pic " . $pic);
			$old = $pathToDir . '/' . $pic;
			$new = $path . '/' . $pic;
			$logger->logDebug("old " . $old);
			$logger->LogDebug("new " . $new);
			rename($old, $new);
		}

		//Remove directory created by unzip
		rmdir($pathToDir);


		//Rename specified preview files
		$p1=$path ."/{$_POST['name1']}";
		$p2=$path ."/{$_POST['name2']}";
		$p3=$path ."/{$_POST['name3']}";
		$p4=$path ."/{$_POST['name4']}";
		
		$dao->saveGallery($path, $p1, $p2, $p3, $p4);
		
		//I probably need to add more security to this part. For example: what if the name doesn't exist.
		
		unset($_SESSION['error']);
	}

	else{
		$logger->LogDebug("failed to unzip");
	}
}
else{
	$_SESSION['error'] = "please give a valid value for all fields";
	$_SESSION['form'] = $_POST;
}

header("Location: galleries.php");
exit;
?>
