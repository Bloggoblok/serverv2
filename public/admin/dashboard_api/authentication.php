<?php
require '../../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);


    $Email = $Json_data->Email;
    $Old_Password = $Json_data->Password;
    $Password = md5($Old_Password);

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $resultat = $bdd->query("SELECT * FROM user_db WHERE email = '" . $Email . "';");
                $resultat->setFetchMode(PDO::FETCH_OBJ);
                while( $login = $resultat->fetch() ) 
                {
                    if ($Password == $login->password) {
                        /////
                        if($login->role == "1" || $login->role == "2" || $login->role == "3" || $login->role == "4") {
                            session_start();
                            $_SESSION['Status'] = "Logged in";
                            setApiKey();
                            $_SESSION['ID'] = $login->id;
                            $_SESSION['Email'] = $Email;
                            $_SESSION['Password'] = $Password;

                         $data = array("Status"=>"Successful", "ID"=>$login->id, "Name"=>$login->name, "Email"=>$login->email, "Password"=>$login->password, "Role"=>$login->role, "active_subscription"=>$login->active_subscription, "subscription_type"=>$login->subscription_type, "subscription_exp"=>$login->subscription_exp);
                         echo json_encode($data);
                        } else {
                            $error_data = array("Status"=>"Invalid Credential");
                            echo json_encode($error_data);
                        }
                        //////
                    } else {
                        $error_data = array("Status"=>"Invalid Credential");
                        echo json_encode($error_data);
                    }
                }  
    
} else {
    header("HTTP/1.1 401 Unauthorized");
}

function setApiKey() {
    require '../../db/config.php';
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM config WHERE id = 1");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $Data = $resultat->fetch() ) 
    {
        $_SESSION['api_key'] = $Data->api_key;
    }
}
?>