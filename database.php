<?php

$servername = "sql302.epizy.com";
$username = "epiz_21511673";
$password = "caseythedog97";
$dbname = "epiz_21511673_3380";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "<h1>Connected successfully</h1>";


$mysqli->close();
?>
