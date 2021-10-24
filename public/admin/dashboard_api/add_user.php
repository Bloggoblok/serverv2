<?php
require_once('../../db/database.php');
$conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn != null) {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

            function SQLSafe(string $s): string {
                return addslashes($s);
            }

            $UserName = SQLSafe($Json_data->add_modal_User_Name);
            $UserEmail = SQLSafe($Json_data->Add_modal_Email);
            $UserPassword = md5($Json_data->Add_modal_Password);


                $stmt = $conn->prepare("SELECT * FROM user_db WHERE email=?");
                $stmt->execute([$UserEmail]); 
                if($stmt->fetchColumn() == "") {
                    
                    $sql = "INSERT INTO user_db (name, email, password, active_subscription, subscription_start, subscription_exp)
                                          VALUES ('$UserName', '$UserEmail', '$UserPassword', 'Free', '0000-00-00', '0000-00-00')";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    if($conn->lastInsertId() == "") {
                        echo "Something Went Wrong";
                    } else {
                        echo "User Added successfully";
                    }
                
                } else {
                    echo "Email Already Regestered";
                }
            
    
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>