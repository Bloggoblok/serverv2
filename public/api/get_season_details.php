<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    $ID = $_GET['web_series_id'];
    $season_name = $_GET['season_name'];

     $resultat = $bdd->query("SELECT * FROM web_series_seasons WHERE web_series_id = $ID AND Session_Name = '$season_name'");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
       $json = $Data;
       
    }

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }

}


?>