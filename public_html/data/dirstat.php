<?php

function dirstat() {
    $dir    = './';
    $files1 = scandir($dir);
    $lenght = count($files1);

    for( $i =2; $i < $lenght ; $i++) {


        if (strpos($files1[$i],'.sql')) {
            echo '<pre><p class="button-link" ><a href="',$files1[$i],'" > ';
            print_r($files1[$i]);

          echo " ";
          echo " ";
          echo " ";
        }

      }
}

function dirstat2() {

    $dir    = './';
    $files1 = scandir($dir);
    $lenght = count($files1);

    for( $i =2; $i < $lenght ; $i++) {

            if (strpos($files1[$i],'.sql')) {
             echo '<pre><p class="button-link2" >';
             echo " ";
            echo '<font color="blue"> <b  > import sql file</b> </font>';
            echo '    <a  href="','../importsql.php?file='.$files1[$i],'">'.$files1[$i].' ';
            echo '</a> </p></pre>';
        }

     }

}


function dirstat3() {


    $dir    = './';
    $files1 = scandir($dir);
    $lenght = count($files1);

    for( $i =2; $i < $lenght ; $i++) {

        if (strpos($files1[$i],'.sql')) {
            echo '<pre><p class="button-link2" >';
            echo " ";
            echo '<font color="blue"> <b  > delete sql file</b> </font>';
            echo '    <a  href="','../deletefile.php?file='.$files1[$i],'">'.$files1[$i].' ';
            echo '</a> </p></pre>';
        }

    }


}

?>