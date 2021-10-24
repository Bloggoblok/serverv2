<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            $Onesignal_Api_Key = $Json_data->Onesignal_Api_Key;
            $Onesignal_Appid =$Json_data->Onesignal_Appid;

            $sql ="UPDATE config SET onesignal_api_key =?, onesignal_appid =? WHERE id = 1";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Onesignal_Api_Key, $Onesignal_Appid]);

            echo "Onesignal Data Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>