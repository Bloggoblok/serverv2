<?php

function SRN() {
    require '../db/config.php';
    copy("../notification/main/main_srn.php", "../notification/srn.php"); 

    $db_file_path = "../notification/srn.php";
    $db_file = file_get_contents($db_file_path);
    
    $db_file = str_replace('hostname', $servername, $db_file);
    $db_file = str_replace('db_username', $username, $db_file);
    $db_file = str_replace('db_password', $password, $db_file);
    $db_file = str_replace('database_name', $dbname, $db_file);
    file_put_contents($db_file_path, $db_file);
}

?>