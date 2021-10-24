<?php

require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



            $apk_version_name = $Json_data->apk_version_name;
            $apk_version_code =$Json_data->apk_version_code;
            $latest_apk_url = $Json_data->latest_apk_url;
            $apk_whats_new =$Json_data->apk_whats_new;
            $update_skipable_int = $Json_data->update_skipable_int;



            $sql ="UPDATE config SET Latest_APK_Version_Name =?, Latest_APK_Version_Code =?, APK_File_URL=?, Whats_new_on_latest_APK=?, Update_Skipable=?, Update_Type=? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$apk_version_name, $apk_version_code, $latest_apk_url, $apk_whats_new, $update_skipable_int, $Json_data->Update_Type_int]);



            echo "Android Update Data Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>