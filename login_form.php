<!DOCTYPE html>

<html>
<head>
	<title>Database Login</title>
	<script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
</head>
<body>
    <div>
        <h1>Login</h1>
<!--        if error php to send to widget   -->
        <?php
            if ($error) {
                print "<div>$error</div>\n";
            }
        ?>


        <form action="login.php" method="POST">

            <input type="hidden" name="action" value="do_login">

            <div>
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" autofocus value="<?php print $username; ?>">
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <input type="submit" value="Submit">
            </div>
            <div>
                <a href="addUser.php">Create an account</a>
            </div>
        </form>
    </div>
</body>
</html>
