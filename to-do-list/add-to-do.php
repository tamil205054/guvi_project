<?php
session_start();
include 'connection.php';
if(isset($_POST['type']))
{
	if($_POST["type"]=="add")
	{
	$query="INSERT INTO `to-do-list`(`description`,`user-id`,`staus`) VALUES ('".$_POST['des']."','".$_SESSION['id']."','no')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

	 if($_POST["type"]=="get")
	{
		$query="SELECT * FROM `to-do-list` WHERE `user-id`='".$_SESSION['id']."'";
		$result=mysqli_query($con,$query);
		$arr = array();
		if(mysqli_num_rows($result)>0)
		{
			$i=0;
		while($row=mysqli_fetch_array($result))
		{
			$temp['id']=$row['to-do-id'];
			$temp['des']=$row['description'];
			$temp['staus']=$row['staus'];
			$arr[$i++]=$temp;
		}
		
		}
		echo json_encode($arr);
	}
	if($_POST['type']=="remove")
	{
		$query="DELETE FROM `to-do-list` WHERE  `to-do-id`='".$_POST['id']."'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "true";
		}
		else
		{
			echo $query;
		}	
	}

	if($_POST['type']=="add-to-do")
	{
		$query="UPDATE `to-do-list` SET `staus`='yes'  WHERE  `to-do-id`='".$_POST['id']."'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}	
	}

	if($_POST['type']=="reset")
	{
		$query="UPDATE `to-do-list` SET `staus`='no'  WHERE  `user-id`='".$_SESSION['id']."'";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}	
	}
}
?>