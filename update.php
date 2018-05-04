<?php
    if(!session_start()){
        header("Location: error.php");
        exit;
    }

	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}

    require_once("database.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header("Location: index.php");
    } else if  ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //TODO sanitize these
        $ID = $_REQUEST['ID'];
        $Name = $_REQUEST['Name'];
        $Breed = $_REQUEST['Breed'];
        $Age = $_REQUEST['Age'];


        $sql = "UPDATE Animals SET Name='" . $Name . "', Breed='" . $Breed . "', Age='" . $Age . "' WHERE ID='" . $ID . "'";
        $result = $database->query($sql);
        if(!$result){
            echo("Error updating entry: " . $database->error);
        }

        $html = file_get_contents("index.html");
        echo $html;
    }
