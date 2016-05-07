<?php


session_start();
require ("../resources/conf.php");
include ("dumper.php");

$username = $_SESSION["username"];
$table = $_GET["table"];
if(isset($username)) {

    $dbc = mysqli_connect($host,$db_user,$passwd,$db);

    if(mysqli_connect_errno()) {
        echo "error could not connect".mysqli_connect_error();
    }

    $file = './data/'.$table.'.sql';
    fopen($file,"w");

    try {

        $countries_dumper = Shuttle_Dumper::create(array(
            'host' => $host,
            'username' => $db_user,
            'password' => $passwd,
            'db_name' => $db,
            'include_tables' => array($table),
        ));

        $countries_dumper->dump($file);

    } catch(Shuttle_Exception $ex) {
        echo "-1";
    }

    echo $file;

}



?>