<?php

session_start();
require ("../resources/conf.php");

$username = $_SESSION["username"];

$table = $_GET['table'];

echo $table;

if(isset($username)) {

    $db = mysqli_connect($host,$db_user,$passwd,$db);

    if(mysqli_connect_errno()) {
        echo "error could not connect".mysqli_connect_error();
    }

    $result = $db->query("TRUNCATE TABLE ".$table);

}

?>