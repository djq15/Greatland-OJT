<?php
 
//$dir = $_GET['dir'];
//$dir = $username."/Admin/".$_GET['dir'];
//$name = "Dexer";
$user_id = $_GET['user_id'];
$username = $_GET['username'];
$dir = "uploads/dex/".$user_id."/pic/".$_GET['dir'];


unlink($dir);
rmdir($dir);

//header("location: dexupload1.php?editz=echo $row['username'];");
header("location: studentpic.php?edit=$user_id");
//echo $dir;
//echo $_GET['username'];


?>