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

            $Name = SQLSafe($Json_data->name);
            $Description = SQLSafe($Json_data->description);
            $genres = SQLSafe($Json_data->genres);
            $release_date = SQLSafe($Json_data->release_date);
            $runtime = SQLSafe($Json_data->runtime);

            $sql ="UPDATE movies SET name =? , description =?, genres =?, release_date =?, runtime =?, poster =?, banner =?, youtube_trailer =?, downloadable =?, type =?, status =? WHERE id =?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$Name, $Description, $genres, $release_date, $runtime, $Json_data->poster, $Json_data->banner, $Json_data->youtube_trailer, $Json_data->downloadable, $Json_data->type, $Json_data->status, $Json_data->ID]);

            echo "Movie Updated successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>