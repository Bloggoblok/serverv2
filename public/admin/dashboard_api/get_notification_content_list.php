<?php
require '../../db/config.php';

$search_term = $_GET['search'];


if($_GET['type'] == "movie") {
    $json =array();
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {

        if (stripos($Data->name, $search_term) !== false) {
            $json[] = array("id"=>$Data->id, "text"=>$Data->name);
        }
       
    }
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
} 
else if($_GET['type'] == "web_series") {
    $json =array();
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {

        if (stripos($Data->name, $search_term) !== false) {
            $json[] = array("id"=>$Data->id, "text"=>$Data->name);
        }
       
    }
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
}
?>