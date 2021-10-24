<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

     $resultat = $conn->query("SELECT onesignal_api_key, onesignal_appid FROM config WHERE id = 1");
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