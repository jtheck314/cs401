<?php
session_start();
require_once 'Dao.php';
require_once 'KLogger.php';


$dao = new Dao();
$logger = new KLogger('log.txt', KLogger::DEBUG);
if($dao->userExists($_POST['email'], $_POST['password'])){
	$logger->logDebug("login authenticated");
	$_SESSION['authenticated']=true;
	$_SESSION['permissions'] = $dao->getPermissions($_POST['email'], $_POST['password']);
	header("Location: photographs.php");
	exit();
}
else{
	$logger->logDebug("login failed");
	$_SESSION['authenticated']=false;
	header("Location: login.php");
	exit();
}
?>
