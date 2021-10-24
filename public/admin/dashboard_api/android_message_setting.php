<?php

require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);

            $Show_Message = $Json_data->Show_Message;
            $Message_Title =$Json_data->Message_Title;
            $Message = $Json_data->Message;



            $sql ="UPDATE config SET Show_Message =?, Message_Title =?, Message=? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$Show_Message, $Message_Title, $Message]);



            echo "Android Message Setting Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>