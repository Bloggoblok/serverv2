<?php

require '../../db/config.php';







if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $admin_panel_language = $Json_data->admin_panel_language;

            $sql ="UPDATE config SET admin_panel_language =? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$admin_panel_language]);



            echo "Admin Panel Language Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>