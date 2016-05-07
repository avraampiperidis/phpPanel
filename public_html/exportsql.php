<?php


session_start();
require ("../resources/conf.php");

$username = $_SESSION["username"];
$table = $_GET["table"];
if(isset($username)) {

    $db = mysqli_connect($host,$db_user,$passwd,$db);

    if(mysqli_connect_errno()) {
        echo "error could not connect".mysqli_connect_error();
    }

    $file = './data/'.$table.'.sql';
    fopen($file,"w");

    //$result = mysqli_query($db,"SELECT * INTO OUTFILE '$file' FROM `$table`");

    //havent't tested yet
    exec("mysqldump --opt -h $host -u $db_user -p $passwd $db  > ".$file);

    //echo the sql url file back
    echo $file;

    //unlink('data/'.$file);

}



?>