<?php
date_default_timezone_set("Asia/Kolkata");
$Today = date_create(date("Y-m-d"));

require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {

    $apikey = $_SERVER['HTTP_X_API_KEY'];
    $decoded = base64_decode($_SERVER['HTTP_X_REQUESTED_WITH']);
    list($Request_Type) = explode(":",$decoded);
    if($Request_Type == "login") {
      list($Type,$Email,$Password) = explode(":",$decoded);
    } else if($Request_Type == "signup") {
        list($Type,$Username,$Email,$Password) = explode(":",$decoded);
    }

    

     $resultat = $bdd->query("SELECT * FROM config WHERE id = 1");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $login = $resultat->fetch() ) 
    {
        if ($apikey == $login->api_key) {
            if($Type == "login") {
                $resultat = $bdd->query("SELECT * FROM user_db WHERE email = '" . $Email . "';");
                $resultat->setFetchMode(PDO::FETCH_OBJ);
                if( $login_data = $resultat->fetch() ) 
                {
                    $User_ID = $login_data->id;
                    $subscription_remaining = 0;
                    $exp = date_create($login_data->subscription_exp);
                    $diff=date_diff($Today,$exp);
                    if($diff->format('%R') == "+") {
                        $subscription_remaining = $diff->format('%a');
                    } else if($diff->format('%R') == "-") {
                        $subscription_remaining = 0;
                        $sql ="UPDATE user_db SET active_subscription =? , subscription_type =?, time =?, amount =?, subscription_start =?, subscription_exp =? WHERE id =?";
                        $stmt= $bdd->prepare($sql);
                        $stmt->execute(["Free", "0", "0", "0", "0000-00-00", "0000-00-00", $User_ID]);

                        if($login_data->active_subscription != "Free" || $login_data->subscription_type != 0 || $login_data->time != 0 || $login_data->amount != 0 || $login_data->subscription_start != "0000-00-00" || $login_data->subscription_exp !="0000-00-00") {
                            $sql2 = "INSERT INTO subscription_log (name, amount, time, subscription_start, subscription_exp, user_id)
                                VALUES ('$login_data->name', '$login_data->amount', '$login_data->time', '$login_data->subscription_start', '$login_data->subscription_exp', '$User_ID')";
                            $bdd->exec($sql2);
                        }
                    }

                    $resultat = $bdd->query("SELECT * FROM user_db WHERE email = '" . $Email . "';");
                    $resultat->setFetchMode(PDO::FETCH_OBJ);
                    if( $login = $resultat->fetch() ) 
                    {
                      if ($Password == $login->password) {
                        /////
                         $data = array("Status"=>"Successful", "ID"=>$login->id, "Name"=>$login->name, "Email"=>$login->email, "Password"=>$login->password, "Role"=>$login->role, "active_subscription"=>$login->active_subscription, "subscription_type"=>$login->subscription_type, "subscription_exp"=>$login->subscription_exp, "subscription_remaining"=>$subscription_remaining);
                         echo json_encode($data);
                        //////
                      } else {
                        $error_data = array("Status"=>"Invalid Credential");
                        echo json_encode($error_data);
                      }
                      
                    }

                } else {
                     $error_data = array("Status"=>"Invalid Credential");
                        echo json_encode($error_data);
                }
            }else if($Type == "signup") {
                
                $stmt = $bdd->prepare("SELECT * FROM user_db WHERE email=?");
                $stmt->execute([$Email]); 
                if($stmt->fetchColumn() == "") {
                    $sql = "INSERT INTO user_db (name, email, password, active_subscription, subscription_start, subscription_exp)
                                          VALUES ('$Username', '$Email', '$Password', 'Free', '0000-00-00', '0000-00-00')";
                    // use exec() because no results are returned
                    $bdd->exec($sql);
                    if($bdd->lastInsertId() == "") {
                        echo "Something Went Wrong!";
                    } else {
                      $resultat = $bdd->query("SELECT * FROM user_db WHERE email = '" . $Email . "';");
                      $resultat->setFetchMode(PDO::FETCH_OBJ);
                      while( $login = $resultat->fetch() ) {
                            if ($Password == $login->password) {
                               /////
                               $data = array("Status"=>"Successful", "ID"=>$login->id, "Name"=>$login->name, "Email"=>$login->email, "Password"=>$login->password, "Role"=>$login->role, "active_subscription"=>$login->active_subscription, "subscription_type"=>$login->subscription_type, "subscription_exp"=>$login->subscription_exp);
                                echo json_encode($data);
                                //////
                            } else {
                               $error_data = array("Status"=>"Invalid Credential");
                               echo json_encode($error_data);
                            }
                        }
                    }
                
                } else {
                    $error_data = array("Status"=>"Email Already Regestered");
                    echo json_encode($error_data);
                }
            }else {
                    header("HTTP/1.1 401 Unauthorized");
            }
        } else {
            echo("invalid");
        }
    }    
    
} else {
    header("HTTP/1.1 401 Unauthorized");
}
?>