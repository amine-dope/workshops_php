<?php
include 'database.php';
if(isset($_POST["submit"])){
$user=mysqli_real_escape_string($conn,$_POST["user"]);
$msg=mysqli_real_escape_string($conn,$_POST["message"]);

date_default_timezone_get('Africa/Casablanca');
$time=date("H:i:s",time()+1);

if(!isset($user)||$user==''||!isset($msg)||$msg=='')
{
	$error="please fill the empty fields";
	header("location:index.php?error=".urldecode($error));
}
else
{
	$sql="INSERT INTO shouts(user,message,time) VALUES ('$user','$msg','$time')";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		die('error'.mysqli_error($conn));
	}
	header("location:index.php");
	exit();
	
}



}
?>

