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

                $NewData = stripslashes($s);

                return addslashes($NewData);

            }



            $Edit_ID = SQLSafe($Json_data->Edit_ID);
            $Edit_Name = SQLSafe($Json_data->Edit_Name);
            $Edit_Coupon_Code = SQLSafe($Json_data->Edit_Coupon_Code);
            $Edit_Time = SQLSafe($Json_data->Edit_Time);
            $Edit_Amount = SQLSafe($Json_data->Edit_Amount);
            $Edit_Max_Use = SQLSafe($Json_data->Edit_Max_Use);
            $Edit_Status_Count = SQLSafe($Json_data->Edit_Status_Count);
            $f_Edit_Subscription_Type = SQLSafe($Json_data->f_Edit_Subscription_Type);
            $expire_date = SQLSafe($Json_data->expire_date);



            $sql ="UPDATE coupon SET name =? , coupon_code =?, time =?, amount =?, subscription_type =?, status =?, max_use =?, expire_date=? WHERE id =?";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$Edit_Name, $Edit_Coupon_Code, $Edit_Time, $Edit_Amount, $f_Edit_Subscription_Type, $Edit_Status_Count, $Edit_Max_Use,  $expire_date, $Edit_ID]);



            echo "Coupon Details Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>