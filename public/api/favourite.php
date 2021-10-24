<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if($bdd != null) {
  $TYPE = $_GET['TYPE'];

    $USER_ID = $_GET['USER_ID'];
    $CONTENT_TYPE = $_GET['CONTENT_TYPE'];
    $CONTENT_ID = $_GET['CONTENT_ID'];


if($TYPE == "SET") {
    
    try {
  $sql = "INSERT INTO favourite (user_id, content_type, content_id)
                              VALUES ('$USER_ID', '$CONTENT_TYPE', '$CONTENT_ID')";
  // use exec() because no results are returned
  $bdd->exec($sql);
  echo "New favourite created successfully";
  
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$bdd = null;
} else if($TYPE == "SEARCH") {
    
    
     $resultat = $bdd->query("SELECT * FROM favourite WHERE user_id = '$USER_ID' AND content_type LIKE '$CONTENT_TYPE' AND content_id LIKE '$CONTENT_ID'");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
        if(!empty($Data)) {
            echo "Record Found";
        }
    }
    
} else if($TYPE == "REMOVE") {
    

  $sql = "DELETE FROM favourite WHERE user_id = '$USER_ID' AND content_type LIKE '$CONTENT_TYPE' AND content_id LIKE '$CONTENT_ID'";
  // use exec() because no results are returned
  $bdd->exec($sql);
  echo "Favourite successfully Removed";
    
}
} else {
  header("HTTP/1.1 401 Unauthorized");
}

?>