<?php
session_start();
 if($_SESSION['Status'] == "Logged in") {
   session_destroy();

    header("Location: ../login.php");
 } else {
    header("Location: ../login.php");
 }

?>