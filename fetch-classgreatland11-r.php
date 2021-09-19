<style>

.table{
	font-family: sans-serif;
	border-collapse: collapse;
	font-size: 16px;
	background-color:white;
}

.table th,
.table td {
	padding: 10px;
	border: 1px solid #cccccc;	
	background-color:white;
}

.table th {
	background: rgb(40,111,63);
	color: #ffffff;
}

.table.sticky th {
	position: sticky;
	top: 0;
}

</style>

<?php

session_start();

$connect = mysqli_connect("localhost", "root", "ieti19", "greatland_db");

$currentUser = $_SESSION['User'];

$output = '';
	
	//$results = "SELECT Student_No, Status, Last_name, First_name, Middle_initial, Nickname, tag, Province FROM birthright_db.masterlist, birthright_db.login where username=first_name and tag='2'";
	//$results = "SELECT Student_No, Status, Last_name, First_name, Middle_initial, Nickname, tag, user_id, Province FROM birthright_db.masterlist, birthright_db.login where user_id=Student_No and tag='2'";
	//$results = "SELECT * FROM login WHERE tag='2'";
	//$results = "SELECT * FROM login, masterlist WHERE user_id=Student_No and tag='2'";
	$results = "SELECT * FROM masterlist WHERE Status = 'Inactive'";
	
	if(isset($_POST["query"]))
	{
	unset($search);
	unset($results);
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	/*
	$results = "
	SELECT * FROM login, masterlist WHERE tag='2' 
	and First_name LIKE '%".$search."%' and user_id=Student_No or Last_name LIKE '%".$search."%' and user_id=Student_No or Student_No LIKE '%".$search."%' and user_id=Student_No
	";
	}
	*/
	$results = "
	SELECT * FROM masterlist WHERE Status = 'Inactive' and 
	(Home_contact_No LIKE '%".$search."%') 
	";
	}
	

$result = mysqli_query($connect, $results);

if(mysqli_num_rows($result) > 0)
{
	//$output .= '<table class="table sticky">';	
	$output .= '<table class="table sticky" style="white-space: nowrap;">';	
	$output .= '	<thead>
		<tr>
			<th>LRN</th>
			<th>Status</th>
			<th>Lastname</th>
			<th>Firstname</th>
			
			<th>Middle Initial</th>
			<th>Grade Level</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Age</th>
			<th>Street</th>
			<th>Province</th>
			<th>Home Contact</th>
			<th>Mobile Contact</th>
						
			<th>Father\'s Name</th>
			<th>Father\'s Contact</th>
			<th>Father\'s Email</th>
			<th>Mother\'s Name</th>
			<th>Mother\'s Contact</th>
			<th>Mother\'s Email</th>
			
			<th>Existing Folder</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>';
	while($row = mysqli_fetch_array($result))
	{
		$final_grade = ($row["prelim"] +  $row["midterm"] + $row["final"]) / 3;  
		
		//if ($currentUser == 'ProfessorX') {
		
		if ($_SESSION['tag'] == '1'){
		$button = '<td>
					<a class = "edit_btn" href="studentprofile.php?edit='.$row['Student_No'].'">Edit</a> 
				  </td>';
		
		}

		$output .= '
			<tr>

			<td>'.$row["Student_No"].'</td>
			<td>'.$row["Status"].'</td>
			<td>'.$row["Last_name"].'</td>
			<td>'.$row["First_name"].'</td>
			
			<td>'.$row["Middle_initial"].'</td>
			<td>'.$row["Grade_level"].'</td>
			<td>'.$row["Gender"].'</td>
			<td>'.$row["Date_of_birth"].'</td>
			<td>'.$row["Age"].'</td>
			<td>'.$row["Street"].'</td>
			<td>'.$row["Province"].'</td>
			<td>'.$row["Home_contact_No"].'</td>
			<td>'.$row["Mobile_No"].'</td>
						
			<td>'.$row["Fathers_name"].'</td>
			<td>'.$row["Fathers_contact_No"].'</td>
			<td>'.$row["Fathers_email"].'</td>
			<td>'.$row["Mothers_name"].'</td>
			<td>'.$row["Mothers_contact_No"].'</td>
			<td>'.$row["Mothers_email"].'</td>
						
			<td>'.$row["existing_folder"].'</td>
			
			
			<td>
				<a class = "edit_btn" href="studentprofile.php?edit='.$row["Student_No"].'">Edit</a>
			</td>
			
			<td>
				<a href="foldercreation.php?editzz='.$row["Student_No"].'"><img src="settings.jpg"></a> 
				
			</td>

			</tr>
		
		'
		;
		

	}
	$output .= '</table>';
	echo $output;
	
}
else
{
	echo 'Data Not Found';
}

?>