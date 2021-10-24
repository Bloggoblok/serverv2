<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    $userID = $_GET['id'];

     $resultat = $bdd->query("SELECT * FROM subscription_log WHERE user_id = $userID ORDER BY id");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
       
       $json[] = $Data;
       
    }

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }

}

?>