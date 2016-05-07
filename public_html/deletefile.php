<?php

session_start();

$username = $_SESSION["username"];
$file = $_GET["file"];
if(isset($username)) {

    unlink('data/'.$file);

    header("Location: panel.php");

}



?>