<?php

require '../../../db/config.php';
require 'varify_apikey.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && vak($_SERVER['HTTP_X_API_KEY']) == true) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            function SQLSafe(string $s): string {

                return addslashes($s);

            }



            $Name = SQLSafe($Json_data->Name);

            $Coupon_Code = SQLSafe($Json_data->Coupon_Code);

            $Time = SQLSafe($Json_data->Time);

            $Amount = SQLSafe($Json_data->Amount);

            $Max_Use = SQLSafe($Json_data->Max_Use);

            $Status_Count = SQLSafe($Json_data->Status_Count);

            $f_Subscription_Type = SQLSafe($Json_data->f_Subscription_Type);

            $add_expire_date = SQLSafe($Json_data->add_expire_date);





            $sql = "INSERT INTO coupon (name, coupon_code, time, amount, subscription_type, status, max_use, used, used_by, expire_date)

                VALUES ('$Name', '$Coupon_Code', '$Time', '$Amount', '$f_Subscription_Type', '$Status_Count', '$Max_Use', '0', '', '$add_expire_date')";

            // use exec() because no results are returned

            $conn->exec($sql);

            echo $conn->lastInsertId();

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>