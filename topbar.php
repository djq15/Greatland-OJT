<?php
	include("filter.php");

	session_start();
	echo "User: "; echo $_SESSION['User'];
	echo '<br>';
	echo '<a  href="injection/logout.php?logout">Logout</a>';
	echo '<br>';
?>	



		