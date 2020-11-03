<?php

session_start();
require_once 'Dao.php';
require_once 'KLogger.php';

//Add validation
$email = $_POST['email'];
if (true) {
  $_SESSION['errors'][] = "Invalid email format";
}
//$_SESSION['errors'][]="blah";
if(count($_SESSION['errors'])){
	$_SESSION['form'] = $_POST;
	header("Location: newUser.php");
	exit();
}

$dao = new Dao();
$dao->saveUser($_POST['firstName'], $_POST['lastName'], $_POST['password'], $_POST['email'], $_POST['phone']);

header("Location: newUser.php");
exit();
