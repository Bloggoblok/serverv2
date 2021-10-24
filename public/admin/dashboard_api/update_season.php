<?php
require '../../db/config.php';



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

            $modal_season_id = SQLSafe($Json_data->modal_season_id);
            $edit_modal_Season_Name = SQLSafe($Json_data->edit_modal_Season_Name);
            $edit_modal_Order = SQLSafe($Json_data->edit_modal_Order);
            $Modal_Status = SQLSafe($Json_data->Modal_Status);

            $sql ="UPDATE web_series_seasons SET Session_Name =? , season_order =?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$edit_modal_Season_Name, $edit_modal_Order, $Modal_Status, $modal_season_id]);

            echo "Season Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>