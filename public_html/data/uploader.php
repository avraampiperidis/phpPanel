<?php


class upload {
	
    function fileupload2() {

        session_start();

        $username = $_SESSION["username"];
        $file = $_FILES['uploadedfile'];

        if (isset($username) && isset($file)) {

            $target_path = "./";
            $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
            $ext = substr(strrchr($_FILES['uploadedfile']['name'], "."), 1);

            if($ext != 'sql') {
                echo "only sql file allowed to upload ";
            }
            else if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {

                chmod($target_path, 0755);
                echo "The file ".  basename( $_FILES['uploadedfile']['name']).
                    " has been uploaded";
            } else{
                echo "There was an error uploading the file, please try again!";
            }

         }

     }

}

$a = new upload();
$a->fileupload2();

?>