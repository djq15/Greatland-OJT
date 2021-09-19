<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1" && $_SESSION['tag'] !="3") {
	session_start();session_destroy();die( header( 'location: LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

<?php 
	include_once("web-page-parts/header.php");
	include_once("web-page-parts/sidebar.php");
	include_once("web-page-parts/topbar.php");
?>
<?php /* if ($_SESSION['tag'] =="1"){
echo "<a href='dexuploadcheck.php?editz=".$_GET['editz']."'>Back</a>";
}
else if ($_SESSION['tag'] =="3"){
echo "<a href='clearanceactivation3.php'>Back</a>";

}*/
?>

<?php 
	$user_id = $_GET['edit'];
?>
<a href="bookprofile.php?edit=<?php echo $user_id; ?>">Back</a>
<br>
<br>

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
	if (isset($_GET['edit'])) {
	$bookcode = $_GET['edit'];
	//$rec = mysqli_query($db, "SELECT * FROM greatland_db.login, greatland_db.masterlist WHERE Student_No='$Student_No' and user_id=Student_No and tag='2'");	
	$rec = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code ='$bookcode'");	
	$record = mysqli_fetch_array($rec);
	$username = $record['username']; 
	$lastname = $record['Last_name']; 
	$studentno = $record['Student_No']; 
	$firstname = $record['First_name']; 
	
	$edit_state = true;
	$path = "uploads/dex/".$lastname."-".$firstname."-".$studentno;
	}	
?>

<form action = "libraryupload2.php" method="POST" enctype="multipart/form-data"> 
<input type = "file" name = "file">
		<label>Username</label>
		<input type = "text" name = "bookcode" value = "<?php echo $bookcode; ?>" readonly>
		<input type = "hidden" name = "path" value = "<?php echo $path; ?>" readonly>
		<input type = "hidden" name = "studentno" value = "<?php echo $studentno; ?>" readonly>
		<button type="submit" name = "submit"> UPLOAD </button>

</form>

</body>
</html>

<?php

//$path = "uploads/dex/".$username."/Admin/Registrar/";
//$path = "uploads/dex/".$lastname."-".$firstname."-".$studentno;
//$path = "uploads/dex/".$studentno;
$path = "uploadslibrary/".$bookcode."/files";
$dir = opendir($path) or die ("Folder does not exist");

while($file = readdir($dir))
{
	
	if ($file == "." or $file == ".." or $file == "index.php" or $file == "del.png" or $file == "create.php" or $file == "delete.php") 
		
	continue;	
	//echo "<a href='Dexer/Admin/$file'>$file</a><a href='delete.php?dir=$file'><img src='delete.png'></a><br>";
	//echo "<a href='$username/Admin/$file'>$file</a><a href='delete.php?dir=$file'><img src='delete.png'></a><br>";
	//echo "<a href='uploads/dex/$username/Admin/Registrar/$file'>$file</a><a href='delete.php?dir=$file&username=$username'><img src='delete.png'></a><br>";
	//echo "<a href='uploads/dex/$lastname-$firstname-$studentno/$file'>$file</a><a href='delete.php?dir=$file&path=$path&studentno=$studentno'><img src='delete.png'></a><br>";
	echo "<a href='uploadslibrary/$bookcode/files/$file'>$file</a><a href='librarydelete.php?dir=$file&path=$path&bookcode=$bookcode'><img src='delete.png'></a><br>";

}
closedir($dir);


?>


<?php
	include_once("web-page-parts/footer.php");
?>