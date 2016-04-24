
<html>
<head>

</head>


<body>

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



