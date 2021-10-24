<?php

require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);

            $google_login = $Json_data->google_login;



            $sql ="UPDATE config SET google_login=? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$google_login]);



            echo "Login Settings Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>