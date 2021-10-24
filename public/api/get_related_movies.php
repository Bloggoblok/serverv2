<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$json =array();

if($bdd != null) {
    
    $id = $_GET['id'];
$genres = $_GET['genres'];
$limit = $_GET['limit'];

$genres_single = explode(',', $genres);


$resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
$resultat->setFetchMode(PDO::FETCH_OBJ);
while( $Data = $resultat->fetch() ) 
{
    if($Data->id != $id) {
        if(count($json) < $limit) {
            foreach ($genres_single as $value) {
                $genre = trim($value);
        
               if (stripos($Data->genres, $genre) !== false) {
                    if(json_encode($json) != "[]") {
                        $stat = false;
                        foreach ($json as $item) {
                            if ($item->id == $Data->id) {
                                $stat = true;
                            }
                        }
                        if($stat == false) {
                            $json[] = $Data;
                        }
                    } else {
                      $json[] = $Data; 
                    }
                         
                }
            }
        }
        }
    }
}


    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }

?>