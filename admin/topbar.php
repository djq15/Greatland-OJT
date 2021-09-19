<?php
	include("filter.php");

	session_start();
	echo "User: "; echo $_SESSION['User'];
	echo '<br>';
	echo '<a  href="logout.php?logout">Logout</a>';
	echo '<br>';
?>	



		