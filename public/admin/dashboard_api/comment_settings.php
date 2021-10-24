<?php

require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {

    $Body_Json =  file_get_contents('php://input');

    $Json_data = $obj = json_decode($Body_Json);



            $moviesComment_int = $Json_data->moviesComment_int;
            $webSeriesComment_int =$Json_data->webSeriesComment_int;



            $sql ="UPDATE config SET movie_comments =?, webseries_comments =? WHERE id = 1";

            $stmt= $conn->prepare($sql);

            $stmt->execute([$moviesComment_int, $webSeriesComment_int]);



            echo "Comment Setting Data Updated successfully";

            

    

} else  {

    header("HTTP/1.1 401 Unauthorized");

}







            ?>