<?php
 require '../../../db/config.php';
 require_once('../../../db/database.php');
 $conn = Database::getInstance($_SERVER['HTTP_X_API_KEY']);

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'movies';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 2 ),
    array( 'db' => 'poster', 'dt' => 3 ),
    array( 'db' => 'name',  'dt' => 4 ),
    array( 'db' => 'description',   'dt' => 5 ),
    array( 'db' => 'status',   'dt' => 6 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => "$username",
    'pass' => "$password",
    'db'   => "$dbname",
    'host' => "$servername"
);
 
$order = "ORDER BY id DESC";

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
if($conn != null) {
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $order )
    );
} else {
    header("HTTP/1.1 401 Unauthorized");
}