<?php

require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    if(isset($_GET['filter'])) {
        $filter = $_GET['filter'];
        if($filter == "featured") {
            $resultat = $bdd->query("SELECT * FROM live_tv_channels WHERE featured LIKE 1 ORDER BY id DESC");
            $resultat->setFetchMode(PDO::FETCH_OBJ);
            while( $Data = $resultat->fetch() ) 
            {
              $json[] = $Data;
            }
        }

    } else {
        $resultat = $bdd->query("SELECT * FROM live_tv_channels ORDER BY id DESC");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
           
           $json[] = $Data;
           
        }
    }
}

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }
    
?>