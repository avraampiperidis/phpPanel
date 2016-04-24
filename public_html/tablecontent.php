
<html>
<head>

    <script src="javascript/js.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/styles.css"/>

</head>
<body>

<input type="button" value="go back" onclick="goback()" />
<br>

<?php

require ("../resources/conf.php");

session_start();

$username = $_SESSION["username"];

$table = $_GET["table"];

if(isset($username)) {


    $db = mysqli_connect($host, $db_user, $passwd, $db);

    if (mysqli_connect_errno()) {
        echo "error could not connect" . mysqli_connect_error();
    }

    $result = $db->query("select * from " . $table);

    $info = $db->query("show columns from " . $table);

    echo "<table border='1' style='width:100%'>";

    $cols = array();

    if ($info->num_rows > 0) {
        echo "<tr>";
        while ($row = mysqli_fetch_assoc($info)) {
            echo "<th>". $row["Field"]."</th> \n";
            $cols[] = $row["Field"];
        }
        echo "</tr>";
    }



    if($result->num_rows > 0) {


        while($row = $result->fetch_assoc() ) {

            echo "<tr>";
            for($i =0; $i < count($cols); $i++) {
                echo "<td>" . $row[ $cols[$i]] . "</td> \n";
            }
            echo "</tr>";

        }



    }


    echo "</table>";


} else {
    header("Location: gate.php");
}

?>

</body>
</html>



