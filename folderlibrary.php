<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

<?php 
	//include_once("../../web-page-parts/header.php");
	//include_once("../../web-page-parts/sidebar.php");
	//include_once("../../web-page-parts/topbar.php");
	
	
	//session_start();
	$db = mysqli_connect('localhost', 'root', 'ieti19', 'greatland_db');
	


	include_once("web-page-parts/header.php");
	include_once("web-page-parts/sidebar.php");
	include_once("web-page-parts/topbar.php");
	
	
	//$Dir = "uploads/dex/".$_POST["lastname"]."/Student/Registrar";
	//$Dir = "uploads/dex/".$_POST["lastname"]."/".$firstname;

	//$announcement = $_POST["lastname"];

?>
<a href="librarymanage.php">Back</a>
<br>
<br>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
	if (isset($_GET['editzz'])) {
	$bookcode = $_GET['editzz'];
	$edit_state = true;
	//$res = mysqli_query($db, "SELECT * FROM greatland_db.login, greatland_db.masterlist WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
	$res = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code = '$bookcode'");
	$results = mysqli_fetch_array($res);
	$firstname = $results['First_name'];
	$lastname = $results['Last_name'];
	}	
	
	//$Dir = "uploads/dex/".$_POST["lastname"]."/".$firstname;
	//$Dir = "uploads/dex/".$_POST["lastname"]."-".$firstname;
	//$Dir = "uploads/dex/".$studentno."-".$_POST["lastname"]."-".$firstname;
	//$Dir = "uploads/dex/".$_POST["lastname"]."-".$firstname."-".$studentno;
	$Dir = "uploadslibrary/".$bookcode;
	$Dirz = "uploadslibrary/".$bookcode."/files";
	$Dirx = "uploadslibrary/".$bookcode."/pic";
	
	//$announcement = $_POST["lastname"];
	$announcement = $firstname;
	
?>
<form action="" method="POST">
<input type = "text" name = "bookcode" value = "<?php echo $bookcode; ?>" readonly>
<button name="button" > Create Folder </button>
<?php
if ($results['existing_folder'] == "Y") {

echo '<button name="del"> Delete </button>';

}

?>
</form>

<?php

//$Dir = "someDirectory";
//$Dir = $_POST["username"];
//echo $results['existing_folder'];

if (isset($_POST["button"])) {
//mkdir("someFolder");
//mkdir("someFolder/nestedFolder", 0777, true); -- use this if you need to have "subfolders" inside a folder
if (!file_exists($Dir)) {

//mkdir($_POST["username"]."/Student", 0777, true); 
//mkdir($Dir, 0777, true);
mkdir($Dir, 0777, true);
mkdir($Dirz, 0777, true);
mkdir($Dirx, 0777, true);

//$res = mysqli_query($db, "Update greatland_db.login, greatland_db.masterlist  SET existing_folder = 'Y' WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
$res = mysqli_query($db, "Update greatland_db.library SET existing_folder = 'Y' WHERE book_code = '$bookcode'");


echo "Folders created";
}
else {
	//$res = mysqli_query($db, "Update greatland_db.login, greatland_db.masterlist  SET existing_folder = 'Y' WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
	$res = mysqli_query($db, "Update greatland_db.library SET existing_folder = 'Y' WHERE book_code = '$bookcode'");
	echo "The directories for $announcement already exist.";
}

}

if (isset($_POST["del"])) {
?>
<form action="" method="POST">
Warning: This will delete the user folder and all its contents.
<br>
Are you sure?
<button name="yes"> Yes </button>
<button name="no"> No </button>
</form>
<?php
}
if (isset($_POST["yes"])) {

//rmdir($Dir);
//rmdir($Dirz);
//rmdir($Del);
//$Del = "uploads/dex/".$lastname."-".$firstname;
//$Del = "uploads/dex/".$studentno."-".$lastname."-".$firstname;
//$Del = "uploads/dex/".$lastname."-".$firstname."-".$studentno;
$Del = "uploadslibrary/".$bookcode;

function removeFolder($folder) {

	
         if (is_dir($folder) === true) {
			 
			 $folderContents = scandir($folder);
			 unset($folderContents[0], $folderContents[1]);
			 
			 foreach($folderContents as $content=>$contentName) {
				 $currentPath = $folder.'/'.$contentName;

				
				 $filetype = filetype($currentPath);
				 if ($filetype == 'dir') {
					 removeFolder($currentPath);
				 }
				 else {
					 unlink($currentPath);
				 }
				 unset($folderContents[$content]);
			 }
			 rmdir($folder);
			
		 }
		 

}

removeFolder($Del); //this is the actual path 

//$res = mysqli_query($db, "Update greatland_db.login, greatland_db.masterlist SET existing_folder = 'N' WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
$res = mysqli_query($db, "Update greatland_db.library SET existing_folder = 'N' WHERE book_code = '$bookcode'");
echo "User folder deleted";

}

//}



?>

</body>
</html>

<?php
	//include_once("../../web-page-parts/footer.php");
	include_once("web-page-parts/footer.php");
?>