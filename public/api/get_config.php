<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {
$json =array();

     $resultat = $bdd->query("SELECT * FROM config");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
       
       $json = $Data;
       
    }
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
} else  {
    header("HTTP/1.1 401 Unauthorized");
}
?>