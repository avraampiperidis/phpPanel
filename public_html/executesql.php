
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="javascript/js.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/styles.css"/>

</head>
<body>

<script src="../resources/bootstrap/js/bootstrap.min.js"></script>

<input type="button" value="go back" onclick="goback()" />
<br>

<?php

require ("../resources/conf.php");

session_start();

$username = $_SESSION["username"];

$query = $_GET["query"];

if(isset($username)) {


    $db = mysqli_connect($host, $db_user, $passwd, $db);

    if (mysqli_connect_errno()) {
        echo "error could not connect" . mysqli_connect_error();
    }

    $result = $db->query($query);

    echo '<div class="table-responsive">';
    echo "<table border='1' style='width:100%' class='table'>";



    if($result->num_rows > 0) {

        while($row = $result->fetch_assoc() ) {

            echo "<tr>";
            foreach($row as $key => $value) {
                echo "<td>" . $key ." = ".$value . "</td> \n";
            }
            echo "</tr>";

        }



    }


    echo "</table>";
    echo "</div>";


} else {
    header("Location: gate.php");
}

?>

</body>
</html>



