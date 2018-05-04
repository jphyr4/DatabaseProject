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

    echo file_get_contents("index.html");
?>
