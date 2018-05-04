<!DOCTYPE html>

<html>
<head>
	<title>Create User Account</title>

    <script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
</head>
<body>
    <div>
        <h1>Create New User</h1>

        <?php
            if ($error) {
                print "<div>$error</div>\n";
            }
        ?>

        <form action="addUser.php" method="POST">

            <input type="hidden" name="action" value="do_create">

            <div>
		<?php /*error flag for non-unique username*/ if($error_flag == 1){ echo "Username taken. Try again."; } ?>
                <label for="username">User name:</label>
                <input type="text" id="username" name="username">
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </div>

            <div>
                <input type="submit" value="Submit">
            </div>
        </form>

        <br>
        <a href="login_form.php">Log In</a>

    </div>
</body>
</html>
