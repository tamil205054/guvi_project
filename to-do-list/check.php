<?php
include 'connection.php';
session_start();
	if($_POST['type']=="check")
	{
			if(isset($_SESSION['name']))
			{
			$query="SELECT * FROM `user` WHERE `email`='".$_SESSION['name']."' AND `pass`='".$_SESSION['pass']."';";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)==1)
			{
				echo "true";
			}
			}
			else
			{
				echo "false";
			}
	}
?>