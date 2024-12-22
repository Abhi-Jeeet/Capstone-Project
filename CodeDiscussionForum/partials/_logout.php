<?php
session_start();


echo "Logging you out please wait";


session_destroy();
header("Location:/Capstone Project/Home1/Home2/Forum/index.php");




?>