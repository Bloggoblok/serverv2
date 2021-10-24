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

            $Movie_id = SQLSafe($Json_data->Movie_id);
            $Label = SQLSafe($Json_data->Label);
            $Order = SQLSafe($Json_data->Order);
            $Quality = SQLSafe($Json_data->Quality);
            $Size = SQLSafe($Json_data->Size);
            $Source = SQLSafe($Json_data->Source);
            $Url = SQLSafe($Json_data->Url);
            $Status = SQLSafe($Json_data->Status);
            $link_type = SQLSafe($Json_data->link_type);
            $skip_available_Count = SQLSafe($Json_data->skip_available_Count);
            $intro_start = SQLSafe($Json_data->intro_start);
            $intro_end = SQLSafe($Json_data->intro_end);


            $sql = "INSERT INTO movie_play_links (name, size, quality, link_order, movie_id, url, type, status, skip_available, intro_start, intro_end, end_credits_marker, link_type)
                                        VALUES ('$Label', '$Size', '$Quality', '$Order', '$Movie_id', '$Url', '$Source', '$Status', '$skip_available_Count', '$intro_start', '$intro_end', '0', '$link_type')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Link Added Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>