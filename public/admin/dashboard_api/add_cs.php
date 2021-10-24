<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            function SQLSafe(string $s): string {
                return addslashes($s);
            }

            $add_cs_content_id = SQLSafe($Json_data->add_cs_content_id);
            $add_slider_type = SQLSafe($Json_data->add_slider_type);
            $add_cs_Title = SQLSafe($Json_data->add_cs_Title);
            $add_cs_Banner = SQLSafe($Json_data->add_cs_Banner);
            $add_cs_URL = SQLSafe($Json_data->add_cs_URL);
            $add_cs_Status = SQLSafe($Json_data->add_cs_Status);


            $sql = "INSERT INTO image_slider (title, banner, content_type, content_id, url, status)
                VALUES ('$add_cs_Title', '$add_cs_Banner', '$add_slider_type', '$add_cs_content_id', '$add_cs_URL', '$add_cs_Status')";

            $conn->exec($sql);
            echo "Custom Slider Added Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



?>