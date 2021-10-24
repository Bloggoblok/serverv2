<?php

require '../db/config.php';

$Token = $_GET['token'];

$NewPass = $_GET['pass'];

$md5_pass = md5($NewPass);



function SQLSafe(string $s): string {

    return addslashes($s);

}



$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $resultat = $bdd->query("SELECT * FROM mail_token_details WHERE token = '$Token'");

$resultat->setFetchMode(PDO::FETCH_OBJ);

$json =array();

if( $Data = $resultat->fetch() ) 

{

    $Tkn_Time =  base64_decode($Token);



    $d=strtotime("now");

    $Current_DT =  date("Y-m-d h:i:s", $d);



    $to_time = strtotime($Current_DT);

    $from_time = strtotime($Tkn_Time);

    $Diff = ($to_time - $from_time) / 60;

    

    if($Diff>5) {

        echo "Expired!";

    } else {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE user_db SET password=? WHERE email=?";

           $stmt= $conn->prepare($sql);

           $stmt->execute([$md5_pass, $Data->mail]);



            echo "Password Updated successfully";

    }



    

} else {

    echo "Invalid Request";

}



?>