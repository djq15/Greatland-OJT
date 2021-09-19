<?php 
	include_once("./web-page-parts/header.php");
	include_once("./web-page-parts/sidebar.php");
	include_once("./web-page-parts/topbar.php");
	//include('filtercheck.php');
	
?>
<!-- <a href="clearanceactivation.php">Back</a> -->
<?php
	$id = $_GET['edit'];
	$recx = mysqli_query($db, "SELECT * FROM greatland_db.masterlist WHERE Student_No='$id'");
	$recordx = mysqli_fetch_array($recx);
	$statusx = $recordx['Status'];
	if ($statusx == 'Active'){
	echo '<a href="clearanceactivation.php">Back</a>';
	}
	else if ($statusx == 'Inactive'){
	echo '<a href="clearanceactivation-r.php">Back</a>';
	}
?>
<?php 
	if (isset($_GET['edit'])) {
	$studentno = $_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM greatland_db.masterlist WHERE Student_No='$studentno'");	 //hit
	$record = mysqli_fetch_array($rec);
	$status = $record['Status'];
	$lastname = $record['Last_name'];
	$firstname = $record['First_name'];
	$middleinitial = $record['Middle_initial'];
	$nickname = $record['Nickname'];
	$province = $record['Province'];
	$grade = $record['grade'];		
	
	$middleinitial = $record['Middle_initial'];
	$gradelevel = $record['Grade_level'];
	$gender = $record['Gender'];
	$dob = $record['Date_of_birth'];
	$age = $record['Age'];
	$street = $record['Street'];
	$province = $record['Province'];
	$homecontact = $record['Home_contact_No'];
	$mobilecontact = $record['Mobile_No'];
	$lrn = $record['LRN'];
	$fathersname = $record['Fathers_name'];
	$fatherscontact = $record['Fathers_contact_No'];
	$fathersemail = $record['Fathers_email'];
	$mothersname = $record['Mothers_name'];
	$motherscontact = $record['Mothers_contact_No'];
	$mothersemail = $record['Mothers_email'];
	
	}	
?>
<?php
	if (isset($_POST['update'])) {
	
	$studentno = $_POST['studentno'];
	$lastname = addslashes($_POST['lastname']);	
	$firstname = addslashes($_POST['firstname']);
	$status = addslashes($_POST['status']);
	
	$oldstudentno = $record['Student_No'];
	
	$middleinitial = addslashes($_POST['middleinitial']);
	$gender = addslashes($_POST['gender']);
	$gradelevel = addslashes($_POST['gradelevel']);
	$dob = addslashes($_POST['dob']);
	$age = addslashes($_POST['age']);
	$street = addslashes($_POST['street']);
	$province = addslashes($_POST['province']);
	$homecontact = addslashes($_POST['homecontact']);
	$mobilecontact = addslashes($_POST['mobilecontact']);
	$lrn = addslashes($_POST['lrn']);
	$fathersname = addslashes($_POST['fathersname']);
	$fatherscontact = addslashes($_POST['fatherscontact']);
	$fathersemail = addslashes($_POST['fathersemail']);
	$mothersname = addslashes($_POST['mothersname']);
	$motherscontact = addslashes($_POST['motherscontact']);
	$mothersemail = addslashes($_POST['mothersemail']);
	
	//$mysqli= NEW MySQLi('localhost','root','ieti19','greatland_db');
	//$oldstudentno = $mysqli->real_escape_string($oldstudentno);
	//$studentno = $mysqli->real_escape_string($studentno);
		
	mysqli_query($db, "UPDATE greatland_db.masterlist SET Last_name='$lastname', Status='$status', First_name='$firstname', Student_No = '$studentno', Middle_initial = '$middleinitial', Grade_level = '$gradelevel', Gender = '$gender', Date_of_birth = '$dob', Age = '$age', Street = '$street', Province = '$province', Home_contact_No = '$homecontact', Mobile_No = '$mobilecontact', LRN = '$lrn', Fathers_name = '$fathersname', Fathers_contact_No = '$fatherscontact', Fathers_email = '$fathersemail', Mothers_name = '$mothersname', Mothers_contact_No = '$motherscontact', Mothers_email = '$mothersemail' WHERE Student_No = '$oldstudentno'"); //hit
	
	$_SESSION['msg'] = "Details updated";	
	//header('location: studentprofile.php');	
	header('location: studentprofile.php?edit='.$studentno.'&message= Data Saved');	
	}
?>
<!DOCTYPE html>

<html>
<head>

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
		<script src="351min.js"></script>
		
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
		<script src="336bootstrap.js"></script>	
		
	<link rel="stylesheet" type = "text/css" href = "gradestyle.css">
	
	<script>
		$(document).ready(function() {
			//$("form").submit(function(event){	
			//$("#mail-name").change(function(event){ //experiment
			//$("form").submit(function(event){	
			//$("#mail-name").on('change', function(event){ //experiment
			$("form").change(function(event){ //experiment
				//this.form.submit(); //experiment
				//$("#mail-name").on('change', function(event){ //experiment
				//$(this).closest('form').submit(); //experiment
				event.preventDefault();
				var name = $("#mail-name").val();
				var email = $("#mail-email").val();
				var gender = $("#mail-gender").val();
				var message = $("#mail-message").val();
				var submit = $("#mail-submit").val();
				$(".form-message").load("keyupfilter.php", {
					filter: name, 
					email: email,
					gender: gender,
					message: message, 
					submit: submit
				});
			});
		});
	</script>
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



<!-- <table> this is troubling the filter -->  


<!-- <form method = "post"  = "fetch-class2"> -->
<!-- <form method = "post" action = ""> -->

<?php 

$user_id = $_GET['edit'];
$recz = mysqli_query($db, "SELECT * FROM greatland_db.masterlist WHERE Student_No='$user_id'");	 //hit
$recordz = mysqli_fetch_array($recz);

?>
					<?php 
                        if(@$_GET['message']==true)
                        {
                    ?>
                        <!-- <div class="alert-light text-danger text-center py-3"><?php echo $_GET['message'] ?></div> -->     
						<div style="text-align: center; color: green;"><?php echo $_GET['message'] ?></div>    						
                    <?php
                        }
                    ?>
<form method = "post" action = ""> 
<input type = "hidden" name = "studentno" value = "<?php echo $studentno; ?>">

	<img src="<?php echo $recordz['pic']; ?>"  width="220" style="white-space:nowrap;overflow-y:auto;display: block;margin-left: auto;margin-right: auto;;"/>
	
	<div class = "input-group">
		<label>Student No</label>
		<input type = "text" name = "studentno" value = "<?php echo $studentno; ?>" autocomplete="off">
		</div>
	<div style="font-size: 12px; color: red;"> Note: Changing the student number can create problems with uploading to folder</div>
	<div class = "input-group">
		<label>Status</label>
		<!-- <input type = "text" name = "gender" value = "<?php echo $status; ?>" readonly autocomplete="off"> -->
		<select style="width:430px;" name="status">
				<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
				<?php 
				if ($status == "Active"){?>
				<option value="Inactive">Inactive</option>
				<?php } 
				else if ($status == "Inactive"){ ?>
				<option value="Active">Active</option>
				<?php } 
				else { ?>
				<option value="Active">Active</option>
				<option value="Inactive">Inactive</option>
				<?php } ?>
				<!--
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				-->
		</select>
	</div>
	<!--<div class = "input-group">
		<label>Status</label>
		<input type = "text" name = "status" value = "<?php echo $status; ?>">
	</div>-->
	<div class = "input-group">
		<label>First name</label>
		<input type = "text" name = "firstname" value = "<?php echo $firstname; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Last name</label>
		<input type = "text" name = "lastname" value = "<?php echo $lastname; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Middle Initial</label>
		<input type = "text" name = "middleinitial" value = "<?php echo $middleinitial; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Grade Level</label>
		<!-- <input type = "text" name = "gender" value = "<?php echo $gender; ?>" readonly autocomplete="off"> -->
		<select style="width:430px;" name="gradelevel"> 
		<option value="<?php echo $gradelevel; ?>"><?php echo $gradelevel; ?></option>
		<?php include('gradelevel2.php'); ?>
		</select>
	</div>
	<div class = "input-group">
		<label>Gender</label>
		<!-- <input type = "text" name = "gender" value = "<?php echo $gender; ?>" readonly autocomplete="off"> -->
		<select style="width:430px;" name="gender">
				<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
				<?php 
				if ($gender == "Male"){?>
				<option value="Female">Female</option>
				<?php } 
				else if ($gender == "Female"){ ?>
				<option value="Male">Male</option>
				<?php } 
				else {?>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<?php } ?>
				<!--
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				-->
		</select>
	</div>
	<div class = "input-group">
		<label>Date of Birth</label>
		<input type = "date" name = "dob" value = "<?php echo $dob; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Age</label>
		<input type = "text" name = "age" value = "<?php echo $age; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Street</label>
		<input type = "text" name = "street" value = "<?php echo $street; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Province</label>
		<input type = "text" name = "province" value = "<?php echo $province; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Home Contact No</label>
		<input type = "text" name = "homecontact" value = "<?php echo $homecontact ; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Mobile No</label>
		<input type = "text" name = "mobilecontact" value = "<?php echo $mobilecontact; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>LRN</label>
		<input type = "text" name = "lrn" value = "<?php echo $lrn; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Father's Name</label>
		<input type = "text" name = "fathersname" value = "<?php echo $fathersname; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Father's Contact No</label>
		<input type = "text" name = "fatherscontact" value = "<?php echo $fatherscontact; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Father's Email</label>
		<input type = "text" name = "fathersemail" value = "<?php echo $fathersemail; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Mother's Name</label>
		<input type = "text" name = "mothersname" value = "<?php echo $mothersname; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Mother's Contact No</label>
		<input type = "text" name = "motherscontact" value = "<?php echo $motherscontact; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Mother's Email</label>
		<input type = "text" name = "mothersemail" value = "<?php echo $mothersemail; ?>" autocomplete="off">
	</div>
	
	<!--<div class = "input-group">
		<label>Middle Initial</label>
		<input type = "text" name = "middleinitial" value = "<?php echo $middleinitial; ?>">
	</div>-->
	<!--<div class = "input-group">
		<label>Nick Name</label>
		<input type = "text" name = "nickname" value = "<?php echo $nickname; ?>">
	</div>-->
	<!--<div class = "input-group">
		<label>Province</label>
		<input type = "text" name = "province" value = "<?php echo $province; ?>">
	</div>-->
	
	<div class = "input-group">

			<!--<button type = "submit" name = "update" class = "btn">Update</button>-->
			<button type = "submit" name = "update" class = "btn">Update</button>
			<a type = "submit" href="studentpic.php?edit=<?php echo $_GET['edit'];?>" name = "update" class = "btn">Picture Files</a>
			<a type = "submit" href="dexupload1.php?edit=<?php echo $_GET['edit'];?>" name = "update" class = "btn">Folder Files</a>
	</div>	
</form>


</body>

</html>
<?php // this is for keyup filter AJAX
	include('keyupfilter.php'); 
?>


<?php	
	include_once("./web-page-parts/footer.php");
?>

