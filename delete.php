<?php


//$dir = $_GET['dir'];
//$dir = $username."/Admin/".$_GET['dir'];
//$name = "Dexer";
//$username = $_GET['username'];
$studentno = $_GET['studentno'];
//$dir = "uploads/dex/".$username."/Admin/Registrar/".$_GET['dir'];
//$dir = "uploads/dex/".$lastname."-".$firstname."-".$studentno."/".$_GET['dir'];
//$dir = $_GET['path']."/".$_GET['dir'];
//$dir = "uploads/dex/".$studentno."/".$_GET['dir'];
$dir = "uploads/dex/".$studentno."/files/".$_GET['dir'];

unlink($dir);
rmdir($dir);

//header("location: dexupload1.php?editz=echo $row['username'];");

header("location: dexupload1.php?edit=$studentno");


//echo $_GET['dir'];
//echo $_GET['username'];



?>