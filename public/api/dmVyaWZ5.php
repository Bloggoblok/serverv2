<?php

require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {
    $apikey = $_SERVER['HTTP_X_API_KEY'];

    

     $resultat = $bdd->query("SELECT * FROM config");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    if( $Data = $resultat->fetch() ) 
    {
        if($apikey == $Data->api_key) {
			echo 'Valid response';
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }

} else {
    echo "false";
}