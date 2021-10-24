<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array(); 

if($bdd != null) {

    $onlyPremium = $_GET['onlypremium'];

    $search_term = $_GET['search'];

    if($onlyPremium == 0) {
        $resultat = $bdd->query("SELECT * FROM live_tv_channels WHERE type LIKE 0 ORDER BY id DESC");
    } else if ($onlyPremium == 1) {
        $resultat = $bdd->query("SELECT * FROM live_tv_channels ORDER BY id DESC");
    }
  
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {

        if (stripos($Data->name, $search_term) !== false) {
            $json[] = $Data;
        }
       
    }

    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }

}
    
?>