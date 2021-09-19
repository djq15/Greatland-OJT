<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="2") {
	session_start();session_destroy();die( header( 'location: LogIn.php?Empty= Action Denied. Log in again' ) );}
?>


<?php 
	include_once ("./web-page-parts/header.php");
	include_once ("./web-page-parts/sidebar.php");
	include_once ("./web-page-parts/topbar.php");
?>
<a href="dash.php"> Back to dashboard</a>

<!--   LINE  (ENG 101)  -->
<?php 

//include('gradeservereng101.php'); 


	if (isset($_GET['edit'])) {
	$studentno = $_GET['edit'];
	$edit_state = true;
	
	$rec = mysqli_query($db, "SELECT * FROM birthright_db.masterlist WHERE Student_No=$studentno");	
	$record = mysqli_fetch_array($rec);
	$status = $record['Status'];
	$lastname = $record['Last_name'];
	$firstname = $record['First_name'];
	$middleinitial = $record['Middle_initial'];
	$nickname = $record['Nickname'];
	$province = $record['Province'];
	$grade = $record['grade'];		
	}	


?>
<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type = "text/css" href = "gradestyle.css">
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




<form method = "post" action = "gradeservereng101.php"> 
<input type = "hidden" name = "studentno" value = "<?php echo $studentno; ?>">


	<div class = "input-group">
		<label>Student No</label>
		<input type = "number" name = "studentno" value = "<?php echo $studentno; ?>" readonly>
	</div>
	<div class = "input-group">
		<label>Status</label>
		<input type = "text" name = "status" value = "<?php echo $status; ?>">
	</div>
	<div class = "input-group">
		<label>Last name</label>
		<input type = "text" name = "lastname" value = "<?php echo $lastname; ?>">
	</div>
	<div class = "input-group">
		<label>First name</label>
		<input type = "text" name = "firstname" value = "<?php echo $firstname; ?>">
	</div>
	<div class = "input-group">
		<label>Middle Initial</label>
		<input type = "text" name = "middleinitial" value = "<?php echo $middleinitial; ?>">
	</div>
	<div class = "input-group">
		<label>Nick Name</label>
		<input type = "text" name = "nickname" value = "<?php echo $nickname; ?>">
	</div>
	<div class = "input-group">
		<label>Province</label>
		<input type = "text" name = "province" value = "<?php echo $province; ?>">
	</div>

	<div class = "input-group">

			<!--<button type = "submit" name = "update" class = "btn">Update</button>-->
			<button type = "submit" name = "update" class = "btn">Update</button>
	

	</div>	
</form>


	
			<!--<td><?php echo '<a href="print1.php" class="btn btn-primary" id="print-btn">Print preview</a>'; ?> </td> -->
			
			<!-- RETURN IF NEEDED<td> <?php 
			//include('print2.php'); 
			?> </td>-->
			


	







</body>

</html>





<?php
	include_once("./web-page-parts/footer.php");
?>