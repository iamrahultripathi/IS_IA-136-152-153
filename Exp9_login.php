<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username and $password) {
            $connection = mysqli_connect('localhost', 'root', '', 'isecurity');

            if($connection) {
                $select_query = "SELECT Name FROM `sign up` WHERE Email='$username' and Password='$password'";
                $result = mysqli_query($connection, $select_query);

                if(!$result) {
                    die("Query Failed" . mysqli_error());
                }
                else{
                    header('Location: Exp9_loggedin.php');
                }
            }

            else {
                die("Database Connection Failed");
            }
        }

        else {
            echo "Please fill each field!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Exp9_login.css">
    <title>Login</title>
</head>
<body>
    <div class = "pagetag">
        Login
    </div>
    <section class = "loginform">
        <form action = "Exp9_login.php" method = "post">
            <div class = "formelements">
                <label for = "username">Username:</label>
                <input id = "username" type = "text" name = 'username'>
            </div>
            <div class = "formelements">
                <label for = "password">Password:</label>
                <input id = "password" type = "password" name = 'password'>
            </div>
            <div class = "button button1">
                <button type = "submit" name = 'submit' value = "Login">Login</button>
            </div>
            <div class = "button button2">
                <button type = "submit" value = "Don't have an account"><a href = "Exp9_signup.php">Don't have an account</a></button>
            </div>
        </form>
    </section>
</body>
</html>