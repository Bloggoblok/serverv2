<?php

require_once('../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    function SQLSafe(string $s): string {
        return addslashes($s);
    }

    $user_id = SQLSafe($_POST["user_id"]);
    $title = SQLSafe($_POST["title"]);
    $description = SQLSafe($_POST["description"]);
    $report_type = SQLSafe($_POST["report_type"]);


    $sql = "INSERT INTO report (user_id, title, description, report_type, status)
        VALUES ('$user_id', '$title', '$description', '$report_type', '0')";
    $conn->exec($sql);
    echo $conn->lastInsertId();

} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>