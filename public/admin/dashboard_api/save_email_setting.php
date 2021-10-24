<?php

require '../../db/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $contact_email = $Json_data->contact_email;
            $smtp_host =$Json_data->smtp_host;
            $smtp_user = $Json_data->smtp_user;
            $smtp_pass =$Json_data->smtp_pass;
            $smtp_port =$Json_data->smtp_port;



            $sql ="UPDATE config SET Contact_Email =?, SMTP_Host =?, SMTP_Username=?, SMTP_Password=?, SMTP_Port=? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$contact_email, $smtp_host, $smtp_user, $smtp_pass, $smtp_port]);



            echo "Email Setting Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>