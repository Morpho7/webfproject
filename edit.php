<?php include 'functions.php'; ?>
<?php include 'authenticate.php'?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NorthernArmouries *EDIT*</title>
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
        <h1><a href="index.php">NorthernArmouries *EDIT*</a></h1>
    </div>

    <div id="mainnavigate">
        <nav>
            <ul>
                <li><a href="index.php">Main</a></li>
                <li><a href="">Gallery</a></li>
                <li><a href="">Profile</a></li>
            </ul>
        </nav>
    </div>

    <div id="content">
        <form action="process.php" method="post">

            <fieldset>
                <legend>Edit Gear Post</legend>
                <?php getDataEdit($_GET['edit']);?>
            </fieldset>

        </form>
    </div>

    <footer>
        <nav>
            <ul>
                <li><a href="">Top</a></li>
                <li><a href="">Main</a></li>
                <li><a href="">Gallery</a></li>
                <li><a href="">Profile</a></li>
            </ul>
        </nav>
    </footer>

</div>

</body>
</html>
