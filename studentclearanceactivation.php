<?php 
	include_once("web-page-parts/header.php");
	include_once("web-page-parts/sidebar.php");
	include_once("web-page-parts/topbar.php");
?>

<?php
$error = NULL;
?>
<link href="./assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />
<?php 
//include("topbar.php");
?>
<a href="dash.php"> Back to dashboard</a>
<?php

if (isset($_POST['submit'])) {
		
	//Get form data
	$u = $_POST['u'];
	$p = $_POST['p'];
	$p2 = $_POST['p2'];
	$e = $_POST['e'];	
	
	$f = $_POST['f'];	
	$l = $_POST['l'];	
		
	$mi = $_POST['mi'];	
	$gl = $_POST['gl'];	
	$ge = $_POST['ge'];	
	$da = $_POST['da'];	
	$ag = $_POST['ag'];	
	$st = $_POST['st'];	
	$pr = $_POST['pr'];	
	$ho = $_POST['ho'];	
	$mo = $_POST['mo'];	
	$lr = $_POST['lr'];	
	$fn = $_POST['fn'];	
	$fc = $_POST['fc'];	
	$fe = $_POST['fe'];	
	$mn = $_POST['mn'];	
	$mc = $_POST['mc'];	
	$me = $_POST['me'];		
	
		//Form is valid
		//Connect to the database
		$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');

		//Sanitize from data
		//$u = $mysqli->real_escape_string($u);
		$p = $mysqli->real_escape_string($p);
		$p2 = $mysqli->real_escape_string($p2);
		$e = $mysqli->real_escape_string($e);
		
		$f = $mysqli->real_escape_string($f);
		$l = $mysqli->real_escape_string($l);
		
		$mi = $mysqli->real_escape_string($mi);
		$gl = $mysqli->real_escape_string($gl);
		$ge = $mysqli->real_escape_string($ge);
		$da = $mysqli->real_escape_string($da);
		$ag = $mysqli->real_escape_string($ag);
		$st = $mysqli->real_escape_string($st);
		$pr = $mysqli->real_escape_string($pr);
		$ho = $mysqli->real_escape_string($ho);
		$mo = $mysqli->real_escape_string($mo);
		$lr = $mysqli->real_escape_string($lr);
		$fn = $mysqli->real_escape_string($fn);
		$fc = $mysqli->real_escape_string($fc);
		$fe = $mysqli->real_escape_string($fe);
		$mn = $mysqli->real_escape_string($mn);
		$mc = $mysqli->real_escape_string($mc);
		$me = $mysqli->real_escape_string($me);
				
		
		//Generate Vkey
		$vkey = md5(time().$u);

		//Insert account into the database (login)
		$p = md5($p);
		//$insert = $mysqli->query("INSERT INTO masterlist(Student_no, First_name, Last_name)
		//VALUES('$u', '$f', '$l')");
		//$insert = 1;
		
		require_once('injection/connectionTest.php'); //test
		session_start();
		$resultSetx = $mysqli->query("SELECT * FROM masterlist WHERE Student_No = '$u' LIMIT 1"); //test
		$results = mysqli_fetch_array($resultSetx);
		if($resultSetx->num_rows !=0){ 
		$error .="Username already exists"; 
		header('location:studentclearanceactivation.php?message= Student number already exists');
		} 
		else {
		$insert = $mysqli->query("INSERT INTO masterlist(Student_no, Status, First_name, Last_name, Middle_initial, Grade_level, Gender, Date_of_birth, Age, Street, Province, Home_contact_No, Mobile_No, LRN, Fathers_name, Fathers_contact_No, Fathers_email, Mothers_name, Mothers_contact_No, Mothers_email)
		VALUES('$u', 'Active', '$f', '$l', '$mi', '$gl', '$ge', '$da', '$ag', '$st', '$pr', '$ho', '$mo', '$lr', '$fn', '$fc', '$fe', '$mn', '$mc', '$me')");
		
			
			$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');
			session_start();
			$resultSet = $mysqli->query("SELECT * FROM login WHERE username='$u'");
			$row = $resultSet->fetch_assoc();
			$username = $u;
			$uid = $row['user_id'];
			$edit_state = true;
			//$rec = mysqli_query($db, "SELECT * FROM login WHERE username=$username");	
			
			//testing
			$studentno = $u;
			$Dir = "uploads/dex/".$studentno;
			$Dirz = "uploads/dex/".$studentno."/files";
			$Dirx = "uploads/dex/".$studentno."/pic";
			
			if (!file_exists($Dir)) {

			//mkdir($_POST["username"]."/Student", 0777, true); 
			//mkdir($Dir, 0777, true);
			mkdir($Dir, 0777, true);
			mkdir($Dirz, 0777, true);
			mkdir($Dirx, 0777, true);

			//$res = mysqli_query($db, "Update greatland_db.login, greatland_db.masterlist  SET existing_folder = 'Y' WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
			$res = mysqli_query($db, "Update greatland_db.masterlist SET existing_folder = 'Y' WHERE Student_No = '$studentno'");


			echo "Folders created";
			}
			else {
			//$res = mysqli_query($db, "Update greatland_db.login, greatland_db.masterlist  SET existing_folder = 'Y' WHERE Student_No = '$studentno' and user_id=Student_No and tag='2'");
			$res = mysqli_query($db, "Update greatland_db.masterlist SET existing_folder = 'Y' WHERE Student_No = '$studentno'");
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
		
		//header('location:studentclearanceactivation.php');
		header('location:studentclearanceactivation.php?message= Data Created');	
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
<br>
					<?php 
                        if(@$_GET['message']==true)
                        {
                    ?>
                        <!-- <div class="alert-light text-danger text-center py-3"><?php echo $_GET['message'] ?></div> -->     
						<div style="text-align: center; color: green;"><?php echo $_GET['message'] ?></div>    						
                    <?php
                        }
                    ?>


<form method="POST" action="">

	<table border="0" align="center" cellpadding="5">
	
	<tr>
		<td align="right">LRN:</td>
		<td><input type="TEXT" name="u" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Firstname:</td>
		<td><input type="TEXT" name="f" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Lastname:</td>
		<td><input type="TEXT" name="l" autocomplete="off" required/></td>
	</tr>
	
	<tr>
		<td align="right">Middle Initial:</td>
		<td><input type="TEXT" name="mi" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Grade Level:</td>
		<!-- <td><input type="TEXT" name="ge" autocomplete="off" required/></td> -->
		<td><select name="gl" required/>
				<option value="">Choose Grade Level</option>
				<option value="Nusery">Nusery</option>
				<option value="Junior Kinder">Junior Kinder</option>
				<option value="FemaSenior Kinderle">Senior Kinder</option>
				
				<option value="Grade 1">Grade 1</option>
				<option value="Grade 2">Grade 2</option>
				<option value="Grade 3">Grade 3</option>
				<option value="Grade 4">Grade 4</option>
				<option value="Grade 5">Grade 5</option>
				<option value="Grade 6">Grade 6</option>
				<option value="Grade 7">Grade 7</option>
				<option value="Grade 8">Grade 8</option>
				<option value="Grade 9">Grade 9</option>
				<option value="Grade 10">Grade 10</option>
				<option value="Grade 11">Grade 11</option>
				<option value="Grade 12">Grade 12</option>
								
		</select></td>
	</tr>
	
	
	<tr>
		<td align="right">Gender:</td>
		<!-- <td><input type="TEXT" name="ge" autocomplete="off" required/></td> -->
		<td><select name="ge" required/>
				<option value="">Choose Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
		</select></td>
	</tr>
	<tr>
		<td align="right">Date of Birth:</td>
		<td><input type="date" name="da" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Age:</td>
		<td><input type="TEXT" name="ag" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Street:</td>
		<td><input type="TEXT" name="st" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Province:</td>
		<td><input type="TEXT" name="pr" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Home Contact No:</td>
		<td><input type="TEXT" name="ho" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Mobile No:</td>
		<td><input type="TEXT" name="mo" autocomplete="off" required/></td>
	</tr>
	
	<tr>
		<td align="right">Father's Name:</td>
		<td><input type="TEXT" name="fn" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Father's Contact No:</td>
		<td><input type="TEXT" name="fc" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Father's Email:</td>
		<td><input type="TEXT" name="fe" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Mother's Name:</td>
		<td><input type="TEXT" name="mn" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Mother's Contact No:</td>
		<td><input type="TEXT" name="mc" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td align="right">Mother's Email:</td>
		<td><input type="TEXT" name="me" autocomplete="off" required/></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Create Record" required/></td>
	</tr>
	</table>
				
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