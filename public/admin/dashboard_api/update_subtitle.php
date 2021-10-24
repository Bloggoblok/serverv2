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

            $edit_subtitle_id = SQLSafe($Json_data->edit_subtitle_id);
            $modal_edit_Language = SQLSafe($Json_data->modal_edit_Language);
            $edit_subtitle_url = SQLSafe($Json_data->edit_subtitle_url);
            $modal_edit_mimetype = SQLSafe($Json_data->modal_edit_mimetype);
            $Status = SQLSafe($Json_data->Status);

            $sql ="UPDATE subtitles SET language =? , subtitle_url =?, mime_type =?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$modal_edit_Language, $edit_subtitle_url, $modal_edit_mimetype, $Status, $edit_subtitle_id]);

            echo "Subtitle Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>