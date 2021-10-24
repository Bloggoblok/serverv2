<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            function SQLSafe(string $s): string {
                return addslashes($s);
            }

            $Edit_cs_id = SQLSafe($Json_data->Edit_cs_id);
            $Edit_cs_content_id = SQLSafe($Json_data->Edit_cs_content_id);
            $Edit_slider_type = SQLSafe($Json_data->Edit_slider_type);
            $Edit_cs_Title = SQLSafe($Json_data->Edit_cs_Title);
            $Edit_cs_Banner = SQLSafe($Json_data->Edit_cs_Banner);
            $Edit_cs_URL = SQLSafe($Json_data->Edit_cs_URL);
            $Edit_cs_Status = SQLSafe($Json_data->Edit_cs_Status);


            $sql ="UPDATE image_slider SET title =?, banner =?, content_type =?, content_id =?, url =?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Edit_cs_Title, $Edit_cs_Banner, $Edit_slider_type, $Edit_cs_content_id, $Edit_cs_URL, $Edit_cs_Status, $Edit_cs_id]);



            echo "Custom Slider Updated Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



?>