<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: ../LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

<link rel="stylesheet" type = "text/css" href = "../gradestyle.css">
<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />

<?php
	include("topbar.php");
?>	

<a href="../dash.php">Back to Dashboard</a>
<br>
<br>
<div style="text-align: center;">
Main Page
<br>
<br>

<a class="collapse-item" href="registration.php">Create new admin account</a>
<br>
<a class="collapse-item" href="edit.php">Edit or delete existing login (all)</a>
<br>
</div>

		
		
