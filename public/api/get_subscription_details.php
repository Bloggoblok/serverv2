<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    $ID = $_GET['ID'];

     $resultat = $bdd->query("SELECT * FROM subscription WHERE id = $ID");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    if( $Data = $resultat->fetch() ) 
    {
        $json = $Data;
    } else {
        echo "No Data Avaliable";
    }

    if(json_encode($json) != "[]") {

        echo json_encode($json, JSON_UNESCAPED_SLASHES);

    } else {

        echo "No Data Avaliable";

    }

}

?>