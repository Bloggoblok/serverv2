<?php

$servername = "hostname";
$username = "db_username";
$password = "db_password";
$dbname = "database_name";


$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $json =array();

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM config");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data_n = $resultat->fetch() ) 
    {
        $onesignal_api_key = $Data_n->onesignal_api_key;
        $onesignal_appid = $Data_n->onesignal_appid;

        $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
            $json[] = $Data;
        }
        $resultat2 = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
        $resultat2->setFetchMode(PDO::FETCH_OBJ);
        while( $Data2 = $resultat2->fetch() ) 
        {
          $json[] = $Data2;
        }
    }

    
    $r_data = $json[array_rand($json, 1)];

    $idd = $r_data->id;
    $Heading = $r_data->name;
    $Message = $r_data->description;
    $Large_Icon = $r_data->poster;
    $Big_Picture = $r_data->banner;

    $content_type = $r_data->content_type;
    if($content_type == 1) {
        $c_Type = "Movie";
    } else if($content_type == 2) {
        $c_Type = "Web Series";
    } else {
        exit();
    }
    


         $headings      = array(
            "en" => $Heading
        );
        $content      = array(
            "en" => $Message
        );
        $fields = array(
            'included_segments' => array(
                'All'
            ),
            'app_id' => $onesignal_appid,
            'contents' => $content,
            'headings' => $headings,
            'data' => array(
                "Type" => $c_Type,
                "Movie_id" => $idd
            ),            
            "big_picture" => $Big_Picture,
            "large_icon" => $Large_Icon
        );
        
        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            "Authorization: Basic $onesignal_api_key"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        $D_response = json_decode($response);
        echo "Total Recipients= $D_response->recipients";

?>