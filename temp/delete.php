<?php
include('config.php');
 
 $id=$_GET['id'];
$result=$conn->query("DELETE FROM register WHERE id = " .$id);
 if ($result===TRUE)
{
	header('Location:index.php?order=null&dir=null&action=search');
}
 
 ?>