<?php 
$db_file_path = "db/config.php";
  $db_file = file_get_contents($db_file_path);
  $is_installed = strpos($db_file, "enter_hostname");

  if (!$is_installed) {
    header("Location: /admin"); 
  } else {
    header("Location: /install"); 
  }

?>