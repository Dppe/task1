<?php
include('config.php');
$id=$_POST['id'];
$name=$_POST['name'];
$division=$_POST['division'];
$email=$_POST['email'];
$result=$conn->query("UPDATE register SET name = '$name', division = '$division' ,email = '$email' WHERE id =" .$id);
if ($result===TRUE)
{
    header('Location:index.php?order=null&dir=null&action=search');
}
?>