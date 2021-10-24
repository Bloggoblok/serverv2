<?php
require '../../db/config.php';

//header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GENRE_list = $Json_data->GENRE_list;
    $resultat = $conn->query("SELECT * FROM genres");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $json =array();

    if($GENRE_list != "") {
        
        $genres = explode(',', $GENRE_list);
        $data_genres =array();
        while( $Data = $resultat->fetch() ) {
            $data_genres[] = $Data;
        }
        foreach ($genres as $genre_item) {
           $got = false;
           $f_genre = trim($genre_item);
            foreach ($data_genres as $data_genre_item) {
                if (stripos($data_genre_item->name, $f_genre) !== false) {
                    $got = true;
                    $json[] = array("id"=>$data_genre_item->id, "text"=>$data_genre_item->name);
                }
            }
           
            if($got == false) {
    
                $sql = "INSERT INTO genres (name, icon, description, featured, status)
                VALUES ('$f_genre', '', '', '0', '1')";
                $conn->exec($sql);
                $json[] = array("id"=>$conn->lastInsertId(), "text"=>$f_genre);
            }
            
        }
    }
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}


?>