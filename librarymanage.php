<?php
	session_start(); if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) && $_SESSION['tag'] !="1") {
	session_start();session_destroy();die( header( 'location: LogIn.php?Empty= Action Denied. Log in again' ) );}
?>

	<style>
.container {

font-size: 17px;

}

.table-row {

  margin-right: 130px;
  margin-left: 100px;
 //display: table-row;
 

 margin-left: 20%;
 
  height: 100px;
}
.table-cell {
  margin: auto;
  display: table-cell;
}

	.search-tag {

    border:none;
	box-shadow: none;

	}
	
	.search-tag {
	margin-bottom: 15px;
	margin-top: 15px;
	}
</style>

<?php 
	include_once("web-page-parts/header.php");
	include_once("web-page-parts/sidebar.php");
	include_once("web-page-parts/topbar.php");
?>
<a href="dash.php">Back to dashboard</a>
<?php 


	//include('activationserver.php'); 


	if (isset($_GET['edit'])) {
	$username = $_GET['edit'];
	$edit_state = true;
	
	//$rec = mysqli_query($db, "SELECT * FROM login WHERE username=$username");	
	//$record = mysqli_fetch_array($rec);
	//$clearance_approve = $record['clearance_approve'];
	//$lastname = $record['last_name'];
	//$grade = $record['grade'];		
	}	

?>
<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type = "text/css" href = "./assets/css/gradestyle.css">
	<!--<link rel="stylesheet" type = "text/css" href = "gradestyle.css">-->
	
	<script src="351min.js"></script>
		
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<script src="336bootstrap.js"></script>	
	
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
				$(".form-message").load("libraryfilter.php", {
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

  <div class="container">
    <div class="table-row">
	<div class="table-cell">
		<span class="input-group-addon">Search</span>
		<input style="height:32px;" type="search" name="search_text" id="search_text" class="form-control" autocomplete="off" />
	</div>

<div class="table-cell">
<form method="POST" class="search-tag">

	<div class = "input-group">
	<label>Filter</label>
	
				<select id="mail-name" name="DoesNotMatter2" >
				<option value="all">Search All</option>
				<option value="book_code">Book Code</option>
				<option value="title">Title</option>
				<option value="author">Author</option>
				<option value="category">Category</option>
				<option value="description">Description</option>
				</select>
			    <!-- <button id="mail-submit" type="submit" name="submit">Send e-mail</button> -->
				<div class="form-message"></div>
				<!-- <button type = "submit" name = "update" class = "btn">Update</button> -->
				
	</div>

</form>
</div>
</div>
</div>

<div id="result" class="result"></div> <!-- table display -->


<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
	</div>

<?php endif ?>

<!--
<table>

	<thead>
		<tr>
			<th>Username</th>
			<th>Existing Folder</th>
			<th colspan="2">Action</th>
	
		</tr>
	</thead>
	<tbody>
		<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		
		
			<td><?php echo $row['username']; ?> </td>
			<td><?php echo $row['existing_folder']; ?> </td>
			<td>
				<a class = "edit_btn" href="dexuploadcheck.php?editz=<?php echo $row['username']; ?>">Upload</a>
			</td>
			<td>
				<a class = "edit_btn" href="studentfoldercheck.php?editz=<?php echo $row['username']; ?>">Student File</a>
			</td>
			<td>
				<a class = "edit_btn"  href="foldercreation.php?editzz=<?php echo $row['username']; ?>"><img src='settings.jpg'></a>
			</td>
			


		</tr>
		
		<?php } ?> 
	</tbody>

</table>
-->	





</body>

</html>





<?php include('libraryfilter.php');  ?>


<?php
	
	include_once("web-page-parts/footer.php");
?>