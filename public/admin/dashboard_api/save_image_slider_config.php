<?php
require '../../db/config.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

            $slider_type = $Json_data->slider_type;
            $movie_image_slider_max_visible = $Json_data->movie_image_slider_max_visible;
            $webseries_image_slider_max_visible = $Json_data->webseries_image_slider_max_visible;


            $sql ="UPDATE config SET image_slider_type =?, 	movie_image_slider_max_visible =?, webseries_image_slider_max_visible =? WHERE id = 1";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$slider_type, $movie_image_slider_max_visible, $webseries_image_slider_max_visible]);

            echo "Image Slider Config Saved successfully";
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>