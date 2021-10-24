<?php

require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);


            $apk_name = $Json_data->apk_name;
            $login_mandatory_bool = $Json_data->login_mandatory_bool;
            $maintenance_bool = $Json_data->maintenance_bool;



            $sql ="UPDATE config SET name =?, login_mandatory =?, maintenance =?, all_live_tv_type =?, all_movies_type =?, all_series_type =?, LiveTV_Visiable_in_Home =?, genre_visible_in_home =? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$apk_name, $login_mandatory_bool, $maintenance_bool, $Json_data->All_Live_TV_Type_count, $Json_data->All_Movies_Type_count, $Json_data->All_Series_Type_count, $Json_data->LiveTV_Visiable_in_Home_int, $Json_data->genreList_Visiable_in_Home_int]);



            echo "Android Setting Data Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>