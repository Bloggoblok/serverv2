<?php
function vak($APIKEY) {
    require '../../../db/config.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $stmt = $conn->prepare("SELECT * FROM config WHERE id = 1 AND api_key = '$APIKEY'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if( $row)
    {
        return true;
    } else {
        return false;
    }
}
?>