<?php

require '../db/config.php';

$Mail = $_GET['mail'];

$appurl = $_GET['appurl'];

$d=strtotime("now");

$Current_DT =  date("Y-m-d h:i:s", $d);

$Current_DT_encoded = base64_encode($Current_DT);





$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $bdd->prepare("SELECT * FROM user_db WHERE email=?");

               $stmt->execute([$Mail]); 

               if($stmt->fetchColumn() == "") {



                echo "Email Not Registered";



               } else {





                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // set the PDO error mode to exception

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

                $sql = "INSERT INTO mail_token_details (token, mail, type)

                                            VALUES ('$Current_DT_encoded', '$Mail', 'Password Reset')";

                // use exec() because no results are returned

                $conn->exec($sql);

                if($conn->lastInsertId() == "") {

                    echo "Something Went Wrong!";

                } else {

                    header("Location: reset_password_mail.php?token=$Current_DT_encoded&mail=$Mail&appurl=$appurl");

                }





               }







?>