<?php

require '../../../db/config.php';
require 'varify_apikey.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && vak($_SERVER['HTTP_X_API_KEY']) == true) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $resultat = $bdd->query("SELECT * FROM coupon WHERE id = $Json_data->ID");

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