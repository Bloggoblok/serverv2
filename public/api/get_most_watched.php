<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {
    $limit = $_GET['limit'];
$filter = $_GET['filter'];


if($filter == "Movies0") {
    $resultat = $bdd->query("SELECT *, count(content_id ) as max FROM view_log WHERE content_type LIKE 1 GROUP BY content_id ORDER BY max DESC LIMIT $limit");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) {

        $resultat2 = $bdd->query("SELECT * FROM movies Where id LIKE $Data->content_id");
        $resultat2->setFetchMode(PDO::FETCH_OBJ);
        while( $Data2 = $resultat2->fetch() ) 
        {
            $json[] = $Data2;
        }
    }

}

if($filter == "WebSeries0") {
    $resultat = $bdd->query("SELECT *, count(content_id ) as max FROM view_log WHERE content_type LIKE 2 GROUP BY content_id ORDER BY max DESC LIMIT $limit");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) {
        $resultat2 = $bdd->query("SELECT * FROM web_series Where id LIKE $Data->content_id");
        $resultat2->setFetchMode(PDO::FETCH_OBJ);
        while( $Data2 = $resultat2->fetch() ) 
        {
            $json[] = $Data2;
        }
    }

}
}

if(json_encode($json) != "[]") {
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
} else {
    echo "No Data Avaliable";
}