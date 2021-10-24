<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {
    $resultat = $bdd->query("SELECT * FROM genres ORDER BY id DESC");
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