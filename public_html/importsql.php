<?php



session_start();
require ("../resources/conf.php");

$username = $_SESSION["username"];
$file = $_GET["file"];
if(isset($username)) {


    $sqlContent = file_get_contents('data/'.$file);

    $db = mysqli_connect($host,$db_user,$passwd,$db);

    if(mysqli_connect_errno()) {
        echo "error could not connect".mysqli_connect_error();
    }

    mysqli_multi_query($db,$sqlContent);

    unlink('data/'.$file);

    header("Location: panel.php");

}



?>