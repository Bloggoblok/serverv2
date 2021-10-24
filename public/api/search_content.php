<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    $onlyPremium = $_GET['onlypremium'];

    $search_term = $_GET['search'];


    if($onlyPremium == 0) {
        $resultat = $bdd->query("SELECT * FROM movies WHERE type LIKE 0 ORDER BY id DESC");
    } else if ($onlyPremium == 1) {
        $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
    }
  
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {

        if (stripos($Data->name, $search_term) !== false) {
            $json[] = $Data;
        }else if (stripos($Data->description, $search_term) !== false) {
            $json[] = $Data;
        }else if (stripos($Data->genres, $search_term) !== false) {
            $json[] = $Data;
        }
       
    }

    if($onlyPremium == 0) {
        $resultat2 = $bdd->query("SELECT * FROM web_series WHERE type LIKE 0 ORDER BY id DESC");
    } else if ($onlyPremium == 1) {
        $resultat2 = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
    }
    
    $resultat2->setFetchMode(PDO::FETCH_OBJ);
    while( $Data2 = $resultat2->fetch() ) 
    {

        if (stripos($Data2->name, $search_term) !== false) {
            $json[] = $Data2;
        }else if (stripos($Data2->description, $search_term) !== false) {
            $json[] = $Data2;
        }else if (stripos($Data2->genres, $search_term) !== false) {
            $json[] = $Data2;
        }
       
    }

}

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }
    
?>