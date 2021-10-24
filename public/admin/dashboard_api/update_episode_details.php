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

            $id = SQLSafe($Json_data->Edit_modal_videos_id);
            $Edit_modal_Episodes_Name = SQLSafe($Json_data->Edit_modal_Episodes_Name);
            $Edit_modal_Thumbnail = SQLSafe($Json_data->Edit_modal_Thumbnail);
            $Edit_modal_Order = SQLSafe($Json_data->Edit_modal_Order);
            $Edit_modal_Source = SQLSafe($Json_data->Edit_modal_Source);
            $Edit_modal_Url = SQLSafe($Json_data->Edit_modal_Url);
            $Edit_modal_Description = SQLSafe($Json_data->Edit_modal_Description);
            $Edit_Downloadable = SQLSafe($Json_data->Edit_Downloadable);
            $Edit_Type = SQLSafe($Json_data->Edit_Type);
            $Edit_Status = SQLSafe($Json_data->Edit_Status);
            $edit_modal_skip_available_Count = SQLSafe($Json_data->edit_modal_skip_available_Count);
            $edit_modal_intro_start = SQLSafe($Json_data->edit_modal_intro_start);
            $edit_modal_intro_end = SQLSafe($Json_data->edit_modal_intro_end);

            $sql ="UPDATE web_series_episoade SET Episoade_Name =?, episoade_image =?, episoade_description =?, episoade_order =?, downloadable =?, type =?, status =?, source =?, url =?, skip_available=?, intro_start=?, intro_end=?, end_credits_marker=? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Edit_modal_Episodes_Name, $Edit_modal_Thumbnail, $Edit_modal_Description, $Edit_modal_Order, $Edit_Downloadable, $Edit_Type, $Edit_Status, $Edit_modal_Source, $Edit_modal_Url, $edit_modal_skip_available_Count, $edit_modal_intro_start, $edit_modal_intro_end, '0', $id]);

            echo "Episode Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>