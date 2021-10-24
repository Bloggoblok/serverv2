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

    $userID = $Json_data->Edit_modal_User_id;
    $Edit_modal_User_Name = SQLSafe($Json_data->Edit_modal_User_Name);
    $Edit_modal_Email = SQLSafe($Json_data->Edit_modal_Email);


    $stmt = $conn->prepare("SELECT * FROM user_db WHERE email=?");
    $stmt->execute([$Edit_modal_Email]); 
    if($stmt->fetchColumn() == "") {
       



        $sql2 ="UPDATE user_db SET name =? , email =? WHERE id =?";
        $stmt2= $conn->prepare($sql2);
        $stmt2->execute([$Edit_modal_User_Name, $Edit_modal_Email, $userID]);
        echo "User Updated successfully";
    } else {
        $resultat = $conn->query("SELECT * FROM user_db WHERE id = $userID");
        $resultat->setFetchMode(PDO::FETCH_OBJ);
        $Data = $resultat->fetch();
        if($Data->email == $Edit_modal_Email) {
            $sql4 ="UPDATE user_db SET name =? WHERE id =?";
            $stmt4= $conn->prepare($sql4);
            $stmt4->execute([$Edit_modal_User_Name, $userID]);
            echo "User Updated successfully";
        } else {
            echo "Email Already Regestered";
        }
    }
} else  {
    header("HTTP/1.1 401 Unauthorized");
}



            ?>