<?php


$currentUser = $_SESSION['User'];
$db = mysqli_connect('localhost', 'root', 'ieti19', 'greatland_db');


	//echo '<a class="collapse-item" href="./gradesubmission.php">Grade Submissions</a>';
		$results = mysqli_query($db, "SELECT * FROM login where username='$currentUser'");
		
		echo '<a class="collapse-item" href="studentclearanceactivation.php">New Student Record</a>';
		
		/*
		if ($row=mysqli_fetch_array($results)) {
			if ($row['tag'] == '1' or $row['tag'] == '3'){
			
			

			}
			

			//else if ($row['tag'] == '2') {
			//else if ($row['tag'] == '2' and $row['evaluation_submit'] == 'Y') {
			//echo "tag 2 bitches";
			//}

		}
		*/
?>