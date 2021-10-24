<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);


            $sql = "DELETE FROM image_slider WHERE id = $Json_data->ID";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Custom Slider Deleted successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}


?>