<?php

require '../../db/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $TermsAndConditions = $Json_data->TermsAndConditions;



            $sql ="UPDATE config SET TermsAndConditions =? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$TermsAndConditions]);



            echo "Terms And Conditions Data Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>