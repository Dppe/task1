<?php
include('config.php');

	$name=$_POST['name'];
	$division=$_POST['division'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];

$data = [
    'name' => $name,
    'division' => $division,
    'email'  => $email,
	'password'=> $pwd,
];

$id = $dbConn->insert('register', $data);



if ($id)
	{
		header('Location:../index.php?action=loginpage');
	}
?>