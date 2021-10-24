<?php

require '../../../db/config.php';







if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            function SQLSafe(string $s): string {

                $NewData = stripslashes($s);

                return addslashes($NewData);

            }



            $Name = SQLSafe($Json_data->name);



            $sql ="UPDATE live_tv_channels SET name =? , banner =?, stream_type =?, url =?, status =?, featured =?, type=? WHERE id =?";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$Name, $Json_data->POSTER, $Json_data->Stream_Type, $Json_data->Stream_Link, $Json_data->status, $Json_data->Featured, $Json_data->type, $Json_data->ID]);



            echo "Channel Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}

?>