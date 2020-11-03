<?php

session_start();
require_once 'Dao.php';
require_once 'KLogger.php';
$logger = new KLogger("log.txt", KLogger::DEBUG);

//Add validation

if(isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
}

$first = $_POST['firstName'];
$last = $_POST['lastName'];
if (!preg_match("/\w+/", $first) && !preg_match("/\w+/", $last)) {
	$logger->LogDebug("bad names");	
	$_SESSION['errors'][] = "Invalid first or last name format";
}

$password = $_POST['password'];
if (!preg_match("/\w{5,}/", $password)) {
	$logger->LogDebug("bad password");	
	$_SESSION['errors'][] = "Password must be longer than 5 letters";
}

$email = $_POST['email'];
if (!preg_match("/\w+[\@]\w+[\.]\w+/", $email)) {
	$logger->LogDebug("bad email");	
	$_SESSION['errors'][] = "Invalid email format";
}

$phone = $_POST['phone'];
if (!preg_match("/\(?[0-9]{3}\)?\-?[0-9]{3}\-?[0-9]{4}/", $phone)) {
	$logger->LogDebug("bad phone");	
	$_SESSION['errors'][] = "Invalid phone format";
}

if(count($_SESSION['errors']) > 0){
	$logger->LogDebug("failed validation");
	$_SESSION['form'] = $_POST;
	header("Location: newUser.php");
	exit();
}
else{
	$logger->LogDebug("proceeding to make user");
}

$dao = new Dao();
$dao->saveUser($_POST['firstName'], $_POST['lastName'], $_POST['password'], $_POST['email'], $_POST['phone']);

header("Location: newUser.php");
exit();
