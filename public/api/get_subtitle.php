<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {

    $content_id = $_GET['content_id'];
    $ct = $_GET['ct'];

     $resultat = $bdd->query("SELECT * FROM subtitles WHERE content_id = '$content_id' AND status = '1' AND content_type = '$ct'");
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