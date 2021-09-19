<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1" && $_SESSION['tag'] !="3") {
	session_start();session_destroy();die( header( 'location: LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

<link rel="stylesheet" type = "text/css" href = "./gradestyle.css">
<link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />


<?php 
	$bookcode = $_GET['edit'];
	$db = mysqli_connect('localhost', 'root', 'ieti19', 'greatland_db');
	//$rec = mysqli_query($db, "SELECT * FROM greatland_db.login WHERE user_id='$user_id'");	 //hit
	$rec = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code='$bookcode'");	 //hit
	$record = mysqli_fetch_array($rec);
	$pic = $record['pic'];
	$username = $record['username'];
	
	//$lastname = $record['line2'];
	//$firstname = $record['line3'];
	//$middleinitial = $record['line4'];
	//$nickname = $record['line5'];
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<style>
	.form {
		text-align: center;
	}

	.back {
		text-align: left;
	}
</style>

<?php
	

	if (isset($_GET['editz'])) {
	$username = $_GET['editz'];
	$edit_state = true;
	}	
?>
<form action = "librarypic2.php" method="POST" enctype="multipart/form-data"> 
<a href="bookprofile.php?edit=<?php echo $bookcode; ?>">Back</a>

<br>
<br>
<input type = "file" name = "file">
		<!-- <label>Username</label> -->
		<input type = "text" name = "bookcode" value = "<?php echo $record['book_code']; ?>" readonly>
		<br>
		<br>
		<button type="submit" name = "submit"> Upload Picture</button>
		<input type = "hidden" name = "studentno" value = "<?php echo $record['Student_No']; ?>">
</form>

<form class="form" method = "post" action = ""> 
<!-- <a href="studentprofile.php?edit=<?php echo $_GET['edit'];?>">Back</a> -->
<br>
<br>
	<input type = "hidden" name = "studentno" value = "<?php echo $studentno; ?>">
	<button type = "submit" name = "update" class="edit_btn">Remove Picture</button>
	<input type = "text" name = "pic" value = "<?php echo $pic; ?>" disabled>
</form>






</body>
</html>

<?php

//$path = ".";
//$path = "Dexer/Admin/";
//$path = "../announcmentpic/";
//$path = "uploads/dex/".$username."/pic/";
$path = "uploadslibrary/".$bookcode."/pic/";

$dir = opendir($path) or die ("Folder does not exist");



while($file = readdir($dir))
{
	
	if ($file == "." or $file == ".." or $file == "index.php" or $file == "del.png" or $file == "create.php" or $file == "delete.php") 
		
	continue;	

	//echo "<a href='../announcmentpic/$file'>$file</a><a href='announcementspicdelete.php?dir=$file'><img src='delete.png'></a><br>";
	//echo "<div align='center'><a href='uploads/Dex/".$username."/pic/$file'>$file</a><a href='studentpicdelete.php?dir=$file&user_id=$user_id&username=$username'><img src='delete.png'></a></div><br>";
	echo "<div align='center'><a href='uploadslibrary/".$bookcode."/pic/$file'>$file</a><a href='librarypicdelete.php?dir=$file&user_id=$user_id&bookcode=$bookcode'><img src='delete.png'></a></div><br>";
	
	//echo "<a href='../announcmentpic/$file'>$file</a><br>";
}
closedir($dir);


?>



<?php 
	$studentno = $_POST['studentno'];
	$status = $_POST['statusz'];
	$lastname = $_POST['lastnamez'];	
	$firstname = $_POST['firstnamez'];
	$middleinitial = $_POST['middleinitialz'];
	$nickname = $_POST['nicknamez'];
?>
<?php
	
	if (isset($_POST['update'])) {

	//mysqli_query($db, "UPDATE birthright_db.announcement SET line1='dashpics/".$status."', line2='dashpics/".$lastname."', line3='dashpics/".$firstname."', line4='dashpics/".$middleinitial."', line5='dashpics/".$nickname."' WHERE number = '$studentno'"); //hit
	//mysqli_query($db, "UPDATE birthright_db.announcement SET line1='', line2='', line3='', line4='', line5='' WHERE number = '$studentno'"); //hit
	//mysqli_query($db, "UPDATE greatland_db.login SET pic='' WHERE user_id = '$user_id '"); //hit
	mysqli_query($db, "UPDATE greatland_db.library SET pic='' WHERE book_code = '$bookcode '"); //hit	
	$_SESSION['msg'] = "Details updated";	
	header("location: librarypic.php?edit=$bookcode");	
	}
	
	
?>
<!DOCTYPE html>

<html>
<head>


</head>

<body>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
	</div>

<?php endif ?>


</body>

</html>

<?php	
	include_once("./web-page-parts/footer.php");
?>