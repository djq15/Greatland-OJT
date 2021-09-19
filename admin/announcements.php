<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: ../LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

<?php 
include("topbar.php");
?>

<a href="dashedit.php">Back</a>
<br>
<br>
Announcements
<br>
<br>

<a class="collapse-item" href="announcementspic.php">Upload Announcements Picture</a>
<br>
<a class="collapse-item" href="announcements1.php">Announcement 1</a>
<br>
<a class="collapse-item" href="announcements2.php">Announcement 2</a>
<br>
<a class="collapse-item" href="announcements3.php">Announcement 3</a>
<br>
<a class="collapse-item" href="announcements4.php">Announcement 4</a>
<br>
<a class="collapse-item" href="announcements5.php">Announcement 5</a>
<br>