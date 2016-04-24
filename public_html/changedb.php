<?php

session_start();
require ('../resources/conf.php');

$username = $_SESSION['username'];
$dbchange = $_GET['database'];
if(isset($username)) {

    $_SESSION['db'] = $dbchange;
    echo "success";

}

?>