<?php
$error = NULL;

?>
<a href="LogIn.php"> Back to Login</a>
<?php

if (isset($_POST['submit'])) {
		
	//Get form data
	$u = $_POST['u'];
	$p = $_POST['p'];
	$p2 = $_POST['p2'];
	$e = $_POST['e'];	
	
	$f = $_POST['f'];	
	$l = $_POST['l'];	
		
	if(strlen($u) < 5 or strlen($p) < 5) {
		$error ="<p>Your username and password must be at least 5 characters in length</p>";
	}
	else if($p2 != $p){
		$error .="Your passwords do not match";
		
	}
	else{
		
		//Form is valid
		//Connect to the database
		$mysqli= NEW MySQLi('localhost','root','ieti19','birthright_db');

		//Sanitize from data
		$u = $mysqli->real_escape_string($u);
		$p = $mysqli->real_escape_string($p);
		$p2 = $mysqli->real_escape_string($p2);
		$e = $mysqli->real_escape_string($e);
		
		$f = $mysqli->real_escape_string($f);
		$l = $mysqli->real_escape_string($l);
		
		//Generate Vkey
		$vkey = md5(time().$u);

		//Insert account into the database (login)
		$p = md5($p);
		$insert = $mysqli->query("INSERT INTO login(username,password,email,vkey, tag)
		VALUES('$u', '$p', '$e', '$vkey', 2)");
		//$insert = 1;
		if($insert){
			$to = $e;
			$subject = "Email verification";
			$message = "<a href='http://localhost/NEO 6-16/verify.php?vkey=$vkey'>Register account</a>";
			//$message = "<a href='http://localhost/registration/verify.php?vkey=$vkey'>Register account</a>";
			//$headers = "From: dikoy15@yahoo.com \r\n";
			$headers = "From: dexer.quimpo@gmail.com \r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			mail($to,$subject,$message,$headers);
			
			$mysqli= NEW MySQLi('localhost','root','ieti19','birthright_db');
			session_start();
			$resultSet = $mysqli->query("SELECT * FROM login WHERE username='$u'");
			$row = $resultSet->fetch_assoc();
			$username = $u;
			$uid = $row['user_id'];
			$edit_state = true;
			//$rec = mysqli_query($db, "SELECT * FROM login WHERE username=$username");	
			
			//$rec = mysqli_query($db, "SELECT * FROM login WHERE username='Slim'");	
			//$record = mysqli_fetch_array($rec);
			
		//Insert account into the database (masterlist)
		$insert = $mysqli->query("INSERT INTO masterlist(Student_no, First_name, Last_name)
		VALUES('$uid', '$f', '$l')");
		
		//Insert account into the database (accounts)
		$insert = $mysqli->query("INSERT INTO accounts(student_id, first_name, last_name)
		VALUES('$uid', '$f', '$l')");
		
			//echo $row['user_id'];
			//echo "<br>";
			//echo $u;
		header('location:thankyou.php');
			
		}
		else {
			echo $mysqli->error;
		}
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
		<td align="right">Username:</td>
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
		<td align="right">Password:</td>
		<td><input type="PASSWORD" name="p" required/></td>
	</tr>
	<tr>
		<td align="right">Repeat Password:</td>
		<td><input type="PASSWORD" name="p2" required/></td>
	</tr>
	<tr>
		<td align="right">Email Address:</td>
		<td><input type="EMAIL" name="e" autocomplete="off" required/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Register" required/></td>
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
