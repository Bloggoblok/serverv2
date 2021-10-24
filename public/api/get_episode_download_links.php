<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {
    $ID = $_GET['episode_id'];

     $resultat = $bdd->query("SELECT * FROM episode_download_links WHERE episode_id = $ID AND status LIKE 1 ORDER BY link_order");
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