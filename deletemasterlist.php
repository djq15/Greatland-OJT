<?php
//session_start();

$servername='localhost';
$user='root';
$password='ieti19';
$db='greatland_db';

$studentno = $_GET['del_id'];

$conn = new mysqli($servername, $user, $password, $db);
if(!$conn){
	die ("Error on the connection" .$conn->connect_error);
}

//testing
$Del = "uploads/dex/".$studentno;

function removeFolder($folder) {

	
         if (is_dir($folder) === true) {
			 
			 $folderContents = scandir($folder);
			 unset($folderContents[0], $folderContents[1]);
			 
			 foreach($folderContents as $content=>$contentName) {
				 $currentPath = $folder.'/'.$contentName;

				
				 $filetype = filetype($currentPath);
				 if ($filetype == 'dir') {
					 removeFolder($currentPath);
				 }
				 else {
					 unlink($currentPath);
				 }
				 unset($folderContents[$content]);
			 }
			 rmdir($folder);
			
		 }
		 

}

removeFolder($Del); //this is the actual path 
//testing



$select = "DELETE from greatland_db.masterlist where Student_No='".$_GET['del_id']."'";
$query = mysqli_query($conn, $select) or die($select);
header("location:editmasterlist.php?message= Data Deleted");

?>	



		