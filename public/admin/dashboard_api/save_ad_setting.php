<?php

require '../../db/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $ad_type = $Json_data->ad_type;
            $Admob_Publisher_ID =$Json_data->admob_publisher_id;
            $Admob_APP_ID = $Json_data->admob_app_id;
            $adMob_Native =$Json_data->admob_native_ads_id;
            $adMob_Banner = $Json_data->admob_banner_ads_id;
            $adMob_Interstitial = $Json_data->admob_interstitial_ads_id;
            $facebook_app_id = $Json_data->facebook_app_id;
            $facebook_banner_ads_placement_id = $Json_data->facebook_banner_ads_placement_id;
            $facebook_interstitial_ads_placement_id = $Json_data->facebook_interstitial_ads_placement_id;
            $StartApp_App_ID =$Json_data->startapp_app_id;
            $AdColony_app_id =$Json_data->AdColony_app_id;
            $AdColony_BANNER_ZONE_ID =$Json_data->AdColony_BANNER_ZONE_ID;
            $AdColony_INTERSTITIAL_ZONE_ID =$Json_data->AdColony_INTERSTITIAL_ZONE_ID;
            $UnityAds_game_id =$Json_data->UnityAds_game_id;
            $UnityAds_BANNER_ID =$Json_data->UnityAds_BANNER_ID;

            $Custom_Banner_Url =$Json_data->Custom_Banner_Url;
            $Custom_Banner_Click_Url_Type =$Json_data->Custom_Banner_Click_Url_Type;
            $Custom_Banner_Click_Url =$Json_data->Custom_Banner_Click_Url;
            $Custom_Interstitial_Url =$Json_data->Custom_Interstitial_Url;
            $Custom_Interstitial_Click_Url_Type =$Json_data->Custom_Interstitial_Click_Url_Type;
            $Custom_Interstitial_Click_Url =$Json_data->Custom_Interstitial_Click_Url;



            $sql ="UPDATE config SET ad_type =?, Admob_Publisher_ID =?, Admob_APP_ID=?, adMob_Native=?, adMob_Banner=?, adMob_Interstitial=?, StartApp_App_ID=?, facebook_app_id=?, facebook_banner_ads_placement_id=?, facebook_interstitial_ads_placement_id=?, AdColony_app_id=?, AdColony_banner_zone_id=?, AdColony_interstitial_zone_id=?, unity_game_id=?, unity_banner_id=?, custom_banner_url=?, custom_banner_click_url_type=?, custom_banner_click_url=?, custom_interstitial_url=?, custom_interstitial_click_url_type=?, custom_interstitial_click_url=? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$ad_type, $Admob_Publisher_ID, $Admob_APP_ID, $adMob_Native, $adMob_Banner, $adMob_Interstitial, $StartApp_App_ID, $facebook_app_id, $facebook_banner_ads_placement_id, $facebook_interstitial_ads_placement_id, $AdColony_app_id, $AdColony_BANNER_ZONE_ID, $AdColony_INTERSTITIAL_ZONE_ID, $UnityAds_game_id, $UnityAds_BANNER_ID, $Custom_Banner_Url, $Custom_Banner_Click_Url_Type, $Custom_Banner_Click_Url, $Custom_Interstitial_Url, $Custom_Interstitial_Click_Url_Type, $Custom_Interstitial_Click_Url]);



            echo "Ad Setting Data Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>