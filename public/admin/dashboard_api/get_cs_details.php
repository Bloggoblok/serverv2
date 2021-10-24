<?php
require_once('../../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

     $resultat = $bdd->query("SELECT * FROM image_slider WHERE id = $Json_data->ID");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $json =array();
    while( $Data = $resultat->fetch() ) 
    {
        $json = $Data;

        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    }
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}

?>