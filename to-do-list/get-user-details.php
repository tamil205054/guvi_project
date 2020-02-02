<?php
session_start();
include 'connection.php';
if(isset($_SESSION['name']))
{
	if($_POST['type'])
	{
		$query="SELECT * FROM `user` WHERE `email`='".$_SESSION['name']."';";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1)
		{
			while ($row=mysqli_fetch_array($result)) 
			{
				$out= array('name' =>$row['name'] ,'id'=>$row['id'] );
				$_SESSION['id']=$row['id'];
			}
		}
		echo json_encode($out);
	}
}
?>