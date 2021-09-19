<?php


//$dir = $_GET['dir'];
//$dir = $username."/Admin/".$_GET['dir'];
//$name = "Dexer";
//$username = $_GET['username'];
$bookcode = $_GET['bookcode'];
//$dir = "uploads/dex/".$username."/Admin/Registrar/".$_GET['dir'];
//$dir = "uploads/dex/".$lastname."-".$firstname."-".$studentno."/".$_GET['dir'];
//$dir = $_GET['path']."/".$_GET['dir'];
//$dir = "uploads/dex/".$studentno."/".$_GET['dir'];
$dir = "uploadslibrary/".$bookcode."/files/".$_GET['dir'];

unlink($dir);
rmdir($dir);

//header("location: dexupload1.php?editz=echo $row['username'];");

header("location: libraryupload.php?edit=$bookcode");


//echo $_GET['dir'];
//echo $_GET['username'];



?>