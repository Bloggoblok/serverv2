<?php

require_once('../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    function SQLSafe(string $s): string {
        return addslashes($s);
    }

    $user_id = SQLSafe($_POST["user_id"]);
    $content_id = SQLSafe($_POST["content_id"]);
    $content_type = SQLSafe($_POST["content_type"]);
    $comment = SQLSafe($_POST["comment"]);


    $sql = "INSERT INTO comments (user_id, content_id, content_type, comment)
        VALUES ('$user_id', '$content_id', '$content_type', '$comment')";
    $conn->exec($sql);
    echo $conn->lastInsertId();
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



?>