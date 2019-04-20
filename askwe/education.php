<?php
session_start();
include 'connection.php';
if(isset($_POST['id']))
{
	$ch="SELECT * FROM `education` WHERE `username`='".$_POST['id']."';";
	$ch1=mysqli_query($conn,$ch);
	if(mysqli_num_rows($ch1)==0)
	{
	$query="INSERT INTO `education`  (`username`, `registerno`, `collegename`, `degree`, `department`, `language`, `skills`) VALUES ('".$_POST['id']."','".$_POST['reg']."','".$_POST['college']."','".$_POST['degree']."','".$_POST['dept']."','".$_POST['lang']."','".$_POST['skill']."');";
	$result=mysqli_query($conn,$query);
	echo "succussfully added details";
	}
	else
	{
		$query1="UPDATE `education` SET `registerno`='".$_POST['reg']."',`collegename`='".$_POST['college']."',`degree`='".$_POST['degree']."',`department`='".$_POST['dept']."',`language`='".$_POST['lang']."',`skills`='".$_POST['skill']."' WHERE `username`= '".$_POST['id']."';";
		$result1=mysqli_query($conn,$query1);
		echo "succussfully update the details";
	}
}
else
{
	echo $error;
} 
?>