<?php

session_start();

$db = mysqli_connect('localhost', 'root', 'ieti19', 'ieti_db');



if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx');
	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 2000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				//header("location: clearanceactivation.php?uploadsuccess");
			}
			else {
				echo "file must be less than 2 MB";
			}	
		}	
		else {
			echo "error uploading file";
			}	
	}	
	
	else {
		echo "invalid file type";
		}
	


	//$fileName = $file['file']
}
?>