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
Lists and Documentations


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action = "dexupload2.php" method="POST" enctype="multipart/form-data">
<!-- <input type = "file" name = "file"> -->

<!-- <input type = "text" name = "folder" autocomplete="off"> -->

<!-- <button type="submit" name = "submit"> UPLOAD </button> -->
</form>

<?php
	if (isset($_GET['editz'])) {
	$username = $_GET['editz'];
	$edit_state = true;
	}	
?>

<form action = "listsanddocumentations2.php" method="POST" enctype="multipart/form-data"> 
<input type = "file" name = "file">
		<!-- <label>Username</label> -->
		<!-- <input type = "text" name = "username" value = "<?php echo $username; ?>" readonly> -->
		<button type="submit" name = "submit"> UPLOAD </button>

</form>

</body>
</html>

<?php

//$path = ".";
//$path = "Dexer/Admin/";
$path = "../lists/";
$dir = opendir($path) or die ("Folder does not exist");



while($file = readdir($dir))
{
	
	if ($file == "." or $file == ".." or $file == "index.php" or $file == "del.png" or $file == "create.php" or $file == "delete.php") 
		
	continue;	
	//echo "<a href='Dexer/Admin/$file'>$file</a><a href='delete.php?dir=$file'><img src='delete.png'></a><br>";
	//echo "<a href='$username/Admin/$file'>$file</a><a href='delete.php?dir=$file'><img src='delete.png'></a><br>";
	echo "<a href='../lists/$file'>$file</a><a href='listsanddocumentationsdelete.php?dir=$file'><img src='delete.png'></a><br>";
}
closedir($dir);


?>