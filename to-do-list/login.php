<?php
include 'connection.php';
session_start();
	if($_POST['type']=="login")
	{
		$query="SELECT * FROM `user` WHERE `email`='".$_POST['uname']."' AND `pass`='".$_POST['pass']."';";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1)
		{
			while($row=mysqli_fetch_array($result))
			$_SESSION['name']=$_POST['uname'];
			$_SESSION['pass']=$_POST['pass'];
			$_SESSION['id']=$row['id'];
			
			echo "true";
		}
	}
?>