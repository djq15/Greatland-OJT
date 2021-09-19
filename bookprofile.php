<?php 
	include_once("./web-page-parts/header.php");
	include_once("./web-page-parts/sidebar.php");
	include_once("./web-page-parts/topbar.php");
	//include('filtercheck.php');
	
?>
<a href="librarymanage.php">Back</a>
<?php 
	if (isset($_GET['edit'])) {
	$bookcode = $_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code='$bookcode'");	 //hit
	$record = mysqli_fetch_array($rec);
	$title = $record['title'];
	$isbn = $record['ISBN'];
	$author = $record['author'];
	$category = $record['category'];
	$description = $record['description'];
	$province = $record['Province'];
	$grade = $record['grade'];		
	}	
?>

<?php
	if (isset($_POST['update'])) {
	
	$oldsbookcode = $record['book_code'];
	$bookcode = $_POST['bookcode'];
	$title = addslashes($_POST['title']);
	//$isbn = $_POST['isbn'];
	$author = addslashes($_POST['author']);
	$category = addslashes($_POST['category']);
	$description = addslashes($_POST['description']);


	//mysqli_query($db, "UPDATE greatland_db.masterlist SET Status='$status', Last_name='$lastname', First_name='$firstname', Middle_initial='$middleinitial', Nickname='$nickname', Province='$province' WHERE Student_No = $studentno"); //hit
	//mysqli_query($db, "UPDATE greatland_db.masterlist SET Last_name='$lastname', First_name='$firstname' WHERE Student_No = $studentno"); //hit
	//mysqli_query($db, "UPDATE greatland_db.masterlist SET Last_name='$lastname', First_name='$firstname', Student_No = $studentno WHERE Student_No = $oldstudentno"); //hit
	mysqli_query($db, "UPDATE greatland_db.library SET book_code='$bookcode', title='$title', author = '$author', category = '$category', description = '$description' WHERE book_code = '$oldsbookcode'"); //hit

	
	$_SESSION['msg'] = "Details updated";	
	//header('location: studentprofile.php');	
	header('location: bookprofile.php?edit='.$bookcode.'&message= Data Saved');	
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
$recz = mysqli_query($db, "SELECT * FROM greatland_db.library WHERE book_code='$bookcode'");	 //hit
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
		<label>Book Code</label>
		<input type = "text" name = "bookcode" value = "<?php echo $bookcode; ?>" autocomplete="off">
	</div>
	<div style="font-size: 12px; color: red;"> Note: Changing the book code can create problems with uploading to folder</div>
	<div class = "input-group">
		<label>Title</label>
		<input type = "text" name = "title" value = "<?php echo $title; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Author</label>
		<input type = "text" name = "author" value = "<?php echo $author; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Category</label>
		<input type = "text" name = "category" value = "<?php echo $category; ?>" autocomplete="off">
	</div>
	<div class = "input-group">
		<label>Description</label>
		<input type = "text" name = "description" value = "<?php echo $description; ?>" autocomplete="off">
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
			<a type = "submit" href="librarypic.php?edit=<?php echo $_GET['edit'];?>" name = "update" class = "btn">Picture Files</a>
			<a type = "submit" href="libraryupload.php?edit=<?php echo $_GET['edit'];?>" name = "update" class = "btn">Folder Files</a>
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

