<?php
require '../../db/config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            function SQLSafe(string $s): string {
                return addslashes($s);
            }

            $webseries_id = SQLSafe($Json_data->webseries_id);
            $modal_Season_Name = SQLSafe($Json_data->modal_Season_Name);
            $modal_Order = SQLSafe($Json_data->modal_Order);
            $Modal_Status = SQLSafe($Json_data->Modal_Status);


            $sql = "INSERT INTO web_series_seasons (Session_Name, season_order, web_series_id, status)
                                        VALUES ('$modal_Season_Name', '$modal_Order', '$webseries_id', '$Modal_Status')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Season Added Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>