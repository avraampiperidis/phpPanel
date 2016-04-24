
<html>
<head>
    <script src="../resources/jquery.min.js"></script>
    <script src="javascript/js.js"></script>

</head>

<body>

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
        echo $table[0]. "(". mysqli_num_rows($numrows) .")" ."<input type='button' value='show' onClick='showtablecontent(".'"'.$table[0].'"'.")' />" . "<input type='button' value='truncate' onClick='truncate(".'"'.$table[0].'"'.")' />". "<br>";
    }


} else {
    header("Location: gate.php");
}



?>


</body>


</html>

