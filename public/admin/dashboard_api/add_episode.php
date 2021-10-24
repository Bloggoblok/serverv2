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

            $season_id = SQLSafe($Json_data->season_id);
            $modal_Episodes_Name = SQLSafe($Json_data->modal_Episodes_Name);
            $modal_Thumbnail = SQLSafe($Json_data->modal_Thumbnail);
            $modal_Order = SQLSafe($Json_data->modal_Order);
            $modal_Source = SQLSafe($Json_data->modal_Source);
            $modal_Url = SQLSafe($Json_data->modal_Url);
            $modal_Description = SQLSafe($Json_data->modal_Description);
            $Downloadable = SQLSafe($Json_data->Downloadable);
            $Type = SQLSafe($Json_data->Type);
            $Status = SQLSafe($Json_data->Status);
            $add_modal_skip_available_Count = SQLSafe($Json_data->add_modal_skip_available_Count);
            $add_modal_intro_start = SQLSafe($Json_data->add_modal_intro_start);
            $add_modal_intro_end = SQLSafe($Json_data->add_modal_intro_end);


            $sql = "INSERT INTO web_series_episoade (Episoade_Name, episoade_image, episoade_description, episoade_order, season_id, downloadable, type, status, source, url, skip_available, intro_start, intro_end, end_credits_marker)
                                        VALUES ('$modal_Episodes_Name', '$modal_Thumbnail', '$modal_Description', '$modal_Order', '$season_id', '$Downloadable', '$Type', '$Status', '$modal_Source', '$modal_Url', '$add_modal_skip_available_Count', '$add_modal_intro_start', '$add_modal_intro_end', '0')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo $conn->lastInsertId();
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>