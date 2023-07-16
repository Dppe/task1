<?php


include('config.php');
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$result = $conn->query("SELECT * FROM register WHERE email='$email' AND password='$pwd'");

if(isset($_SESSION['email']))
{
	header('Location:index.php?action=search');
	exit;
}


if($result)
{
	session_start();
	$_SESSION['email']=$email;
header('Location:index.php?order=null&dir=null&action=search');
	//header('Location:../index.php?page=0&action=test');
	
}
else 
{
	echo "incorrect username or password";
}
$conn->close();
?> 