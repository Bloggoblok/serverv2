<?php

class Database {

    protected static $_dbh;
    const HOST = 'enter_hostname';
    const USERNAME = 'enter_db_username';
    const PASSWORD = 'enter_db_password';
    const DATABASE = 'enter_database_name';
    
    private function __construct() { }
    
    public static function getInstance($HTTP_X_API_KEY) {
        if(!isset($_dbh)) {
            #Connection String.
            self::$_dbh = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE,self::USERNAME,self::PASSWORD);
            self::$_dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        $stmt = self::$_dbh->prepare("SELECT * FROM config WHERE id = 1 AND api_key = '$HTTP_X_API_KEY'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if( $row) {
            return self::$_dbh;
        } else {
            return null;
        }
        
    }
}

?>