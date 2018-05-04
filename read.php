<?php
    require_once("database.php");

    if(!session_start()){
        header("Location: error.php");
        exit;
    }

    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];

	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        echo file_get_contents("read.html");
    }else if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $ID = empty($_POST['ID']) ? '' : $_POST['ID'];
        $Name = empty($_POST['Name']) ? '' : $_POST['Name'];
        $Breed = empty($_POST['Breed']) ? '' : $_POST['Breed'];
        $Age = empty($_POST['Age']) ? '' : $_POST['Age'];
        $Animals = array();

        $sql = "SELECT * FROM Animals WHERE Name LIKE '%" . $Name . "%' AND Breed LIKE '%" . $Breed . "%' AND Age LIKE '%" . $Age . "%'";

        $result = $database->query($sql);

        if(!result){
            echo("Error searching for songs: " . $database->error);
        } else{
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    array_push($Animals, $row);
                }
            }
            $result->close;
        }

        $table = "<br><br><table>\n";
        $table .= "<tr><th>ID</th><th>Name</th><th>Breed</th><th>Age</th><th>User_ID</th></tr>";

        foreach ($Animals as $Animal){

            $tableRow = file_get_contents("db.html");
            $ID = $Animal['ID'];
            $Name = $Animal['Name'];
            $Breed = $Animal['Breed'];
            $Age = $Animal['Age'];
            $User_ID = $Animal['User_Id'];

            $tableRow = str_replace("{ID}", $ID, $tableRow);
            $tableRow = str_replace("{Name}", $Name, $tableRow);
            $tableRow = str_replace("{Breed}", $Breed, $tableRow);
            $tableRow = str_replace("{Age}", $Age, $tableRow);
            $tableRow = str_replace("{User_ID}", $User_ID, $tableRow);

            $table .= $tableRow;
        }

        $table .= "</body>";
        $html = file_get_contents("index.html");
        $html = str_replace("</body>", $table, $html);
        echo $html;
    }
