<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {

    function SQLSafe(string $s): string {
        return addslashes($s);
    }

    $content_id = SQLSafe($_POST["content_id"]);
    $content_type = SQLSafe($_POST["content_type"]);


    $json =array();
     $resultat = $bdd->query("SELECT * FROM comments WHERE content_id = '$content_id' AND content_type = '$content_type'");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
        $resultat2 = $bdd->query("SELECT * FROM user_db WHERE id = '$Data->user_id'");
        $resultat2->setFetchMode(PDO::FETCH_OBJ);
        while( $Data2 = $resultat2->fetch() ) 
        {
            $json[] = array("userID"=>$Data->user_id, "userName"=>$Data2->name, "comment"=>$Data->comment);
        }
    }

    
        
    if(json_encode($json) != "[]") {
        echo json_encode($json, JSON_UNESCAPED_SLASHES);
    } else {
        echo "No Data Avaliable";
    }
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



?>