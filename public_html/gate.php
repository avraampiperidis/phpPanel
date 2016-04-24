
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../resources/jquery.min.js"></script>
</head>


<body>
<script src="../resources/bootstrap/js/bootstrap.min.js"></script>
<?php

require ("../resources/conf.php");
require ("../resources/panel.php");

$username = $_POST["username"];
$password = $_POST["password"];

if(!isset($username) || !isset($password)) {
    ?>

     <div align="center">

         <form enctype="multipart/form-data" method="post">

             <div style="color:#0F7EEC"><h1>Gate</h1></div>

             <div>username</div>
             <input type="text" name="username" />

             <div>password</div>
             <input type="password" name="password"/>

             <div align="center">
                 <input type="submit" name="submit" value="login"/>
             </div>

         </form>

     </div>

    <?php
} else {

    if($username == $paneluser && sha1($password) == $panelpasswd) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: panel.php");

    } else {
        unset($username);
        unset($password);
        header("Location: gate.php");
    }



}

?>



</body>


</html>



