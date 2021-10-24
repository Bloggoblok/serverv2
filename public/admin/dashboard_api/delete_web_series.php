<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            $sql = "DELETE FROM web_series WHERE id = $Json_data->ID";
            $conn->exec($sql);

            $resultat = $conn->query("SELECT * FROM web_series_seasons WHERE web_series_id = $Json_data->ID");
            $resultat->setFetchMode(PDO::FETCH_OBJ);
            while( $SeasonData = $resultat->fetch() ) 
            {
                $sql3 = "DELETE FROM web_series_episoade WHERE season_id = $SeasonData->id";
                $conn->exec($sql3);
            }

            $sql2 = "DELETE FROM web_series_seasons WHERE web_series_id = $Json_data->ID";
            $conn->exec($sql2);

            echo "Web Series Deleted successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}


?>