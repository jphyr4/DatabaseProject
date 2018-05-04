<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header("Location: index.php");
    } else if  ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //TODO sanitize these
        $ID = $_REQUEST['ID'];
        $Name = $_REQUEST['Name'];
        $Breed = $_REQUEST['Breed'];
        $Age = $_REQUEST['Age'];


        $html = file_get_contents("update.html");
        $html = str_replace("{ID}", $ID, $html);
        $html = str_replace("{Name}", $Name, $html);
        $html = str_replace("{Breed}", $Breed, $html);
        $html = str_replace("{Age}", $Age, $html);
        echo $html;
    }
?>
