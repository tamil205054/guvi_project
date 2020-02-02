<?php
include 'connection.php';
session_start();
if(isset($_POST['type']))
{
	if ($_POST['type']=="signup") 
	{
		$query="SELECT * FROM `user` WHERE `email`='".$_POST['email']."'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==0)
		{
		$query="INSERT INTO `user`(`name`, `email`, `pass`) VALUES ('".$_POST['uname']."','".$_POST['email']."','".$_POST['pass']."')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "true";
		}
		}
	}
}
?>