<?php 
	include_once("web-page-parts/header.php");
	include_once("web-page-parts/sidebar.php");
	include_once("web-page-parts/topbar.php");
?>

<?php
$error = NULL;
/*
require_once('injection/connectionTest.php'); //test
session_start();

			require_once('injection/connectionTest.php'); //test
			session_start();
			$resultSetx = $mysqli->query("SELECT * FROM library WHERE book_code = 'Hist101' LIMIT 1"); //test
			//$resultSetz = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code = 'Hist101' LIMIT 1");
			$results = mysqli_fetch_array($resultSetx);
			if($resultSetx->num_rows !=0){ //test
			echo "already exists";
			}
			else {
			echo $results['title'];
			echo "blah";
			}
*/		
?>
<link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />
<?php 
//include("topbar.php");
?>
<a href="dash.php"> Back to dashboard</a>
<?php
			
if (isset($_POST['submit'])) {
		
	//Get form data
	$b = $_POST['b'];
	$t = $_POST['t'];
	//$i = $_POST['i'];
	$a = $_POST['a'];	
	
	$c = $_POST['c'];	
	$d = $_POST['d'];	
		
	
		//Form is valid
		//Connect to the database
		$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');

		//Sanitize from data
		//$b = $mysqli->real_escape_string($b);
		$t = $mysqli->real_escape_string($t);
		$i = $mysqli->real_escape_string($i);
		$a = $mysqli->real_escape_string($a);
		
		$c = $mysqli->real_escape_string($c);
		$d = $mysqli->real_escape_string($d);
		
		//Generate Vkey
		$vkey = md5(time().$b);

		//Insert account into the database (login)
		$p = md5($p);
		/*$insert = $mysqli->query("INSERT INTO masterlist(Student_no, First_name, Last_name)
		VALUES('$u', '$f', '$l')");
		*/
		
		require_once('injection/connectionTest.php'); //test
		session_start();
		$resultSetx = $mysqli->query("SELECT * FROM library WHERE book_code = '$b' LIMIT 1"); //test
		$results = mysqli_fetch_array($resultSetx);
		if($resultSetx->num_rows !=0){ 
		$error .="Username already exists"; 
		header('location:libraryclearanceactivation.php?message= book code already exists');
		} 
		else {
		$insert = $mysqli->query("INSERT INTO library(book_code, title, author, category, description)
		VALUES('$b', '$t', '$a', '$c', '$d')");
		
		//$insert = 1;
		
		
			
			$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');
			session_start();
			$resultSet = $mysqli->query("SELECT * FROM login WHERE username='$u'");
			$row = $resultSet->fetch_assoc();
			$username = $u;
			$uid = $row['user_id'];
			$edit_state = true;
			//$rec = mysqli_query($db, "SELECT * FROM login WHERE username=$username");	
			
			//testing
			//require_once('injection/connectionTest.php'); //test
			//session_start();
			//$resultSetx = $mysqli->query("SELECT * FROM library WHERE book_code = '$b' LIMIT 1"); //test
			//$results = mysqli_fetch_array($resultSetx);
			//if($resultSetx->num_rows !=0){ 
			//$error .="Username already exists"; 
			//header('location:libraryclearanceactivation.php?message= book code already exists.');
			//} 
			//else {
			$bookcode = $b;
			$Dir = "uploadslibrary/".$bookcode;
			$Dirz = "uploadslibrary/".$bookcode."/files";
			$Dirx = "uploadslibrary/".$bookcode."/pic";
			
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
			//testing
			
			//$rec = mysqli_query($db, "SELECT * FROM login WHERE username='Slim'");	
			//$record = mysqli_fetch_array($rec);
			
		//Insert account into the database (masterlist)
		/*$insert = $mysqli->query("INSERT INTO masterlist(Student_no, First_name, Last_name)
		VALUES('$uid', '$f', '$l')");*/
		
		//Insert account into the database (accounts)
		/*$insert = $mysqli->query("INSERT INTO accounts(student_id, first_name, last_name)
		VALUES('$uid', '$f', '$l')");*/
		
			//echo $row['user_id'];
			//echo "<br>";
			//echo $u;
		header('location:libraryclearanceactivation.php?message= Data Created');
		}	
		
	
	}	
		$vkey = md5(time());
		//echo $vkey;

?>

<html>
<head>
	
<!-- <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
<form method="POST" action="">
	<table border="0" align="center" cellpadding="5">
	<tr>
		<td align="right">Book Code:</td>
		<td><input type="TEXT" name="b" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Title:</td>
		<td><input type="TEXT" name="t" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Author:</td>
		<td><input type="TEXT" name="a" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Category:</td>
		<td><input type="TEXT" name="c" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Description:</td>
		<td><input type="TEXT" name="d" autocomplete="off" required/></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Create Record" required/></td>
	</tr>
	</table>
	
					<?php 
                        if(@$_GET['message']==true)
                        {
                    ?>
                        <!-- <div class="alert-light text-danger text-center py-3"><?php echo $_GET['message'] ?></div> -->     
						<div style="text-align: center; color: green;"><?php echo $_GET['message'] ?></div>    						
                    <?php
                        }
                    ?>
</form>
<center>
<?php
	echo $error;
?>
</center>
</body>
</html>

<?php
	include_once("web-page-parts/footer.php");
?>