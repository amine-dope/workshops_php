<?php
include 'database.php';
if(isset($_POST["submit"])){
$user= $conn->real_escape_string($_POST['user']);
$msg=$conn->real_escape_string($_POST['message']);
date_default_timezone_get("Africa/Casablanca");

$time=date("H:i:s",time()+1);

if(!isset($user)||$user==''||!isset($msg)||$msg=='')
{
	$error="please fill the empty fields";
	header("location:index.php?error=".urldecode($error));
}
else
{
	$sql="INSERT INTO shouts(user,message,time) VALUES ('$user','$msg','$time')";
	$inserted_row = $conn->query($sql) or die($conn->error.__LINE__);
	header("location:index.php");
	exit();
	
}

}
?>

