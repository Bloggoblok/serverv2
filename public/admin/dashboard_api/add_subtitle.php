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

            $content_id = SQLSafe($Json_data->content_id);
            $content_type = SQLSafe($Json_data->content_type);
            $modal_add_Language = SQLSafe($Json_data->modal_add_Language);
            $modal_add_Subtitle_url = SQLSafe($Json_data->modal_add_Subtitle_url);
            $modal_add_Mimetype = SQLSafe($Json_data->modal_add_Mimetype);
            $Status_int = SQLSafe($Json_data->Status_int);


            $sql = "INSERT INTO subtitles (content_id, content_type, language, subtitle_url, mime_type, status)
                                        VALUES ('$content_id', '$content_type', '$modal_add_Language', '$modal_add_Subtitle_url', '$modal_add_Mimetype', '$Status_int')";

            $conn->exec($sql);
            echo "Subtitle Added Successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>