<?php
require '../../db/config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $Type = $Json_data->Type;
    $id = $Json_data->id;

    if($Type == "Webseries_id") {
        $resultat = $bdd->query("SELECT * FROM web_series WHERE id = $id");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
            echo $Data->TMDB_ID;
        }
    }
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}

?>