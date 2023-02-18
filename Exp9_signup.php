<?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($name and $contactno and $email and $password) {
            $connection = mysqli_connect('localhost', 'root', '', 'isecurity');

            if($connection) {
                $select_query = "SELECT Name FROM `sign up` WHERE Email='$email'";
                $result = mysqli_query($connection, $select_query);

                if(mysqli_num_rows($result) == 0) {
                    $insert_query = "INSERT INTO `sign up` VALUES ('$name', $contactno, '$email', '$password')";
                    $result = mysqli_query($connection, $insert_query);

                    if(!$result) {
                        die("Query Failed" . mysqli_error());
                    }

                    else {
                        header("Location: Exp9_login.php");
                    }
                }

                else {
                    echo "<p style = 'font-style: normal; font-weight: 400;
                    font-size: 2.330vw;
                    line-height: 2.879vw;
                    color: #022546;'>Email already exists!</p>";
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
    <link rel="stylesheet" href="Exp9_signup.css">
    <title>Signup</title>
</head>
<body>
    <div class = "pagetag">
        Sign Up
    </div>
    <section class = "loginform">
        <form action = "Exp9_signup.php" method = "post" enctype="application/x-www-form-urlencoded">
            <div class = "formelements">
                <label for = "name">Name:</label>
                <input id = "name" type = "text" name = 'name'>
            </div>
            <div class = "formelements">
                <label for = "contactno">Contact No:</label>
                <input id = "contactno" type="contactno" name = 'contactno'>
            </div>
            <div class = "formelements">
                <label for = "email">Email:</label>
                <input id = "email" type="email" name = 'email'>
            </div>
            <div class = "formelements">
                <label for="password">Password:</label>
                <input id="password" type="password" name = 'password'>
            </div>
            <div class = "button button1">
                <button type = "submit" name = 'submit' value = "Signup">Sign Up</button>
            </div>
            <div class = "button button2">
                <button type = "submit" value = "Already have an account"><a href = "Exp9_login.php">Already have an account</a></button>
            </div>
        </form>
    </section>
</body>