<?php
//prompt for a username and password to create a post.
	define('ADMIN_LOGIN','Salad_Snake');
	define('ADMIN_PASSWORD','snakeeater');

	if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
			|| ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN)|| ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) 
	{
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Our Blog"');
		exit("Access Denied: Username and password required.");
	}
	else
	    {
	        $_SESSION['successlog'] = true;
        }
?>