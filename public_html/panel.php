
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="../resources/jquery.min.js"></script>
    <script src="javascript/js.js"></script>

</head>

<body>
<script src="../resources/bootstrap/js/bootstrap.min.js"></script>

<?php

session_start();
$username = $_SESSION["username"];
if(isset($username)) {
    require ("../resources/conf.php");

?>


    <h2>Welcome</h2>
    <input  type="button" value="logout" name="logout" onclick="logout()"/>
    <input type="button" value="import sql" name="importsql" onclick="importsqlpage()  "/>
    <?php

    $db = mysqli_connect($host,$db_user,$passwd,$db);
    if(mysqli_connect_errno()) {
        echo "error could not connect".mysqli_connect_error();
    }

    $result = $db->query("show databases");

    if($result->num_rows > 0) {
        echo 'select database '.'<select id="dbselect" onchange="changeDatabase()">';
        echo '<option value=""  style="display:none;">DB</option>';
        while($row = mysqli_fetch_array($result)) {
            echo  '<option value="'.$row[0].'" >'.$row[0].'</option>';
        }
        echo "</select>";
    }

    ?>
    <br>
    <br>

<?php


    $result = $db->query("show tables");

    while($table = mysqli_fetch_array($result)) {
        $numrows = $db->query('select *  FROM '.$table[0]);
        echo $table[0]. "(". mysqli_num_rows($numrows) .")" ."<input style='margin:5px;' type='button' value='show' onClick='showtablecontent(".'"'.$table[0].'"'.")' />" .
            "<input style='margin:5px;' type='button' value='exportSql' onClick='exportsql(".'"'.$table[0].'"'.")' />".
            /*
            "<input style='margin:5px;' type='button' value='truncate' onClick='truncate(".'"'.$table[0].'"'.")' />".
            */
            "<br>";
    }


} else {
    header("Location: gate.php");
}



?>


</body>


</html>

