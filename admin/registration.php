<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: ../LogIn.php?Empty= Action Denied. Log in again' ) );}
?>
<style>
	.somebody { 
		font-size: 16px;
	}
	
</style>
<?php
	//include("filter.php");
	include("topbar.php");
?>
<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type = "text/css" href = "../gradestyle.css">
<a href="dash.php">Back</a>


<?php

	//session_start();
	
	
	
	
	$error = NULL;

if (isset($_POST['submit'])) {

	
	

	//Get form data
	$u = $_POST['u'];
	$p = $_POST['p'];
	$p2 = $_POST['p2'];
	$e = $_POST['e'];	
	$t = $_POST['drop'];	
	
	
if ($t !="N") {	
	
	if(strlen($u) < 5) {
		$error ="<p>Your username must be at least 5 character</p>";
	}
	else if(strlen($p) < 5){
		$error .="<p>Your password must be at least 5 character</p>";
		
	}
	else if($p2 != $p){
		$error .="Your passwords do not match";
		
	}
	else{
		
		//Form is valid
		//Connect to the database
		$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');

		//Sanitize from data
		$u = $mysqli->real_escape_string($u);
		$p = $mysqli->real_escape_string($p);
		$p2 = $mysqli->real_escape_string($p2);
		$e = $mysqli->real_escape_string($e);
		$t = $mysqli->real_escape_string($t);
		
		//Generate Vkey
		$vkey = md5(time().$u);
		
		//Insert account into the database
		$p = md5($p);
		/*$insert = $mysqli->query("INSERT INTO login(username,password,email,vkey, tag, verified)
		VALUES('$u', '$p', '$e', '$vkey', '$t', 0)");*/
		$insert = $mysqli->query("INSERT INTO login(username,password,tag)
		VALUES('$u', '$p', '1')");
		header('location:thankyou.php');
		/*
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
			header('location:thankyou.php');
		
			
		}
		else {
			echo $mysqli->error;
		}*/
	}

}

else {
	$error .="<p>Please choose a tag for the user</p>";
}

}	

		$vkey = md5(time());

?>



<html>
<head>




</head>

<body class="somebody">
<form method="POST" action="">

<p align="center">Admin User Creation </p>

	<div class = "input-group">
	<!-- <label class = "input-group">User Type</label>
		
	<select id="mail-name" name="drop" >
				<option value="N">Choose User Type</option>
				<option value="1">Admin</option>
				<option value="3">Registrar</option>
				<option value="4">Cashier/Finance Officer</option>
				
	<?php /*	if ($_POST['drop'] == "tag1") {
	
	}*/
	?>
				
				
	</select> -->
	<div class="form-message"></div>
				
	
	<div class = "input-group">
		<td align="right">Username:</td>
		<td><input type="TEXT" name="u" autocomplete="off" required/></td>
	</div>
	<div class = "input-group">
		<td align="right">Password:</td>
		<td><input type="PASSWORD" name="p" required/></td>
	</div>
	<div class = "input-group">
		<td align="right">Repeat Password:</td>
		<td><input type="PASSWORD" name="p2" required/></td>
	</div>
	<!-- <div class = "input-group">
		<td align="right">Email Address:</td>
		<td><input type="EMAIL" name="e" autocomplete="off" required/></td>
	</div> -->
	<div class = "input-group">
		<td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Create User" required/></td>
	</div>
	
</form>
<center>
<?php
	echo $error;
?>
</center>
</body>
</html>

