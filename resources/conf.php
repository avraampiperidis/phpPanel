<?php


session_start();

$changedb = $_SESSION['db'];

if(isset($changedb)) {
    $db_user = "dbuser";
    $passwd = "dbpassword";
    $host = "127.0.0.1";
    $db = $changedb;
} else {

    $db_user = "dbuser";
    $passwd = "dbpassword";
    $host = "127.0.0.1";
    //default is mysql database
    $db = "mysql";

}



?>
