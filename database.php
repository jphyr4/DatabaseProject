<?php

$servername = "sql302.epizy.com";
$dbusername = "epiz_21511673";
$dbpassword = "X7qturBrWyk3";
$dbname = "epiz_21511673_3380";

// Create connection
$database = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}
?>
