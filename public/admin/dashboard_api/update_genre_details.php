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

            $Edit_modal_Genre_id = SQLSafe($Json_data->Edit_modal_Genre_id);
            $Edit_modal_Genre_Name = SQLSafe($Json_data->Edit_modal_Genre_Name);
            $Edit_modal_Genre_Icon = SQLSafe($Json_data->Edit_modal_Genre_Icon);
            $Edit_modal_Genre_Description = SQLSafe($Json_data->Edit_modal_Genre_Description);
            $Edit_Genre_Featured = SQLSafe($Json_data->Edit_Genre_Featured);
            $Edit_Genre_Status = SQLSafe($Json_data->Edit_Genre_Status);

            $sql ="UPDATE genres SET name =?, icon =?, description =?, featured =?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Edit_modal_Genre_Name, $Edit_modal_Genre_Icon, $Edit_modal_Genre_Description, $Edit_Genre_Featured, $Edit_Genre_Status, $Edit_modal_Genre_id]);

            echo "Genre Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>