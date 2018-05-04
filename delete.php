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

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        echo file_get_contents("../html/index.html");
    }else if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_REQUEST['ID'];

        $animals = array();

        $sql = "DELETE FROM Animals WHERE ID='" . $id . "'";

        $result = $database->query($sql);

        if(!result){
            echo("Error deleting animal with ID " . $id . ": " . $db->error);
        }
        else {
        	$message = "<p>Deleted animal " . $id . " from database</p></body>";
        	$html = file_get_contents("index.html");
        	$html = str_replace("</body>", $message, $html);
        	echo $html;
        }
    }
