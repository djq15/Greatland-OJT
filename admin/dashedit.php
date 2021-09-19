<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: ../LogIn.php?Empty= Action Denied. Log in again' ) );}
?>


<?php
	include("topbar.php");
?>	

<a href="../dash.php">Back to the dashboard</a>
<br>
<br>
Edit which part of the dashboard?
<br>
<br>


<a class="collapse-item" href="announcements.php">Announcements</a>
<br>
<a class="collapse-item" href="featuredvideo.php">Featured Video</a>
<br>
<a class="collapse-item" href="listsanddocumentations.php">Lists and documentations</a>
<br>
<a class="collapse-item" href="featuredpics.php">Featured Pics</a>
		
		
