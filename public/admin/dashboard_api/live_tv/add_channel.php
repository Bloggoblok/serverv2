<?php

require '../../../db/config.php';







if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            function SQLSafe(string $s): string {

                return addslashes($s);

            }

            $name = SQLSafe($Json_data->name);

            $sql = "INSERT INTO live_tv_channels (name, banner, stream_type, url, status, featured, type)

                VALUES ('$name', '$Json_data->POSTER', '$Json_data->Stream_Type', '$Json_data->Stream_Link', '$Json_data->status', '$Json_data->Featured', '$Json_data->type')";

            // use exec() because no results are returned

            $conn->exec($sql);

            echo $conn->lastInsertId();

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>