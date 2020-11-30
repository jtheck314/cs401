<?php 
session_start();


?>

<html>
 <head>
  <link rel="stylesheet" type="text/css" href="photographs.css">
  <link rel='icon' href='img/camera.jpg' type='image/jpg'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="myScripts.js"></script>
 <head/>
 <body>
  <div id="banner">
   <div id="logo">
    <a href="photographs.php">
     <img src="img/logo.png"/>
    </a>
   </div>
   <div id="title">
    <h1>Photographs</h1>
    <h4>By KeLynn</h4>
   </div>
  <div class="clear"></div>
  </div>
  <div id="nav">
   <ul>
    <li <?php if($pageName == "home") { echo "id='active';";} ?>>
     <a href="/photographs.php">Home</a>
    </li>
    <li <?php if($pageName == "galleries") { echo "id='active';";} ?>>
     <a href="/galleries.php">Galleries</a>
    </li>
    <li <?php if($pageName == "packages") { echo "id='active';";} ?>>
     <a href="/packages.php">Packages</a>
    </li>
    <li <?php if($pageName == "calendar") { echo "id='active';";} ?>> 
     <a href="/calendar.php">Calendar</a>
    </li>
    <li <?php if($pageName == "login") { echo "id='active';";} ?> class="floatRight"> 
    <a href=
    <?php if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){ 
	echo "'/logout.php'>Log out</a>";
    } 
    else { 
	echo "'/login.php'>Log in</a>";
    } ?>
    </li>
  </div>
  <div id="content">
