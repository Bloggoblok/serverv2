<?php
date_default_timezone_set("Asia/Kolkata");
$date = date('m-d-Y', time());
$time = date('h:i:s a', time());

require_once('../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    function SQLSafe(string $s): string {
        return addslashes($s);
    }

    $user_id = SQLSafe($_POST["user_id"]);
    $content_id = SQLSafe($_POST["content_id"]);
    $content_type = SQLSafe($_POST["content_type"]);


    $sql = "INSERT INTO view_log (user_id, content_id, content_type, date, time)
        VALUES ('$user_id', '$content_id', '$content_type', '$date', '$time')";
    $conn->exec($sql);
    echo $conn->lastInsertId();
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>