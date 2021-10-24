<?php




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Body_Json =  file_get_contents('php://input');
    $Json_data = $obj = json_decode($Body_Json);

    $host = $Json_data->Database_Host;
    $dbuser = $Json_data->Database_User;
    $dbpassword = $Json_data->Password;
    $dbname = $Json_data->Database_Name;

    $first_name     = $Json_data->First_Name;
    $last_name      = $Json_data->Last_Name;
    $admin_name     = $first_name.' '.$last_name;
    $email          = $Json_data->Email;
    $login_password = $Json_data->panel_Password;
}


try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db_file_path = "../db/config.php";
  $db_file = file_get_contents($db_file_path);
  $is_installed = strpos($db_file, "enter_hostname");

  $db_file_path2 = "../db/database.php";
  $db_file2 = file_get_contents($db_file_path2);
  $is_installed2 = strpos($db_file2, "enter_hostname");

  if (!$is_installed && !$is_installed2) {
      echo ("Seems this app is already installed! You can't reinstall it again.");
      exit();
  }

    //check for valid database connection
    $mysqli = @new mysqli($host, $dbuser, $dbpassword, $dbname);
    if (mysqli_connect_errno()) {
        echo ($mysqli->connect_error);
        exit();
    }

    //all input seems to be ok. check required fiels
    if (!is_file('Dooo.sql')) {
      echo ("The database.sql file could not found in install folder!");
      exit();
    }


    $db_file = str_replace('enter_hostname', $host, $db_file);
    $db_file = str_replace('enter_db_username', $dbuser, $db_file);
    $db_file = str_replace('enter_db_password', $dbpassword, $db_file);
    $db_file = str_replace('enter_database_name', $dbname, $db_file);
    file_put_contents($db_file_path, $db_file);


    $db_file2 = str_replace('enter_hostname', $host, $db_file2);
    $db_file2 = str_replace('enter_db_username', $dbuser, $db_file2);
    $db_file2 = str_replace('enter_db_password', $dbpassword, $db_file2);
    $db_file2 = str_replace('enter_database_name', $dbname, $db_file2);
    file_put_contents($db_file_path2, $db_file2);


    $sql = file_get_contents("Dooo.sql");
    $sql = str_replace('first_user_full_name', $admin_name, $sql);
    $sql = str_replace('first_user_email', $email, $sql);
    $sql = str_replace('first_user_password', md5($login_password), $sql);

    $deafult_api_key = generateRandomString();
    $sql = str_replace('deafult_api_key', $deafult_api_key, $sql);

    $mysqli->multi_query($sql);
    do {
  
    } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli));


    $mysqli->close();


  echo "Installed Successfully";
} catch(PDOException $e) {
  echo "Connection failed";
}

function generateRandomString($length = 16) {
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>