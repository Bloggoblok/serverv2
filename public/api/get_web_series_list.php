<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if($bdd != null) {

    if(isset($_GET['page'])){
        // if get page number through url and check it is a valid number
        $page_num = filter_var($_GET['page'], FILTER_VALIDATE_INT,[
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]); 
    
        // set how much show posts in a single page
    $page_limit = 20;
    // Set Offset
    $page_offset = $page_limit * ($page_num - 1);
    
    $json =array();
    
    $resultat = $bdd->query("SELECT * FROM web_series ORDER BY id DESC LIMIT $page_limit OFFSET $page_offset");
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
        
    }else{
    
    $json =array();
    
    $resultat = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
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
    
}


?>