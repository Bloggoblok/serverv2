<?php
require_once('../db/database.php');
$bdd = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

date_default_timezone_set("Asia/Kolkata");
$Today = date("Y-m-d");

function SQLSafe(string $s): string {
    return addslashes($s);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $bdd != null) {
    $apikey = $_SERVER['HTTP_X_API_KEY'];
    $decoded = base64_decode($_SERVER['HTTP_X_REQUESTED_WITH']);
    list($Request_Type) = explode(":",$decoded);
    list($User_ID,$Coupon_Code) = explode(":",$decoded);
    $C_User_ID = $User_ID;
    $Safe_Coupon_Code = SQLSafe($Coupon_Code);

     $resultat = $bdd->query("SELECT * FROM coupon WHERE coupon_code = '" . $Safe_Coupon_Code . "';");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    if( $Coupan = $resultat->fetch() ) 
    {
        if($Coupan->coupon_code == $Safe_Coupon_Code) {
            if($Coupan->status == 1) {

                $diff=date_diff(date_create(date("Y-m-d")),date_create($Coupan->expire_date));
                if($diff->format('%R') == "+") {
                    if($Coupan->max_use == 0) {
                        $resultat10 = $bdd->query("SELECT * FROM user_db WHERE id = '" . $C_User_ID . "';");
                        $resultat10->setFetchMode(PDO::FETCH_OBJ);
                        if( $User_data = $resultat10->fetch() ) {
    
                            if($User_data->subscription_type == 0) {
                                $used = $Coupan->used + 1;
                                $id = $Coupan->id;
    
                                if($Coupan->used_by == "") {
                                    $User_ID = $User_ID;
                                } else {
                                   $User_ID = SQLSafe($Coupan->used_by.','.$User_ID);
                                }
    
                                $sql ="UPDATE coupon SET used =? , used_by =? WHERE id =?";
                                $stmt= $bdd->prepare($sql);
                                $stmt->execute([$used, $User_ID, $id]);
    
                                $exp_Date = date('Y-m-d', strtotime($Today . " + " . $Coupan->time . " day"));
    
                                $sql2 ="UPDATE user_db SET active_subscription =? , subscription_type =?, time =?, amount =?, subscription_start =?, subscription_exp =? WHERE id =?";
                                $stmt2= $bdd->prepare($sql2);
                                $stmt2->execute([$Coupan->name, $Coupan->subscription_type, $Coupan->time, $Coupan->amount,$Today,$exp_Date, $C_User_ID]);
    
                                echo "Coupan Successfully Redeemed";
                            } else {
                                echo "User Already Have Subscription";
                            }
                        }
                        
                        
    
                    } else {
                        if($Coupan->max_use > $Coupan->used) {
                            $resultat10 = $bdd->query("SELECT * FROM user_db WHERE id = '" . $C_User_ID . "';");
                            $resultat10->setFetchMode(PDO::FETCH_OBJ);
                            if( $User_data = $resultat10->fetch() ) {
        
                                if($User_data->subscription_type == 0) {
    
                                    $used = $Coupan->used + 1;
                                    $id = $Coupan->id;
     
                                    if($Coupan->used_by == "") {
                                       $User_ID = $User_ID;
                                    } else {
                                       $User_ID = SQLSafe($Coupan->used_by.','.$User_ID);
                                    }
    
                                    $sql ="UPDATE coupon SET used =? , used_by =? WHERE id =?";
                                    $stmt= $bdd->prepare($sql);
                                    $stmt->execute([$used, $User_ID, $id]);
    
                                    $exp_Date = date('Y-m-d', strtotime($Today . " + " . $Coupan->time . " day"));
    
                                    $sql2 ="UPDATE user_db SET active_subscription =? , subscription_type =?, time =?, amount =?, subscription_start =?, subscription_exp =? WHERE id =?";
                                    $stmt2= $bdd->prepare($sql2);
                                    $stmt2->execute([$Coupan->name, $Coupan->subscription_type, $Coupan->time, $Coupan->amount,$Today,$exp_Date, $C_User_ID]);
    
                                    echo "Coupan Successfully Redeemed";
                                } else {
                                    echo "User Already Have Subscription";
                                }
                            }
    
                        } else {
                           echo "Coupan Used";
                        }
                    }
                } else if($diff->format('%R') == "-") {
                    $sql100 ="UPDATE coupon SET status =? WHERE id =?";
                    $stmt100= $bdd->prepare($sql100);
                    $stmt100->execute(['0', $Coupan->id]);
                    echo "Coupan Expired";
                }
                
            } else {
                echo "Coupan Expired";
            }

        } else {
            echo "invalid Coupan";
        }
    } else {
        echo "invalid Coupan";
    }
    
} else {
    header("HTTP/1.1 401 Unauthorized");
}

?>