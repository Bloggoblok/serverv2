<?php
require '../../db/config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            function SQLSafe(string $s): string {
                $NewData = stripslashes($s);
                return addslashes($NewData);
            }

            $ID = SQLSafe($Json_data->ID);
            $Label = SQLSafe($Json_data->Label);
            $Order = SQLSafe($Json_data->Order);
            $Quality = SQLSafe($Json_data->Quality);
            $Size = SQLSafe($Json_data->Size);
            $Source = SQLSafe($Json_data->Source);
            $Url = SQLSafe($Json_data->Url);
            $Status = SQLSafe($Json_data->Status);
            $download_type = SQLSafe($Json_data->download_type);

            $sql ="UPDATE movie_download_links SET name =? , size =?, quality =?, link_order =?, url =?, type =?, download_type=?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Label, $Size, $Quality, $Order, $Url, $Source, $download_type, $Status, $ID]);

            echo "Link Data Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>