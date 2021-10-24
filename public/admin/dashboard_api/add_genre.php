<?php
require '../../db/config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            function SQLSafe(string $s): string {
                return addslashes($s);
            }

            $modal_Genre_Name = SQLSafe($Json_data->modal_Genre_Name);
            $modal_Genre_Icon = SQLSafe($Json_data->modal_Genre_Icon);
            $modal_Genre_Description = SQLSafe($Json_data->modal_Genre_Description);
            $Genre_Featured = SQLSafe($Json_data->Genre_Featured);
            $Genre_Status = SQLSafe($Json_data->Genre_Status);


            $sql = "INSERT INTO genres (name, icon, description, featured, status)
                                        VALUES ('$modal_Genre_Name', '$modal_Genre_Icon', '$modal_Genre_Description', '$Genre_Featured', '$Genre_Status')";
            $conn->exec($sql);
            echo $conn->lastInsertId();
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>