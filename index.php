<?php include 'functions.php'; ?>


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
					<li><a href="login.php">Login</a></li>
					<li><a href="">Register</a></li>
					<li><a href="">Contact Us</a></li>
				</ul>
			</nav>

		</div>

        <div id="header">
            <h1><a href="index.php">NorthernArmouries</a></h1>
        </div>

		<div id="mainnavigate">
			<nav>
				<ul>
					<li><a href="index.php">Main</a></li>
					<li><a href="">Gallery</a></li>
					<li><a href="">Profile</a></li>
                    <li><a href="create.php">Create Post</a></li>
				</ul>
			</nav>
		</div>

        <div id="searchbar">
            <form>

            </form>
        </div>

        <div id="sorting">
            <form method="get">
            <input type="hidden" name="sort" value="titledown">
            <button formaction="index.php">Alpha Sort DESC</button>
            </form>

            <form method="get">
            <input type="hidden" name="sort" value="titleup">
            <button formaction="index.php">Alpha Sort ASC</button>
            </form>

            <form method="get">
            <input type="hidden" name="sort" value="datedown">
            <button formaction="index.php">Date Sort DSC</button>
            </form>

            <form method="get">
            <input type="hidden" name="sort" value="dateup">
            <button formaction="index.php">Date Sort ASC</button>
            </form>
        </div>

        <div id="content">
            <p>all posts here</p>
            <?= $currentSort ?>
            <?php getAllData(); ?>

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