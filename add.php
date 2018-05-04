<?php
if(!session_start()) {
  // If the session couldn't start, present an error
  header("Location: error.php");
  exit;
}

// Check to see if the user has already logged in
$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];


$action = empty($_POST['action']) ? '' : $_POST['action'];

if ($action == 'do_create') {
  create_animal();
} else {
  create_animal_form();
}


function create_animal() {
  $Name = empty($_POST['Name']) ? '' : $_POST['Name'];
  $Breed = empty($_POST['Breed']) ? '' : $_POST['Breed'];
  $Age = empty($_POST['Age']) ? '' : $_POST['Age'];
  $username = $_SESSION['loggedin'];

          require_once 'database.php';

          // Check for errors
          if ($database->connect_error) {
              $error = 'Error: ' . $database->connect_errno . ' ' . $database->connect_error;
        require "login_form.php";
              exit;
          }

        $query = "SELECT ID FROM Users WHERE Username = '$username';";
        $User_ID = $database->query($query);

        while ($row = $User_ID->fetch_assoc()) {
            $id = $row["ID"];
        }
          // Build query
          $query = "INSERT INTO Animals(Name, Breed, Age, User_Id) VALUES ('$Name', '$Breed', '$Age', '$id');";

          // If there was a result...
          if ($database->query($query)==TRUE) {

              $database->close();

              $error = "New Animal Added Successfully";
              require "index.php";
              exit;
          }

          else{
              $error = "Insert Error: " . $query . "<br>" . $database->error;
              require "addForm.php";
              exit;
          }
      }


function create_animal_form() {
  $username = "";
  $error = "";
  require "addForm.html";
      exit;
}
?>
