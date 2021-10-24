<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);


            $sql = "DELETE FROM movies WHERE id = $Json_data->ID";
            $conn->exec($sql);

            $sql2 = "DELETE FROM movie_play_links WHERE movie_id = $Json_data->ID";
            $conn->exec($sql2);

            $sql3 = "DELETE FROM movie_download_links WHERE movie_id = $Json_data->ID";
            $conn->exec($sql3);

            echo "Movie Deleted successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}


?>