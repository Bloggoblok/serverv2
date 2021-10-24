<?php
require '../../../db/config.php';
require 'varify_apikey.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && vak($_SERVER['HTTP_X_API_KEY']) == true) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





            $sql = "DELETE FROM coupon WHERE id = $Json_data->ID";

            // use exec() because no results are returned

            $conn->exec($sql);

            echo "Coupon Deleted successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}





?>