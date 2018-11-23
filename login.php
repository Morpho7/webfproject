<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NorthernArmouries</title>
    <link rel="stylesheet" type="text/css" href="webstyle.css">

</head>
<body>
<div id="container">

    <div id="topnavigate">

        <!-- <input type="text" name="username">
        <input type="text" name="userpassword">
        <button type="button">Login</button> -->

        <nav>
            <ul>
                <li><a href="">Login</a></li>
                <li><a href="">Register</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>
        </nav>

    </div>

    <div id="header">
        <h1><a href="index.php">NorthernArmouries</a></h1>
    </div>

    <div id="userlogin">
        <div>
            <form action="process.php" method="post">
                <h3>Login Existing User</h3>
                <label for="username">Login:</label>
                <input list="username" name="username">

                <label for="password">Password:</label>
                <input list="password" name="password">
            </form>

            <p>
                <input type="submit" name="loginuser" value="Login" />
            </p>

        </div>

        <div>
            <form action="process.php" method="post">
                <h3>Register New User</h3>

                <div>
                <label for="newusername">New Username:</label>
                <input list="newusername" name="newusername">
                </div>

                <div>
                <label for="newpassword">New Password:</label>
                <input list="newpassword" name="newpassword">
                </div>

                <div>
                <label for="retypepassword">Re-Type Password:</label>
                <input list="retypepassword" name="retypepassword">
                </div>

                <p>
                    <input type="submit" name="createnewuser" value="Create User" />
                </p>

            </form>
        </div>
    </div>



</div>
