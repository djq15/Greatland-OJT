<?php
 
//$dir = $_GET['dir'];
//$dir = $username."/Admin/".$_GET['dir'];
//$name = "Dexer";
$bookcode = $_GET['bookcode'];
$username = $_GET['username'];
$dir = "uploadslibrary/".$bookcode."/pic/".$_GET['dir'];


unlink($dir);
rmdir($dir);

//header("location: dexupload1.php?editz=echo $row['username'];");
header("location: librarypic.php?edit=$bookcode");
//echo $dir;
//echo $_GET['username'];


?>