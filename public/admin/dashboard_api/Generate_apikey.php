<?php

require '../../db/config.php';

function generateRandomString($length = 16) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $T = generateRandomString();

    $sql ="UPDATE config SET api_key =? WHERE id = 1";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$T]);


   echo "Api Key Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}






?>