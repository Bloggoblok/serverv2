<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {
    $ID = $_GET['season_id'];



     $resultat = $bdd->query("SELECT * FROM web_series_episoade WHERE season_id = $ID ORDER BY 	episoade_order");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
       
       $json[] = $Data;
       
    }
}

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }


?>