<?php
function get_config() {
    require '../db/config.php';

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $resultat = $bdd->query("SELECT * FROM config WHERE id = 1");

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $json =array();

    while( $Data = $resultat->fetch() ) 

    {

        $json = $Data;



        return json_encode($json, JSON_UNESCAPED_SLASHES);

    }
}



?>