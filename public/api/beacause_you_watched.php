<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

$userID = $_GET['userID'];
$limit = $_GET['limit'];
$filter = $_GET['filter'];

$json =array();


if($bdd != null) {
    if($filter == "Movies0") {
        $MovieGenres =  getMovieGenres($userID);
        if($MovieGenres != "") {
        $single_MovieGenres = explode(',', $MovieGenres);
        //Movie
        
        $lastMovieID = getLastMovie($userID);
        
        $resultat = $bdd->query("SELECT * FROM movies ORDER BY id DESC");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
            
            if($Data->id != $lastMovieID) {
                if(count($json) < $limit) {
                    foreach ($single_MovieGenres as $value) {
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
        }
        
        
        
        if($filter == "WebSeries0") {
        $WebSeriesGenres  =  getWebSeriesGenres($userID);
        if($WebSeriesGenres != "") {
        $single_WebSeriesGenres = explode(',', $WebSeriesGenres);
         //WebSeries

         $lastWebSeriesID = getLastWebSeries($userID);

         $resultat = $bdd->query("SELECT * FROM web_series ORDER BY id DESC");
         $resultat->setFetchMode(PDO::FETCH_OBJ);
         while( $Data = $resultat->fetch() ) 
         {
           
             if($Data->id != $lastWebSeriesID) {
                 if(count($json) < $limit) {
                     foreach ($single_WebSeriesGenres as $value) {
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
        }
}



 if(json_encode($json) != "[]") {
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
} else {
    echo "No Data Avaliable";
}







    function getLastMovie($userID) {
        require_once('../db/database.php');
        $bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

         $resultat = $bdd->query("SELECT * FROM watch_log WHERE user_id = '$userID' AND content_type LIKE 1 ORDER BY id DESC LIMIT 1");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
           
           return $Data->content_id;
           
        }
    }

    function getLastWebSeries($userID) {
        require_once('../db/database.php');
        $bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

         $resultat = $bdd->query("SELECT * FROM watch_log WHERE user_id = '$userID' AND content_type LIKE 2 ORDER BY id DESC LIMIT 1");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
           
           return $Data->content_id;
           
        }
    }


    function getMovieGenres($userID) {
        $contentID = getLastMovie($userID);
        if($contentID != "") {
            require_once('../db/database.php');
            $bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

         $resultat = $bdd->query("SELECT * FROM movies WHERE id = $contentID ORDER BY id DESC");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
           
           return $Data->genres;
           
        }
    }
    }

    function getWebSeriesGenres($userID) {
        $contentID = getLastWebSeries($userID);
        if($contentID != "") {
        require_once('../db/database.php');
        $bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

         $resultat = $bdd->query("SELECT * FROM web_series WHERE id = $contentID ORDER BY id DESC");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        while( $Data = $resultat->fetch() ) 
        {
           
           return $Data->genres;
           
        }
    }
    }

?>