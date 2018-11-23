<?php include 'authenticate.php'?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NorthernArmouries *POST*</title>
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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="">Register</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </nav>

        </div>

        <div id="header">
            <h1><a href="index.php">NorthernArmouries *POST*</a></h1>
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
                    <legend>New Gear Posting</legend>
                    <p>
                        <label for="title">Title</label>
                        <input name="title" id="title" />
                    </p>
<!--                    <p>-->
<!--                        <label for="manufacture">Manufacturer</label>-->
<!--                        <input name="manufacture" id="manufacture" />-->
<!--                    </p>-->
                    <p>
                    <label for="manufacture">Manufacturer</label>
                    <input list="manufacture" name="manufacture">
                    <datalist id="manufacture">
                        <option value="Internet Explorer">
                        <option value="Firefox">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </datalist>
                    </p>
<!--                    <p>-->
<!--                        <label for="platform">Platform</label>-->
<!--                        <input name="platform" id="platform" />-->
<!--                    </p>-->
                    <p>
                    <label for="platform">Platform</label>
                    <input list="platform" name="platform">
                    <datalist id="platform">
                        <option value="Internet Explorer">
                        <option value="Firefox">
                        <option value="Chrome">
                        <option value="Opera">
                        <option value="Safari">
                    </datalist>
                    </p>
<!--                    <p>-->
<!--                        <label for="gearCondition">Condition</label>-->
<!--                        <input name="gearCondition" id="gearCondition" />-->
<!--                    </p>-->
                    <p>
                        <label for="gearCondition">Condition</label>
                        <input list="gearCondition" name="gearCondition">
                        <datalist id="gearCondition">
                            <option value="Internet Explorer">
                            <option value="Firefox">
                            <option value="Chrome">
                            <option value="Opera">
                            <option value="Safari">
                        </datalist>
                    </p>

                    <p>
                        <label for="price">Pricing</label>
                        <input name="price" id="price" />
                    </p>

                    <p>
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment"></textarea>
                    </p>

                    <p>
                        <input type="submit" name="create" value="Create" />
                    </p>
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