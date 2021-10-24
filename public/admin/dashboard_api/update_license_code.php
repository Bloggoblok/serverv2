<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            function SQLSafe(string $s): string {
                $NewData = stripslashes($s);
                return addslashes($NewData);
            }

            $license_code = SQLSafe($Json_data->license_code);
            if($license_code == "") {
                $sql ="UPDATE config SET license_code =? WHERE id =1";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$license_code]);
                echo "License Updated successfully";
            } else {
                if(!verify($license_code)) {
                    $sql ="UPDATE config SET license_code =? WHERE id =1";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$license_code]);
                    echo "License Updated successfully";
                } else {
                    echo "Invalid purchase code";
                } 
            }
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



function verify($license_code) {
	return true;
}

function is_valid_json( $raw_json ){
    return ( json_decode( $raw_json , true ) == NULL ) ? true : false ;
}



?>