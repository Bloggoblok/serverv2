<?php
$ContentType = $_GET['content_type'];


require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if($bdd != null) {

    if($ContentType == "Movies") {
        Load_Movies($bdd);
    } else if ($ContentType == "WebSeries") {
        Load_Series($bdd);
    } else {
        echo "No Data Avaliable";
    }
    
}



function Load_Movies($bdd) {
    $json =array();
    $Max_Data = $bdd->query("SELECT * FROM config WHERE id LIKE 1");
    $Max_Data->setFetchMode(PDO::FETCH_OBJ);
    while( $Data_max_show = $Max_Data->fetch() ) 
    {
        $Max_Movies = $Data_max_show->Home_Recent_Max_Movie_Show;
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC LIMIT $Max_Movies");
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


function Load_Series($bdd) {
    $json =array();

    $Max_Data = $bdd->query("SELECT * FROM config WHERE id LIKE 1");
    $Max_Data->setFetchMode(PDO::FETCH_OBJ);
    while( $Data_max_show = $Max_Data->fetch() ) 
    {
        $max_series = $Data_max_show->Home_Recent_Max_Series_Show;

        $resultat = $bdd->query("SELECT * FROM web_series ORDER BY id DESC LIMIT $max_series");

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