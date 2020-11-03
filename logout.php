<?php
session_start();
session_destroy();
header("Location: photographs.php");
exit();
