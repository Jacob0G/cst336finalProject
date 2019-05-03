<?php

session_start();

session_destroy();

header('location: ../src/login.php'); //taking user back to login screen


?>