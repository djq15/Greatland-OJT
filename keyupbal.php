<?php
//include('filterclass.php');
//include('filtercheck.php')



$connect = mysqli_connect("localhost", "root", "ieti19", "birthright_db");
	
	

$output = '';
	//if (isset($_POST['filter_selection']) == "first_name") {

	//$results = "SELECT Student_No, Status, Last_name, First_name, Middle_initial, Nickname, Province FROM birthright_db.masterlist, birthright_db.login where username=first_name and tag='2'";
	
	$results = "SELECT student_id, first_name, last_name, month1, month2, month3, month4, month5, month6, month7, month8, month9, total_tuition, downpayment, balance, monthly_payment, late_payer, fully_paid, tag, user_id FROM birthright_db.accounts, birthright_db.login where user_id = student_id and tag = '2'";
	//$results = "SELECT student_id, first_name, last_name, month1, month2, month3, month4, month5, month6, month7, month8, month9, total_tuition, downpayment, balance, monthly_payment, late_payer, fully_paid, tag, user_id FROM birthright_db.accounts, birthright_db.login where login.user_id = accounts.student_id and tag = '2'";

	//$filter_selection = $_POST['filter_selection'];

	//include('fetch-bal3.php');


$result = mysqli_query($connect, $results);

if(mysqli_num_rows($result) > 0)

{

	$output .= '<table>';	
	$output .= '	

		<thead>
		<tr>
			<th>Student ID</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Tuition</th>	
			<th>Downpayment</th>	
			<th>month1</th>	
			<th>month2</th>	
			<th>month3</th>	
			<th>month4</th>	
			<th>month5</th>	
			<th>month6</th>	
			<th>month7</th>	
			<th>month8</th>	
			<th>month9</th>	
			<th>Balance</th>	
			<th>Monthly payment</th>	
			<th>Fully paid</th>	
			<th>Late payer</th>
			<th colspan="2">Action</th>
		</tr>
		<thead>
	
	';
	while($row = mysqli_fetch_array($result))
	{
		$net = ($row['total_tuition'] - $row['downpayment'] - $row['month1'] - $row['month2'] - $row['month3'] - $row['month4'] - $row['month5'] - $row['month6'] - $row['month7'] - $row['month8'] - $row['month9']);  
		
		$button = '<td>
					<a class = "edit_btn" href="studentbalprofile.php?edit='.$row['student_id'].'">Edit</a> 
				  </td>';
			

			if ($row['month1'] == 0 and $row['month2'] == 0 and $row['month3'] == 0 and $row['month4'] == 0 and $row['month5'] == 0 and $row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){
			$bal = $net / 9;
			}
			else if ($row['month2'] == 0 and $row['month3'] == 0 and $row['month4'] == 0 and $row['month5'] == 0 and $row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){
			$bal = $net / 8;
			}
			
			else if ($row['month3'] == 0 and $row['month4'] == 0 and $row['month5'] == 0 and $row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 7;
			}
			
			else if ($row['month4'] == 0 and $row['month5'] == 0 and $row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 6;
			}
			
			else if ($row['month5'] == 0 and $row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 5;
			}			
			
			else if ($row['month6'] == 0 and $row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 4;
			}			

			else if ($row['month7'] == 0 and $row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 3;
			}				
			
			else if ($row['month8'] == 0 and $row['month9'] == 0){		
			$bal = $net / 2;
			}
			
			else {
			$bal = $net;	
			}
			
		
		$output .= '

			<tbody>
			<tr>
				<td>'.$row["student_id"].'</td>
				<td>'.$row["first_name"].'</td>
				<td>'.$row["last_name"].'</td>
				<td>'.$row["total_tuition"].'</td>
				<td>'.$row["downpayment"].'</td>
				<td>'.$row["month1"].'</td>
				<td>'.$row["month2"].'</td>
				<td>'.$row["month3"].'</td>
				<td>'.$row["month4"].'</td>
				<td>'.$row["month5"].'</td>
				<td>'.$row["month6"].'</td>
				<td>'.$row["month7"].'</td>
				<td>'.$row["month8"].'</td>
				<td>'.$row["month9"].'</td>
				<td>'.$row["balance"].'</td>
				<td>'.$row["monthly_payment"].'</td>
				<td>'.$row["fully_paid"].'</td>
				<td>'.$row["late_payer"].'</td>
				<!-- <td>'.$net.'</td> -->
				<!-- <td>'.$bal.'</td> -->
				<td>'.$button.'</td>
			</tr>
			</tbody>


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


