<?php

require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

     $resultat = $bdd->query("SELECT * FROM config");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
        $webseries_image_slider_max_visible = $Data->webseries_image_slider_max_visible;

        $resultat2 = $bdd->query("SELECT * FROM web_series ORDER BY id DESC LIMIT  $webseries_image_slider_max_visible");
        $resultat2->setFetchMode(PDO::FETCH_OBJ);
        while( $Data2 = $resultat2->fetch() ) 
        {
         $json[] = $Data2;
        }

        if(json_encode($json) != "[]") {
          echo json_encode($json, JSON_UNESCAPED_SLASHES);
        } else {
          echo "No Data Avaliable";
        }
    }
  }

?>