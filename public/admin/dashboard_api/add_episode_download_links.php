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

            $EpisodeID = SQLSafe($Json_data->EpisodeID);
            $Label = SQLSafe($Json_data->Label);
            $Order = SQLSafe($Json_data->Order);
            $Quality = SQLSafe($Json_data->Quality);
            $Size = SQLSafe($Json_data->Size);
            $Source = SQLSafe($Json_data->Source);
            $Url = SQLSafe($Json_data->Url);
            $download_type = SQLSafe($Json_data->download_type);
            $Status = SQLSafe($Json_data->Status);


            $sql = "INSERT INTO episode_download_links (name, size, quality, link_order, episode_id, url, type, download_type, status)
                                        VALUES ('$Label', '$Size', '$Quality', '$Order', '$EpisodeID', '$Url', '$Source', '$download_type', '$Status')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Link Added Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>