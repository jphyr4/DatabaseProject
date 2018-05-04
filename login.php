<?php

    function checkHTTPS() {
        if(!empty($_SERVER['HTTPS']))
            if($_SERVER['HTTPS'] !== 'off')
                return true; //https
            else
                return false; //http
         else
            if($_SERVER['SERVER_PORT'] == 443)
                return true; //https
            else
                return false; //http
    }

    // HTTPS redirect
    if (!checkHTTPS) {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}

	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

	if ($loggedIn) {
		header("Location: index.php");
		exit;
	}


	$action = empty($_POST['action']) ? '' : $_POST['action'];

	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}

	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        // Connect to database
        require_once 'database.php';

        // Check for errors
        if ($database->connect_error) {
            $error = 'Error: ' . $database->connect_error . ' ' . $database->connect_error;
			require "login_form.php";
            exit;
        }

        $username = $database->real_escape_string($username);
        $password = $database->real_escape_string($password);
        //$password = sha1($password);

        // Build SQL query
		$query = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'";

		// send $query

                $mysqliResult = $database->query($query);



        if ($mysqliResult) {
            // How many records were returned?

            $match = $mysqliResult->num_rows;


            // Close the results
            $mysqliResult->close();
            // Close the DB connection
            $database->close();


            // If there was a match, login
  		    if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error = 'Error: Incorrect username or password';
                require "login_form.php";
                exit;
            }
        }
        // Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "login_form.php";
          exit;
        }
	}

	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
?>
